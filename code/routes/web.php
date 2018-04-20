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

Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/modal/{view}', 'BackEnd\Modal\ModalCtrl@modal');

Route::post('backend/login', 'Auth\LoginController@login');
Route::get('backend/login', 'Auth\LoginController@showLoginForm')->name('login');

Route::group(['prefix'=>'backend', "middleware"=>"auth"], function (){

	Route::get('/category', 'BackEnd\Cate\CateCtrl@category')->name('category');
	Route::get('/product', 'BackEnd\Product\ProductCtrl@main')->name('product');
	Route::get('/slider', 'BackEnd\Slider\SliderCtrl@slider')->name('slider');
	Route::get('/contact', 'BackEnd\Contact\ContactCtrl@index')->name("contact");
	Route::get('/customer', 'BackEnd\Contact\ContactCtrl@customer')->name("customer.backend");

	Route::get('comment', 'BackEnd\Comment\CommentCtrl@comment')->name('comment');
	Route::get('delete-comment/{id}', 'BackEnd\Comment\CommentCtrl@deleteComment');
	Route::get('approval-comment/{id}', 'BackEnd\Comment\CommentCtrl@approvalComment');

	Route::get('/product-main', 'BackEnd\Product\ProductCtrl@product');
	Route::get('/detail-product', 'BackEnd\Product\ProductCtrl@detailProduct');
	// Route::get('/product', 'BackEnd\Product\ProductCtrl@product');
	Route::get('/image', function (){
		return view('vendor.laravel-filemanager.index');
	});

	Route::resource('users','BackEnd\UserController');
	Route::resource('news','BackEnd\NewsController');
	Route::resource('orders','BackEnd\OrderController');
	Route::resource('statistic','BackEnd\StatisticController');

});

// frontend route
Route::group(['prefix'=>''], function (){
	Route::get('/', 'FrontEnd\Home\HomeCtrl@index')->name('home');

	Route::get('/categories/{slug}', 'FrontEnd\Category\CategoryCtrl@index');

	Route::get('/product/{slug}', 'FrontEnd\Product\ProductCtrl@index');

	Route::get('/search', 'FrontEnd\Search\SearchCtrl@index');

	Route::get('/carts', 'FrontEnd\Cart\CartCtrl@index');
	Route::get('/checkout', 'FrontEnd\Cart\CartCtrl@checkout');
	Route::get('/contact', 'FrontEnd\Contact\ContactCtrl@index');
	Route::post('/contact', 'FrontEnd\Contact\ContactCtrl@message');

	Route::get('/comment', 'FrontEnd\Contact\ContactCtrl@list');
	Route::post('/comment/{id}', 'FrontEnd\Comment\CommentCtrl@postComment');

	Route::get('news', 'FrontEnd\News\NewCtrl@index');
	Route::get('news/{slug}', 'FrontEnd\News\NewCtrl@getDetail');

	Route::get('customer', 'FrontEnd\Customer\CustomerCtrl@index')->name('customer');
	Route::post('customer', 'FrontEnd\Customer\CustomerCtrl@updateAccount');
	Route::put('customer', 'FrontEnd\Customer\CustomerCtrl@changePass');

	Route::get('login', 'FrontEnd\Login\LoginController@showLoginForm')->name('login.frontend');
	Route::post('login', 'FrontEnd\Login\LoginController@todoLogin');

	Route::get('register', 'FrontEnd\Login\LoginController@showRegisterForm')->name('register.frontend');
	Route::post('register', 'FrontEnd\Login\LoginController@postRegister');

	Route::get('logout-font', 'FrontEnd\Login\LoginController@logout')->name('logout.frontend');

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

	Route::get('comment', 'BackEnd\Rest\CommentCtrl@getList');

});

// rest frontend 
Route::group(['prefix' => 'rest/frontend'], function() {
    // loại tin
    Route::get('/product', 'FrontEnd\Rest\ProductCtrl@getRecord'); // lay 1 san pham
	// lay san pham theo id
    Route::get('/category/{id}', 'FrontEnd\Rest\CategoryCtrl@getList'); 
    // lay san pham theo id
    Route::get('/productInvole/{id}', 'FrontEnd\Rest\ProductCtrl@getProductInvole'); 

    // lay san pham theo id
    Route::get('/search', 'FrontEnd\Rest\SearchCtrl@getList'); 

    // lay tin tuc theo id
    Route::get('news', 'FrontEnd\Rest\NewCtrl@getList');

    // Cho sản phẩm vào giỏ
    Route::post('add-cart/{id}', 'FrontEnd\Rest\CartCtrl@addCart');
    Route::post('delete-cart/{id}', 'FrontEnd\Rest\CartCtrl@deleteCart');
    Route::post('update-cart/{id}', 'FrontEnd\Rest\CartCtrl@updateCart');

    // Lấy sản phẩm
    Route::get('cart', 'FrontEnd\Rest\CartCtrl@getCart');
});

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('redirect-fb', 'FrontEnd\SocialAuthCtrl@redirectFb');
Route::get('callback-fb', 'FrontEnd\SocialAuthCtrl@callbackFb');

Route::get('redirect-gg', 'FrontEnd\SocialAuthCtrl@redirectGG');
Route::get('callback-gg', 'FrontEnd\SocialAuthCtrl@callbackGG');
