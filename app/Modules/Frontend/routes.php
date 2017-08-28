<?php

Route::group(['namespace'=>'App\Modules\Frontend\Controllers'],function(){
	// Route::get('/',['as'=>'home','uses'=>'HomeController@getIndex']);

	Route::get('/elite', ['as' => 'f.homepage', 'uses' => 'HomeController@index']);

	// IMPORT USER
	Route::get('/import-user',['as' => 'f.importUser', 'uses'=>'ImportController@index']);
	Route::post('/import-user', ['as'=>'f.postImportUser', 'uses'=>'ImportController@postImportUser']);



	// Route::get('/create-super', function(){
	// 	$data = [
	// 		'name' => 'Tester Travel Blog',
	// 		'username' => 'admin-travelblog',
	// 		'password' => bcrypt('ila@osc'),
	// 		'tour_id' =>1,
	// 		'super' => 1,
	// 	];
});
