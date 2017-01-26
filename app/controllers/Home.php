<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function check()
	{
		$email=$_GET['email'];

		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		 {
		  return "E-mail is not valid";
		 }
		else
		  {
		  	$userdata=LMongo::collection('users')->where('email', (string)$_GET['email'])->first();
		  	if($userdata)
		  	{
			  	return 1;
		  	}else
		  	{
			  	return 0;
		  	}

		  }


	}

	public function BasicData($username=false)
	{
		$userVerified=false;

		$userdata=LMongo::collection('users')->where('email', Auth::user()->email)->first();
		if($userdata['verified']==0)
		{
			/*
				User havent verified using Email! Give them Notification
			*/
			$userVerified=true;
		}
		if($userVerified)
		{
		return Response::json(array('verified'=>0));
		}
	}
}