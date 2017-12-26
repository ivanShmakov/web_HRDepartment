<?php
/* Smarty version 3.1.30, created on 2017-12-20 23:29:59
  from "C:\openserver\OpenServer\domains\HRDepartment\includes\smarty\tpl\actionAdd.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3ac847cc9e82_90086256',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '283c1211effee561f24d9c762ffe4dec473997b7' => 
    array (
      0 => 'C:\\openserver\\OpenServer\\domains\\HRDepartment\\includes\\smarty\\tpl\\actionAdd.tpl',
      1 => 1513801738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3ac847cc9e82_90086256 (Smarty_Internal_Template $_smarty_tpl) {
?>

<html>
	<head>
		<title>
			Add worker
		</title>		
	</head>
	<body>
	<center>
		<form method = 'post' action = '/?action=3&step=1'>
			Введите имя: <input type ='text' name = 'name'><br>
			Введите отчетсво: <input type ='text' name = 'patronymic'><br>
			Введите фамилию: <input type ='text' name = 'surname'><br>
			Введите отдел:
			<select name="departmnent_name">
				<?php echo $_smarty_tpl->tpl_vars['departments']->value;?>

			</select><br>
			Введите должность:
			<select name="position_name">
				<?php echo $_smarty_tpl->tpl_vars['positions']->value;?>

			</select><br>
			Введите филиал:
			<select name="branch_name">
				<?php echo $_smarty_tpl->tpl_vars['branchs']->value;?>

			</select><br>
			Введите банк:
			<select name="bank_name">
				<?php echo $_smarty_tpl->tpl_vars['banks']->value;?>

			</select><br>
			Введите номер телефона: <input type ='text' name = 'phone'> <br>
			Введите зарплату: <input type ='text' name = 'salary'> <br>
			<input type = "submit" value = "Добавить"> <a href = '/'>Назад</a>
		</form>
	</center>
	</body>
</html><?php }
}
