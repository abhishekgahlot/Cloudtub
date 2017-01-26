<?php


class API extends BaseController
{
		public static function gen_uuid()
		{
			return sprintf( '%04x%04x%04x-%04x%04x-%04x%04x%04x',
	        // 32 bits for "time_low"
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

	        // 16 bits for "time_mid"
	        mt_rand( 0, 0xffff ),

	        // 16 bits for "time_hi_and_version",
	        // four most significant bits holds version number 4
	        mt_rand( 0, 0x0fff ) | 0x4000,

	        // 16 bits, 8 bits for "clk_seq_hi_res",
	        // 8 bits for "clk_seq_low",
	        // two most significant bits holds zero and one for variant DCE1.1
	        mt_rand( 0, 0x3fff ) | 0x8000,

	        // 48 bits for "node"
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	        	);
	     }

	     public static function guid()
		{
		    $data = openssl_random_pseudo_bytes(16);

		    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0010
		    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

		    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}


		public static function GetHash($email)
		{

			$UserHash=EncryptionController::encrypt($email);
		    $Hash=@file_get_contents('http://api.cloudtub.com/index.php?token='.$UserHash.'&m=l&e='.$email);
		    return $Hash;

		}

		/*
		This function generate API Key and public and private key for further Use
		*/
		public static function keys($email)
		{
			 $APIkey=self::gen_uuid();

			 //$APIsecret=hash('gost',self::gen_uuid().$email.rand(1000,100000).microtime());
			 $APIsecret=self::guid();
			 return array(
			 	'API'=>$APIkey,
			 	'APISecret'=>$APIsecret,
			 );

		}

}