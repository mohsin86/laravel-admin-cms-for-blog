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




Route::get('admin', [
    'as' => 'admin', 'uses' => 'LeadController@index'
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
    'as' => 'pageList', 'uses' => 'LeadController@addForm'
]);

Route::get('admin/page/add',  [
    'as' => 'pageList', 'uses' => 'LeadController@addForm'
]);


//Auth::routes();


