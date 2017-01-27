<?php

ini_set( "display_errors", 1);



class DbConnection{

	static protected $_instance;

	protected $db = null;

	final protected function __construct()
	{
		$m = new Mongo("mongodb://darky:darkshadow321123@paulo.mongohq.com:10019/cloudtub");
		$this->db = $m->cloudtub->subscribers;
	}

	static public function getInstance() {
		if (!(self::$_instance instanceof self))
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function getConnection()
	{
		return $this->db;
	}

	final protected function __clone() { }
}




if(isset($_POST['email'])){

$mail=htmlentities($_POST['email']);

$db=DbConnection::getInstance()->getConnection();

if(!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL )){
	die('Enter Valid Email');

}

	if($db->find(array("email"=>$mail))->count()==1)
	{
		echo 'You are Already Subscribed';
	}
	else
	{
		if($db->insert(array("email"=>$mail))){

			echo 'Thank You For Your Subscription!';

		}

	}

}