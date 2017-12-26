<?php 
	class Connector { 
		private $dbh;
		
		public function __construct($host, $db, $user, $pass, $charset) {
			$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
			$opt = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES cp1251'
			];
			try{
				$this->dbh = new PDO($dsn, $user, $password, $opt);
			}catch (PDOException $e) {
				die('Подключение не удалось: ' . $e->getMessage());
			}
		}
		
		public function getPDO(){
			return $this->dbh;
		}
	}       
?>