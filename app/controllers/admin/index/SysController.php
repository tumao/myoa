<?php namespace Admin\Index;

class SysController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		// var_dump( $_SERVER);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//服务器，框架，php，mysql,redis,数据库大小，最大可上传许可,开发人员
		$data['software'] = $_SERVER['SERVER_SOFTWARE'];
	}

}
