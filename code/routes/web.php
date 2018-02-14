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
	Route::get('/product', 'BackEnd\Product\ProductCtrl@product')->name('product');
});

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
	Route::put('/product/{id}', 'BackEnd\Rest\ProductCtrl@getUpdate');
	Route::delete('/product/{id}', 'BackEnd\Rest\ProductCtrl@getDelete');


});