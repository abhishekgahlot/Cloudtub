<?php

//Files Controller
class Files extends BaseController
{

	public static function showThumb($file)
	{
		$location=Variables::ThumbDir().$file;
		if(file_exists($location))
		{
		$mime=Functions::getMime($location);
		header('Content-Type:'.$mime);
		return readfile($location);
		}
		elseif($file=='folder.png')
		{
			$location=Variables::folderImg().'folder.png';
			$mime=Functions::getMime($location);
			header('Content-Type:'.$mime);
			return readfile($location);
		}
		else if($file=='file.png')
		{
			$location=Variables::folderImg().'file.png';
			$mime=Functions::getMime($location);
			header('Content-Type:'.$mime);
			return readfile($location);
		}
		else if($file=='download.png')
		{
			$location=Variables::folderImg().'download.png';
			$mime=Functions::getMime($location);
			header('Content-Type:'.$mime);
			return readfile($location);
		}
		else if($file=='picture.png')
		{
			$location=Variables::folderImg().'picture.png';
			$mime=Functions::getMime($location);
			header('Content-Type:'.$mime);
			return readfile($location);
		}
		else if($file=='audio.png')
		{
			$location=Variables::folderImg().'audio.png';
			$mime=Functions::getMime($location);
			header('Content-Type:'.$mime);
			return readfile($location);
		}
		else if($file=='film.png')
		{
			$location=Variables::folderImg().'film.png';
			$mime=Functions::getMime($location);
			header('Content-Type:'.$mime);
			return readfile($location);
		}
		else
		{
			return Error::x404();
		}

	}


	/*
	  getFiles just fetches data from database and doesn't do anything else.No contact with outside.
	*/
	public static function getFiles($email=false,$folder='/',$count=1,$limit=false,$deleted=false)
	{
		if($folder==false)
		{
			$folder=array('$exists' => true);

		}else{

			$folder=(string)$folder;
		}
		if($limit==false)
		{
			$limit=15;
		}
		if($deleted==true)
		{
			$deleted='0_1';
		}else if($deleted==false)
		{
			$deleted='0_0';
		}

		if($count<0||$count==0){

			$count=1;
		}
		if($count==1)
		{
			$count=0;
		}else
		{
			$count=($count-1)*15;
		}

		$LMongo = LMongo::connection();

		$get=$LMongo->files->find(
								array('email'=>(string)$email,'location'=>$folder,'shared_deleted'=>(string)$deleted),
								array('filename' => 1,
								'size' => 1,
								'type'=>1,
								'thumb'=>1,
								'_id'=>0,
								"location"=>1,
								"guid"=>1,
								"uuid"=>1
								))->skip((string)$count)->limit($limit);
		return $get;
	}


	/*
		showFiles uses handle files to show files.
	*/
	public static function showFiles($folder,$page)
	{
		if(base64_decode($folder)==='/')
		{
			Session::put('filedir','/');
			$files=self::getFiles(Auth::user()->email,'/',$page);
			return self::handleFiles($files);
		}
		else
		{
			if(is_array(self::fileExist($folder))&&array_key_exists('folder',self::fileExist($folder)))
			{
					$folder=self::fileExist($folder)['folder'];
				                if(Session::get('filedir') != $folder)
							 	{
							 		//Folder Verified , So session is started
								 	Session::put('filedir',$folder);
								 	$files=self::getFiles(Auth::user()->email,$folder,$page);
								 	return self::handleFiles($files);

							 	}else if(Session::get('filedir') == $folder)
							 	{	//request for same folder no session update
								 	$files=self::getFiles(Auth::user()->email,$folder,$page);
								 	return self::handleFiles($files);

							 	}
			}else
			{
				if(self::fileExist($folder)==='null')
				{
				  return Response::json(Error::nullFiles());
				}
				else if(self::fileExist($folder)==='invalid')
				{
					return Response::json(Error::invalidFiles());
				}

			}

		}
	}


	/*
		Check if folder exist and is present in database too.
		Then return true.
	*/
	public static function fileExist($folder,$base64=true)
	{
			$basefolder=base64_decode($folder);

			$folder=str_replace('../','',$folder);
			if($base64==true)
			{
				$folder=str_replace('../','',base64_decode($folder));
			}
			$folder=preg_replace('~/+~', '/', '/'.$folder);

			//if folderpath is invalid, Then kick user out
			if(Functions::folderPath($folder)==='True')
			{
					/*
						check folder exist in dir and database both
					*/
					if(file_exists(Variables::UserDir().$folder))
					{
					    $LMongo=LMongo::connection();

						$FolderDB = $LMongo->files->find(
						array('email' => (string)Auth::user()->email,
								'type'=>'folder'));


						/*
						check if database value exist
						*/
						foreach($FolderDB as $F)
						{
							if($F['location'].$F['filename'].'/'===$folder)
							{
									return $folder=array('folder'=>$folder);
							}
						}

					}else
					{
						return 'null';
					}

			}else
			{
				return 'invalid';
			}
	}

	public static function handleFiles($files,$deleted=false)
	{
		foreach($files as $file)
		{
			if(!empty($file))
			{

			$file['key'] = 'view'.$file['location'].$file['filename'];
			$loc=$file['location'];
			unset($file['location']);

			/*
			  Add thumbnail to images
			*/
			if(!empty($file['thumb']))
			{
				//check if thumbnail exist if not give a default one.
				if(file_exists(Variables::ThumbDir().$file['thumb'].'_200X150_.png'))
				{
					$file['thumb']=$file['thumb'].'_200X150_.png';
				}else
				{
					$file['thumb']='picture.png';
				}
			}

			/*
				Uses Switch to add thumbnail to file
			*/

			switch ($file['type'])
			{
				case 'folder':
					$file['thumb']='folder.png';
					$file['key']='files'.$loc.$file['filename'];
					break;

				default:
					empty($file['thumb']) ? $file['thumb']='file.png' : null;
					break;

			}
			/*
			Adding Direct url to array
			*/
			$direct_data=array("time"=>time(),"uid"=>$file['uuid']);
			$file['direct_access']=Crypt::encrypt($direct_data);
			unset($file['uuid']);

			/*
				Filling Up array with overridden data
			*/
			$Array[]=$file;
			}
		}
		if(!empty($Array))
		{
			return Response::json($Array);
		}
		else
		{
			return Response::json(array('error'=>'file'));
		}

	}

	public static function session()
	{

		/*$f = '/mnt/cloud/abhishekgahlot007@gmail.com';
  $io = popen('/usr/bin/du -sb '.$f, 'r');
    $size = intval(fgets($io,80));
    pclose($io);
    return $size;*/


	}
}