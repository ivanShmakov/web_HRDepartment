{* Smarty *}
<html>
	<head>
		<title>
			HRDepartment
		</title>		
	</head>
	<body>
		<table border=2>                                              
		<th> id </th><th> ��� </th><th> �������� </th><th> ������� </th>
		{$body}
		</table> <br>
		<form action = "includes\src\actionShow.php" method = "post">                 
			������� id ��������� ��� ��������� ��������� ����������: <input type = "text" name = "id">
			<input type = "submit" value = "OK" name = "send">
		</form>
		<a href = "http://hrdepartment/"> ���������� ��������� </a><br><br>
		<a href = "http://hrdepartment/"> �������� ��������� </a><br><br>
	</body>
</html>