{* Smarty *}
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
			{$body}
			</table><br>
			{$actionAdd}
		</center>
	</body>
</html>