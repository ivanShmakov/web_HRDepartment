{* Smarty *}
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
				{$departments}
			</select><br>
			Введите должность:
			<select name="position_name">
				{$positions}
			</select><br>
			Введите филиал:
			<select name="branch_name">
				{$branchs}
			</select><br>
			Введите банк:
			<select name="bank_name">
				{$banks}
			</select><br>
			Введите номер телефона: <input type ='text' name = 'phone'> <br>
			Введите зарплату: <input type ='text' name = 'salary'> <br>
			<input type = "submit" value = "Добавить"> <a href = '/'>Назад</a>
		</form>
	</center>
	</body>
</html>