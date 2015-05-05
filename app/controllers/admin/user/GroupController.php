<?php namespace Admin\User;

class GroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}
	/**
	 * 创建用户组
	 *
	 * @return Response
	 */
	public function groups()
	{
		$groups = \Group::all();
		$this->layout->content = \View::make('default.user.group.group')->with('groups', $groups);
	}

	/**
	 * 创建用户组
	 *
	 * @return Response
	 */
	public function createGroup()
	{
		//
		try
		{
		    // Create the group
		    $group = \Sentry::createGroup(array(
		        'name'        => 'Moderator',
		        'permissions' => array(
		            'admin' => 1,
		            'users' => 1,
		        ),
		    ));
		}
		catch (\Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
		    return array('code'=>-1, 'message'=>'GROUP_NAME_REQUIRED');
		}
		catch (\Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
		    return array('code'=>-2, 'message'=>'GROUP_ALREADY_EXISTS');
		}
	}

	/**
	 * 创建用户组
	 *
	 * @return Response
	 */
	public function groupForm($id = '')
	{

	}


}
