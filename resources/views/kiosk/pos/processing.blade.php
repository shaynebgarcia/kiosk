@include('layouts.plugins.select-css')

<div id="cart" class="card table-card card-pos">
	<!-- <div class="card-header" style="padding-bottom: 0">
	<h4>Cart</h4>
		<div class="card-header-right" style="padding: 7px 20px">
			<button class="btn btn-inverse btn-round waves-effect waves-light btn-sm">Clear</button>
		</div>
	</div> -->
	<div class="card-block card-block-pos">
		@if(count($processings) > 0)
		<div class="table-responsive">
			<table class="table table-hover table-productlist m-b-0">
				<tbody>
					@foreach($processings as $processing)
					<tr>
						<td class="f-13" width="60%">
							<span class="name-unit">{{ $processing->stock->product->name }}</span> <br>
							<span class="price-unit">{{ currencysign($processing->price) }} per unit</span>
							<br><br>
							<div class="quantity">
								<input type="number" class="form-control form-control-sm quantity-input" name="qty" id="qty" data-min="1" data-max="{{ $processing->stock->qty + $processing->qty }}" data-processing="{{ $processing->id }}" value="{{ $processing->qty }}">
								<span class="quantity-unit">unit(s)</span>
							</div>
						</td>
						<td class="f-13">
							{{ currencysign($processing->total) }}
						</td>
						<td class="f-13 text-center" width="12%">
							<a href="#" id="btn-remove-processing" data-id="{{ $processing->id }}">
								<i class="feather icon-x f-w-600 f-16 text-c-red"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
			<!-- <h3 class="theme-light-title">No items -->
		@endif
	</div>
</div>

<div class="card-block cart-modify text-right">
	<div class="col">
		@if(config('custom.discount') == 'true')
			<button class="btn waves-effect waves-light btn-theme-round btn-sm btn-theme">
				Add discount
			</button>
		@endif
		<button class="btn waves-effect waves-light btn-theme-round btn-sm btn-theme-gray" id="btn-clear-processing">
			Clear cart
		</button>
	</div>
</div>

<div class="table-price-wrap">
	<div class="card-block table-price-inner-wrap">
		<table class="table-price">
			<tr>
				<th><h5>Sub-total</h5></th>
				<td><h5 class="text-right">{{ currencysign($subtotal) }}</h5></td>
			</tr>
			@if(config('custom.discount') == 'true')
				<tr>
					<th><h5>Discount</h5></th>
					<td><h5 class="text-right">{{ config('custom.currency.sign') }}0.00</h5></td>
				</tr>
			@endif
		</table>
	</div>
	<div class="form-group m-0">
		<button class="btn waves-effect waves-light btn-square btn-block btn-theme total-btn" id="btn-transact" @if($subtotal == null) disabled @endif>
			<h2>{{ currencysign($subtotal) }}</h2>
		</button>
	</div>
</div>

<div id="sidebar" class="p-transaction show-transaction">
	<div class="had-container">
		<div class="p-fixed transaction-main">
			<div class="transaction-inner">
				<form name="form-transact" id="form-transact"></form>
				<div class="chat-search-box">
					<a class="back_products" id="btn-back_products">
						<i class="feather icon-x"></i>
					</a>
					<div class="right-icon-control">
						<h3 class="theme-header">Payment
					</div>
				</div>
				<div class="transaction-details">
					<div class="row">
						<div class="col-4">
							<h5 class="theme-light-title">Transaction number</h5>
							<h5 class="theme-detail">#<span id="displayOrder_no">{{ $processings->first()->temp_order_no ?? ''}}</span></h5>
						</div>
						<div class="col-4">
							<h5 class="theme-light-title">Cashier</h5>
							<h5 class="theme-detail">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h5>
						</div>
						<div class="col-4">
							@if(config('custom.enable_customer') == true)
								<h5 class="theme-light-title">Customer</h5>
								<h5 class="theme-detail">Beth Smith</h5>
							@endif
						</div>
					</div>
				</div>
				<div class="transaction-body">
					<div class="form-group row">
                        <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Payment Type</label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                            	<select class="select2" name="payment_type" id="select-payment-type" form="form-transact" style="width: 100%" required>
	                                    @foreach($payment_types as $payment_type)
	                                    	<option value="{{ $payment_type->id }}" @if($payment_type->title == 'Cash') selected @endif>
	                                            {{ $payment_type->title }}
	                                        </option>
	                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="row" id="cashInput">
                    	<div class="total-details">
							<div class="price-line">
								<input id="totalDisplay" value="{{ $subtotal }}" hidden>
								<h2>{{ currencysign($subtotal) }}</h2>
	                    		<h5 class="theme-light-title p-0">Total</h5>
							</div>
	                    	<div class="price-line">
		                    	<h2 id="amountDisplay">{{ config('custom.currency.sign') }}</h2>
		                    	<h5 class="theme-light-title p-0">Tendered</h5>
	                    	</div>
	                    	<div class="price-line">
		                    	<h2 id="changeDisplay">{{ config('custom.currency.sign') }}00.00</h2>
		                    	<h5 class="theme-light-title p-0">Change</h5>
		                    </div>
						</div>
						<div class="keypadwrapper">
						  <div class="keypad">
						    <div id="lineone" class="numberline">
						      <div class="content">
						          <button class="keypad-button" value="1">1</button>
						      </div>
						      <div class="content">
						        <div>
						          <button class="keypad-button">2</button>
						        </div>
						      </div>
						      <div class="content">
						        <div>
						          <button class="keypad-button">3</button>
						        </div>
						      </div>
						    </div>
						    <div id="linetwo" class="numberline">
						      <div class="content">
						        <button class="keypad-button">4</button>
						      </div>
						      <div class="content">
						        <button class="keypad-button">5</button>
						      </div>
						      <div class="content">
						        <button class="keypad-button">6</button>
						      </div>
						    </div>
						    <div id="linethree" class="numberline">
						      <div class="content">
						        <button class="keypad-button">7</button>
						      </div>
						      <div class="content">
						        <button class="keypad-button">8</button>
						      </div>
						      <div class="content">
						        <button class="keypad-button">9</button>
						      </div>
						    </div>
						    <div id="linefour" class="numberline">
						      <div class="content">
						        <button class="keypad-button">.</button>
						      </div>
						      <div class="content">
						        <button class="keypad-button">0</button>
						      </div>
						      <div class="content">
						        <button class="keypad-button" id="keypad-clear">C</button>
						      </div>
						    </div>
						  </div>
						</div> 
                    </div>
				</div>
				<div class="transaction-footer">
					<div class="form-group m-0">
						<button type="submit" class="btn waves-effect waves-light btn-block btn-theme-round btn-theme pos-absolute float-right" form="form-transact" id="btn-transact">
							<h3>Proceed</h3>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.plugins.select-js')

<script type="text/javascript">

	$(document).ready(function() {

		$('#select-payment-type').on('change', function() {
			var selected = $(this).val();
			if (selected != 1) {
				$('#cashInput').slideUp();
			} else {
				$('#cashInput').slideDown();
			}
		});

		var total = $('#totalDisplay').val();
		var result = 0;
		var currentEntry = '0';
		var change = 0;
		updateAmount(result);

		$('.keypad-button').click(function () {
			var buttonPressed = $(this).html();
			console.log(buttonPressed);

			if (buttonPressed === "C") {
		      result = 0;
		      currentEntry = '0';
		      change = 0;
		      $('#changeDisplay').text(change.toFixed(2));
		      $(".keypad-button").attr('disabled', false);
		    } else if (buttonPressed === ".") {
		    	currentEntry = currentEntry + buttonPressed;
		    } else if (isNumber(buttonPressed)) {
		      if (currentEntry === '0') {
		      	currentEntry = buttonPressed;
		      } else {
		      	currentEntry = currentEntry + buttonPressed;
		      }
		    }
		    updateAmount(currentEntry);
		});

		$("#form-transact").submit(function(e) {
			e.preventDefault();
			var payment_type = $('#select-payment-type').val();
			if (payment_type != 1) {

			} else {
				var m_pin = '1234';
				var total = $('#totalDisplay').val();
				var tendered = parseFloat($('#amountDisplay').text());

	            if (tendered <= 0 || tendered == null || total > tendered) {
	            	swal({
	                    title: "Manager PIN",
	                    text: "Tendered amount is less than the total balance. Manager's input PIN is required.",
	                    content: "input",
	                    button: {
						    text: "Submit",
						    closeModal: false,
						  },
	                })
	                .then((pin)=>{
		                if(pin == m_pin){
		                	AreYouSure(tendered);
		                }else{
		                    swal("Error", "Manager PIN is required", "error");
		                }
		            });
		            // ;
	             //    .then(function(isConfirm) {
	             //    	if (isConfirm) {
	             //    		AreYouSure(tendered);
	             //    	}
	             //    });
	            } else {
	            	AreYouSure(tendered);
	            }
			}
        });

        function AreYouSure(amount) {
        	console.log(amount);
        	swal({
                    title: "Process transaction",
                    text: "About to process a transaction",
                    buttons: {
                        cancel: "Cancel",
                        continue: {
                        	text: "Transact",
                        	value: "transact",
                        },
                    },
                }).then(function(isConfirm) {
                	var payment_type = $('#select-payment-type').val();
                	var amount_paid = amount;
                	if (isConfirm) {
			            $.ajax({
			                type: 'POST',
			                url: '{{ route('pos.order.create') }}',
			                data: {'payment_type_id':payment_type, 'amount_paid': amount_paid},
			                dataType:'json',
			                success: function (data) {
			                	var order_id = data.id;
			                	var order_no = data.order_no;
			                	swal({
			                		icon: "success",
			                		title: "REF# "+ order_no,
                    				text: "Successfully processed transaction. Would you like to print a receipt?",
			                		closeOnClickOutside: false,
			                		buttons: {
				                        cancel: "Skip",
				                        print: {
				                        	text: "<a href='{{ route('pos.order.invoice', "+order_id+") }}'>Print Receipt</a>",
				                        	value: "print",
				                        },
				                    },
								});
			                    RefreshCart();
			                },
			                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			                    notify('Error! Cannot process request', 'danger');
			                    console.log(JSON.stringify(jqXHR));
			                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			                }
			            });
			            
                	} else {

                	}
                 });
        }
		function isNumber(value) {
			return !isNaN(value);
		}

		function updateAmount(displayValue) {
			var value = parseFloat(displayValue);
	     	$('#amountDisplay').text(value.toFixed(2));

	     	if (value >= total) {
		    	console.log('You can check out!');
		    	$(".keypad-button").attr('disabled', true);
		    	$("#keypad-clear").attr('disabled', false);
		    	compute(total, value);
	     	}
		};

		function compute(total, tendered) {
			  var total = parseFloat(total);
			  var tendered = parseFloat(tendered);
			  var change = tendered - total;
			  $('#changeDisplay').text(change.toFixed(2));
		}

	});
</script>