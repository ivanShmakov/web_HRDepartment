{* Smarty *}
<html>
	<head>
		<title>
			HRDepartment
		</title>		
	</head>
	<body>
		<table border=2>                                              
		<th> id </th><th> Имя </th><th> Отчество </th><th> Фамилия </th>
		{$body}
		</table> <br>
		<form action = "includes\src\actionShow.php" method = "post">                 
			Введите id работника для получения подробной информации: <input type = "text" name = "id">
			<input type = "submit" value = "OK" name = "send">
		</form>
		<a href = "http://hrdepartment/"> Добавление работника </a><br><br>
		<a href = "http://hrdepartment/"> Удаление работника </a><br><br>
	</body>
</html>