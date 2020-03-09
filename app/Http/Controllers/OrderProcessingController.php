<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kiosk;
use App\Stock;
use App\Order;
use App\OrderProcessing;
use App\PaymentType;

class OrderProcessingController extends Controller
{
    public function __construct(Request $request)
    {
        $this->kiosk = session()->get('kiosk_id');
        $this->user = auth()->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processings = OrderProcessing::all();
        $subtotal = OrderProcessing::sum('total');
        
        return view('kiosk.pos.processing', compact('processings', 'subtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderProcessing  $orderProcessing
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProcessing $orderProcessing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderProcessing  $orderProcessing
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProcessing $orderProcessing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderProcessing  $orderProcessing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProcessing $orderProcessing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderProcessing  $orderProcessing
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProcessing $orderProcessing)
    {
        //
    }

    public function POSindex()
    {
        $processings = OrderProcessing::where('user_id', $this->user->id)->get();
        $subtotal = OrderProcessing::where('user_id', $this->user->id)->sum('total');
        $payment_types = PaymentType::all();

        return view('kiosk.pos.processing', compact('processings', 'subtotal', 'payment_types'));
    }

    public function addCart(Request $request)
    {
        $kiosk = Kiosk::findorFail($this->kiosk);


        if ($request->ajax()) {

            $stock = Stock::where('id', $request->stock_id)->first();

            $last_order = Order::where('kiosk_id', $kiosk->id)->latest()->first();
            $last_processing = OrderProcessing::where('kiosk_id', $kiosk->id)->latest()->first();
            $current_processing = OrderProcessing::where('user_id', $this->user->id)->first();

            //Check if there are current processing items
            if ($current_processing != null) {
                $temporary_order_no = $current_processing->temp_order_no;
            } else {
                $last_processing_int = (int)$last_processing->temp_order_no;
                $temporary_order_no = strval($last_processing_int + 1);
            }

            if ($temporary_order_no <= $last_order->order_no) {
                $temporary_order_no = (int)$last_order->order_no + 1;
            }

            $process_item = OrderProcessing::updateOrCreate(
                [   
                    'kiosk_id' => $kiosk->id,
                    'user_id' => $this->user->id,
                    'temp_order_no' => $temporary_order_no,
                    'stock_id' => $request->stock_id,
                ],
                ['price' => $stock->price]
            );
            $process_item->increment('qty');

            if ($process_item) {
                $process_item->update(['total' => $process_item->price * $process_item->qty]);
                $updated = $stock->update(['qty' => $stock->qty - 1]);

                if(!$updated){
                    return response(['update_error' => 'Processing of item failed. Please try again, if issue persists contact support.']);
                }
                else {
                    return response(['update_success' => 'Item successfully processed.']);
                }
            }

        } else {
            return response(['request_error' => 'Cannot process request. Please try again, if issue persists contact support.']);
        }
    }

    public function updateCartqty(Request $request)
    {
        if ($request->ajax()) {

            $processing = OrderProcessing::where('id', $request->processing_id)->first();
            $current_processing_count = $processing->qty;
            if ($request->qty_count > $processing->qty) {
                $increase = 1;
            } else {
                $increase = 0;
            }
            $update_processing = $processing->update([
                'qty' => $request->qty_count,
            ]);
            if ($update_processing) {

                $processing->update(['total' => $processing->price * $processing->qty]);
                $stock = Stock::where('id', $processing->stock_id)->first();
                if ($increase == 1) {
                    $update_stock = $stock->update([
                        'qty' => $stock->qty - ($request->qty_count - $current_processing_count),
                    ]);
                } else {
                    $update_stock = $stock->update([
                        'qty' => ($current_processing_count - $request->qty_count) + $stock->qty,
                    ]);
                }

            } else {
                return response(['update_error' => 'Processing of item failed. Please try again, if issue persists contact support.']);
            }
        } else {
            return response(['request_error' => 'Cannot process request. Please try again, if issue persists contact support.']);
        }
    }

    public function removeCart(Request $request)
    {
        if ($request->ajax()) {
            $processing = OrderProcessing::where('id', $request->processing_id)->first();
            $current_processing_count = $processing->qty;
            $stock = Stock::where('id', $processing->stock_id)->first();
            $update_stock = $stock->update([
                                'qty' => $stock->qty + $current_processing_count,
                            ]);
            if ($update_stock) {
                if (config('custom.voiding') == true) {
                    $processing->update([
                        'void' => 1,
                    ]);
                } else {
                }
                $processing->delete();
            }
        } else {
            return response(['request_error' => 'Cannot process request. Please try again, if issue persists contact support.']);
        }
    }

    public function clearCart(Request $request)
    {
        if ($request->ajax()) {

            $processing_items = OrderProcessing::where('user_id', $this->user->id)->get();

            foreach ($processing_items as $processing) {

                $stock = Stock::where('id', $processing->stock_id)->first();
                $stock->update([
                    'qty' => $stock->qty + $processing->qty,
                ]);

                $processing->delete();
            }

        } else {
            return response(['request_error' => 'Cannot process request. Please try again, if issue persists contact support.']);
        }
    }
}
