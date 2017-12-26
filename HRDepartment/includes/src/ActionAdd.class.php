<? 
	class ActionAdd{
		
		private $pdo;
		private $smarty;
		
		public function __construct($pdo, $smarty){
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		
		public function display(){
			if($_SESSION['role'] == "admin"){
				if($_GET['step'] == 0){
					$stmt = $this->pdo->prepare('SELECT * FROM `departments`');
					$stmt->execute([]);
					$departments = "<option value= null>Выберите отдел</option>";
					while($row = $stmt->fetch(PDO::FETCH_BOTH)){
						$departments = $departments . "<option value=" . $row[0] . "\">" . $row[1] . "</option>";
					}
					$stmt = $this->pdo->prepare('SELECT * FROM `positions`');
					$stmt->execute([]);
					$positions = "<option value= null>Выберите должность</option>";
					while($row = $stmt->fetch(PDO::FETCH_BOTH)){
						$positions = $positions . "<option value=". $row[0] . "\">" . $row[1] . "</option>";
					}
					$stmt = $this->pdo->prepare('SELECT * FROM `branchs`');
					$stmt->execute([]);
					$branchs = "<option value= null>Выберите филиал</option>";
					while($row = $stmt->fetch(PDO::FETCH_BOTH)){
						$branchs = $branchs ."<option value=". $row[0] . "\">" . $row[1] . "</option>";
					}
					$stmt = $this->pdo->prepare('SELECT * FROM `banks`');
					$stmt->execute([]);
					$banks = "<option value = null>Выберите банк</option>";
					while($row = $stmt->fetch(PDO::FETCH_BOTH)){
						$banks = $banks ."<option value=". $row[0] . "\">" . $row[1] . "</option>";
					}
					
					$this->smarty->assign('departments',$departments);
					$this->smarty->assign('positions',$positions);
					$this->smarty->assign('branchs',$branchs);
					$this->smarty->assign('banks',$banks);
					$this->smarty->display('actionAdd.tpl');
				}else{
					$name = $_POST["name"];
					$patronymic = $_POST["patronymic"];
					$surname = $_POST["surname"];
					$dep_id = $_POST["departmnent_name"];
					$pos_id = $_POST["position_name"];
					$branch_id = $_POST["branch_name"];
					$bank_id = $_POST["bank_name"];
					$salary = $_POST["salary"];
					$phone = $_POST["phone"];			
					if($name != null && $patronymic != null && $surname != null && $dep_id != null && $dep_id != "null" && $pos_id != null && $pos_id != "null" && $branch_id != null && $branch_id != "null" && $bank_id != null && $bank_id != "null" && $salary != null){
						$stmt = $this->pdo->prepare("INSERT INTO `workers` (`name`, `surname`, `patronymic`, `branch_id`, `department_id`, `position_id`,`bank_id`, `employment_data`, `salary`, `phone`) values('$name','$patronymic', '$surname','$branch_id', '$dep_id', '$pos_id','$bank_id', NOW(), '$salary', '$phone')");	
						$stmt->execute([]);
						file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']."user ".$_SESSION['role']." added ". $name." ".$surname.".\n", FILE_APPEND);
						$this->smarty->display('actionAddDone.tpl');
					}else{
						file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']."user ".$_SESSION['role']." added error\n", FILE_APPEND);
						echo "<br><br>Ошибка! Правильно заполните поля!";
					}
				}
			}else{
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." add access error\n", FILE_APPEND);
				$this->smarty->display('roleException.tpl');
			}
		}
	}
?>