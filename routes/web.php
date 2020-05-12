<?php

// Trang chủ
Route::get('/', 'ShopController@index');
// the loai
Route::get('category/{id}', 'ShopController@getProductsByCategory')->name('shop.getProductsByCategory');

// Chi tiet sản phẩn
Route::get('/{category}/{slug}_{id}', 'ShopController@getProduct')->name('shop.product');

Route::get('/tim-kiem', 'ShopController@search')->name('shop.search');

// Liên Hệ
Route::resource('contact', 'ContactController');

// Đăng nhập
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
// Đăng xuất
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');

Route::group(['prefix' => 'admin','as' => 'admin.', 'middleware' => 'checkLogin'], function() {

    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    // QL Banner
    Route::resource('banner', 'BannerController');
    // QL Thương Hiệu
    Route::resource('brand', 'BrandController');
    // QL Nhà Cung Cấp
    Route::resource('vendor', 'VendorController');
    // Ql Người dùng
    Route::resource('user', 'UserController');
});

Auth::routes();

Route::get('/danh-muc/{slug}', 'ShopController@getProductsByCategory')->name('shop.category');