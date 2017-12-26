<? 
	class ActionShow{
		
		private $pdo;
		private $smarty;
		
		public function __construct($pdo, $smarty){
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		public function display(){			
			if(is_numeric($_GET['id'])){
				$page = $this->createTable();
				if($_SESSION['role'] == "admin" || $_SESSION['role'] == "moder"){
					$page = $page."<a href = '/?action=2&id=".$_GET['id']."'> Изменение информации о работнике </a><br>";
				}
				$this->smarty->assign('body', $page);
			}else{
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." show id=".$_GET['id']." error\n", FILE_APPEND);
				$this->smarty->assign('body', 'Индекс должен быть положительным числом');
			}
			$this->smarty->display('actionShow.tpl');
		}
		
		public function createTable(){
			$table = "<table border=2><th> id </th><th> Имя </th><th> Отчество </th><th> Фамилия </th><th> Филиал </th><th> Отдел </th><th> Должность </th><th> Банк </th><th> Дата приема </th><th> Дата увольнения </th><th> Зарплата </th><th> Контактный номер </th><tr>";
			$stmt = $this->pdo->prepare('SELECT * FROM `workers` WHERE `id` = ?');
			$stmt->execute([$_GET['id']]);
			$row = $stmt->fetch(PDO::FETCH_BOTH);
			if(empty($row)){
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." show id=".$_GET['id']." error\n", FILE_APPEND);
				new Home($this->pdo, $this->smarty);
				return "Такого работника не существует<br>";
			}else{
				for($i = 0; $i < count($row)/2; $i++){
					switch($i){
						case 4: 
							$stmt = $this->pdo->prepare('SELECT `location` FROM `branchs` WHERE `id` = ?');
							$stmt->execute([$row[$i]]);
							$branch = $stmt->fetch(PDO::FETCH_BOTH);
							$table = $table . "<td>" . $branch[0]  . "</td>";
							break;
						case 5: 
							$stmt = $this->pdo->prepare('SELECT `department_name` FROM `departments` WHERE `id` = ?');
							$stmt->execute([$row[$i]]);
							$department = $stmt->fetch(PDO::FETCH_BOTH);
							$table = $table . "<td>" . $department[0] . "</td>";
							break;
						case 6: 
							$stmt = $this->pdo->prepare('SELECT `position_name` FROM `positions` WHERE `id` = ?');
							$stmt->execute([$row[$i]]);
							$position = $stmt->fetch(PDO::FETCH_BOTH);
							$table = $table . "<td>" . $position[0] . "</td>";
							break;
						case 7: 
							$stmt = $this->pdo->prepare('SELECT `bank_name` FROM `banks` WHERE `id` = ?');
							$stmt->execute([$row[$i]]);
							$bank = $stmt->fetch(PDO::FETCH_BOTH);
							$table = $table . "<td>" . $bank[0] . "</td>";
							break;	
						default:
							$table = $table . "<td>" . $row[$i] . "</td>";
					}
				}
				$table = $table . "</tr> </table><br>";
			}
			return $table;
		}
	}		
?>