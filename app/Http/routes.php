<?php

Route::group(['prefix'=>'admin'], function () {
	Route::get('/reset', 'Admin\UserController@reset');
	Route::auth();

	Route::get('/socialite/redirect/{provider}',  'Admin\SocialiteController@getSocialRedirect')->name('socialite.redirect');
	Route::get('/socialite/handle/{provider}',  'Admin\SocialiteController@getSocialHandle')->name('socialite.handle');

	Route::group(['middleware' => ['authweb'], 'roles'=>['ADMIN'], 'redirect'=>'/admin/login'], function () {

		Route::get('/', 'Admin\DashboardController@index')->name('admin.home');
		Route::get('/backtoprevious', 'CMSCore\Admin\BackController@back' )->name('admin.back');

		Route::get('/users/', function () {return redirect('admin/');} );
		Route::get('/user/{id?}', 'Admin\AdminController@details')->name('user');
		Route::post('/user/{id?}', 'Admin\AdminController@save' );

		Route::get('/cms/{type}/{subtype?}', 'CMSCore\Admin\CMSController@index')->name('admin.page');
		Route::get('/cms/details/{type}/{subtype}/{id?}', 'CMSCore\Admin\CMSController@details');
		Route::post('/cms/details/{type}/{subtype}/{id?}', 'CMSCore\Admin\CMSController@save');
		Route::get('/cms/delete/{type}/{subtype}/{id?}', 'CMSCore\Admin\CMSController@delete');

		Route::get('/orders/{status}/{customer}', 'Admin\OrderController@index')->name('orders');
		Route::get('/order/{id?}', 'Admin\OrderController@details')->name('order');
		Route::post('/order/{id?}', 'Admin\OrderController@save');
		Route::get('/order/delete/{id?}', 'Admin\OrderController@delete');

        // BLOG
        CMSCore::CRUDRoute('blogcategory', 'blogcategories');
        CMSCore::CRUDRoute('blog', 'blogs');

		// COURSE
		CMSCore::CRUDRoute('chef', 'chefs');
        CMSCore::CRUDRoute('course', 'courses');
        CMSCore::CRUDRoute('courseplace', 'courseplaces');

        // BOOKING
        CMSCore::CRUDRoute('booking', 'bookings');


        // PRODUCT
        CMSCore::CRUDRoute('productcategory', 'productcategories');
        CMSCore::CRUDRoute('tag', 'tags');
        CMSCore::CRUDRoute('product', 'products');

        Route::get('/product/{parentId}/varian/{id}', 'Admin\ProductvarianController@details')->name('admin.productvarian');
        Route::post('/product/{parentId}/varian/{id}', 'Admin\ProductvarianController@save');
        Route::get('/varian/delete/{id?}', 'Admin\ProductvarianController@delete')->name('admin.productvarian.delete');

        // PARTNER
        CMSCore::CRUDRoute('partner', 'partners');

        // CONTACT
        CMSCore::CRUDRoute('contact', 'contacts');


        // SETTING
        Route::get('/setting/{id?}', 'Admin\SettingController@details')->name('admin.setting');
        Route::post('/setting/{id?}', 'Admin\SettingController@save')->name('admin.setting.save');

	});
});

Route::group(['middleware' => ['authweb'], 'roles'=>['CUSTOMER', 'CUSTOMERBIZ'], 'redirect'=>'/login/page'], function () {


});


Route::get('/', 'Frontend\PageController@getMaintenance')->name('maintenance');

Route::get('/home', 'Frontend\PageController@getHome')->name('home');
Route::get('/about', 'Frontend\PageController@getAbout')->name('about');
Route::get('/contact-us', 'Frontend\PageController@getContact')->name('contact');
Route::post('/contact-us', 'Frontend\PageController@submitContact')->name('submitContact');

Route::group(['prefix'=>'product'], function () {
    Route::get('/{type?}', 'Frontend\ProductController@getProducts')->name('product');
    Route::get('/detail/{permalink}', 'Frontend\ProductController@getDetail')->name('product-detail');
});

Route::group(['prefix'=>'baking-course'], function () {
    Route::get('/', 'Frontend\CourseController@index')->name('course');
    Route::get('/detail/{permalink}', 'Frontend\CourseController@getDetail')->name('course-detail');
    Route::get('/book/{permalink}', 'Frontend\CourseController@getBooking')->name('course-book');
    Route::post('/book/submit/{permalink}', 'Frontend\CourseController@submitBooking')->name('submit-booking');
});

Route::group(['prefix'=>'blog'], function () {
    Route::get('/{permalink?}', 'Frontend\BlogController@index')->name('blog');
    Route::get('/detail/{permalink}', 'Frontend\BlogController@getDetail')->name('blog-detail');
});





