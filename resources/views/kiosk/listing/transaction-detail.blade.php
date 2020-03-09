<div id="cart" class="card table-card card-pos">
	<div class="transaction-details" style="padding: 0 1.5rem;">
		<div class="row">
			<div class="col">
				<h5 class="theme-detail p-t-20">{{ $order->created_at }}</h6>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<h6 class="theme-light-title f-14">Transaction number</h6>
				<h6 class="theme-detail">#{{ $order->order_no }}</h6>
			</div>
			<div class="col-4">
				<h6 class="theme-light-title f-14">Cashier</h6>
				<h6 class="theme-detail">{{ $order->cashier }}</h6>
			</div>
			<div class="col-4">
				@if(config('custom.enable_customer') == true)
				<h6 class="theme-light-title f-14">Customer</h6>
				<h6 class="theme-detail">{{ $order->customer }}</h6>
				@endif
			</div>
		</div>
	</div>
	<div class="card-block card-block-history">
		<div class="table-responsive">
			<table class="table table-hover table-productlist history m-b-0">
				<thead>
				<tr>
					<th class="f-22" width="70%" style="padding: 1rem 1rem 0rem 1.5rem; border-top: none;">Item</th>
					<th class="f-22" style="padding: 1rem 1rem 0rem 1.5rem; border-top: none;">Price</th>
				</tr>
				</thead>
			<tbody>
				@foreach($order->lines as $line)
				<tr>
					<td class="f-13" width="70%">
						<span class="name-unit">{{ $line->qty }} x {{ $line->stock->product->name }}</span>
						<span class="price-unit">({{ currencysign($line->price) }} per unit)</span>
					</td>
					<td class="f-13">
						{{ currencysign($line->total) }}
					</td>
				</tr>
				@endforeach
			</tbody>
			</table>
		</div>
	</div>
</div>
<div class="card-block" style="padding: 0 2.5rem 0 1.5rem;">
	<div class="row">
		<div class="col">
			<h6 class="theme-detail">Sub-total</h6>
		</div>
		<div class="col">
			<h6 class="theme-detail text-right">{{ currencysign($order->lines->sum('total')) }}</h6>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<h6 class="theme-detail">Discount</h6>
		</div>
		<div class="col">
			<h6 class="theme-detail text-right">{{ config('custom.currency.sign') }}0.00</h6>
		</div>
	</div>
	<!-- <div class="row">
		<div class="col">
			<h6 class="theme-detail">Tax</h6>
		</div>
		<div class="col">
			<h6 class="theme-detail text-right">{{ config('custom.currency.sign') }}0.00</h6>
		</div>
	</div> -->
	<div class="row">
		<div class="col">
			<h6 class="theme-detail">Grand Total</h6>
		</div>
		<div class="col">
			<h6 class="theme-detail text-right">{{ currencysign($order->lines->sum('total')) }}</h6>
		</div>
	</div>
</div>

<div class="card-block" style="padding: 0 2.5rem 0 1.5rem;">
	<div class="row">
		<div class="col">
			<h5 class="theme-detail f-22 p-t-20">Payment</h6>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<h6 class="theme-detail">Type</h6>
		</div>
		<div class="col">
			<h6 class="theme-detail text-right">Cash</h6>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<h6 class="theme-detail">Amount</h6>
		</div>
		<div class="col">
			<h6 class="theme-detail text-right">{{ config('custom.currency.sign') }}0.00</h6>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<h6 class="theme-detail">Change</h6>
		</div>
		<div class="col">
			<h6 class="theme-detail text-right">{{ config('custom.currency.sign') }}0.00</h6>
		</div>
	</div>
</div>

<div class="card-block" style="padding: 0 2.5rem 0 1.5rem;">
	<div class="row">
		<div class="col">
			<div class="form-group" style="margin: 0;
    bottom: 14px;
    position: fixed;
    width: 37%;">
				<button class="btn waves-effect waves-light btn-block btn-theme-round btn-theme">
					<h3 style="padding: 0;">Print</h3>
				</button>
			</div>
		</div>
	</div>
</div>