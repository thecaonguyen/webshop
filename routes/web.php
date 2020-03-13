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

// Trang chủ
Route::get('/', 'ShopController@index');
//Liên Hệ
Route::resource('contact', 'ContactController');

// Route Group Admin
// Gom nhóm route trang admin
Route::group(['prefix' => 'admin', 'as'=>'admin.'], function() {
	Route::get('/', 'AdminController@index')->name('dashboad');

	Route::resource('category', 'CategoryController')->names([
		'create' => "category.create",
		'store' => 'category.store'
	]);

	Route::resource('product', 'ProductController');

	// QL Banner
	Route::resource('banner', 'BannerController');

	//QL Nhà cung cấp
	Route::resource('vendor', 'VendorController');

	//QL Thương hiệu
	Route::resource('brand', 'BrandController');
});


