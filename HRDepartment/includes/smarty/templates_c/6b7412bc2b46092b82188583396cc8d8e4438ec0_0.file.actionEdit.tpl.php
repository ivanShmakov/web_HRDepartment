<?php
/* Smarty version 3.1.30, created on 2017-12-20 23:29:35
  from "C:\openserver\OpenServer\domains\HRDepartment\includes\smarty\tpl\actionEdit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3ac82fd9c4c4_11768591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b7412bc2b46092b82188583396cc8d8e4438ec0' => 
    array (
      0 => 'C:\\openserver\\OpenServer\\domains\\HRDepartment\\includes\\smarty\\tpl\\actionEdit.tpl',
      1 => 1513801747,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3ac82fd9c4c4_11768591 (Smarty_Internal_Template $_smarty_tpl) {
?>

<html>
	<head>
		<title>
			Edit woker information
		</title>		
	</head>
	<body> 
		<center>
		<form method = 'post' action='/?action=2&step=1&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'>
			
			Измените имя сотрудника: 
			<input type ='hits' value = '<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
' name = 'name'><br>
			
			Измените отчество сотрудника: 
			<input type ='hits' value = '<?php echo $_smarty_tpl->tpl_vars['patronymic']->value;?>
' name = 'patronymic'><br>
			
			Измените фамилию сотрудника: 
			<input type ='hits' value = '<?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
' name = 'surname'><br>
			
			Измените отдела сотрудникa:			
			<select name="departmnent_name">
				<?php echo $_smarty_tpl->tpl_vars['departments']->value;?>

			</select><br>
			
			Измените должности сотрудника:
			<select name="position_name">
				<?php echo $_smarty_tpl->tpl_vars['positions']->value;?>

			</select><br>
			
			Измените филиала сотрудника:
			<select name="branch_name">
				<?php echo $_smarty_tpl->tpl_vars['branchs']->value;?>

			</select><br>
			
			Измените банка сотрудникa:			
			<select name="bank_name">
				<?php echo $_smarty_tpl->tpl_vars['banks']->value;?>

			</select><br>
			
			Измените дату приема сотрудника:
			<input type ='hits' value = '<?php echo $_smarty_tpl->tpl_vars['data_add']->value;?>
' name = 'data_add'><br>
			
			Измените дату увольнения сотрудника: 
			<input type ='hits' value = '<?php echo $_smarty_tpl->tpl_vars['data_remove']->value;?>
' name = 'data_remove'><br>
			
			Измените зарплату сотрудникa:
			<input type ='hits' value = '<?php echo $_smarty_tpl->tpl_vars['salary']->value;?>
' name = 'salary'><br>	
			
			Измените телефон сотрудникa:
			<input type ='hits' value = '<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
' name = 'phone'><br>
			<input type='submit' value = 'Принять изменения'> <a href = '/'>Назад</a>
		</form>
		</center>		
	</body>
</html><?php }
}
