<?php
	class LoginPassword{
		
		private $pdo;
		private $smarty;
		
		
		public function __construct($pdo, $smarty){
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		
		public function display(){
			if($_SESSION['ip'] == null){
				switch($_GET['step']){
					case 1:
						$this->checked($_POST['login'], $_POST['password']);
						break;
					case 2:
						$this->withoutPass();
						break;
					default:
						$this->smarty->display('loginpage.tpl');
						break;
				}
			}else{
				new Home($this->pdo, $this->smarty);
			}
		}
		
		private function checked($log, $pass){
			if($_SESSION['count'] == null){
				$_SESSION['count'] = 1;
			}
			if($_SESSION['count'] > 3){
				$_SESSION['wait'] = time();
				$this->smarty->display('loginpage.tpl');
				echo '<center>Превышено число попыток ввести пароль, надо подождать</center>';
				return;
			}
			$stmt = $this->pdo->prepare('SELECT `password` FROM `users` WHERE `login` = ?');
			$stmt->execute([$log]);
			$row = $stmt->fetch(PDO::FETCH_BOTH);
			if(empty($row)){
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." tried login\n", FILE_APPEND);
				unset($_GET);
				$_SESSION['count']++;
				$this->smarty->display('loginpage.tpl');
				echo "<center>Неправильный логин или пароль</center>";
				return;
			}else{
				if(password_verify($pass, $row[0])){
					$stmt = $this->pdo->prepare('SELECT `roles_id` FROM `users` WHERE `login` = ?');
					$stmt->execute([$log]);
					$row = $stmt->fetch(PDO::FETCH_BOTH);
					$stmt = $this->pdo->prepare('SELECT `name` FROM `roles` WHERE `id` = ?');
					$stmt->execute([$row[0]]);
					$row = $stmt->fetch(PDO::FETCH_BOTH);
					$_SESSION['role'] = $row[0];
					$_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
					$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
					$_SESSION['lifetime'] = time();
					file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." user login as ".$_SESSION['role']."\n", FILE_APPEND);
					new Home($this->pdo, $this->smarty);
				}else{
					file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." tried login\n", FILE_APPEND);
					$_SESSION['count']++;
					unset($_GET);
					$this->smarty->display('loginpage.tpl');
					echo "<center>Неправильный логин или пароль</center>";
					return;
				}
			}
		}
		private function withoutPass(){
			if($_SESSION['wait'] == null){
				$_SESSION['role'] = "user";
				$_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
				$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['lifetime'] = time();
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." user login without password\n", FILE_APPEND);
				new Home($this->pdo, $this->smarty);
			}else{
				$this->smarty->display('loginpage.tpl');
				echo '<center>Превышено число попыток ввести пароль, надо подождать</center>';
				return;
			}
		}
	}
?>