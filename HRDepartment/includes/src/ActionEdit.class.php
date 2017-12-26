<? 
	class ActionEdit{
		
		private $pdo;
		private $smarty;
		
		public function __construct($pdo, $smarty){
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		
		public function display(){
			if($_SESSION['role'] == "admin" || $_SESSION['role'] == "moder"){
				if($_GET['step'] == 0){
					if(is_numeric($_GET['id'])){
						$stmt = $this->pdo->prepare('SELECT * FROM `workers` WHERE `id` = ?');
						$stmt->execute([$_GET['id']]);
						$row = $stmt->fetch();
						$this->smarty->assign('name',$row['name']);
						$this->smarty->assign('patronymic',$row['patronymic']);
						$this->smarty->assign('surname',$row['surname']);
						$this->smarty->assign('data_add',$row['employment_data']);
						$this->smarty->assign('data_remove',$row['date_of_dismissal']);
						$this->smarty->assign('phone',$row['phone']);
						$this->smarty->assign('salary',$row['salary']);
						$stmt = $this->pdo->prepare('SELECT * FROM `departments`');
						$stmt->execute([]);
						$departments = "<option value= null>Выберите отдел</option>";
						while($row = $stmt->fetch(PDO::FETCH_BOTH)){
							$departments = $departments . "<option value=" . $row[0] . ">" . $row[1] . "</option>";
						}
						$stmt = $this->pdo->prepare('SELECT * FROM `positions`');
						$stmt->execute([]);
						$positions = "<option value= null>Выберите должность</option>";
						while($row = $stmt->fetch(PDO::FETCH_BOTH)){
							$positions = $positions . "<option value=". $row[0] . ">" . $row[1] . "</option>";
						}
						$stmt = $this->pdo->prepare('SELECT * FROM `branchs`');
						$stmt->execute([]);
						$branchs = "<option value= null>Выберите филиал</option>";
						while($row = $stmt->fetch(PDO::FETCH_BOTH)){
							$branchs = $branchs ."<option value=". $row[0] . ">" . $row[1] . "</option>";
						}
						$stmt = $this->pdo->prepare('SELECT * FROM `banks`');
						$stmt->execute([]);
						$banks = "<option value = null>Выберите банк</option>";
						while($row = $stmt->fetch(PDO::FETCH_BOTH)){
							$banks = $banks ."<option value=". $row[0] . ">" . $row[1] . "</option>";
						}
						$this->smarty->assign('departments',$departments);
						$this->smarty->assign('positions',$positions);
						$this->smarty->assign('branchs',$branchs);
						$this->smarty->assign('banks',$banks);
						$this->smarty->assign('id',$_GET['id']);
					}
					$this->smarty->display('actionEdit.tpl');
				}else{
					$this->actionEdit();
				}
			}else{
				file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." edit access error\n", FILE_APPEND);
				$this->smarty->display('roleException.tpl');
			}
		}
		
		private function actionEdit(){
			if($_SESSION['role'] == "admin" || $_SESSION['role'] == "moder"){
				if(count($_POST) > 1){
					if($_POST['name'] != null){
						$smtm = $this->pdo->prepare("UPDATE `workers` SET `name` = ? WHERE `id` = ?");
						$smtm->execute([$_POST['name'],$_GET['id']]);
					}
					if($_POST["patronymic"] != null){
						$this->pdo->prepare("UPDATE `workers` SET `patronymic` = ? WHERE `id` = ?");
						$smtm->execute([$_POST['patronymic'],$_GET['id']]);
					}
					if($_POST["surname"] != null){
						$this->pdo->prepare("UPDATE `workers` SET `surname` = ? WHERE `id` = ?");
						$smtm->execute([$_POST['surname'],$_GET['id']]);
					}
					if($_POST["departmnent_name"] != null && $_POST["departmnent_name"] != "null" && is_numeric($_POST["departmnent_name"])){
						$this->pdo->prepare("UPDATE `workers` SET `department_id` = ? WHERE `id` = ?");
						$smtm->execute([$_POST['departmnent_name'],$_GET['id']]);
					}
					if($_POST["position_name"] != null && $_POST["position_name"] != "null" && is_numeric($_POST["position_name"])){
						$this->pdo->prepare("UPDATE `workers` SET `position_id` = ? WHERE `id` = ?");
						$smtm->execute([$_POST['position_name'],$_GET['id']]);
					}
					if($_POST["branch_name"] != null && $_POST["branch_name"] != "null" && is_numeric($_POST["branch_name"])){
						$this->pdo->prepare("UPDATE `workers` SET `branch_id` = ? WHERE `id` = ?");
						$smtm->execute([$_POST['branch_name'],$_GET['id']]);
					}
					if($_POST["bank_name"] != null && $_POST["bank_name"] != "null" && is_numeric($_POST["bank_name"])){
						$this->pdo->prepare("UPDATE `workers` SET `bank_id` = ? WHERE `id` = ?");
						$smtm->execute([$_POST['bank_name'],$_GET['id']]);
					}
					if($_POST["salary"] != null && is_numeric($_POST["salary"])){
						$this->pdo->prepare("UPDATE `workers` SET `salary` = ? WHERE `id` = ?");
						$smtm->execute([$_POST["salary"],$_GET['id']]);
					}
					if($_POST["phone"] != null){
						$this->pdo->prepare("UPDATE `workers` SET `phone` = ? WHERE `id` = ?");
						$smtm->execute([$_POST['phone'],$_GET['id']]);
					}
					file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." user ".$_SESSION['role']." edit worker id=".$id."\n", FILE_APPEND);
					$this->smarty->display('actionEditDone.tpl');
				}else{
					file_put_contents($GLOBALS['logfile'], date(DATE_RFC822)." ".$_SERVER['REMOTE_ADDR']." edit error\n", FILE_APPEND);
					echo "Произошла ошибка";
				}
			}
		}
	}
?>