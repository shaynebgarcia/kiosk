<div class="product-container">
    <div class="row">
        <div class="barcode-input-wrap">
            <input class="form-control barcode-input" type="text" name="input-barcode" id="input-barcode" placeholder="SKU/UPC"><img src="{{ asset('img/scan.png') }}">
            <div class="barcode-result">
                <div id="result-barcode">
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" id="btn-select-product" data-id="{{ $product->id }}" data-variation="{{ $product->with_variation }}" data-stock="{{ $product->stocks->first()->id }}" data-available="{{ $product->stocks->first()->qty }}">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo10/images/img-1.jpg">
                    </a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">{{ $product->name }}</a></h3>
                    <div class="price">

                        @if(count($product->stocks) >= 2)
                        <span class="product-variation-label">
                            @foreach($product->stocks as $stock)
                                @foreach($stock->variations as $variation)
                                    {{ $variation->name }}
                                @endforeach
                            @endforeach
                        </span>
                        @else
                            {{ currencysign($product->stocks->first()->price) }}
                        @endif
                    </div>
                    <div class="stocks">
                            {{ $product->stocks->sum('qty') }} stocks
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div> -->
</div>