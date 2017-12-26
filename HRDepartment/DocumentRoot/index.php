<?php 
	include('C:/openserver/OpenServer/domains/HRDepartment/includes/src/config.php');
	session_start();
	if(!empty($_SESSION)){
		if($_SESSION['ip'] != null){
			if(time() - $_SESSION['lifetime'] > 10000){
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." session timeout - logout\n", FILE_APPEND);
				$_GET['action'] = "out";
			}
			if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']){
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." changed ip - logout\n", FILE_APPEND);
				$_GET['action'] = "out";
			}
			if($_SESSION['ua'] != $_SERVER['HTTP_USER_AGENT']){
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." changed user_agent - logout\n", FILE_APPEND);
				$_GET['action'] = "out";
			}
		}
		if($_SESSION['wait'] != null){
			if(time() - $_SESSION['wait'] > 100){
				$_SESSION['wait'] = null;
				unset($_GET);
			}
		}
	}
	if($_GET['action'] == null){
		$_GET['action'] = 5;
	}
	try {
		$connector = new Connector($host, $db, $user, $pass, $charset);
		if(is_numeric($_GET['action'])){
			if($_GET['action'] > 0 && $_GET['action'] <= 5){
				if($_GET['action'] != 5){
					$_SESSION['lifetime'] = time();
					$stmt = $connector->getPDO()->prepare('SELECT `id` FROM `roles` WHERE `name` = ?');
					$stmt->execute([$_SESSION['role']]);
					$row = $stmt->fetch(PDO::FETCH_BOTH);
					if(empty($row)){
						file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." error role ".$_SESSION['role']."\n", FILE_APPEND);
						$smarty->display('loginpage.tpl');
						exit;
					}else{
						$stmt = $connector->getPDO()->prepare('SELECT `id` FROM `permissons` WHERE `action_id` = ? &&`roles_id` = ?');
						$stmt->execute([$_GET['action'], $row[0]]);
						$row = $stmt->fetch(PDO::FETCH_BOTH);
						if(empty($row)){
							file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." uncorrected role for action_id = ".$_GET['action']."\n", FILE_APPEND);
							echo "<center>Вы не можете совершить данное действие</center>";
							exit;
						}
					}
				}
				$stmt = $connector->getPDO()->prepare('SELECT `name` FROM `actions` WHERE `id` = ?');
				$stmt->execute([$_GET['action']]);
				$row = $stmt->fetch(PDO::FETCH_BOTH);
				$class = $row[0];
				if($class != null){
					$action = new $class($connector->getPDO(), $smarty);
					$action->display();
				}else{
					file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." tried to commit a prohibite action ".$_GET['action']."\n", FILE_APPEND);
					unset($_GET);
					$smarty->display('loginpage.tpl');
				}
			}else{
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." tried to commit a prohibite action ".$_GET['action']."\n", FILE_APPEND);
				unset($_GET);
				$smarty->display('loginpage.tpl');
			}
		}else{
			destroy();
			$smarty->display('loginpage.tpl');
		}
	} catch (Exception $e) {
		file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." ".$e->getMessage()."\n", FILE_APPEND);
		die('<center>Произошел сбой. Перезагрузите страницу</center>');
	}
	$dbh = null;
	
	function destroy(){
		if($_SESSION['role'] != null)
			file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." user ".$_SESSION['role']." logout\n", FILE_APPEND);		
		session_unset();
		session_destroy();
		unset($_GET);
		unset($_POST);
	}
?>
 