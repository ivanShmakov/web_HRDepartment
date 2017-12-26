{* Smarty *}
<html>
	<head>
		<title>
			Edit woker information
		</title>		
	</head>
	<body> 
		<center>
		<form method = 'post' action='/?action=2&step=1&id={$id}'>
			
			Измените имя сотрудника: 
			<input type ='hits' value = '{$name}' name = 'name'><br>
			
			Измените отчество сотрудника: 
			<input type ='hits' value = '{$patronymic}' name = 'patronymic'><br>
			
			Измените фамилию сотрудника: 
			<input type ='hits' value = '{$surname}' name = 'surname'><br>
			
			Измените отдела сотрудникa:			
			<select name="departmnent_name">
				{$departments}
			</select><br>
			
			Измените должности сотрудника:
			<select name="position_name">
				{$positions}
			</select><br>
			
			Измените филиала сотрудника:
			<select name="branch_name">
				{$branchs}
			</select><br>
			
			Измените банка сотрудникa:			
			<select name="bank_name">
				{$banks}
			</select><br>
			
			Измените дату приема сотрудника:
			<input type ='hits' value = '{$data_add}' name = 'data_add'><br>
			
			Измените дату увольнения сотрудника: 
			<input type ='hits' value = '{$data_remove}' name = 'data_remove'><br>
			
			Измените зарплату сотрудникa:
			<input type ='hits' value = '{$salary}' name = 'salary'><br>	
			
			Измените телефон сотрудникa:
			<input type ='hits' value = '{$phone}' name = 'phone'><br>
			<input type='submit' value = 'Принять изменения'> <a href = '/'>Назад</a>
		</form>
		</center>		
	</body>
</html>