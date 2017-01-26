<?php

//Edit Files Controller
class Edit extends BaseController
{
	public function Modify($key=false,$parameters=false)
	{
		if($parameters=='rename')
		{
			return self::Rename($key,Input::get('value'));
		}
		if($parameters=='delete')
		{
			return self::delete($key);
		}
	}

	public function delete($key)
	{
		$LMongo = LMongo::connection();
		$Filedata=$LMongo->files->findOne(array('email'=>Auth::User()->email,'guid' => (string)$key,'shared_deleted'=>'0_0'),array("_id"=>0));
		if($Filedata)
			{
				if(Functions::fileExist($Filedata['filename'],$Filedata['location']))
				{
					$location=Variables::UserDir().$Filedata['location'].$Filedata['filename'];
					$trashlocation=Variables::UserDir().'/.trash/'.$Filedata['guid'].'.'.File::extension($location);

					/*
						For just confirmation first file is copied than deleted. To avoid any data loss
					*/
					if($Filedata['type']=='folder')
					{
						$trashlocation=Variables::UserDir().'/.trash/'.$Filedata['guid'];
						if(File::copyDirectory($location, $trashlocation))
						{
							/*
							Database Changes and Moving File to Trash Folder.
							*/
							if(File::deleteDirectory($location))
							{

								$update=LMongo::collection('files')
											->where('guid', $Filedata['guid'])
													->andWhere('email',Auth::User()->email)
															->update(array('shared_deleted' => '0_1'));
								if($update)
								{
										return Response::json(array('response'=>'success'));
								}
							}
						}

					}else
					{
						if(File::copy($location, $trashlocation))
						{
							/*
							Database Changes and Moving File to Trash Folder.
							*/

							if(File::delete($location))
							{
								$update=LMongo::collection('files')
											->where('guid', $Filedata['guid'])
													->andWhere('email',Auth::User()->email)
															->update(array('shared_deleted' => '0_1'));
								if($update){
										return Response::json(array('response'=>'success'));
								}
							}
						}
					}
				}
			}
	}


	public function Rename($key,$renamedValue)
	{
		if(Functions::fName($renamedValue)=='True')
		{
			$LMongo = LMongo::connection();
			$Filedata=$LMongo->files->findOne(array('email'=>Auth::User()->email,'guid' => (string)$key),array("_id"=>0));
			if($Filedata)
			{
				if(Functions::fileExist($renamedValue,$Filedata['location']))
				{
					die(json_encode(array('error'=>'file exist')));
				}
				if(Functions::fileExist($Filedata['filename'],$Filedata['location']))
				{
					$location=Variables::UserDir().$Filedata['location'];
					/*
						Renaming File Name and then Database Filename Change
					*/
					if(rename($location.$Filedata['filename'], $location.$renamedValue))
					{

					$update=LMongo::collection('files')
										->where('guid', $key)
												->andWhere('email',Auth::User()->email)
														->update(array('filename' => $renamedValue));
					if($update){
					return Response::json(array('response'=>'success'));
								}
					}

				}

			}else
			{
				return Response::json(Error::nullFiles());
			}

		}else
		{
			return Response::json(array("error"=>Functions::fName($renamedValue)));
		}
	}


}