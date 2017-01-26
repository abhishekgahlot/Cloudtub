<?php

//Download File Controller
class Download extends BaseController
{

	public function de($uid=false)
	{
		//$uid global var usecase from url
		$array=array("time"=>time(),"uid"=>$uid);
		return Crypt::encrypt($array);

	}

	public function start($uid=false)
	{
		//$uid global var usecase from url
		$decrypt=Crypt::decrypt($uid);
		if(!empty($decrypt))
		{
			$LMongo = LMongo::connection();

			$find=$LMongo->files->findOne(
								   array('uuid' => (string)$decrypt['uid'])
							    		  );
			$filename=$find['filename'];

			$email=$find['email'];

			$location=$find['location'];

			$absolute_location=Variables::BaseDir().$email.$location.$filename;

			$mime=Functions::getMime($absolute_location);

			$expired_time=60*60*24; //24 Hour now

			$file_time=$decrypt['time'];

			if(time() > $file_time+$expired_time)
			{
				return Response::json(array("Error"=>"File Link Expired"));
				exit;
			}
			if(getimagesize($absolute_location))
			{
				$response=Response::make(File::get($absolute_location), 200, array('content-type'=>$mime));
				header("Content-Disposition: inline; filename=\"".$filename."\"");
				return $response;
			}else
			{
				return Response::download($absolute_location, $filename, array('content-type'=>$mime));
			}
		}
	}

}