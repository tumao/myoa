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
	#user
	Route::get('admin/logout', 'Admin\LoginController@logout');

	Route::get('admin/user', 'Admin\User\UserController@index');		
	Route::get('admin/user/userconf', 'Admin\User\UserController@userList');	//用户列表
	Route::get('admin/user/user_form/{id?}', 'Admin\User\UserController@userForm');		//添加用户的对话框
	Route::post('admin/user/create_user', 'Admin\User\UserController@createUser');		//创建用户
	Route::post('addmin/user/update_user', 'Admin\User\UserController@updateUser');	//更新用户信息
	Route::get('admin/user/del_user/{id}', 'Admin\User\UserController@delUser');

	Route::get('admin/user/groups', 'Admin\User\GroupController@groups');	//分组列表

	Route::get('admin/user/permissions', 'Admin\User\PermissionsController@permissions');	//权限列表
	Route::get('admin/user/save_permissions', 'Admin\User\PermissionsController@savePermissons');
	Route::get('admin/user/edit_permissions/{id}', 'Admin\User\PermissionsController@editPermissions');
	Route::get('admin/user/del_permission/{id}', 'Admin\User\PermissionsController@delPermission');

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

