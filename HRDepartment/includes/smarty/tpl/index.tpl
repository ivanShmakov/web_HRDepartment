{* Smarty *}
<html>
	<head>
		<title>
			{$title}
		</title>		
	</head>
	<body>
		<table border=2>                                              
		<th> id </th><th> ��� </th>
		{$body}
		</table> <br>
		<form action = 'mytest_1.php' method = 'post'>                 
			������� id ���������: <input type ='text' name = 'id owner'>                   
			<input type='submit' value = 'OK' name = 'send'>         
		</form>
		<a href = "http://mytest.ru/mytest_2.php"> ���������� ��������� </a><br><br>
		<a href = "http://mytest.ru/mytest_6.php"> ��������� ���������� � ��������� </a><br><br>
		<a href = "http://mytest.ru/mytest_4.php""> �������� ��������� </a><br><br>
	</body>
</html>