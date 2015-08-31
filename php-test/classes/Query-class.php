<?php
		
	class Query
	{
		private $host;
		private $dbname;
		private $user;
		private $password;
		private $e;
		
		public function __construct()
		{
			try
			{
				$connect = new PDO('$this->("mysql:host=" . $this->host . ";dbname=" . $this->dbname;)', '$this->user', '$this->password', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(PDOException $e)
			{
            	$error = $e->getMessage();
       		}
		}
	}
?>