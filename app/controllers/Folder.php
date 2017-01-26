<?php

//Uplaoder Controller
class Folder extends BaseController
{
	private $filedir;
	public  $cloud_dir;
	public  $userdir;

	public function foldercheck($foldername=null)
	{
		//Validation function for foldername
		if(Functions::validateFolder(Input::get('foldername'))==='True'){

			$foldername=Input::get('foldername');
			$this->filedir=Session::get('filedir');
			$this->cloud_dir=Variables::BaseDir();
			$this->userdir=Variables::BaseDir().Auth::user()->email.$this->filedir;
			$this->filelocation=$this->userdir.$foldername;
			return self::createFolder($foldername);
		}
		else
		{
				return Response::json(Error::invalidFiles());
		}

	}

	public function createFolder($foldername)
	{

		if(file_exists($this->userdir.$foldername))
		{
			return 0;
		}else
		{
			if(mkdir($this->filelocation, 0777))
			{

				$this->filename=$foldername;

				$this->uuid=hash('gost',$this->filename.'|'.microtime()).'-'.API::guid().'-'.md5(microtime().$this->filename);

				$this->date_time=getenv("REMOTE_ADDR").' | '.date('d F Y').' | '.$_SERVER['HTTP_USER_AGENT'];

				$this->guid=Functions::recursiveGUID();

				//$this->level=$this->filedir=='/' ? 0 : substr_count($this->filedir, '/')-2;

				$this->location=$this->filedir;

				$this->folder=$this->filedir=='/' ?  '/' : substr($this->filedir,strrpos($this->filedir,'/',-2)+1,-1);

				$this->Structure=array
				(
					'filename'=>$this->filename,
					'email'=>Auth::user()->email,
					'uuid'=>$this->uuid,
					'guid'=>$this->guid,
					'type'=>'folder',
					'date_time'=>$this->date_time,
					'shared_deleted'=>"0"."_"."0",
					'location'=>$this->location,
					'folder'=>$this->folder,
				);
				$Update=LMongo::collection('files')->insert(
											$this->Structure
  													    );
	  			if($Update)
	  			{
		  			return 1;
	  			}

			}

		}


	}
}