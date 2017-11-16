<?php
/* Smarty version 3.1.30, created on 2017-11-16 19:07:17
  from "C:\openserver\OpenServer\domains\HRDepartment\includes\smarty\tpl\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0db7b5c693b4_78013935',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdfe14e0dc431e1ac82d7378af1f5ead642772db' => 
    array (
      0 => 'C:\\openserver\\OpenServer\\domains\\HRDepartment\\includes\\smarty\\tpl\\index.tpl',
      1 => 1510848432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0db7b5c693b4_78013935 (Smarty_Internal_Template $_smarty_tpl) {
?>

<html>
	<head>
		<title>
			HRDepartment
		</title>		
	</head>
	<body>
		<table border=2>                                              
		<th> id </th><th> Имя </th><th> Отчество </th><th> Фамилия </th>
		<?php echo $_smarty_tpl->tpl_vars['body']->value;?>

		</table> <br>
		<form action = "includes\src\actionShow.php" method = "post">                 
			Введите id работника для получения подробной информации: <input type = "text" name = "id">
			<input type = "submit" value = "OK" name = "send">
		</form>
		<a href = "http://hrdepartment/"> Добавление работника </a><br><br>
		<a href = "http://hrdepartment/"> Удаление работника </a><br><br>
	</body>
</html><?php }
}
