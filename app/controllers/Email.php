<?php


class Email extends BaseController {

	/*
	This is email template that will be sent to user email with Verification Code
	*/
	public static function Register_success($name,$email,$code)
	{

		Mail::send('emails.register', array('name'=>$name,'email'=>base64_encode($email),'code'=>$code), function($message) use ($email,$name)
		{
			$message->from('signup@cloudtub.com', 'Cloudtub');
		    $message->to($email, $name)->subject('Welcome To Cloudtub');

		});
		return true;


	}

	public static function Reset_password($name,$email,$code)
	{

		Mail::send('emails.reset', array('name'=>$name,'email'=>base64_encode($email),'code'=>$code), function($message) use ($email,$name)
		{
			$message->from('donotreply@cloudtub.com', 'Cloudtub');
		    $message->to($email, $name)->subject('Cloudtub Password Reset.');

		});
		return true;

	}





}