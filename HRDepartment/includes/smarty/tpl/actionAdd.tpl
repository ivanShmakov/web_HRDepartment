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
			������� ���: <input type ='text' name = 'name'><br>
			������� ��������: <input type ='text' name = 'patronymic'><br>
			������� �������: <input type ='text' name = 'surname'><br>
			������� �����:
			<select name="departmnent_name">
				{$departments}
			</select><br>
			������� ���������:
			<select name="position_name">
				{$positions}
			</select><br>
			������� ������:
			<select name="branch_name">
				{$branchs}
			</select><br>
			������� ����:
			<select name="bank_name">
				{$banks}
			</select><br>
			������� ����� ��������: <input type ='text' name = 'phone'> <br>
			������� ��������: <input type ='text' name = 'salary'> <br>
			<input type = "submit" value = "��������"> <a href = '/'>�����</a>
		</form>
	</center>
	</body>
</html>