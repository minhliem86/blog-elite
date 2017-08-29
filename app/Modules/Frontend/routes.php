<?php

Route::group(['namespace'=>'App\Modules\Frontend\Controllers'],function(){
	// Route::get('/',['as'=>'home','uses'=>'HomeController@getIndex']);

	Route::get('/', ['as' => 'f.homepage', 'uses' => 'HomeController@index']);
	Route::get('/elite/{slug}', ['as'=>'f.detail', 'uses' => 'HomeController@detail'])->where('slug', '[0-9A-Za-z.-\/]+');
	Route::post('/loadmore', ['as' => 'f.loadmore', 'uses' => 'HomeController@loadmore']);

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
// Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
