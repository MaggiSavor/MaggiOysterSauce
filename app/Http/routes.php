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
		Route::post('/save_settings/{id}', array('uses' => 'SettingsController@saveSettings', 'as' => 'saveSettings'));
		Route::post('/register_user', array('uses' => 'LoginController@registerUser', 'as' => 'registerUser'));

		//Resident
		Route::get('/resident', array('uses' => 'ResidentController@resident', 'as' => 'resident'));
		Route::get('/add_resident', array('uses' => 'ResidentController@addResident', 'as' => 'addResident'));
		Route::post('/save_resident', array('uses' => 'ResidentController@saveResident', 'as' => 'saveResident'));
		Route::get('/resident_list', array('uses' => 'ResidentController@residentList', 'as' => 'residentList'));
		Route::get('/household_list', array('uses' => 'ResidentController@householdList', 'as' => 'householdList'));
		Route::get('/family_list', array('uses' => 'ResidentController@familyList', 'as' => 'familyList'));
		Route::get('/female_list', array('uses' => 'ResidentController@femaleList', 'as' => 'femaleList'));
		Route::get('/male_list', array('uses' => 'ResidentController@maleList', 'as' => 'maleList'));
		Route::get('/voter_list', array('uses' => 'ResidentController@voterList', 'as' => 'voterList'));
		Route::get('/senior_list', array('uses' => 'ResidentController@seniorList', 'as' => 'seniorList'));
		Route::get('/transferred_list', array('uses' => 'ResidentController@transferredList', 'as' => 'transferredList'));
		Route::post('/add_member', array('uses' => 'ResidentController@addMember', 'as' => 'addMember'));
		Route::post('/add_family', array('uses' => 'ResidentController@addFamily', 'as' => 'addFamily'));
		Route::get('/update_resident/{id}', array('uses' => 'ResidentController@updateResident', 'as' => 'updateResident'));
		Route::post('/save_update', array('uses' => 'ResidentController@saveUpdate', 'as' => 'saveUpdate'));
		Route::get('/get_house_id', array('uses' => 'ResidentController@getHouseId', 'as' => 'getHouseId'));
		Route::get('/get_family_id', array('uses' => 'ResidentController@getFamilyId', 'as' => 'getFamilyId'));
		Route::get('/check_head', array('uses' => 'ResidentController@checkHead', 'as' => 'checkHead'));
		Route::get('/get_members', array('uses' => 'ResidentController@getMembers', 'as' => 'getMembers'));
		Route::get('/get_family', array('uses' => 'ResidentController@getFamily', 'as' => 'getFamily'));
			
		//end of resident

		//Officials
		Route::get('/add_officials', array('uses' => 'OfficialsController@addOfficials', 'as' => 'addOfficials'));
		Route::get('/officials', array('uses' => 'OfficialsController@officials', 'as' => 'officials'));
		Route::get('/officials_history', array('uses' => 'OfficialsController@officialsHistory', 'as' => 'officialsHistory'));
		Route::post('/save_officials', array('uses' => 'OfficialsController@addNew', 'as' => 'addNew'));
		Route::post('/update_officials/{id}', array('uses' => 'OfficialsController@updateSecretary', 'as' => 'updateSecretary'));
		// end of officials

		//Blotter
		Route::get('/blotter_list', array('uses' => 'BlotterController@blotterList', 'as' => 'blotterList'));
		Route::get('/add_case', array('uses' => 'BlotterController@addCase', 'as' => 'addCase'));
		Route::get('/blotter_documents', array('uses' => 'BlotterController@blotterDocuments', 'as' => 'blotterDocuments'));	
		Route::get('/blotter_summon', array('uses' => 'BlotterController@blotterSummon', 'as' => 'blotterSummon'));	
		Route::get('/blotter_fileaction', array('uses' => 'BlotterController@blotterFileAction', 'as' => 'blotterFileAction'));	
		Route::get('/blotter_details', array('uses' => 'BlotterController@blotterDetails', 'as' => 'blotterDetails'));	
		Route::get('/blotter_agreement', array('uses' => 'BlotterController@blotterAgreement', 'as' => 'blotterAgreement'));
		Route::get('/summon_print/{id}', array('uses' => 'BlotterController@summonPrint', 'as' => 'summonPrint'));
		Route::get('/file_action_print/{id}', array('uses' => 'BlotterController@fileActionPrint', 'as' => 'fileActionPrint'));
		Route::get('/blotter_details_print/{id}', array('uses' => 'BlotterController@blotterDetailsPrint', 'as' => 'blotterDetailsPrint'));
		Route::get('/agreement_print/{id}', array('uses' => 'BlotterController@agreementPrint', 'as' => 'agreementPrint'));
		Route::post('/add_blotter', array('uses' => 'BlotterController@addBlotter', 'as' => 'addBlotter'));
		Route::post('/blotter_summon_print', array('uses' => 'BlotterController@blotterSummonPrint', 'as' => 'blotterSummonPrint'));
		Route::post('/blotter_details_print', array('uses' => 'BlotterController@blotterDetailsPrint', 'as' => 'blotterDetailsPrint'));


		// endo of blotter

		//Documents
		Route::get('/documents', array('uses' => 'DocumentsController@documents', 'as' => 'documents'));
		Route::get('/certificate', array('uses' => 'DocumentsController@docuCertificate', 'as' => 'docuCertificate'));
		Route::get('/good_moral', array('uses' => 'DocumentsController@docuGoodMoral', 'as' => 'docuGoodMoral'));
		Route::get('/indigency', array('uses' => 'DocumentsController@docuIndigency', 'as' => 'docuIndigency'));
		Route::get('/barangay_id', array('uses' => 'DocumentsController@docuID', 'as' => 'docuID'));
		Route::get('/business_permit', array('uses' => 'DocumentsController@docuBusinessPermit', 'as' => 'docuBusinessPermit'));
		Route::get('/documents_list', array('uses' => 'DocumentsController@documentsList', 'as' => 'documentsList'));
		Route::get('/certificate_list', array('uses' => 'DocumentsController@certificateList', 'as' => 'certificateList'));
		Route::get('/good_moral_list', array('uses' => 'DocumentsController@goodMoralList', 'as' => 'goodMoralList'));
		Route::get('/indigency_list', array('uses' => 'DocumentsController@indigencyList', 'as' => 'indigencyList'));
		Route::get('/barangay_id_list', array('uses' => 'DocumentsController@idList', 'as' => 'idList'));
		Route::get('/business_permit_list', array('uses' => 'DocumentsController@permitList', 'as' => 'permitList'));
		Route::get('/certificate_print/{id}', array('uses' => 'DocumentsController@certPrint', 'as' => 'certPrint'));
		Route::get('/good_moral_print/{id}', array('uses' => 'DocumentsController@goodMoralPrint', 'as' => 'goodMoralPrint'));
		Route::get('/indigency_print/{id}', array('uses' => 'DocumentsController@indigencyPrint', 'as' => 'indigencyPrint'));
		Route::get('/barangay_id_print/{id}', array('uses' => 'DocumentsController@brgyIdPrint', 'as' => 'brgyIdPrint'));
		Route::get('/business_permit_print/{id}', array('uses' => 'DocumentsController@bPermitPrint', 'as' => 'bPermitPrint'));
		Route::post('/add_certificate', array('uses' => 'DocumentsController@addCert', 'as' => 'addCert'));
		Route::post('/add_good_moral', array('uses' => 'DocumentsController@addGoodMoral', 'as' => 'addGoodMoral'));
		Route::post('/add_indigency', array('uses' => 'DocumentsController@addIndigency', 'as' => 'addIndigency'));
		Route::post('/add_business_permit', array('uses' => 'DocumentsController@addBusinessPermit', 'as' => 'addBusinessPermit'));
		Route::post('/add_barangay_id', array('uses' => 'DocumentsController@addBarangayId', 'as' => 'addBarangayId'));
		//end of documents

		//reports
		Route::get('resident_report', array('uses' => 'ReportsController@residentReport', 'as' => 'residentReport'));
		Route::get('barangay_profile_report', array('uses' => 'ReportsController@barangayProfileReport', 'as' => 'barangayProfileReport'));
		Route::get('case_report', array('uses' => 'ReportsController@caseReport', 'as' => 'caseReport'));
		Route::get('certificate_report', array('uses' => 'ReportsController@certificateReport', 'as' => 'certificateReport'));
		Route::get('barangay_id_report', array('uses' => 'ReportsController@barangayIdReport', 'as' => 'barangayIdReport'));
		Route::get('business_permit_report', array('uses' => 'ReportsController@businessPermitReport', 'as' => 'businessPermitReport'));
		Route::get('resident_reports', array('uses' => 'ReportsController@returnResidentReport', 'as' => 'returnResidentReport'));
		Route::get('case_reports', array('uses' => 'ReportsController@returnCaseReport', 'as' => 'returnCaseReport'));
		Route::get('id_reports', array('uses' => 'ReportsController@returnIdReport', 'as' => 'returnIdReport'));
		Route::get('permit_reports', array('uses' => 'ReportsController@returnPermitReport', 'as' => 'returnPermitReport'));
		Route::get('cert_reports', array('uses' => 'ReportsController@returnCert', 'as' => 'returnCert'));
		Route::get('good_moral_reports', array('uses' => 'ReportsController@returnGoodMoral', 'as' => 'returnGoodMoral'));
		Route::get('indigency_reports', array('uses' => 'ReportsController@returnIndigency', 'as' => 'returnIndigency'));
		Route::get('date_resident', array('uses' => 'ReportsController@resDate', 'as' => 'resDate'));
		Route::get('date_case', array('uses' => 'ReportsController@caseDate', 'as' => 'caseDate'));
		Route::get('date_id', array('uses' => 'ReportsController@idDate', 'as' => 'idDate'));
		Route::get('date_permit', array('uses' => 'ReportsController@permitDate', 'as' => 'permitDate'));
		Route::get('date_cert', array('uses' => 'ReportsController@certDate', 'as' => 'certDate'));
		Route::get('date_good_moral', array('uses' => 'ReportsController@goodMoralDate', 'as' => 'goodMoralDate'));
		Route::get('date_indigency', array('uses' => 'ReportsController@indigencyDate', 'as' => 'indigencyDate'));
		// end of reports

	});
});
Route::group(['middleware' => ['guest']], function(){
	Route::get('/login', array('uses' => 'LoginController@login', 'as' => 'login'));
	Route::get('/reset_options', array('uses' => 'LoginController@resetOptions', 'as' => 'resetOptions'));
	Route::get('/reset_password', array('uses' => 'LoginController@resetPass', 'as' => 'resetPass'));
	Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	Route::get('/reset', array('uses' => 'LoginController@checkUser', 'as' => 'checkUser'));
	Route::post('/reset_password_via_question/{id}', array('uses' => 'LoginController@resetPasswordUpdate', 'as' => 'resetPasswordUpdate'));
	Route::post('/reset_via_question', array('uses' => 'LoginController@resetPassword', 'as' => 'resetPassword'));
	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\PasswordController@reset');
});
// Authentication Module
Route::get('logoutUser', ['as' => 'loggedOut', 'uses' => 'LoginController@loggedOut']);
// Route::get('/logoutUser', array('uses' => 'LoginController@loggedOut', 'as' => 'loggedOut'));
Route::post('/logged_in', array('uses' => 'LoginController@loggedIn', 'as' => 'loggedIn'));
Route::post('/register', array('uses' => 'LoginController@register', 'as' => 'register'));


// end of authentication modules