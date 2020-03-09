<h5>Result</h5>
@if($stock != null)
	<input id="input_stock_id" hidden="" data-id="{{ $stock->id }}" data-qty="{{ $stock->qty }}">
	<h5>SKU/UPC: {{ $stock->sku_upc }}</h5>
	<h5>BRAND:{{ $stock->product->brand }}</h5>
	<h5>PRODUCT DETAILS: {{ $stock->product->name }}</h5>
	<h5>PRICE: {{ $stock->price }}</h5>
@else
	<h5>No item found</h5>
@endif
