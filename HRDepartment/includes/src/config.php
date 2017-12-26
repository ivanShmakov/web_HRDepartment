<?
	include('C:/openserver/OpenServer/domains/HRDepartment/includes/src/ActionEdit.class.php');
	include('C:/openserver/OpenServer/domains/HRDepartment/includes/src/ActionDelete.class.php');
	include('C:/openserver/OpenServer/domains/HRDepartment/includes/src/ActionAdd.class.php');
	include('C:/openserver/OpenServer/domains/HRDepartment/includes/src/LoginPassword.php');
	include('C:/openserver/OpenServer/domains/HRDepartment/includes/src/Connector.class.php');
	include('C:/openserver/OpenServer/domains/HRDepartment/includes/src/ActionShow.class.php');
	include('C:/openserver/OpenServer/domains/HRDepartment/includes/src/Home.php');
	define('SMARTY_DIR', 'C:/openserver/OpenServer/modules/php/smarty-3.1.30/libs/');
	require_once(SMARTY_DIR . 'Smarty.class.php');
	$smarty = new Smarty();
	$smarty->template_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/tpl/';
	$smarty->compile_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/templates_c/';
	$smarty->config_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/configs/';
	$smarty->cache_dir = 'C:/openserver/OpenServer/domains/HRDepartment/includes/smarty/cache/';
	$host = '127.0.0.1';
	$db   = 'HRDepartmentDB';
	$user = 'root';
	$pass = '';
	$charset = 'cp1251';
	$logfile = "C:\\openserver\\OpenServer\\domains\\HRDepartment\\.log";	
	global $logfile;
?>