<?php 	namespace Admin\User;

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return \Redirect::to('/admin/user/userconf');
	}


	/**
	 * 用户注册/管理员创建用户
	 *
	 * @return Response
	 */
	public function createUser()
	{
		if(\Request::isMethod('post'))
		{
			$user = \Input::all();
		}
		var_dump( $user);
		try
		{
		    // Create the user
		    $user_info = \Sentry::createUser(array(
		    	'real_name'	=> $user['real_name'],
		        'email'     => $user['email'],
		        'password'  => $user['password'],
		        'activated' => true,
		    ));

		    $group = \Sentry::findGroupByName($user['groupName']);	//通过组名查找组

		    $user_info->addGroup($group);			//把用户加入组中
		    return array('code' => 1, 'info' => '用户创建成功');
		}
		catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    return array('code' => -1, 'info'=> '用户名不可为空');
		}
		catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    return array('code' => -2, 'info'=> '密码不可为空');
		}
		catch (\Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    return array('code' => -3, 'info'=> '用户名已经存在，请直接登录');
		}
		catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    return array('code' => -4, 'info'=> '未找到分组');
		}
	}

	/**
	 * 用户列表
	 *
	 * @return Response
	 */
	public function userList()
	{
		$all_users = \Sentry::findAllUsers();
		foreach ($all_users as & $user) 
		{

			$group_arr = array();
			$x = \Sentry::findUserById($user['id']);
			$groups = $x->getGroups();
			foreach($groups as $group)
			{
				array_push($group_arr, $group['name']);
			}
			$user['group'] = implode(',', $group_arr);
		}
		$this->layout->content = \View::make('default.user.user.user')->with('users', $all_users);
	}

	/**
	 * 添加、修改 用户信息页面(当id为空时，则添加，id非空时为修改数据)
	 * @param id（可选参数） 用户id
	 *
	 * @return TRUE 删除成功
	 * @return FALSE 删除失败
	 */
	public function userForm($id = '')
	{
		$groups = \Sentry::findAllGroups();
		$user = array(
			'id'	=> '',
			'name'	=> '',
			'email'	=> '',
			'first_name' => ''
			);
		if( $id != '')
		{
			$user = \Sentry::findUserById($id);
			$group = $user->getGroups();
		}
		foreach($groups as & $x)
		{
			if( $id != '' && $x['name'] == $group[0]['name'])	//如果是修改页面则设置分组
			{
				$x['checked'] = true;
			}
			else if( $id == '' && $x['name'] == 'Users')	//如果是添加页面则设置默认分组为users
			{
				$x['checked'] = true;
			}
			else
			{
				$x['checked'] = false;
			}
		}
		$data = array(
			'user'	=> $user,
			'group'	=> $groups
			);
		return \View::make('default.user.user.userForm')->with('data', $data);
	}

	/**
	 * 更新用户信息
	 *
	 * @param 
	 *
	 * @return 
	 */
	public function updateUser()
	{
		if(\Request::isMethod('post'))
		{
			$user = \Input::all();
		}
		try
		{
		    $user_info = \Sentry::findUserById($user['id']);		//通过id查找用户

		    // 更新用户信息
		    $user_info->name = $user['username'];
		    $user_info->email = $user['email'];
		    $user_info->real_name = $user['real_name'];
		    $this->assign_group_to_user($user['id'],array($user['groupName']));
		    if ($user_info->save())									//保存修改
		    {
		        return array('code'	=>1, 'info' => '数据修改成功');
		    }
		    else
		    {
		        // User information was not updated
		        return array('code' => 0, 'info' => '数据保存失败，请联系管理员！');
		    }
		}
		catch (\Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    return array('code' => -1, 'info' => '用户名已经存在');
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return array('code' => -2, 'info' => '未找到要修改的用户');
		}
	}

	/**
	 * 删除用户
	 * @param user_id 用户id
	 *
	 * @return TRUE 删除成功
	 * @return FALSE 删除失败
	 */
	public function delUser($id)
	{
		try
		{
			$cur_user =  \Sentry::getUser();
			if( $cur_user->hasAccess('user.delete'))
			{
				$user = \Sentry::findUserById($id);	// 通过id查找用户
		    	$user->delete();	// 删除用户
		    	return array('code' => 1, 'info'=> '删除成功');
			}
			else
			{
				return array('code' => -1,'info'=> '当前用户无权限删除用户!');
			}
		    
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return array('code' => -2, 'info' => '用户不存在');	//用户不存在 （用户不存在或者被软删除）
		}
	}


	


}
