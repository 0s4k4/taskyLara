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



if(isset($_COOKIE['language'])) {
    App::setLocale($_COOKIE['language']);
}



Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin','Admin\DashboardController@index');
    Route::get('/admin/index','Admin\DashboardController@index');
	
	/* user */
	Route::get('/admin/users','Admin\UsersController@index');
	Route::get('/admin/sellers','Admin\UsersController@seller_index');
	Route::get('/admin/adduser','Admin\AdduserController@formview');
	Route::post('/admin/adduser', ['as'=>'admin.adduser','uses'=>'Admin\AdduserController@adduserdata']);
    
	Route::get('/admin/users/{id}','Admin\UsersController@destroy');
	Route::get('/admin/edituser/{id}','Admin\EdituserController@showform');
	Route::post('/admin/edituser', ['as'=>'admin.edituser','uses'=>'Admin\EdituserController@edituserdata']);
	/* end user */
	
	
	/* services */
	Route::get('/admin/services','Admin\ServicesController@index');
	Route::get('/admin/addservice','Admin\AddserviceController@formview');
	Route::post('/admin/addservice', ['as'=>'admin.addservice','uses'=>'Admin\AddserviceController@addservicedata']);
	Route::get('/admin/services/{id}','Admin\ServicesController@destroy');
	Route::get('/admin/editservice/{id}','Admin\EditserviceController@showform');
	Route::post('/admin/editservice', ['as'=>'admin.editservice','uses'=>'Admin\EditserviceController@editservicedata']);
	
	/* end services */
	
	
	/* sub services */
	
	Route::get('/admin/subservices','Admin\SubservicesController@index');
	Route::get('/admin/addsubservice','Admin\AddsubserviceController@formview');
	Route::get('/admin/addsubservice','Admin\AddsubserviceController@getservice');
	Route::post('/admin/addsubservice', ['as'=>'admin.addsubservice','uses'=>'Admin\AddsubserviceController@addsubservicedata']);
	Route::get('/admin/subservices/{id}','Admin\SubservicesController@destroy');
	
	
	/*Skill */
	Route::get('/admin/skills','Admin\SkillController@index');
	Route::get('/admin/addskills','Admin\SkillController@formview');
	
	Route::post('/admin/addskill',['as'=>'admin.addskill','uses'=>'Admin\SkillController@addskilldata']);
	Route::get('/admin/editskills/{id}','Admin\SkillController@sangvish_editdata');
	Route::post('/admin/update_skill', ['as'=>'admin.update_skill','uses'=>'Admin\SkillController@sangvish_savedata']);
	Route::get('/admin/deleteskills/{did}','Admin\SkillController@sangvish_destroy');
	
	/*Skill */
	
	
	
	
	Route::get('/admin/editsubservice/{id}','Admin\EditsubserviceController@edit');
	
	Route::post('/admin/editsubservice', ['as'=>'admin.editsubservice','uses'=>'Admin\EditsubserviceController@editsubservicedata']);
	/* end sub services */
	
	
	
	/* Testimonials */
	
	Route::get('/admin/testimonials','Admin\TestimonialsController@index');
	Route::get('/admin/add-testimonial','Admin\AddtestimonialController@formview');
	Route::post('/admin/add-testimonial', ['as'=>'admin.add-testimonial','uses'=>'Admin\AddtestimonialController@addtestimonialdata']);
	Route::get('/admin/testimonials/{id}','Admin\TestimonialsController@destroy');
	Route::get('/admin/edit-testimonial/{id}','Admin\EdittestimonialController@showform');
	Route::post('/admin/edit-testimonial', ['as'=>'admin.edit-testimonial','uses'=>'Admin\EdittestimonialController@testimonialdata']);
	
	
	/* end Testimonials */
	
	
	/* pages */
	
	Route::get('/admin/pages','Admin\PagesController@index');
	Route::get('/admin/edit-page/{id}','Admin\PagesController@showform');
	Route::post('/admin/edit-page', ['as'=>'admin.edit-page','uses'=>'Admin\PagesController@pagedata']);
	
	/* end pages */
	
	
	/* dispute */
	
	Route::get('/admin/dispute','Admin\DisputeController@index');
	
	Route::get('/admin/dispute/{customer_id}/{vendor_id}/{booking_id}','Admin\DisputeController@refund_customer');
	
	Route::get('/admin/dispute/{customer_id}/{vendor_id}/{booking_id}/{amount}','Admin\DisputeController@refund_vendor');
	/* end dispute */
	
	
	
	
	/* Request */
	Route::get('/admin/request/{id}','Admin\RequestController@destroy');
	Route::get('/admin/request/{status}/{sid}/{id}','Admin\RequestController@status');
	Route::get('/admin/request','Admin\RequestController@index');
	
	Route::get('/admin/view_request/{id}','Admin\RequestController@gig_viewmore');
	
	Route::get('/admin/approve_payment_request','Admin\OrdersController@views_request');
	
	
	Route::get('/admin/request-orders','Admin\OrdersController@request_index');
	Route::get('/admin/request-orders/{id}','Admin\OrdersController@destroy');
	Route::get('/admin/request-orders/{oid}/{id}','Admin\OrdersController@status');
	
	Route::get('/admin/request-orders/{status}/{order_id}/{gig_user_id}','Admin\OrdersController@approval_status');
	/* end Request */
	
	/*start language*/
    Route::get('/admin/language','Admin\LanguagesController@create')->name('language.create');;
    Route::post('/admin/language/store','Admin\LanguagesController@store')->name('language.store');
	Route::get('/admin/language/edit-language/{id}','Admin\LanguagesController@edit')->name('language.edit');
	Route::post('/admin/language/{id}','Admin\LanguagesController@update')->name('language.update');
	Route::delete('/admin/language/{id}','Admin\LanguagesController@destroy')->name('language.destroy');
    /*end language*/
	
	/* start settings */
	
	
	Route::get('/admin/settings','Admin\SettingsController@showform');
	Route::post('/admin/settings', ['as'=>'admin.settings','uses'=>'Admin\SettingsController@editsettings']);
	
	/* end settings */
	
	
	/* start shop */
	
	Route::get('/admin/shop','Admin\ShopController@index');
	Route::get('/admin/edit-shop/{id}','Admin\ShopController@showform');
	Route::post('/admin/edit-shop', ['as'=>'admin.edit-shop','uses'=>'Admin\ShopController@savedata']);
	Route::get('/admin/shop/{id}','Admin\ShopController@destroy');
	Route::get('/admin/shop/{id}/{sid}','Admin\ShopController@status_view');
	
	/* end shop */ 
	
	
	
	/* booking history */
	
	Route::get('/admin/booking','Admin\BookingController@index');
	Route::get('/admin/booking/{id}','Admin\BookingController@destroy');
	
	/*  end booking history */
	
	
	/* withdraw */
	
	Route::get('/admin/pending_withdraw','Admin\WithdrawController@index');
	Route::get('/admin/pending_withdraw/{id}','Admin\WithdrawController@update');
	Route::get('/admin/completed_withdraw','Admin\WithdrawController@doneindex');
	
	/* end withdraw */
	
	
	
	Route::get('/admin/blog','Admin\BlogController@index');
	Route::get('/admin/add-blog','Admin\AddblogController@formview');
	Route::post('/admin/add-blog', ['as'=>'admin.add-blog','uses'=>'Admin\AddblogController@addblogdata']);
	Route::get('/admin/blog/{id}','Admin\BlogController@destroy');
	Route::get('/admin/edit-blog/{id}','Admin\EditblogController@showform');
	Route::post('/admin/edit-blog', ['as'=>'admin.edit-blog','uses'=>'Admin\EditblogController@blogdata']);
	
	
	
	/* last */
	
	/* Orders */
	
	Route::get('/admin/orders','Admin\OrdersController@index');
	Route::get('/admin/orders/{id}','Admin\OrdersController@destroy');
	Route::get('/admin/orders/{oid}/{id}','Admin\OrdersController@status');
	
	Route::get('/admin/orders/{status}/{order_id}/{gig_user_id}','Admin\OrdersController@approval_status');
	
	/* last */
	
	
	
	
   
});


