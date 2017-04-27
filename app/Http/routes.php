<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function(){
	Route::group(array('prefix' => 'admin/'), function(){
		Route::get('/sample', array('uses' => 'AdminController@sample', 'as' => 'sample'));
		Route::get('/dashboard', array('uses' => 'AdminController@dashboard', 'as' => 'dashboard'));
		Route::get('/settings', array('uses' => 'AdminController@settings', 'as' => 'settings'));

		//Resident
		Route::get('/resident', array('uses' => 'ResidentController@resident', 'as' => 'resident'));
		Route::get('/add_resident', array('uses' => 'ResidentController@addResident', 'as' => 'addResident'));
		Route::post('/save_resident', array('uses' => 'ResidentController@saveResident', 'as' => 'saveResident'));
		Route::get('/resident_list', array('uses' => 'ResidentController@residentList', 'as' => 'residentList'));
			
		//end of resident

		//Officials
		Route::get('/add_officials', array('uses' => 'OfficialsController@addOfficials', 'as' => 'addOfficials'));
		Route::get('/officials', array('uses' => 'OfficialsController@officials', 'as' => 'officials'));
		Route::get('/officials_history', array('uses' => 'OfficialsController@officialsHistory', 'as' => 'officialsHistory'));
		Route::post('/save_officials', array('uses' => 'OfficialsController@addNew', 'as' => 'addNew'));
		// end of officials

		//Blotter
		Route::get('/blotterList', array('uses' => 'BlotterController@blotterList', 'as' => 'blotterList'));
		Route::get('/addCase', array('uses' => 'BlotterController@addCase', 'as' => 'addCase'));
		Route::get('/blotterDocuments', array('uses' => 'BlotterController@blotterDocuments', 'as' => 'blotterDocuments'));	
		// endo of blotter

		//Documents
		Route::get('/documents', array('uses' => 'DocumentsController@documents', 'as' => 'documents'));
		//end of documents


	});
});
Route::group(['middleware' => ['guest']], function(){
	Route::get('/login', array('uses' => 'LoginController@login', 'as' => 'login'));
	Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\PasswordController@reset');
});
// Authentication Module
Route::get('logoutUser', ['as' => 'loggedOut', 'uses' => 'LoginController@loggedOut']);
// Route::get('/logoutUser', array('uses' => 'LoginController@loggedOut', 'as' => 'loggedOut'));
Route::post('/logged_in', array('uses' => 'LoginController@loggedIn', 'as' => 'loggedIn'));
Route::post('/register', array('uses' => 'LoginController@register', 'as' => 'register'));


// end of authentication modules