<?php

Route::group(['prefix'=>'admin','namespace'=>'App\Modules\Admin\Controllers'],function(){

	Route::get('role/create',function(){
		$admin = new \App\Models\Role();
		$admin->name = 'admin';
		$admin->display_name = 'Administrator';
		$admin->description = 'Admin can create user';
		$admin->save();

		return "Done";
	});

	Route::get('permission/create',function(){
		$login = new \App\Models\Permission();
		$login->name = 'login_dashboard';
		$login->display_name = 'Login Dashboard';
		$login->description = 'can login to dashboard';
		$login->save();

		return "Done";
	});

	Route::get('login',['as'=>'admin.getlogin','uses'=>'Auth\AuthController@getLogin']);
	Route::post('login',['as'=>'admin.postLogin','uses'=>'Auth\AuthController@postLogin']);

	Route::get('register',['as'=>'admin.getRegister','uses'=>'Auth\AuthController@getRegister']);
	Route::post('register',['as'=>'admin.postRegister','uses'=>'Auth\AuthController@postRegister']);

	Route::get('sendEmailReset',['as'=>'admin.getSendEmailReset','uses'=>'Auth\PasswordController@getEmail']);
	Route::post('sendEmailReset',['as'=>'admin.postSendEmailReset','uses'=>'Auth\PasswordController@postEmail']);
	Route::get('resetPassword/{token?}',['as'=>'admin.getresetPassword','uses'=>'Auth\PasswordController@getReset']);
	Route::post('resetPassword',['as'=>'admin.postresetPassword','uses'=>'Auth\PasswordController@postReset']);

	Route::get('logout',['as'=>'admin.getLogout','uses'=>'Auth\AuthController@getLogout']);

	Route::group(['middleware'=>'checkLogin'],function(){
		Route::get('dashboard',['as'=>'admin','uses'=>'AdminController@index']);

		Route::group(['middleware'=>'checkAdminRole'], function(){
			/*COUTRY*/
			Route::post('type/deleteAll',['as'=>'admin.type.deleteAll','uses'=>'TypeController@deleteAll']);
			Route::any('type/getData',['as'=>'admin.type.getData','uses'=>'TypeController@getData']);
			Route::post('type/postAjaxUpdateOrder',['as'=>'admin.type.postAjaxUpdateOrder','uses'=>'TypeController@postAjaxUpdateOrder']);
			Route::post('type/postAjaxUpdateStatus',['as'=>'admin.type.postAjaxUpdateStatus','uses'=>'TypeController@postAjaxUpdateStatus']);
			Route::resource('type','TypeController');
			/*Image*/
			Route::post('image/deleteall',['as'=>'admin.image.deleteall','uses'=>'ImageController@deleteAll']);
			Route::resource('image','ImageController');
			// MANAGE USER
			Route::get('/create-user',['as'=>'admin.getCreateUser', 'uses'=>'AdminController@getCreateUser']);
			Route::post('/create-user', ['as'=>'admin.postCreateUser', 'uses'=>'AdminController@postCreateUser']);

			Route::get('/list-user',['as' => 'admin.getListUser', 'uses' =>'AdminController@getListUser']);
			Route::post('/user/deleteall',['as'=>'admin.user.deleteall','uses'=>'LocationController@deleteAll']);
			Route::delete('/delete-user/{id}',['as' => 'admin.deleteUser', 'uses' =>'AdminController@deleteUser']);

		});
		// PHOTO
		Route::post('/uploadPhoto', [ 'as' => 'admin.photo.postUpload', 'uses'=>'PhotoController@postUpload']);
		Route::post('/photo/deleteall',['as'=>'admin.photo.deleteall','uses'=>'PhotoController@deleteAll']);
		Route::get('/photo/ajaxAlbum', ['as' => 'admin.photo.ajaxAlbum', 'uses'=>'PhotoController@loadAlbum']);
		Route::get('/photo/getData', ['as' => 'admin.photo.getData', 'uses' =>'PhotoController@anyData']);
		Route::get('/photo/quickEdit' , ['as' => 'admin.photo.getQuickEditPhoto', 'uses' => 'PhotoController@getQuickEditPhoto']);
		Route::post('/photo/postAjaxGetAlbum' , ['as' => 'admin.photo.postAjaxGetAlbum', 'uses' => 'PhotoController@postAjaxGetAlbum']);
		Route::post('/photo/postAjaxGetPhoto' , ['as' => 'admin.photo.postAjaxGetPhoto', 'uses' => 'PhotoController@postAjaxGetPhoto']);
		Route::post('/photo/postAjaxEditPhoto' , ['as' => 'admin.photo.postAjaxEditPhoto', 'uses' => 'PhotoController@postAjaxEditPhoto']);
		Route::post('/photo/postAjaxUpdateOrder', ['as' => 'admin.photo.postAjaxUpdateOrder', 'uses' => 'PhotoController@postAjaxUpdateOrder']);
		Route::resource('/photo', 'PhotoController');


		/*CHANGE PASS*/
		Route::get('password',['as'=>'admin.getChangePass','uses'=>'AdminController@getChangePass']);
		Route::post('password',['as'=>'admin.postChangePass','uses'=>'AdminController@postChangePass']);



	});


});
