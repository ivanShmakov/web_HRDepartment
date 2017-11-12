{* Smarty *}
<html>
	<head>
		<title>
			{$title}
		</title>		
	</head>
	<body>
		<table border=2>                                              
		<th> id </th><th> ФИО </th>
		{$body}
		</table> <br>
		<form action = 'mytest_1.php' method = 'post'>                 
			Введите id работника: <input type ='text' name = 'id owner'>                   
			<input type='submit' value = 'OK' name = 'send'>         
		</form>
		<a href = "http://mytest.ru/mytest_2.php"> Добавление работника </a><br><br>
		<a href = "http://mytest.ru/mytest_6.php"> Изменение информации о работнике </a><br><br>
		<a href = "http://mytest.ru/mytest_4.php""> Удаление работника </a><br><br>
	</body>
</html>