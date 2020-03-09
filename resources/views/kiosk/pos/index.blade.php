@extends('layouts.admindek-horizontal', ['pageSlug' => 'kiosk'])

@section('css-plugin')
    @include('layouts.plugins.notification-css')
@endsection

@section('content')
<div id="pageTrapPOS">
    <div id="layout-pos" style="width: 100%">
        <div class="row m-0">
            <div class="pcoded-pos pcoded-main-container-pos">
                <div class="pcoded-wrapper">
                    @if(config('custom.enable_search') == true)
                        @include('kiosk.includes.search')
                    @endif
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content-products">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body @if(config('custom.enable_search') == true) m-t-30 @endif">
                                        <div id="wrap-product-list">
                                            <div id="product-list" data-view="@if(config('custom.product_view') == 'gallery') gallery @elseif(config('custom.product_view') == 'barcode') barcode @endif">
                                                <!-- PRODUCT LIST HERE -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pcoded-pos pcoded-side-container-pos">
                <div class="pcoded-wrapper">
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content p-0">
                            <div class="main-body">
                                <div class="page-wrapper p-0">
                                    <div class="page-body">
                                        <div id="wrap-cart-list">
                                            <div id="cart-list">
                                                <!-- CART LIST HERE -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="layout-listing" style="width: 100%">
        <div class="row m-0">
            <div class="pcoded-listing pcoded-side-container-listing">
                <div class="pcoded-wrapper">
                    @if(config('custom.enable_search') == true)
                        @include('kiosk.includes.search')
                    @endif
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content-products">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body @if(config('custom.enable_search') == true) m-t-30 @endif">
                                        @include('kiosk.listing.pill')
                                        <div id="wrap-listing">
                                            <div id="listing">
                                                <div class="list-container">
                                                    <div class="row">
                                                      <div class="tab-content" id="pills-tabContent" style="width: -webkit-fill-available;">
                                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                          <div id="tab-drawer">
                                                            
                                                          </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                          <div id="tab-sales">
                                                            
                                                          </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-transactions" role="tabpanel" aria-labelledby="pills-transactions-tab">
                                                          <div id="tab-transactions">
                                                            
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pcoded-listing pcoded-main-container-listing">
                <div class="pcoded-wrapper">
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content p-0">
                            <div class="main-body">
                                <div class="page-wrapper p-0">
                                    <div class="page-body">
                                        <div id="wrap-listing-details">
                                            <div id="listing-details">
                                                <!-- DETAILS HERE -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-plugin')
    @include('layouts.plugins.notification-js')

    <script type="text/javascript">
        // $(window).on('load',function(){
        //     OpeningDrawerAmount();
        // });

        $(document).ready(function(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            var view = $.trim($('#product-list').data('view'));

            RefreshItems();
            RefreshCart();
            
            $(document).on('click', '#btn-show-product-list', function() {
                $('#layout-listing').css('display', 'none');
                $('#layout-pos').css('display', 'block');
                // RefreshItems();
                // RefreshCart();
            });

            $(document).on('click', '#btn-show-listing', function() {
                $('#layout-pos').css('display', 'none');
                $('#layout-listing').css('display', 'block');
                $('.p-transaction').css('display', 'none');
                // TransactionHistory();
            });

            $(document).on('click', '#pills-transactions-tab', function() {
                console.log('Clicked Trans History!')
                TransactionHistory();
            });

            $(document).on('click', '#btn-select-transaction', function() {
                var selected_id = $(this).data('id');
                $('#wrap-listing-details').css('display', 'block');
                TransactionDetail(selected_id);
            });

            //APPLICABLE ON BARCODE VIEW
                if (view == 'barcode') {
                    FocusBarcode(); //If has barcode display
                    $(document).on('change', '#input-barcode', function() {
                        var value = $(this).val();
                        SearchBarcode(view, value);
                    });
                }
            
            //APPLICABLE ON GALLERY VIEW
                if (view == 'gallery') {
                    $("#search").submit(function(e) {
                        SearchResults();
                    });
                    $(document).on('click', '#btn-select-product', function() {
                        var selected_id = $(this).data('id');
                        var with_variation = $(this).data('variation');
                        var stock_id = $(this).data('stock');
                        var available_count = $(this).data('available');

                        if (with_variation == 1) {
                            $('#modal-variation').modal('show');
                        } else {
                            if (available_count <= 0){
                                notify('Oops! Cannot process a stock quantity of 0', 'warning');
                            } else {
                                AddCart(view, stock_id);
                            }
                        }
                    });
                }

            // CART
                $(document).on('click', '#btn-remove-processing', function() {
                    var selected_id = $(this).data('id');
                    RemoveCart(view, selected_id);
                });

                $(document).on('click', '#btn-clear-processing', function() {
                    var selected_id = $(this).data('id');
                    ClearCart(view, selected_id);
                });

                $(document).on('focus','#qty', function () {
                    previous = this.value;
                }).
                on('change', '#qty', function(){
                    var processing_id = $(this).data('processing');
                    var min_count = $(this).data('min');
                    var max_count = $(this).data('max');

                    if ($(this).val() > max_count) {
                        notify('Insufficient amount! Maximum available stocks will be provided', 'info');
                        $(this).val(max_count);
                    } else if ($(this).val() == null || $(this).val() == 0) {
                        notify('Invalid! Cannot set a value less than 1', 'info');
                        $(this).val(min_count);
                    }
                    var qty_count = $(this).val();
                    QTYUpdate(view, processing_id, qty_count);
                });

            //TRANSACTION SLIDE
                $(document).on('click', '#btn-transact', function() {
                    var options = {
                        direction: 'left'
                    };
                    $('.show-transaction').toggle('slide', options, 500);
                });
                $(document).on('click', '#btn-back_products', function() {
                    var options = {
                        direction: 'left'
                    };
                    $('.p-transaction').toggle('slide', options, 500);
                    // $('.show-transaction').css('display', 'block');
                });

        });

        function OpeningDrawerAmount() {
            swal({
                title: "Drawer opening amount",
                text: "Enter opening amount",
                content: {
                    element: "input",
                    attributes: {
                        type: "number",
                    }
                },
                closeOnEsc: false,
                closeOnClickOutside: false,
                button: {
                    text: "Open Store",
                    closeModal: false,
                },
            })
            .then((amount)=>{
                if(!amount){
                    swal({
                        title: "No amount",
                        text: "Are you sure you want to proceed with no opening drawer amount?",
                        dangerMode: true,
                        buttons: {
                            text: "Back",
                        },
                    });
                }else{
                    swal({
                      title: "Entered drawer amount",
                      text: "Opening amount of "+ amount,
                      icon: "success",
                    });
                }
            });
        }

        function SearchResults() {
            var input = $('#search_field').val();
            $.ajax({
              url: '{!!URL::to('search')!!}',
              type: 'GET',
              data: {'input':input, '_token': $('input[name=_token]').val()},
              success: function (data) {
                $('#product-list').html(data);
              }
            });
        }

        function SearchBarcode(view, value) {
            $.ajax({
              url: '{{ route('pos.product.barcode.search') }}',
              type: 'GET',
              data: {'search_keyword':value},
              success: function (data) {
                $('#result-barcode').html(data);
                var stock = $('#input_stock_id').data('id');
                var qty = $('#input_stock_id').data('qty');
                if (qty <= 0) {
                    notify('Insufficient stocks. Cannot process a stock quantity of 0', 'warning');
                } else {
                    AddCart(view, stock);
                }
                FocusBarcode();
              },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    notify('Error! Cannot process request', 'danger');
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }

        function FocusBarcode() {
            $('#input-barcode').val('');
            $('#input-barcode').focus();
        }

        function RefreshItems() {
            $.ajax({
                type: 'GET',
                url: '{{ route('pos.product.index') }}',
                success: function (data) {
                    $('#product-list').html(data);
                }
            });
        }

        function RefreshCart() {
            $.ajax({
                type: 'GET',
                url: '{{ route('pos.orderprocessing.index') }}',
                success: function (data) {
                    $('#cart-list').html(data);
                }
            });
        }

        function AddCart(view, stock) {
            var stock_id = stock;
            $.ajax({
                type: 'POST',
                url: '{{ route('pos.orderprocessing.add') }}',
                data: {'stock_id': stock_id},
                success: function (data) {
                    notify('Successfully added to cart', 'success');
                    if (view == 'gallery') {
                        RefreshItems();
                    }
                    RefreshCart();
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    notify('Error! Cannot process request', 'danger');
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }

        function RemoveCart(view, processing) {
            var processing_id = processing;
            $.ajax({
                type: 'DELETE',
                url: '{{ route('pos.orderprocessing.remove') }}',
                data: {'processing_id': processing_id},
                success: function (data) {
                    notify('Successfully removed item from cart', 'success');
                    if (view == 'gallery') {
                        RefreshItems();
                    }
                    RefreshCart();
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    notify('Error! Cannot process request', 'danger');
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }

        function ClearCart(view, pos) {
            var pos_id = pos;
            $.ajax({
                type: 'DELETE',
                url: '{{ route('pos.orderprocessing.clear') }}',
                data: {'pos_id': pos_id},
                success: function (data) {
                    notify('Successfully cleared all items from cart', 'success');
                    if (view == 'gallery') {
                        RefreshItems();
                    }
                    RefreshCart();
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    notify('Error! Cannot process request', 'danger');
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }

        function QTYUpdate(view, processing, qty) {
            var processing_id = processing;
            var qty_count = qty;
            $.ajax({
                type: 'POST',
                url: '{{ route('pos.orderprocessing.update.qty') }}',
                data: {'processing_id': processing_id, 'qty_count': qty_count},
                success: function (data) {
                    if (view == 'gallery') {
                        RefreshItems();
                    }
                    RefreshCart();
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    notify('Error! Cannot process request', 'danger');
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }

        function RefreshDrawer() {
            $.ajax({
            });
        }
        function RefreshSales() {
            $.ajax({
            });
        }
        function TransactionHistory() {
            $.ajax({
                type: 'GET',
                url: '{{ route('pos.order.index') }}',
                success: function (data) {
                    console.log('Success!');
                    console.log(data);
                    $('#tab-transactions').css('display', 'block!important');
                    $('#tab-transactions').html(data);

                }
            });
        }

        function TransactionDetail(transaction) {
            $.ajax({
                type: 'GET',
                url: '{{ route('pos.order.show') }}',
                data: {'order_id': transaction},
                success: function (data) {
                    $('#listing-details').html(data);
                }
            });
        }
    </script>
@endsection