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

/*Route::get('/index', 'CommonController@home');
Route::get('/', 'CommonController@home');*/

Route::get('/pay_request/{id}', 'RequestController@custom_pay');
Route::group(['middleware' => ['XSS']], function () {

Route::post('/order', ['as'=>'order','uses'=>'OrderController@savedata']);
Route::post('/coupon_order', ['as'=>'coupon_order','uses'=>'OrderController@coupon_data']);
});
Route::get('/job_payment/{price}/{id}/{type}/{ex_text}/{coupon}', 'OrderController@payment_process');
Route::get('/stripe_payment/{price}/{id}/{type}/{ex_text}/{coupon}', 'OrderController@payment_stripe_process');
Route::get('/payumoney_payment/{price}/{id}/{type}/{ex_text}/{coupon}', 'OrderController@payment_payumoney_process');

Route::get('/paypal_success/{gid}/{refid}/{admin_email}', 'OrderController@sangvish_success');
Route::post('/stripe-fund', ['as'=>'stripe-fund','uses'=>'StripeController@sangvish_stripe_fund']);

Route::get('/all-services', 'IndexController@all_services');
/******* TRACK **********/


Route::group(['middleware' => ['XSS']], function () {

Route::post('/payment_status', ['as'=>'payment_status','uses'=>'PaymentController@paymentCallback']);

Route::post('/payment_new', ['as'=>'payment_new','uses'=>'PaymentController@neworder']);
});

Route::get('/buyer_track/{order_id}', 'JobSalesController@buyer_track');

Route::get('/seller_track/{order_id}', 'JobSalesController@seller_track');


Route::group(['middleware' => ['XSS']], function () {
Route::post('/buyer_track', ['as'=>'buyer_track','uses'=>'JobSalesController@buyer_savedata']);
Route::post('/seller_track', ['as'=>'seller_track','uses'=>'JobSalesController@seller_savedata']);
});

Route::get('/seller_track/{chat_id}/{order_id}/{status}', 'JobSalesController@seller_cancel');

Route::get('/buyer_track/{chat_id}/{order_id}/{status}', 'JobSalesController@buyer_cancel');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/track_complete', ['as'=>'track_complete','uses'=>'JobSalesController@track_completed']);
});
/********** TRACK ********/


Route::get('/own_payment/{price}/{gid}/{type}/{ex_text}/{balance_type}/{balance}', 'OrderController@own_submission');

Route::get('/own_payment', 'OrderController@own_page');

Route::get('/own_payment/{track_id}', 'OrderController@own_track');


Route::get('/own_amount/{price}/{gid}/{type}', 'OrderController@own_success');



Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('index/{username}', 'IndexController@resend_email');

Route::get('user/{id}/{name}', 'IndexController@veview_user');

Route::get('/', 'IndexController@sangvish_index');
Route::get('/index', 'IndexController@sangvish_index');

Route::get('searchajax',array('as'=>'searchajax','uses'=>'IndexController@sangvish_autoComplete'));


Route::get('dateavailable/{val}',array('as'=>'dateavailable','uses'=>'BookingController@dateavailable'));


Route::get('/logout', 'DashboardController@sangvish_logout');
Route::get('/delete-account', 'DashboardController@sangvish_deleteaccount');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/dashboard', ['as'=>'dashboard','uses'=>'DashboardController@sangvish_edituserdata']);
});

Route::get('/shop', 'ShopController@sangvish_viewshop');

Route::get('/addshop', 'ShopController@sangvish_addshop');

Route::get('/editshop/{id}', 'ShopController@sangvish_editshop');





Route::get('/vendor/{id}', 'VendorController@sangvish_showpage');
Route::group(['middleware' => ['XSS']], function () {
Route::post('/vendor', ['as'=>'vendor','uses'=>'VendorController@sangvish_savedata']);
});


Route::get('/step2', 'DashboardController@sangvish_step2');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/step2', ['as'=>'step2','uses'=>'DashboardController@sangvish_step2data']);
});

Route::get('/confirmemail/{id}', 'IndexController@confirmation');

Route::get('/confirmemail', 'IndexController@view_former');

Route::get('/conversations/{giguser}/{logid}/{gigid}/{checkvel}', 'ConversationsController@conversations');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/conversations', ['as'=>'conversations','uses'=>'ConversationsController@savedata']);
});


Route::get('/forgot', 'IndexController@sangvish_forgot');
Route::group(['middleware' => ['XSS']], function () {
Route::post('/forgot', ['as'=>'forgot','uses'=>'IndexController@sangvish_forgotdata']);
});

Route::get('/reset/{token}', 'IndexController@sangvish_reset');
Route::group(['middleware' => ['XSS']], function () {
Route::post('/reset', ['as'=>'reset','uses'=>'IndexController@sangvish_resetdata']);
});

Route::get('/booking/{shop_id}/{service_id}/{userid}', 'BookingController@sangvish_showpage');
Route::group(['middleware' => ['XSS']], function () {
Route::post('/booking', ['as'=>'booking','uses'=>'BookingController@sangvish_savedata']);
});

Route::get('/booking_info', 'BookinginfoController@sangvish_viewbook');
Route::group(['middleware' => ['XSS']], function () {
Route::post('/booking_info', ['as'=>'booking_info','uses'=>'PaymentController@sangvish_showpage']);
});
Route::get('/payment/{sum_val}/{admin_email}', 'PaymentController@sangvish_showpage');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/payment', ['as'=>'payment','uses'=>'PaymentController@sangvish_wallet_transfer']);
});
Route::get('/success/{gid}/{refid}/{admin_email}', 'SuccessController@sangvish_fsuccess');



Route::get('/feature-success/{refid}', 'SuccessController@success_page');
Route::get('/success/{cid}', 'SuccessController@sangvish_success');
Route::group(['middleware' => ['XSS']], function () {
Route::post('/stripe-success', ['as'=>'stripe-success','uses'=>'StripeController@sangvish_stripe']);

Route::post('/stripe-featured', ['as'=>'stripe-featured','uses'=>'StripeController@sangvish_stripe_featured']);

});


Route::get('/payu_failed/{cid}', 'CancelController@sangvish_payu_failed');

/*Route::post('payu_failed/{cid}', function () {
    
    
	return redirect('payu_failed/{cid}');
});*/


Route::get('/my_freelancer_request', 'SalesController@view_freelancer_manage_sales');
/************** REQUEST ***********/
Route::get('/feature/{buyer}/{id}/{gid}', 'RequestController@feature_payment');

Route::get('/feature/{id}', 'GigsController@feature');

Route::get('/feature', 'GigsController@feature_view');

Route::get('/my_client_request', 'SalesController@view_my_client_shopping');

Route::get('/new-request/ajax/passing/{id}', 'RequestController@getajax');

Route::get('/new-request', 'RequestController@sangvish_view_request');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/new-request', ['as'=>'new-request','uses'=>'RequestController@savedata']);
});

Route::get('/new-request/{id}', 'RequestController@request_edit');

Route::get('/send_offer/{id}', 'RequestController@send_offer');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/send_offer', ['as'=>'send_offer','uses'=>'RequestController@submit_offer']);
});

Route::get('/my_request', 'RequestController@my_request');

Route::get('/my_request/{delete}/{id}', 'RequestController@my_request_delete');


Route::get('/my_applied_request', 'RequestController@my_applied_request');


Route::get('/view_offers/{id}', 'RequestController@view_offers');


Route::get('/buyer_request', 'ViewRequestController@view_all_request');
Route::get('/buyer_request/{cid}', 'ViewRequestController@view_request');

Route::get('/buyer_request/{status}/{type}', 'ViewRequestController@type_request');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/buyer_request', ['as'=>'buyer_request','uses'=>'ViewRequestController@submit_data']);
});
/************* END REQUEST *********/





/********* PROJECT *********/


Route::get('/request/{id}/{slug}', 'ProjectController@single_view');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/request', ['as'=>'project','uses'=>'ProjectController@savedata']);
});

Route::get('/request/{user_id}/{req_id}/{prop_id}', 'ProjectController@award_view');

/********* End PROJECT ******/





/* messages */

Route::get('/send-message/{sender_id}/{receiver_id}', 'MessageController@add_message');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/send-message', ['as'=>'send-message','uses'=>'MessageController@post_message']);
});
Route::get('/messages', 'MessageController@my_message');

Route::get('/chat/{sender}', 'MessageController@my_chat_history');
Route::group(['middleware' => ['XSS']], function () {
Route::post('/chat', ['as'=>'chat','uses'=>'MessageController@single_message']);
});
/* messages */





Route::post('payu_failed/{cid}', function($cid) {
    
    
	return redirect('payu_failed/'.$cid);
});



Route::get('/payu_success/{cid}/{txtid}', 'SuccessController@sangvish_payu_success');

Route::post('payu_success/{cid}/{txtid}', function($cid,$txtid) {
    
    
	return redirect('payu_success/'.$cid.'/'.$txtid);
});




Route::get('/payu-feature-success/{gid}/{refid}/{txnid}', 'SuccessController@sangvish_payu_feature_success');

Route::post('payu-feature-success/{gid}/{refid}/{txnid}', function($gid,$refid,$txnid) {
    
    
	return redirect('payu-feature-success/'.$gid.'/'.$refid.'/'.$txnid);
});





Route::get('/payu-fund-success/{gid}/{refid}/{txnid}', 'SuccessController@sangvish_payu_fund_success');

Route::post('payu-fund-success/{gid}/{refid}/{txnid}', function($gid,$refid,$txnid) {
    
    
	return redirect('payu-fund-success/'.$gid.'/'.$refid.'/'.$txnid);
});



Route::get('/cancel', 'CancelController@sangvish_showpage');

Route::get('/myorder', 'MyorderController@sangvish_showpage');

Route::get('/myorder/{id}','MyorderController@sangvish_destroy');

Route::get('/myorder/{reject}/{id}','MyorderController@sangvish_reject');

Route::get('/myorder/{service}/{id}/{status_id}','MyorderController@sangvish_service_status');



Route::get('/my_bookings/{release}/{id}/{shop_id}', 'MybookingsController@sangvish_released');


Route::get('/my_bookings/{cancel}/{id}', 'MybookingsController@sangvish_cancel_booking');


Route::get('/my_bookings', 'MybookingsController@sangvish_showpage');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/my_bookings', ['as'=>'my_bookings','uses'=>'MybookingsController@sangvish_savedata']);

Route::post('/my_book', ['as'=>'my_book','uses'=>'MybookingsController@sangvish_disputedata']);

});

Route::get('/wallet', 'WalletController@sangvish_showpage');

Route::group(['middleware' => ['XSS']], function () {
Route::post('/wallet', ['as'=>'wallet','uses'=>'WalletController@sangvish_savedata']);
});

Auth::routes();

	
	Route::get('/about','PageController@sangvish_about');
	
	Route::get('/blog','BlogController@blog_view');
	
	Route::get('/blog-details/{id}','BlogController@blog_single');
	
	
	Route::get('/404','PageController@sangvish_404');
	
	
	Route::get('/how-it-works','PageController@sangvish_howit');
	
	Route::get('/safety','PageController@sangvish_safety');
	
	Route::get('/service-guide','PageController@sangvish_guide');
	
	Route::get('/how-to-pages','PageController@sangvish_topages');
	
	
	Route::get('/success-stories','PageController@sangvish_stories');
	
	
	Route::get('/terms-conditions','PageController@sangvish_terms');
	
	Route::get('/privacy-policy','PageController@sangvish_privacy');
	
	Route::get('/contact','PageController@sangvish_contact');
	
	Route::group(['middleware' => ['XSS']], function () {
	Route::post('/contact', ['as'=>'contact','uses'=>'PageController@sangvish_mailsend']);
	});

Route::get('/services','ServicesController@sangvish_index');
Route::get('/services/{id}','ServicesController@sangvish_editdata');
Route::group(['middleware' => ['XSS']], function () {
Route::post('/services', ['as'=>'services','uses'=>'ServicesController@sangvish_savedata']);
});
Route::get('/services/{did}/delete','ServicesController@sangvish_destroy');






Route::get('/gallery','GalleryController@sangvish_index');
Route::group(['middleware' => ['XSS']], function () {
Route::post('/gallery', ['as'=>'gallery','uses'=>'GalleryController@sangvish_savedata']);
});
Route::get('/gallery/{id}','GalleryController@sangvish_editdata');
Route::get('/gallery/{did}/delete','GalleryController@sangvish_destroy');


Route::get('/search','SearchController@sangvish_view');

Route::get('/search/{id}','SearchController@sangvish_homeindex');
Route::group(['middleware' => ['XSS']], function () {
Route::post('/search', ['as'=>'search','uses'=>'SearchController@sangvish_index']);
});
//Route::get('/shopsearch','SearchController@sangvish_view');
Route::match(array('GET','POST'),'/shopsearch', ['as'=>'shopsearch','uses'=>'SearchController@sangvish_search']);




Route::get('/subservices','SubservicesController@sangvish_index');

Route::get('/subservices/{id}','SubservicesController@sangvish_servicefind');





Route::group(['middleware' => 'web'], function (){
    
    Route::get('/dashboard', 'DashboardController@index');
   

});

View::composer('*', function($view){
    View::share('view_name', $view->getName());
});

Route::group(['middleware' => ['XSS']], function () {

  

Route::post('/editshop', ['as'=>'editshop','uses'=>'ShopController@sangvish_savedata']);

Route::post('/addshop', ['as'=>'addshop','uses'=>'ShopController@sangvish_savedata']);
Route::post('/new-request', ['as'=>'new-request','uses'=>'RequestController@savedata']);


});


Route::get('/invoice/{id}', 'MybookingsController@generatePDF');