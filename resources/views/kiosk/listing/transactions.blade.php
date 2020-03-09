<div class="row">
    <div class="col">
        <h6 class="result-title-light text-right">Showing {{ count($orders) }} result(s)</h6>
    </div>
</div>
@if(count($orders) > 0)
    @foreach($orders as $order)
        <div class="col-md-12 col-sm-12">
            <a href="#" id="btn-select-transaction" data-id="{{ $order->id }}">
                <div class="card list-grid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-left">
                                <h5 class="theme-detail">Transaction #{{ $order->order_no }}</h5>
                            </div>
                            <div class="col text-right">
                                <h6 class="title-light timestamp">{{ $order->created_at }}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 class="title-dark">{{ $order->payment_type->titleupper }} ₱5,860.00</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 class="title-light">Cashier: {{ $order->cashier }}</h6>
                            </div>
                        </div>
                        @if(config('custom.enable_customer') == true)
                        <div class="row">
                            <div class="col">
                                <h6 class="title-light" style="padding: 0;">Customer: {{ $order->customer }}</h6>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@else
<div class="row">
    <div class="col-md-12 col-sm-12">
        Showing results
    </div>
</div>
@endif
