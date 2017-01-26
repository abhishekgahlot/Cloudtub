<?php

//Edit Files Controller
class Imusify extends BaseController
{

	public function AddSubscribers($data=false)
	{
		$m=new MongoClient("mongodb://webapp:darkshadowbellatrix@alex.mongohq.com:10056/imusify");
		$db=$m->imusify;
		$collection=$db->subscribers;


		$newdata=explode("&",$data);
		$username=$newdata[1];
		$email=$newdata[0];

		//Check if username exists
		$email_found=$collection->findOne(array("email"=>(string)$email));
		$username_found=$collection->findOne(array("username"=>(string)$username));

		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{

			$response = Response::make(array("error"=>"invalid-email"), 200);
			$response->header('Content-Type', 'application/json');
			$response->headers->set('Access-Control-Allow-Origin', '*');
			return $response;

		}
		if($username=="")
		{	if(!isset($_GET['emailonly']))
			{
			$response = Response::make(array("error"=>"enter-username"), 200);
			$response->header('Content-Type', 'application/json');
			$response->headers->set('Access-Control-Allow-Origin', '*');
			return $response;
			}
		}
		if(!ctype_alnum($username))
		{	if(!isset($_GET['emailonly']))
			{
			$response = Response::make(array("error"=>"invalid-username"), 200);
			$response->header('Content-Type', 'application/json');
			$response->headers->set('Access-Control-Allow-Origin', '*');
			return $response;
			}
		}

		if($username_found)
		{

			$response = Response::make(array("error"=>"username-exist"), 200);
			$response->header('Content-Type', 'application/json');
			$response->headers->set('Access-Control-Allow-Origin', '*');
			return $response;

		}else
		{
			if(!$email_found)
			{

				if(isset($_GET['check']))
				{
					$insert=1;

				}else if(isset($_GET['submit']))
				{
					$insert=$collection->insert(array(
						"username"=>(string)$username,
						"email"=>(string)$email
						));
				}else
				{
					$insert=1;
				}
				if($insert)
				{

					$response = Response::make(array("error"=>"success"), 200);
					$response->header('Content-Type', 'application/json');
					$response->headers->set('Access-Control-Allow-Origin', '*');
					return $response;
				}
			}else
			{
				$response = Response::make(array("error"=>"email-exist"), 200);
				$response->header('Content-Type', 'application/json');
				$response->headers->set('Access-Control-Allow-Origin', '*');
				return $response;

				//return Response::json(array("error"=>"email-exist"));
			}
		}
	}

}