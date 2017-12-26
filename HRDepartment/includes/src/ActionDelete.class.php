<? 
	class ActionDelete{
		
		private $pdo;
		private $smarty;
		
		public function __construct($pdo, $smarty){
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		
		public function display(){
			if($_SESSION['role'] == "admin"){
				if(is_numeric($_GET['id'])){
					$stmt = $this->pdo->prepare('SELECT `name`,`patronymic`,`surname` FROM `workers` WHERE `id` = ?');
					$stmt->execute([$_GET['id']]);
					$row = $stmt->fetch();
					if(!empty($row)){
						$stmt = $this->pdo->prepare('DELETE FROM `workers` WHERE `id` = ?');
						$stmt->execute([$_GET['id']]);
						$body = 'Cотрудник ' . $row['name'] . " " . $row['patronymic'] . " " . $row['surname'] . "удален из базы.";
						$this->smarty->assign('body', $body);
						$this->smarty->display('actionDelete.tpl');
					}else{
						file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." delete error\n", FILE_APPEND);
						$this->smarty->assign('body', 'Индекс должен быть положительным числом');
					}
				}else{
					file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." delete error\n", FILE_APPEND);
					$this->smarty->assign('body', 'Индекс должен быть положительным числом');
				}
			}else{
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." delete access error\n", FILE_APPEND);
				$this->smarty->display('roleException.tpl');
			}
		}
	}
?>