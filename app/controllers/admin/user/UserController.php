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

	}


	/**
	 * 用户注册/管理员创建用户
	 *
	 * @return Response
	 */
	public function create()
	{
		try
		{
		    $user = \Sentry::createUser(array(				//创建用户
		        'email'     => 'john.doe@example.com',
		        'password'  => 'test',
		        'activated' => true,
		    ));

		    // // Find the group using the group id
		    // $adminGroup = Sentry::findGroupById(1);

		    // // Assign the group to the user
		    // $user->addGroup($adminGroup);
		}
		catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (\Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'User with this login already exists.';
		}
		catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    echo 'Group was not found.';
		}
	}


	/**
	 * 测试 |待删除
	 *
	 * @return Response
	 */
	public function test()
	{
		
	}
	


	


}
