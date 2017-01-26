<?php
//Uplaoder Controller
class Uploader extends BaseController
{
	private $filename;
	private $filetype;
	private $filesize;
	private $file_error;
	private $filetmp;
	public  $filedir;
	public  $cloud_dir;
	public  $userdir;
	public  $thumbdir;
	public  $filelocation;
	public $maxsize;

	public function __construct()
	{
		//Define files array
		$this->filename=$_FILES['file']['name'];
		$this->filetype=$_FILES['file']['type'];
		$this->filetmp=$_FILES['file']['tmp_name'];
		$this->file_error=$_FILES['file']['error'];
		$this->filesize=$_FILES['file']['size'];
		$this->filedir=Session::get('filedir');
		$this->cloud_dir=Variables::BaseDir();
		$this->userdir=Variables::UserDir().$this->filedir;
		$this->thumbdir=Variables::ThumbDir();
		$this->maxsize=2147483648;
		//File name overrides
		$this->filename=$this->fileRename(self::renameIntelligent($this->filename));
		$this->filelocation=$this->userdir.$this->filename;
		$this->file_email=Auth::user()->email;

		//Define Few properties
		$this->Structure=array(
			'filename'=>'',
			'email'=>'',
			'uuid'=>'',
			'size'=>'',
			'type'=>'',
			'date_time'=>'',
			'shared_deleted'=>'',
			'location'=>'',
			'folder'=>'',
			'guid'=>''
		);

		//if no file uploaded
		if(empty($_FILES))
		{
			Error::file(404);
			exit;
		}

		//file error handling
		if($this->file_error)
		{
					Error::file($_FILES['file']['error']);
					exit;
		}

		//rare case filename is empty
		if($this->filename==''&&empty($this->filename))
		{
			Error::File('name');
			exit;
		}

		//filesize is equal to zero
		if($this->filesize==''&&empty($this->filesize))
		{
			Error::File('size');
			exit;
		}

		/*
		In some cases during registration, username folder is not created so it needs to be verified.If folder exists if not
		then create it with the help of session.
		*/
	}


	public function fileRename($filename)
	{

		$Counter=1;

		$path_parts = pathinfo($filename);

		if(strlen($path_parts['filename'])>100)
		{
			$path_parts['filename']=substr($path_parts['filename'], 0, 100);
		}

		$renamedfilename=$path_parts['filename'].'.'.pathinfo($filename, PATHINFO_EXTENSION);

		$extension =  pathinfo($filename, PATHINFO_EXTENSION);

		$basefile=$path_parts['filename'];

		while (file_exists( $this->userdir.$renamedfilename ))
		{
			$renamedfilename = $basefile . '-' . $Counter++ . '.' . $extension;
		}

		return $renamedfilename;


	}

	public function thumbnails($imagename,$imagepath,$pixels)
	{

		$path_parts = pathinfo($imagename);

	    $sha=sha1($imagename.'|'.microtime().'|');

	    $crc=crc32(microtime());

        $base_thumbname=$sha.'_'.API::guid().'_'.$crc;

        $im = new imagick( $imagepath );
                // pixel cache max size
        $im->setResourceLimit(imagick::RESOURCETYPE_MEMORY, 256);
        // maximum amount of memory map to allocate for the pixel cache
        $im->setResourceLimit(imagick::RESOURCETYPE_MAP, 256);
	    foreach($pixels as $pixel)
	    {
			    $filehashed=$base_thumbname.'_'.$pixel['x'].'X'.$pixel['y'].'_.'.'png';

			    $dir=$this->thumbdir.$filehashed;

				$im->cropThumbnailImage( $pixel['x'] , $pixel['y'] );

				$im->setImageFormat('png');

				$im->writeImage($dir);
		}
			$im->destroy();
			unset($im);
		    return $base_thumbname;
	}

	/*
		Scale image store shorter version of file to show in gallery or something.
	*/
	public function scaleImage($imagename,$imagepath)
	{
		$path_parts = pathinfo($imagename);

		$filename=$path_parts['filename'];

		$fileext="jpg";

		list($width, $height) = getimagesize($imagepath);
		//Find out ratio first
		$ratio=$width/$height;

		if($width>=1280)
		{
			$newWidth=1280;
		}else if($width>=1024)
		{
			$newWidth=1024;
		}else
		{
			$newWidth=$width;
		}

		$newHeight=$newWidth/$ratio;

		$newName=API::guid().'_'.sha1(microtime().$imagename).'.'.$fileext;

		$newimagepath=$this->thumbdir.$newName;

		$im = new imagick($imagepath);

		$im->scaleImage($newWidth, $newHeight);

		$im->setImageFormat('jpg');

		$im->setImageCompression(Imagick::COMPRESSION_JPEG);

		$im->setImageCompressionQuality(80);

		if($im->writeImage($newimagepath))
		{
			$im->destroy();
			unset($im);
			return $newName;
		}
	}

	public static function renameIntelligent($filename)
	{
		//These are not allowed characters \\?*:|\"<>

		if (strpos($filename,'/') !== false) {
			$filename=str_replace('/','',$filename);
			}
		if (strpos($filename,':') !== false) {
			$filename=str_replace(':','.',$filename);
			}
		if (strpos($filename,'?') !== false) {
			$filename=str_replace('?','',$filename);
			}
		if (strpos($filename,'*') !== false) {
			$filename=str_replace('*','',$filename);
			}
		if (strpos($filename,'|') !== false) {
			$filename=str_replace('|','',$filename);
			}
		if (strpos($filename,'\\') !== false) {
			$filename=str_replace('\\','',$filename);
			}
		if (strpos($filename,'"') !== false) {
			$filename=str_replace('"','',$filename);
			}
		if (strpos($filename,'<') !== false) {
			$filename=str_replace('<','(',$filename);
			}
		if (strpos($filename,'>') !== false) {
			$filename=str_replace('>',')',$filename);
			}
		return $filename;
	}

	public function Upload()
	{

		if($_POST['location']===''||Functions::filename($_POST['location'])!=='True')
	  	{
			$this->filedir='/';

	  	}else
	  	{
		  	/*
		  		Check if folder exist then start session or else not
		  	*/
		  	$_POST['location']=$_POST['location'].'/';
		  	if(is_array(Files::fileExist($_POST['location'],false))&&array_key_exists('folder',Files::fileExist($_POST['location'],false)))
			{
					$folder=Files::fileExist($_POST['location'],false)['folder'];
				    //I guess folder verified set uploading value as that folder
				    $this->filedir=$_POST['location'];
			}
	  	}
		/*
		Override Structure array and fill it!
		*/
		$this->Structure['filename']=$this->filename;

		$this->Structure['email']=$this->file_email;

		$this->Structure['uuid']=hash('gost',$this->filename.'|'.microtime()).'-'.API::guid().'-'.md5(microtime().$this->filename);

		$this->Structure['size']=$this->filesize;

		$this->Structure['date_time']=getenv("REMOTE_ADDR").' | '
	  		.date('d F Y').' | '.$_SERVER['HTTP_USER_AGENT'];

	  	$this->Structure['shared_deleted']="0"."_"."0";

	  //	$this->Structure['level']=substr_count($this->filedir, '/')-1;

	  	$this->Structure['location']=$this->filedir;

	  	$this->Structure['folder']=$this->filedir=='/' ? '/' : substr($this->filedir,strrpos($this->filedir,'/',-2)+1,-1);

	  	$this->Structure['guid']=Functions::recursiveGUID();


	  	//If User exceed File Size Error
	  	if(Functions::usedSize()>$this->maxsize)
	  	{

	  	return Response::json(array('error'=>'File Limit Exceeded.'));
	  	exit;

	  	}


		if(move_uploaded_file($this->filetmp, $this->filelocation))
		{
			$mime = Functions::getMime($this->filelocation);

			$this->Structure['type']=$mime;

			if(!empty(getimagesize($this->filelocation)))
			{
				$pixels=array(
				array('x'=>'200','y'=>'150'),
				array('x'=>'150','y'=>'150'),
				);

				//Create Thumbnails
				$this->Structure['thumb']=$this->thumbnails($this->filename,
															$this->filelocation,
															$pixels);
				//Scale Image and store
				$this->Structure['scaled']=$this->scaleImage($this->filename,$this->filelocation);

				$this->Structure['type']='image';

			}

			$Update=LMongo::collection('files')->insert(
											$this->Structure
  													   );
  			if($Update)
  			{
	  			return Response::json(array('success'=>'true'));

  			}
  			else
  			{
	  			return Response::json(array('error'=>'Something Happened'));
  			}

		}
	}


}