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

    Route::get('/categorie/{slug}_{category}', 'CategoryController@showBrands')->name('show_brands'); //ici


    Route::get('/fabricants', 'BrandController@index')->name('brand');

    Route::get('/fabricant/{slug}_{brand}', 'BrandController@showCategories')->name('show_categories');


    Route::get('/articles', 'ProductController@index')->name('articles');

    Route::get('/article/{slug}-{id}', 'ProductController@show')->name('article_show');


    //Formulaire: contact & devis

    Route::post('/api/devis', 'FormController@devisProduct')->name('devis_product');

    Route::post('/api/contact', 'FormController@contactPost')->name('contact_form');


    Route::get('/api/products', 'ProductController@loadProductApi');

    Route::get('/api/products/search/{item?}', 'ProductController@searchLike');




});





Route::get('/article', function () {
    return view('layouts/article_single');
})->name('article');



Route::get('/contact', function () {
    return view('layouts/contact');
})->name('contact');



Route::get('/apropos', function () {
    return view('layouts/aboutus');
})->name('aboutus');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
