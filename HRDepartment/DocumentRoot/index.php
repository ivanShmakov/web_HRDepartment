<?php
include('C:/openserver/OpenServer/domains/HRDepartment/includes/src/Connector.class.php');
define('SMARTY_DIR', 'C:/openserver/OpenServer/modules/php/smarty-3.1.30/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/tpl/';
$smarty->compile_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/templates_c/';
$smarty->config_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/configs/';
$smarty->cache_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/cache/';

	try {	
		$host = '127.0.0.1';
		$db   = 'HRDepartmentDB';
		$user = 'root';
		$pass = '';
		$charset = 'cp1251';
		$connector = new Connector($host, $db, $user, $pass, $charset);

		$stmt = $connector->getPDO()->query("SELECT `id`, `name`, `surname`, `patronymic` FROM `workers`");
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $stmt->fetch())
		{
			$body = $body . "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['patronymic'] . "</td><td>" .$row['surname']. "</td></tr>";
		}
		$smarty->assign('body', $body);
		$smarty->display('index.tpl');
	
	} catch (Exception $e) {
		die('Произошла ошибка' . $e->getMessage());
	}
	$dbh = null;
?>
 