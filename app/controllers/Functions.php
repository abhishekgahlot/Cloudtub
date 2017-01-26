<?php

//Functions Controller
class Functions extends BaseController
{

	/*
		Database Rest Functions
	*/
	public static function usedSize($email=false)
	{
		 $data=LMongo::collection('files')->where('email',(string)Auth::user()->email)->get();
		 $size=0;
	    foreach($data as $d)
	    {
	   		 if(isset($d['size']))
	    	{
	    	$size+=$d['size'];
	    	}
	    }
    	return $size;
	}
	public static function renameFile($filename,$location,$type=false)
	{
		$Counter=1;

		$path_parts = pathinfo($filename);
			 if($type!=='folder')
			{

			 $renamedfilename=$path_parts['filename'].'.'.pathinfo($filename, PATHINFO_EXTENSION);
			}else
			{
			 $renamedfilename=$path_parts['filename'];
			 }

		$extension =  pathinfo($filename, PATHINFO_EXTENSION);

		$basefile=$path_parts['filename'];

		while (file_exists( Variables::UserDir().$location.$renamedfilename))
		{
			if(is_file(Variables::UserDir().$location.$renamedfilename))
			{
			  $renamedfilename = $basefile.'-recovered' . '-' . $Counter++ . '.' . $extension;
			}else
			{

			 $renamedfilename = $basefile.'-recovered' . '-' . $Counter++ ;
			}
		}

		return $renamedfilename;

	}

	public static function getMime($file)
	{
		$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
		$mime = finfo_file($finfo, $file);
		finfo_close($finfo);
		return $mime;
	}

	public static function recursiveGUID()
	{
		$guid=API::guid();
		$LMongo = LMongo::connection();
		$DBID=$LMongo->files->find(array('guid' => $guid),array("guid"=>1,"_id"=>0))->count();
		if($DBID==1)
		{
			self::recursiveGUID();
		}
		return $guid;
	}

	public static function validateFolder($foldername)
	{
		$data = array('foldername'=>$foldername);
		$rules = array
	     	(
	     	'foldername' => 'foldername',
			);
		$validator = Validator::make($data, $rules);
		if ($validator->passes())
		{
			return 'True';
		}
		else
		{
			$messages = $validator->messages();
			return $messages->first();
		}
	}

	public static function folderPath($path)
	{
		 return strpbrk($path,"\\?*:|#\"<>") ? Error::invalidFiles()['error'] : 'True';
	}

	public static function fName($file)
	{
				 return strpbrk($file,"/\\?*:|#\"<>") ? Error::invalidFiles()['error'] : 'True';
	}


	//this is when we need to strip out file location and can have backslash but dont allow ../
	public static function filename($file)
	{
				 if (strpos($file,'../') !== false)
				 {
					 return  Error::invalidFiles()['error'];
				 }
				 return strpbrk($file,"\\?*:|#\"<>") ? Error::invalidFiles()['error'] : 'True';
	}


	public static function fileExist($file,$location)
	{
		return file_exists(Variables::UserDir().$location.$file) ? true : false;

	}

	public static function fileDB($email,$filename,$location)
	{
		$LMongo = LMongo::connection();
		$get=$LMongo->files->findOne(array(
		'email'=>(string)$email,
		'filename'=>(string)$filename,
		'location'=>(string)$location
		),
		array('_id'=>0,'uuid'=>0)
		);
		return $get ? $get : 'null';
	}

	public static function codeType($filepath)
	{
		/*
		I am not sure it will be good idea but i am doing it, So first check extension of file and check text as mime only
		If its true then we will kick ass and output code as extension based whatever.
		*/
		$valid_Ext=array(
						'css','php','js','rb','txt','py','coffee','cpp','c','sql','html','pl','sh','less'
						);
		if(strpos(self::getMime($filepath),'text/') !== false)
		{
			if(in_array(File::extension($filepath), $valid_Ext)){
				$ext=File::extension($filepath);
				if(File::extension($filepath)=='py'){
					$ext='python';
				}

				return array("code"=>$ext);
			}else
			{
				return "downloadable";
			}
		}
	}

	public static function viewableImage($filepath)
	{
		$valid_Ext=array('png','jpeg','jpg','bmp','gif');

		if(getimagesize($filepath))
		{
			if(strpos(self::getMime($filepath),'image/') !== false&&in_array(File::extension($filepath), $valid_Ext))
			{
				return 'image';
			}else
			{
				return "downloadable";
			}
		}else
		{
				return null;
		}
	}
}