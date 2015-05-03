<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::group(array('before'=>'checkLogin'),function()
{
	Route::get('/', function()
	{
		// return View::make('hello');
		// header('location:admin');
		echo 'hlloe login ok';
	});

	Route::get('admin/createUser', 'Admin\User\UserController@create');
	Route::get('admin/test', 'Admin\User\UserController@test');
	Route::get('admin/logout', 'Admin\LoginController@logout');
});




Route::post('admin/auth', 'Admin\LoginController@auth');	//验证信息提交
Route::get('admin/login', 'Admin\LoginController@show');		//登录页面
Route::get('admin', 'Admin\LoginController@show');		//登录页面

