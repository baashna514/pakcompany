<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// API's Route
Route::get('get-categories-data', 'ApiController@get_categories_data')->name('api.get-categories-data');
Route::get('get-subcategories-data', 'ApiController@get_subcategories_data')->name('api.get-subcategories-data');
Route::get('get-brands-data', 'ApiController@get_brands_data')->name('api.get-brands-data');
Route::get('get-all-products-data', 'ApiController@get_all_products_data')->name('api.get-all-products-data');
Route::get('get-category-products-data/{id}', 'ApiController@get_category_products_data')->name('api.get-category-products-data');
Route::get('get-subcategory-products-data/{id}', 'ApiController@get_subcategory_products_data')->name('api.get-subcategory-products-data');
Route::get('get-brand-products-data/{id}', 'ApiController@get_brand_products_data')->name('api.get-brand-products-data');
Route::get('get-single-product-data/{id}', 'ApiController@get_single_product_data')->name('api.get-single-product-data');
Route::get('get-product-sizes-data/{id}', 'ApiController@get_product_sizes_data')->name('api.get-product-sizes-data');
Route::get('get-product-gallery-data/{id}', 'ApiController@get_product_gallery_data')->name('api.get-product-gallery-data');
Route::get('get-all-orders-data', 'ApiController@get_all_orders_data')->name('api.get-all-orders-data');
Route::get('get-single-order-data/{id}', 'ApiController@get_single_order_data')->name('api.get-single-order-data');

Route::get('get-comment', 'ApiController@get_comment')->name('api.get-comment');
Route::get('get-chat', 'ApiController@get_chat')->name('api.get-chat');
Route::post('login', 'ApiController@authenticate')->name('api.login');
Route::post('register', 'ApiController@post_register')->name('api.login');
