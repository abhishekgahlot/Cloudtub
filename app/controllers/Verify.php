<?php

/*

    public function Login1()
    {

	    	$data = Input::only('email', 'pass');

			$rules = array(
			'email' => 'email|required',
			'pass' => 'required'
			);

			$validator = Validator::make($data, $rules);

			if ($validator->passes())
			{

					$var=APIController::GetHash($data['email']);

			    	echo $var=='404' ?  ErrorController::x404() : (Hash::check($data['pass'], EncryptionController::decrypt($var)) ? 'Verfified' : ErrorController::Auth());

			}
			else
			{
				$messages = $validator->messages();
				echo $messages->first('email');

			}

     }
*/

class Verify extends BaseController
{
	public function __construct()
    {
         if (Auth::check())
        {
    	return Redirect::route('cloud');
    	}

    }

	/*
		This function is called when a user tries to login it check
		if user is verified or not and password is correct than
		pass data to function login_success.
	*/
      public function Login($email=false,$pass=false)
    {

	    	if($email==true&&$pass==true)
	    	{
		    	$data = array('email'=>$email,'pass'=>$pass);
	    	}
	    	else
	    	{
		    	$data=Input::only('email', 'pass');

	    	}

			$rules = array(
			'email' => 'email|required',
			'pass' => 'required'
			);

			$validator = Validator::make($data, $rules);

			if ($validator->passes())
			{

			//find username and password if validator passes
			$email=$data['email'];
			$password=$data['pass'];

			//Retrieving Single column from document
			$Fetched = LMongo::collection('users')->
			where('email', (string)$email)->first();

			//Return 404 if username or password is incorrect
			return Auth::attempt(array('email'=>$email,'password'=>$password)) ?
			self::Login_success($Fetched) ? Redirect::route('cloud') :
			Error::Unknown() : Redirect::to('signin')->with('error','Username or Password Incorrect.');

			}
			else
			{
				//validator fail exception
				$messages = $validator->messages();
				return Redirect::to('signin')->with('error',$messages->first());

			}
     }



     /*
      This function is called from login when a user is verified and
      database is updated ,sessions created in this function.
     */

     public function Login_success($Data)
     {

	    //Now username and pass correct.Verified too ,update and login user
	  	$login_attempt=$Data['login_attempt']+1;


	  	//Add Browser name date and ip to logged
	  	$logged='( in with '.getenv("REMOTE_ADDR").' , '
	  		.date('d F Y').' , '.$_SERVER['HTTP_USER_AGENT'].' )';


	  	//Its just update to database
	  	$Update=LMongo::collection('users')
          			->where('email', $Data['email'])
          			    ->update(
		          				array(
		          				'login_attempt' => (string)$login_attempt,
		          				'logged'=> (string) $logged
		            				  )
		            			);


		     //Cloud storage Directory
				 $filedir='/mnt/cloud/'.$Data['email'];
				 $thumbdir=$filedir.'/.thumbnails';
				 $trashdir=$filedir.'/.trash';

				 if (!file_exists($filedir))
				  {
					   mkdir($filedir,0777);
				  }

				  if (!file_exists($thumbdir))
				  {
					   mkdir($thumbdir,0777);
				  }

				   if (!file_exists($trashdir))
				  {
					   mkdir($trashdir,0777);
				  }

		 $file_Session=Session::put('filedir', '/');

		 if(Session::get('filedir')!='/')
		 {
			 Session::put('filedir', '/');
		 }
		 //This will always return true but unknown times false
		 return $Update ? true : false ;

     }



     /*
     	This function is called when user register and create a
     	simple database structure first and fill it up and update DB
     */

     public function Register()
     {
	     $data = Input::only('name','email','pass');
	     $rules = array
	     	(
	     	'name' => 'required|min:3|max:15|alpha_space',
			'email' => 'email|required',
			'pass' => 'required|min:6|max:40'
			);


		 $validator = Validator::make($data, $rules);

		 //Default structure of user array in mongodb
		 $Structure=array
		 (
		  'name' =>  '',
		  'email' => '',
		  'password' =>  '',
		  'ip_date' =>  '',
		  'logged' =>  '',
		  'login_attempt' =>  0,
		  'privatekey' =>  '',
		  'API' =>  '',
		  'APISecret'=>'',
		  'privacy' =>  0,
		  'verified' =>  0
		 );

			if ($validator->passes())
			{
				//After validator pass check if email exists.
				$check_email=LMongo::collection('users')
          						->where('email', $data['email'])->first();

          		//If email not exists register
          		if(!$check_email)
          		{
          			$Structure['name']=(string)$data['name'];

	          		$Structure["email"]=(string)$data['email'];

	          		$Structure["password"]=Hash::make($data['pass']);

	          		$Structure['ip_date']=(string)getenv("REMOTE_ADDR").' , '.date('d F Y');

	          		$Structure['logged']=(string)'( in with '.getenv("REMOTE_ADDR").' , '
	          							.date('d F Y').' , '.$_SERVER['HTTP_USER_AGENT'].' )';


	          		$Structure['privatekey']= Crypt::encrypt($data['email']);

	          		$Structure['API']=API::keys($data['email'])['API'];

	          		$Structure['APISecret']=API::keys($data['email'])['APISecret'];

	          		$Verification_Code=API::gen_uuid();

	          		//Its just update to database
				  	$Update=LMongo::collection('users')
			          						->insert(
			          								$Structure
			          								);

			        //Its just update to tmp collection. Tmp is table which handle temporary Tasks
			        $tmp=LMongo::collection('tmp')
			          						->insert(array(
			          								'email'=>$Structure['email'],
			          								'verification_code'=>$Verification_Code
			          								));

			      //Cloud storage Directory
				 $filedir='/mnt/cloud/'.$Structure['email'];
				 $thumbdir=$filedir.'/.thumbnails';
				 $trashdir=$filedir.'/.trash';

				 if (!file_exists($filedir))
				  {
					   mkdir($filedir,0777);
				  }

				  if (!file_exists($thumbdir))
				  {
					   mkdir($thumbdir,0777);
				  }

				   if (!file_exists($trashdir))
				  {
					   mkdir($trashdir,0777);
				  }

			        if($Update&&$tmp)
			        {

				    	//I think everything setup, Fire a Mail to user Now
				    	if(Email::Register_success($Structure["name"],$Structure["email"],$Verification_Code))
				    	{
					    	//Now create a folder for user to store its files

					    	return $this->Login($Structure['email'],$data['pass']);

				    	}
			        }
          		}
          		else
          		{
	          		return Redirect::to('signup')->with('error','Email Already Exist');
          		}

			}
			else
			{
				$messages = $validator->messages();
				return Redirect::to('signup')->with('error', $messages->first());

			}

     }

     /*
     Verify user using code sent to mail
     */
     public function Verifyuser($email,$code)
     {
     		$email=base64_decode($email);

     		$check_email=LMongo::connection()->tmp
          						 				->findOne(array(
					          						 	'email'=>(string)$email,
					          						 	'verification_code'=>(string)$code
					          						 ));
			//If document exists remove it and activate User.
			if($check_email)
			{
				//Remove tmp data having verify code
				$RemoveData=LMongo::connection()->tmp
          						 					->remove(array(
						          						 	'email'=>(string)$email,
						          						 	'verification_code'=>(string)$code
						          						 ));

				//Update users table
				$Update=LMongo::collection('users')
          				->where('email', (string)$email)
          			  	  ->update(
		          				array(
		          					'verified'=>1
		            				  )
		            			);

				if($Update && $RemoveData)
				{


					if (Auth::check())
					{
						return Redirect::to('cloud');
					}else
					{
						return Redirect::to('signin')->with('error','Account Active, Please Log In.');
					}

				}else
				{
					return Error::Unknown();
				}

			}
			else
			{
				return Redirect::to('signin')->with('error','Verification Code is Expired or Incorrect!');
			}
     }

     public function reset($email=false)
     {
     	 $email=$_POST['email'];
	     if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		 {
		  return Redirect::to('reset')->with('error',"E-mail is not valid");
		 }
		else
		{	$userdata=LMongo::collection('users')->where('email', (string)$email)->first();
			if($userdata)
			{
				$name=$userdata['name'];
				$email=$userdata['email'];
				$code=API::gen_uuid();
					//I think everything setup, Fire a Mail to user Now
				    	if(Email::Reset_password($name,$email,$code))
				    	{
				    		 //Its just update to tmp collection. Tmp is table which handle temporary Tasks
				    		 $tmp=LMongo::collection('tmp')
			          						->insert(array(
			          								'email'=>(string)$email,
			          								'reset_code'=>$code
			          								));

				    		return Redirect::to('reset')->with('error','Email Sent ,Please Check Your Email.');
				    	}
			}else
			{
				return Redirect::to('reset')->with('error','No such email address is registered.');
			}
	  	}
     }


     /*
      Change password using verification code
     */
     public function resetPassword()
     {
	     $newpass=Input::get('newpass');
	     $newpassagain=Input::get('newpassagain');
	     $email=Input::get('email');
	     $code=Input::get('code');

	     if($newpass!==$newpassagain)
	     {
		     return Redirect::to('resetpass/'.base64_encode($email).'/'.$code)->with('error','Password Don\'t Match.');
	     }

	     $DBdata=LMongo::connection()->tmp
          						 		 ->findOne(array(
					          						 	'email'=>(string)$email,
					          						 	'reset_code'=>(string)$code
					          						 ));
		if($DBdata)
		{
			/*
				Change Password because code is matched
			*/
			$hashedPassword=Hash::make($newpass);

			$updatepassword=LMongo::collection('users')
          								->where('email', (string)$email)
          											->update(
								          				 array(
								          					'password'=>(string)$hashedPassword
								            				  )
								            				);
			if($updatepassword)
			{
				/*Redirect user to Admin Panel*/
				$RemoveData=LMongo::connection()->tmp
          						 					->remove(array(
						          						 	'email'=>(string)$email,
						          						 	'reset_code'=>(string)$code
						          						 ));
				if($RemoveData){return $this->Login($email,$newpass);}



			}else
			{
				/*
					Kick Him Out some error Occured
				*/
				return Redirect::to('resetpass/'.base64_encode($email).'/'.$code)->with('error','Some Error Occured.');

			}

		}else
		{
			return Redirect::to('resetpass/'.base64_encode($email).'/'.$code)->with('error','Reset Code Expired Or Incorrect.');
		}

     }
}