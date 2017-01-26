<?php

//Variables Controller
class Variables extends BaseController
{

	public static function BaseDir()
	{
		$loc='/mnt/cloud/';
		return $loc;
	}

	public static function UserDir()
	{
		$userdir=self::BaseDir().Auth::user()->email;
		return $userdir;
	}

	public static function ThumbDir()
	{
		$userdir=self::UserDir().'/.thumbnails/';
		return $userdir;
	}

	public static function folderImg()
	{
		return '/home/www/public/cloud-static/img/';
	}
}