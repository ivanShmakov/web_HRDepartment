<?php
/* Smarty version 3.1.30, created on 2017-12-18 10:51:20
  from "C:\openserver\OpenServer\domains\HRDepartment\includes\smarty\tpl\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a377378718c25_75567362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdfe14e0dc431e1ac82d7378af1f5ead642772db' => 
    array (
      0 => 'C:\\openserver\\OpenServer\\domains\\HRDepartment\\includes\\smarty\\tpl\\index.tpl',
      1 => 1513583371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a377378718c25_75567362 (Smarty_Internal_Template $_smarty_tpl) {
?>

<html>
	<head>
		<title>
			HRDepartment
		</title>		
	</head>
	<body>
		<right>
			<a href = '/?action=out'> Выход </a><br><br>
		</right>
		<center>
			<table border=2>                                              
			<th> id </th><th> Имя </th><th> Отчество </th><th> Фамилия </th><th> Посмотреть </th><th>Действие</th>
			<?php echo $_smarty_tpl->tpl_vars['body']->value;?>

			</table><br>
			<?php echo $_smarty_tpl->tpl_vars['actionAdd']->value;?>

		</center>
	</body>
</html><?php }
}
