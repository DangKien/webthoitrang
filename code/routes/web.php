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

Route::get('/', function () {
    return view('BackEnd.layouts.default');
});

Route::get('/modal/{view}', 'BackEnd\Modal\ModalCtrl@modal');


Route::group(['prefix'=>'backend'], function (){
	Route::get('/category', 'BackEnd\Cate\CateCtrl@category')->name('category');
	Route::get('/product', 'BackEnd\Product\ProductCtrl@main')->name('product');
	Route::get('/slider', 'BackEnd\Slider\SliderCtrl@slider')->name('slider');


	Route::get('/product-main', 'BackEnd\Product\ProductCtrl@product');
	Route::get('/detail-product', 'BackEnd\Product\ProductCtrl@detailProduct');
	// Route::get('/product', 'BackEnd\Product\ProductCtrl@product');
	Route::get('/image', function (){
		return view('vendor.laravel-filemanager.index');
	});


});

// frontend route
Route::group(['prefix'=>''], function (){
	Route::get('/', 'FrontEnd\Home\HomeCtrl@index')->name('home');

	Route::get('/categories/{slug}', 'FrontEnd\Category\CategoryCtrl@index');

	Route::get('/product/{slug}', 'FrontEnd\Product\ProductCtrl@index');


});



// backend route rest API
Route::group(['prefix' => 'rest/backend'], function() {
    // loại tin
    Route::get('/cate', 'BackEnd\Rest\CateCtrl@getList');
    Route::post('/cate', 'BackEnd\Rest\CateCtrl@getInsert');
    Route::get('/cate/{id}', 'BackEnd\Rest\CateCtrl@getEdit');
	Route::put('/cate/{id}', 'BackEnd\Rest\CateCtrl@getUpdate');
	Route::delete('/cate/{id}', 'BackEnd\Rest\CateCtrl@getDelete');

	// Sản phẩm
	Route::get('product', 'BackEnd\Rest\ProductCtrl@getList');
    Route::post('/product', 'BackEnd\Rest\ProductCtrl@getInsert');
    Route::get('/product/{id}', 'BackEnd\Rest\ProductCtrl@getEdit');
	Route::post('/product/{id}', 'BackEnd\Rest\ProductCtrl@getUpdate');
	Route::delete('/product/{id}', 'BackEnd\Rest\ProductCtrl@getDelete');
	Route::get('product-detail/{id}', 'BackEnd\Rest\ProductCtrl@detailProduct');
	Route::post('product-detail/{id}', 'BackEnd\Rest\ProductCtrl@insertDetailProduct');
	Route::get('product-detail-edit/{id}', 'BackEnd\Rest\ProductCtrl@editDetailProduct');
	Route::post('product-detail-update/{id}', 'BackEnd\Rest\ProductCtrl@updateDetailProduct');
	Route::get('product-detail-delete/{id}', 'BackEnd\Rest\ProductCtrl@deleteDetailProduct');
	Route::get('promotion', 'BackEnd\Rest\ProductCtrl@getPromotion');
	Route::get('size', 'BackEnd\Rest\ProductCtrl@getSize');

	// slidershow
	Route::get('/slider', 'BackEnd\Rest\SliderCtrl@getList');
    Route::post('/slider', 'BackEnd\Rest\SliderCtrl@getInsert');
    Route::get('/slider/{id}', 'BackEnd\Rest\SliderCtrl@getEdit');
	Route::post('/slider/{id}', 'BackEnd\Rest\SliderCtrl@getUpdate');
	Route::delete('/slider/{id}', 'BackEnd\Rest\SliderCtrl@getDelete');

});

// rest frontend 
Route::group(['prefix' => 'rest/frontend'], function() {
    // loại tin
    Route::get('/product', 'FrontEnd\Rest\ProductCtrl@getRecord'); // lay 1 san pham

    Route::get('/category/{id}', 'FrontEnd\Rest\CategoryCtrl@getList'); // lay san pham theo id

});