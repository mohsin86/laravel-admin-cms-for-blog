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

/*
 * Home front end
 */

Route::get('/', function () {
    return view('home');
});
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('about', function () {
    return view('about');
});

Route::get('service', function () {
    return view('service');
});
Route::get('pricing', function () {
    return view('pricing');
});

Route::get('pricing', function () {
    return view('contact');
});

/*
 * Home Back End
 */


Route::get('admin', [
    'as' => 'Lead', 'uses' => 'LeadController@index'
]);
Route::get('admin/lead',  [
    'as' => 'Lead', 'uses' => 'LeadController@index'
]);

Route::get('admin/lead/add',  [
    'as' => 'AddLead', 'uses' => 'LeadController@addForm'
]);

Route::post('admin/lead/add', 'LeadController@store');

Route::get('admin/lead/{id}/edit',  [
    'as' => 'editLead', 'uses' => 'LeadController@editForm'
]);

Route::post('admin/lead/{id}/update',  [
    'as' => 'updateLead', 'uses' => 'LeadController@update'
]);

Route::post('admin/lead/{id}/delete',  [
    'as' => 'DeleteLead', 'uses' => 'LeadController@delete'
]);


Route::get('admin/page',  [
    'as' => 'pageList', 'uses' => 'PageController@index'
]);

Route::get('admin/page/add',  [
    'as' => 'addpage', 'uses' => 'PageController@addpage'
]);

Route::post('admin/page/store',  [
    'as' => 'storepage', 'uses' => 'PageController@store'
]);

Route::get('admin/page/{id}/edit',  [
    'as' => 'editpage', 'uses' => 'PageController@editpage'
]);

Route::post('admin/page/{id}/update',  [
    'as' => 'updatepage', 'uses' => 'PageController@update'
]);
Route::post('admin/page/delete',  [
    'as' => 'deletepage', 'uses' => 'PageController@delete'
]);
Route::post('admin/page/delete-page-option',  [
    'as' => 'deletepageoptions', 'uses' => 'PageController@deletepageoptions'
]);


/*
 * Clients
 */
Route::get('admin/client',  [
    'as' => 'clientList', 'uses' => 'ClientController@index'
]);

Route::get('admin/client/add',  [
    'as' => 'addclient', 'uses' => 'ClientController@addclient'
]);

Route::get('admin/client/{id}/edit',  [
    'as' => 'editclient', 'uses' => 'ClientController@editclient'
]);

Route::post('admin/client/store',  [
    'as' => 'storeclient', 'uses' => 'ClientController@store'
]);



Route::post('admin/client/{id}/update',  [
    'as' => 'updateclient', 'uses' => 'ClientController@update'
]);

Route::post('admin/client/delete',  [
    'as' => 'deleteclient', 'uses' => 'ClientController@delete'
]);



/*
 * Testimonials
 */
Route::get('admin/testimonial',  [
    'as' => 'testimonialList', 'uses' => 'TestimonialController@index'
]);

Route::get('admin/testimonial/add',  [
    'as' => 'addtestimonial', 'uses' => 'TestimonialController@addtestimonial'
]);

Route::get('admin/testimonial/{id}/edit',  [
    'as' => 'edittestimonial', 'uses' => 'TestimonialController@edittestimonial'
]);

Route::post('admin/testimonial/store',  [
    'as' => 'storetestimonial', 'uses' => 'TestimonialController@store'
]);



Route::post('admin/testimonial/{id}/update',  [
    'as' => 'updatetestimonial', 'uses' => 'TestimonialController@update'
]);

Route::post('admin/testimonial/delete',  [
    'as' => 'deletetestimonial', 'uses' => 'TestimonialController@delete'
]);

//Auth::routes();


/*
 * Pricing
 */
Route::get('admin/pricing',  [
    'as' => 'pricinglist', 'uses' => 'PricingController@index'
]);

Route::get('admin/pricing/add',  [
    'as' => 'addpricing', 'uses' => 'PricingController@addpricing'
]);

Route::get('admin/pricing/{id}/edit',  [
    'as' => 'editpricing', 'uses' => 'PricingController@editpricing'
]);

Route::post('admin/pricing/store',  [
    'as' => 'storepricing', 'uses' => 'PricingController@store'
]);

Route::post('admin/pricing/{id}/update',  [
    'as' => 'updatepricing', 'uses' => 'PricingController@update'
]);

Route::post('admin/pricing/delete',  [
    'as' => 'deletepricing', 'uses' => 'PricingController@delete'
]);

Route::post('admin/page/delete-pricing-features',  [
    'as' => 'deletepricingfeatures', 'uses' => 'PricingController@deletePrisingFeature'
]);


/*
 * Testimonials
 */
Route::get('admin/team',  [
    'as' => 'teamList', 'uses' => 'teamController@index'
]);

Route::get('admin/team/add',  [
    'as' => 'addteam', 'uses' => 'teamController@addteam'
]);

Route::get('admin/team/{id}/edit',  [
    'as' => 'editteam', 'uses' => 'teamController@editteam'
]);

Route::post('admin/team/store',  [
    'as' => 'storeteam', 'uses' => 'teamController@store'
]);



Route::post('admin/team/{id}/update',  [
    'as' => 'updateteam', 'uses' => 'teamController@update'
]);

Route::post('admin/team/delete',  [
    'as' => 'deleteteam', 'uses' => 'teamController@delete'
]);

Route::get('admin/user',  [
    'as' => 'userlist', 'uses' => 'userList@showuser'
]);

Route::get('/logout', 'UserList@logout');

Route::get('admin/settings',  [
    'as' => 'sitesettings', 'uses' => 'SettingsController@show'
]);

Route::post('admin/settings/update',  [
    'as' => 'updatesitesettings', 'uses' => 'SettingsController@update'
]);


Route::group(['prefix' => 'admin'], function () {

    Auth::routes();

});


