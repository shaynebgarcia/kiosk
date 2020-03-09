<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProcessing;
use App\OrderLine;

use PDF;
use Carbon\Carbon;

use Illuminate\Http\Request;

class OrderController extends Controller
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
        //
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function POSindex()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('kiosk.listing.transactions', compact('orders'));
    }
    public function POSshow(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();

        return view('kiosk.listing.transaction-detail', compact('order'));
    }
    public function POScreate(Request $request)
    {

        if ($request->ajax()) {

            $new_order = Order::create([
                'kiosk_id' => $this->kiosk,
                'user_id' => $this->user->id,
                'payment_type_id' => $request->payment_type_id,
            ]);

            if ($new_order) {
                $processing = OrderProcessing::where('kiosk_id', $this->kiosk)->where('user_id', $this->user->id)->get();

                $new_order->update([
                    'order_no' => $processing->first()->temp_order_no,
                    'amount_due' => $processing->sum('total'),
                    'amount_paid' => $request->amount_paid,
                ]);

                foreach ($processing as $processing_line) {
                    OrderLine::create([
                        'order_id' => $new_order->id,
                        'stock_id' => $processing_line->stock_id,
                        'qty' => $processing_line->qty,
                        'price' => $processing_line->price,
                        'total' => $processing_line->total,
                        'void' => $processing_line->void,
                    ]);

                    $processing_line->delete();
                }

                $data = $new_order;
                return response()->json($data);
            }

        }
    }
    public function POSinvoice(Order $order)
    {
        $date_generated = date('F d, Y H:i A');
        $PDF = PDF::loadView('reports.pdf_invoice', ['order'=>$order, 'date_generated'=>$date_generated])->setPaper(config('custom.receipt_paper_size'), config('custom.receipt_paper_orientation'));
        $fileName = 'Invoice Receipt -'.$date_generated;
        return $PDF->stream($fileName.'.pdf');
    }
}
