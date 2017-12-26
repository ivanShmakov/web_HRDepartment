<?php
/* Smarty version 3.1.30, created on 2017-12-18 10:42:24
  from "C:\openserver\OpenServer\domains\HRDepartment\includes\smarty\tpl\loginpage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a37716065e039_24015927',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f18d29a262d96193489d0a328348013be3c9e89e' => 
    array (
      0 => 'C:\\openserver\\OpenServer\\domains\\HRDepartment\\includes\\smarty\\tpl\\loginpage.tpl',
      1 => 1513328753,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a37716065e039_24015927 (Smarty_Internal_Template $_smarty_tpl) {
?>

<html>
	<head>
		<title>
			Login Page
		</title>		
	</head>
	<body>
		<center>
			<form method = 'post' action = '/?step=1'>
				Введите логин: <input type ='text' name = 'login'><br>
				Введите пароль: <input type ='password' name = 'password'><br>
				<input type = "submit" value = "Отправить">
			</form>
			<form method = 'post' action = '/?step=2'>
				<input type = "submit" value = "Продолжить без логина">
			</form>
		</center>
	</body>
</html><?php }
}
