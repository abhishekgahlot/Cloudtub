<?php

//Trash Controller
class Trash extends BaseController
{

	public function show($parameters,$key=false)
	{
			if($parameters=='show')
			{
				$files=Files::getFiles($email=Auth::User()->email,$folder=false,$count=0,$limit=false,$deleted=true);
				$Array=Files::handleFiles($files);
				return $Array;
			}

			if($parameters=='delete')
			{
				/*
					All signifies delete everything permanently. So good
				*/
				if($key=='all')
				{
					$Files=LMongo::collection('files')->where('shared_deleted', '0_1')->andWhere('email',Auth::User()->email)->get();
					foreach($Files as $Filedata)
					{
						self::deletePermanently($Filedata['guid'],$Filedata['type'],$Filedata['filename']);
					}

					return Response::json("success");

				}else
				{
					$Filedata=LMongo::collection('files')->where('guid', (string)$key)->andWhere('email',Auth::User()->email)->first();

					if($Filedata['guid']==$key)
					{
						return self::deletePermanently($Filedata['guid'],$Filedata['type'],$Filedata['filename']);
					}
				}
			}

			if($parameters=='recover')
			{

				if($key=='all')
				{
					$Files=LMongo::collection('files')->where('shared_deleted', '0_1')->andWhere('email',Auth::User()->email)->get();

					foreach($Files as $Filedata)
					{
						self::recover($Filedata['guid'],$Filedata['type'],$Filedata['filename'],$Filedata['location']);
					}
					return Response::json("success");
				}else
				{

					$Filedata=LMongo::collection('files')->where('guid', (string)$key)->andWhere('email',Auth::User()->email)->first();

					if($Filedata['guid']==$key)
					{
						return self::recover($Filedata['guid'],$Filedata['type'],$Filedata['filename'],$Filedata['location']);
					}

				}

			}
	}


	public static function deletePermanently($guid,$type,$filename=false)
	{
						/*
							Remove From Trash !
						*/
						//If folder remove folder ,if file remove file with extensions added to it
						if($type=='folder')
						{
							$location=Variables::UserDir().'/.trash/'.$guid;
							$delete=File::deleteDirectory($location);

						}else
						{
							$location=Variables::UserDir().'/.trash/'.$guid.'.'.File::extension($filename);
							$delete=File::delete($location);
						}
						/*
							Remove From Database !
						*/

						$delete=LMongo::collection('files')->where('guid', (string)$guid)
																		->andWhere('email',Auth::User()->email)->delete();
								if($delete)
								{
								return Response::json("success");
								}


	}

	public static function recover($guid,$type,$filename=false,$filelocation=false)
	{
						/*
							Recover From trash
						*/
						//If folder remove folder ,if file remove file with extensions added to it
						$renamedvalue=Functions::renameFile($filename,$filelocation,$type);
						if($type=='folder')
						{
							$recoveredLocation=Variables::UserDir().$filelocation.$renamedvalue;
							$location=Variables::UserDir().'/.trash/'.$guid ;
							rename($location, $recoveredLocation);

						}else
						{
							$recoveredLocation=Variables::UserDir().$filelocation.$renamedvalue;
							 $location=Variables::UserDir().'/.trash/'.$guid.'.'.File::extension($filename);
							rename($location, $recoveredLocation);
						}
						/*
							Recover From Database !
						*/
						$recover=LMongo::collection('files')->where('guid', (string)$guid)
																	->andWhere('email',Auth::User()->email)
																				->update(array(
																				'shared_deleted' => '0_0',
																				'filename'=>$renamedvalue																																	));
								if($recover)
								{
								return Response::json("success");
								}

	}

}