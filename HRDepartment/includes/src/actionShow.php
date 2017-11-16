<? 
include('C:/openserver/OpenServer/domains/HRDepartment/includes/src/Connector.class.php');                                      
define('SMARTY_DIR', 'C:/openserver/OpenServer/modules/php/smarty-3.1.30/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/tpl/';
$smarty->compile_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/templates_c/';
$smarty->config_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/configs/';
$smarty->cache_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/cache/';
$table = "<table border=2><th> id </th><th> Имя </th><th> Отчество </th><th> Фамилия </th><th> Филиал </th><th> Отдел </th><th> Должность </th><th> Банк </th><th> Дата приема </th><th> Дата увольнения </th><th> Зарплата </th><th> Контактный номер </th><tr>";
	$post = $_POST['id'];
	if(is_numeric($post)){
		$host = '127.0.0.1';
		$db   = 'HRDepartmentDB';
		$user = 'root';
		$pass = '';
		$charset = 'cp1251';
		$connector = new Connector($host, $db, $user, $pass, $charset);
		$stmt = $connector->getPDO()->prepare('SELECT * FROM `workers` WHERE `id` = ?');
		$stmt->execute([$post]);
		
		$row = $stmt->fetch(PDO::FETCH_BOTH);
		if(empty($row)){
			$smarty->assign('body', 'Такого работника не существует');
		}else{
			for($i = 0; $i < count($row)/2; $i++){
				switch($i){
					case 4: 
						$stmt = $connector->getPDO()->prepare('SELECT `name`,`location` FROM `branchs` WHERE `id` = ?');
						$stmt->execute([$row[$i]]);
						$branch = $stmt->fetch(PDO::FETCH_BOTH);
						$table = $table . "<td>" . $branch[0] . ", " . $branch[1] . "</td>";
						break;
					case 5: 
						$stmt = $connector->getPDO()->prepare('SELECT `department_name` FROM `departments` WHERE `id` = ?');
						$stmt->execute([$row[$i]]);
						$department = $stmt->fetch(PDO::FETCH_BOTH);
						$table = $table . "<td>" . $department[0] . "</td>";
						break;
					case 6: 
						$stmt = $connector->getPDO()->prepare('SELECT `position_name` FROM `positions` WHERE `id` = ?');
						$stmt->execute([$row[$i]]);
						$position = $stmt->fetch(PDO::FETCH_BOTH);
						$table = $table . "<td>" . $position[0] . "</td>";
						break;
					case 7: 
						$stmt = $connector->getPDO()->prepare('SELECT `bank_name` FROM `banks` WHERE `id` = ?');
						$stmt->execute([$row[$i]]);
						$bank = $stmt->fetch(PDO::FETCH_BOTH);
						$table = $table . "<td>" . $bank[0] . "</td>";
						break;	
					default:
						$table = $table . "<td>" . $row[$i] . "</td>";
				}
			}
			$table = $table . "</tr> </table><br> <a href = \"http://hrdepartment/\"> Изменение информации о работнике </a><br>";
			$smarty->assign('body', $table);
		}
	}else{
		$smarty->assign('body', 'Индекс должен быть положительным числом');
	}
	$smarty->display('actionShow.tpl');
?>