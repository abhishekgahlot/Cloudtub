<?php

class Error extends BaseController
{

	public static function x404()
	{

		echo '404';

	}

	public static function x500()
	{

		echo "500";

	}
	public static function Verified()
	{

		echo 'Please Verify Your Account';

	}

	public static function Unknown()
	{
		echo 'Unknown Error';
	}

	public static function Auth()
	{

		echo "Authentication Error";

	}

	public static function Custom($error)
	{
		echo $error;
	}

	public static function File($error)
	{
		echo ($error)=='name' ? 'name error' : null ;

		echo ($error)=='size' ? 'size error' : null ;

		echo ($error)==404 ? 'No file uploaded' : null ;

		echo ($error)=='unknown' ? 'Unknown ' : null ;
	}

	public static function emptyFiles()
	{			//folder is empty
			return array('error'=>'file');
	}

	public static function nullFiles()
	{			//folder doesn't exist
		    return array('error'=>'null');
	}

	public static function invalidFiles()
	{	//folder name has shit characters
		return array('error'=>'invalid');
	}

	public static function DBerror()
	{
		return array("error"=>"Database Error");
	}

}



?>