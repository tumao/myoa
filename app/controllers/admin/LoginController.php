<?php namespace Admin;

class LoginController extends \BaseController {

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
	 * 登录页面
	 *
	 * @return Response
	 */
	public function show()
	{
		if(\Sentry::check())
		{
			// header('location:/');
			return \Redirect::to('/');
		}
		/*$this->layout->content = */
		return \View::make("default.user.login");
	}

	/**
	 * 登录时校验用户登录信息
	 *
	 * @return Response
	 */
	public function auth()
	{
		//获取用户输入的信息
		$request = \Request::only('username', 'password', 'remember');
		try
		{
			$auths = array(
				'email'	=> $request['username'],
				'password'	=> $request['password']
				);
			$remember = $request['remember'] ? $request['remember'] : false;
			$result = \Sentry::authenticate( $auths, $remember);
			if($result)
			{
				return array('code'=>1, 'message'=>'LOGIN_SUCCESS', 'redirect_url' => '/admin/dashboard');
			}
		}
		catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    // echo 'Login field is required.';
		    return array('code'=>-1, 'message'=>'LOGIN_FIELD_REQUIRED');
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    // echo 'User not found.';
		    return array('code'=>-2, 'message'=> 'USER_NOT_FOUND');
		}
		catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    // echo 'User not activated.';
		    return array('code'=>-3, 'message'=>'USER_NOT_ACTIVATED');
		}

		// Following is only needed if throttle is enabled
		catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    $time = $throttle->getSuspensionTime();

		    // echo "User is suspended for [$time] minutes.";
		    return array('code'=>-4, 'message'=>'USER_SUSPENDED '.$time.'MINUTES');
		}
		catch (\Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    // echo 'User is banned.';
		    return array('code'=>-5, 'message'=> 'USER_BANNED');
		}
	}

	/**
	 * 退出登录
	 *
	 * @return Response
	 */
	public function logout()
	{
		\Sentry::logout();
		return \Redirect::to('admin/login');
	}
}
