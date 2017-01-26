<?php

class Settings extends BaseController {

	public static function Edit()
	{
		$rules = array(
			'name' => 'required|min:3|max:15|alpha_space',
			'oldpass' => 'min:6|max:40',
			'newpass' => 'min:6|max:40'
			);

	    $data=Input::only( 'name','oldpass','newpass');

	    $validator = Validator::make($data, $rules);

			if ($validator->passes())
			{
					$name=$data['name'];
					$oldpass=$data['oldpass'];
					$newpass=$data['newpass'];

					if($oldpass=='')
					{
						if($newpass!='')
						{
							return 'Please Enter Previous Password!';
					  	}
					}
					if($oldpass!='')
					{
						if($newpass=='')
						{
							return 'Please Enter New Password!';
					  	}
					}

					if($oldpass!=''&&$newpass!='')
					{
						/*
							Change Password Now
						*/
						$hash= LMongo::collection('users')->where('email', Auth::user()->email)->pluck('password');
						if(Hash::check($oldpass, $hash))
						{
							$update=LMongo::collection('users')
												          ->where('email', Auth::user()->email)
												          		 ->update(array('password' => Hash::make($newpass)));


						}else
						{
							return 'Your Current Password is Incorrect';
						}

					}

					if($name!=='')
					{
					 /*
					 	Change Name
					 */
					 $update=LMongo::collection('users')
												   ->where('email', Auth::user()->email)
												          		 ->update(array('name' => $name));
					}



					return Response::json(array('success'));

			}else
			{
				$messages = $validator->messages();
				return $messages->first();
			}
	}

	public static function show($request)
	{
		if ($request==='name') {

			$data = LMongo::collection('users')->where('email', Auth::user()->email)->first();
			return Response::json(array('name'=>$data['name']));
		}
		if ($request==='email') {

			$data = LMongo::collection('users')->where('email', Auth::user()->email)->first();
			return Response::json(array('email'=>$data['email']));
		}


			if (strpos($request,'name,email,api') !== false) {

			$data = LMongo::collection('users')->where('email', Auth::user()->email)->first();
			return Response::json(
			array('name'=>$data['name'],'email'=>$data['email'],'api'=>$data['API'],
			'apisecret'=>$data['APISecret']
			)
			);
		}

		if (strpos($request,'name,email') !== false) {

			$data = LMongo::collection('users')->where('email', Auth::user()->email)->first();
			return Response::json(array('name'=>$data['name'],'email'=>$data['email']));
		}


	}

}