<?php

//Functions Controller
class ViewFiles extends BaseController
{
	public function view($location=false,$file=false)
	{
		$path=base64_decode($location);
		$path=str_replace('../','',$path);
	    $path=preg_replace('~/+~', '/', '/'.$path);

		//Filter filename: Note this has forward slash due to file location in folder
		if(Functions::filename($path)==='True')
		{
			/*
			Perform something here to output file. In case of image show it, document execute it. Movie stream annd audio is future
			*/
			$filename=substr($path, strrpos($path, '/',-1)+1, strlen($path));

			$location=substr($path, 0, strrpos($path, '/', -1)).'/';

			$download=(Input::get('download')==='true' ? true : false);

			if(Functions::fileExist($filename,$location))
			{
					if(Functions::fileDB(Auth::User()->email,$filename,$location)!=='null')
					{
						$Flocation=Variables::UserDir().$location.$filename;
						$DBdata=Functions::fileDB(Auth::User()->email,$filename,$location);

						//Scaled one should not be available for everthing.
						if(!empty($DBdata['scaled']))
						{
							$scaledLocation=Variables::thumbdir().$DBdata['scaled'];
						}
						//I think everything is setup lets output file data

						  if(isset($scaledLocation)&&!empty(getimagesize($scaledLocation))&&Input::get('data')!='true'&&$download!=true)
							{
								$mime=Functions::getMime($scaledLocation);
								header('Content-Type:'.$mime);
								return Response::make(File::get($scaledLocation), 200, array('content-type'=>$mime));
								//return File::get($scaledLocation);

							}else if(Input::get('data')!='true'&&$download!=true)
							{
								$mime=Functions::getMime($Flocation);
								header('Content-Type:'.$mime);
								header('Content-Disposition: ; filename='.$DBdata['filename']);
								//return File::get($Flocation);
								return Response::make(File::get($Flocation), 200, array('content-type'=>$mime));
							}
							else if(Input::get('data')=='true'&&$download!=true)
							{
									unset($DBdata['email']);

									$DBdata['type']=Functions::codeType($Flocation);

									if($DBdata['type']==null)
									{
										$DBdata['type']=Functions::viewableImage($Flocation);

										if($DBdata['type']==null)
										{
											$DBdata['type']="downloadable";
										}
									}

									return Response::json($DBdata);
							}else if($download==true)
							{
								$mime=Functions::getMime($Flocation);
								//return File::get($Flocation);
								return Response::download($Flocation, $DBdata['filename'], array('content-type'=>$mime));
							}
					}
					else
					{
						return Response::json(Error::DBerror());
					}
			}else
			{
				return Response::json(Error::nullFiles());
			}
		}
		else
		{
			return Response::json(array("error"=>Functions::filename($path)));
		}

	}
		/*
		  Function to show calendar data of users

		*/
	public function calendar()
	{
		$data=LMongo::collection('files')->where('email', Auth::User()->email)->andWhere('shared_deleted','0_0')->get();
		$array=array();
		foreach($data as $file)
		{
			$url='#/view'.$file['location'].$file['filename'];
			if($file['type']=='folder')
			{
				$url='#/files'.$file['location'].$file['filename'];
			}
			$time=explode('|',$file['date_time']);
			$array[]=array(
			'title'=>$file['filename'],
			'start'=>$time[1],
			'url'=>$url
						);
		}
		return json_encode($array);

	}

}