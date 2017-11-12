<?php
/* Smarty version 3.1.30, created on 2017-11-12 21:55:09
  from "C:\openserver\OpenServer\domains\HRDepartment\includes\smarty\tpl\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a08990d7a9d89_80558388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdfe14e0dc431e1ac82d7378af1f5ead642772db' => 
    array (
      0 => 'C:\\openserver\\OpenServer\\domains\\HRDepartment\\includes\\smarty\\tpl\\index.tpl',
      1 => 1510511710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a08990d7a9d89_80558388 (Smarty_Internal_Template $_smarty_tpl) {
?>

<html>
	<head>
		<title>
			<?php echo $_smarty_tpl->tpl_vars['title']->value;?>

		</title>		
	</head>
	<body>
		<table border=2>                                              
		<th> id </th><th> ФИО </th>
		<?php echo $_smarty_tpl->tpl_vars['body']->value;?>

		</table> <br>
		<form action = 'mytest_1.php' method = 'post'>                 
			Введите id работника: <input type ='text' name = 'id owner'>                   
			<input type='submit' value = 'OK' name = 'send'>         
		</form>
		<a href = "http://mytest.ru/mytest_2.php"> Добавление работника </a><br><br>
		<a href = "http://mytest.ru/mytest_6.php"> Изменение информации о работнике </a><br><br>
		<a href = "http://mytest.ru/mytest_4.php""> Удаление работника </a><br><br>
	</body>
</html><?php }
}
