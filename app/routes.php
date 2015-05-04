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
		echo 'hello login ok';
	});

	Route::get('admin/createUser', 'Admin\User\UserController@create');
	Route::get('admin/test', 'Admin\User\UserController@test');
	Route::get('admin/logout', 'Admin\LoginController@logout');

	#conf
	Route::get('admin/conf', 'Admin\Menu\MenuController@index');
	Route::get('admin/conf/menu', 'Admin\Menu\MenuController@show');	//显示菜单列表
	Route::get('admin/conf/add_menu_form/{id?}', 'Admin\Menu\MenuController@addMenuForm' );
	Route::get('admin/conf/save_menu_form', 'Admin\Menu\MenuController@saveMenuForm');
	Route::get('admin/conf/del_menu_item/{id}', 'Admin\Menu\MenuController@delMenuItem');
	Route::get('admin/conf/edit_menu/', 'Admin\Menu\MenuController@editMenuItem');

	#index
	Route::get('admin/dashboard', 'Admin\Index\DashboardController@index');
	Route::get('admin/dashboard/index', 'Admin\Index\DataController@index');
	Route::get('admin/dashboard/sys', 'Admin\Index\SysController@index');
	Route::get('admin/dashboard/dashboard', 'Admin\Index\DashboardController@index');
	Route::get('admin/dashboard/census', 'Admin\Index\CensusController@index');
});



Route::post('admin/auth', 'Admin\LoginController@auth');	//验证信息提交
Route::get('admin/login', 'Admin\LoginController@show');		//登录页面
Route::get('admin', 'Admin\LoginController@show');		//登录页面

