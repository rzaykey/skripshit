<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/category/{slug}', 'Ecommerce\FrontController@categoryProduct')->name('front.category');
Route::get('/product/{slug}', 'Ecommerce\FrontController@show')->name('front.show_product');

	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	Route::group(['middleware' => 'web'], function(){
	Route::auth();
});
	Route::group(['middleware' => ['web','auth']], function()
{
	Route::get('/home', 'HomeController@index');

	//category
	Route::get('/category', 'CategoryController@index')->name('category.index');
	Route::post('/category', 'CategoryController@store')->name('category.store');
	Route::get('/category/{category_id}/edit', 'CategoryController@edit')->name('category.edit');
	Route::put('/category/{category_id}', 'CategoryController@update')->name('category.update');
	Route::delete('/category/{category_id}', 'CategoryController@destroy')->name('category.destroy');

	//product
	Route::resource('product', 'ProductController')->except(['show']);
    Route::get('/product/bulk', 'ProductController@massUploadForm')->name('product.bulk');
    Route::post('/product/bulk', 'ProductController@massUpload')->name('product.saveBulk');
    Route::post('/product/marketplace', 'ProductController@uploadViaMarketplace')->name('product.marketplace');
	// Route::get('/product', 'ProductController@index')->name('product.index');
	// Route::post('/product', 'ProductController@store')->name('product.store');
	// Route::get('/product/{product_id}/edit', 'ProductController@edit')->name('product.edit');
	// Route::put('/product/{product_id}', 'ProductController@update')->name('product.update');
	// Route::delete('/product/{product_id}', 'ProductController@destroy')->name('product.destroy');
});		