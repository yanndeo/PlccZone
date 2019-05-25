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


Route::namespace('Api')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/categories', 'CategoryController@index')->name('category');

    Route::get('category/{slug}-{id}', 'CategoryController@showBrands')->name('show_brands'); //ici


    Route::get('/fabricants', 'BrandController@index')->name('brand');

    Route::get('/articles', 'ProductController@index')->name('articles');

    Route::get('/article/{slug}-{id}', 'ProductController@show')->name('article_show');

    Route::get('/api/products', 'ProductController@loadProductApi');

    Route::get('/api/products/search/{item?}', 'ProductController@searchLike');


});





Route::get('/article', function () {
    return view('layouts/article_single');
})->name('article');



Route::get('/contact', function () {
    return view('layouts/contact');
})->name('contact');


