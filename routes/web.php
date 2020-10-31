<?php 


Route::group(['prefix' => 'member'], function() {
	
		Route::get('login', 'LoginController@loginForm')->name('customer.login');
		Route::post('login', 'LoginController@login')->name('customer.post_login');
		Route::get('register','LoginController@register')->name('customer.register');
		Route::post('register','LoginController@post_register')->name('customer.post_register');

	});

Route::group(['middleware' => 'customer'], function() {
		Route::get('dashboard', 'CustomerLoginController@index')->name('customer.dashboard');
		Route::get('logout', 'LoginController@logout')->name('customer.logout');

		//front
		Route::get('/', 'FrontController@index')->name('front.index');
		Route::get('/produk', 'FrontController@product')->name('front.produk');
		Route::get('/category/{slug}', 'FrontController@categoryProduct')->name('front.category');
		Route::get('/produk/{slug}', 'FrontController@show')->name('front.show_produk');


		//cart
		Route::post('cart', 'CartController@addToCart')->name('front.cart');
		Route::get('/cart', 'CartController@listCart')->name('front.list_cart');
		Route::post('/cart/update', 'CartController@updateCart')->name('front.update_cart');
		Route::get('/checkout', 'CartController@checkout')->name('front.checkout');
		Route::post('/checkout', 'CartController@processCheckout')->name('front.store_checkout');
		Route::get('/checkout/success/{id}', 'CartController@checkoutFinish')->name('front.finish_checkout');
		Route::post('/api/cost', 'CartController@getCourier')->name('cost');

		Route::get('/checkout/success/cancel/{id}', 'CartController@cancel')->name('cancel');
	});

//admin
Route::get('/admin', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')->name('profile.update');
});
	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	Route::group(['middleware' => 'web'], function(){
	Route::auth();
});
	Route::group(['middleware' => ['web','auth']], function(){
	Route::get('/home', 'HomeController@index');

	//user
	Route::resource('user', 'UserController')->except(['show']);
	Route::get('/user', 'UserController@index')->name('user.index');
	Route::get('/user/cari', 'UserController@cari')->name('user.cari');
	Route::post('/user', 'UserController@store')->name('user.store');
	Route::get('/user/{user_id}/edit', 'UserController@edit')->name('user.edit');
	Route::put('/user/{user_id}', 'UserController@update')->name('user.update');
	Route::delete('/user/{user_id}', 'UserController@destroy')->name('user.destroy');
	Route::get('/user/export_excel', 'UserController@export_excel');

	//customer
	Route::resource('customer', 'CustomerController')->except(['show']);
	Route::get('/customer/cari', 'CustomerController@cari')->name('customer.cari');
	Route::post('/customer', 'CustomerController@store')->name('costumer.store');
	Route::get('/customer/{customer_id}/edit', 'CustomerController@edit')->name('customer.edit');
	Route::put('/customer/{customer_id}', 'CustomerController@update')->name('customer.update');
	Route::delete('/customer/{customer_id}', 'CustomerController@destroy')->name('customer.destroy');
	
	Route::get('/customer/export_excel', 'CustomerController@export_excel');

	//category
	Route::get('/category', 'CategoryController@index')->name('category.index');
	Route::post('/category', 'CategoryController@store')->name('category.store');
	Route::get('/category/{category_id}/edit', 'CategoryController@edit')->name('category.edit');
	Route::put('/category/{category_id}', 'CategoryController@update')->name('category.update');
	Route::delete('/category/{category_id}', 'CategoryController@destroy')->name('category.destroy');
	Route::get('/category/export_excel', 'CategoryController@export_excel');

	//product
	Route::resource('product', 'ProductController')->except(['show']);
    Route::get('/product/bulk', 'ProductController@massUploadForm')->name('product.bulk');
    Route::post('/product/bulk', 'ProductController@massUpload')->name('product.saveBulk');
    Route::post('/product/marketplace', 'ProductController@uploadViaMarketplace')->name('product.marketplace');
	Route::get('/product/export_excel', 'ProductController@export_excel');
	//city
	Route::resource('city', 'CityController')->except(['show']);
	Route::get('/city/{city_id}/edit', 'CityController@edit')->name('city.edit');
	Route::put('/city/{city_id}', 'CityController@update')->name('city.update');
	Route::delete('/city/{city_id}', 'CityController@destroy')->name('city.destroy');	
	// Transaction
	Route::get('/transaction','TransactionController@index')->name('transaction.index');
	Route::delete('/city/{city_id}', 'CityController@destroy')->name('city.destroy');
	Route::get('/city/export_excel', 'CityController@export_excel');
});		