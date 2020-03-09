<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
	
	Route::group(['middleware' => ['web']], function () {

		Route::group(['middleware' => ['developer_access']], function () {
			Route::get('/developer', 'HomeController@developer')->name('dev.dashboard');
		});

		Route::group(['middleware' => ['backend_access']], function () {
			Route::get('/', 'HomeController@dashboard')->name('dashboard');
		});

		Route::get('/kiosk', 'KioskController@index')->name('kiosk.index');

		Route::get('/transactions', 'OrderController@POSindex')->name('pos.order.index');
		Route::get('/transaction-details', 'OrderController@POSshow')->name('pos.order.show');
		Route::post('/transact', 'OrderController@POScreate')->name('pos.order.create');
		Route::get('/invoice-export/{order}', 'OrderController@POSinvoice')->name('pos.order.invoice');
		
		Route::get('/products', 'ProductController@POSindex')->name('pos.product.index');
		Route::get('/cart', 'OrderProcessingController@POSindex')->name('pos.orderprocessing.index');

		Route::get('/barcodeSearch', 'ProductController@POSbarcodeSearch')->name('pos.product.barcode.search');
		Route::post('/addCart', 'OrderProcessingController@addCart')->name('pos.orderprocessing.add');
		Route::post('/updateCartqty', 'OrderProcessingController@updateCartqty')->name('pos.orderprocessing.update.qty');
		Route::delete('/removeCart', 'OrderProcessingController@removeCart')->name('pos.orderprocessing.remove');
		Route::delete('/clearCart', 'OrderProcessingController@clearCart')->name('pos.orderprocessing.clear');

	});

});


