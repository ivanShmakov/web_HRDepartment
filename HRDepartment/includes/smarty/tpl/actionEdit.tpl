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
			
			�������� ��� ����������: 
			<input type ='hits' value = '{$name}' name = 'name'><br>
			
			�������� �������� ����������: 
			<input type ='hits' value = '{$patronymic}' name = 'patronymic'><br>
			
			�������� ������� ����������: 
			<input type ='hits' value = '{$surname}' name = 'surname'><br>
			
			�������� ������ ���������a:			
			<select name="departmnent_name">
				{$departments}
			</select><br>
			
			�������� ��������� ����������:
			<select name="position_name">
				{$positions}
			</select><br>
			
			�������� ������� ����������:
			<select name="branch_name">
				{$branchs}
			</select><br>
			
			�������� ����� ���������a:			
			<select name="bank_name">
				{$banks}
			</select><br>
			
			�������� ���� ������ ����������:
			<input type ='hits' value = '{$data_add}' name = 'data_add'><br>
			
			�������� ���� ���������� ����������: 
			<input type ='hits' value = '{$data_remove}' name = 'data_remove'><br>
			
			�������� �������� ���������a:
			<input type ='hits' value = '{$salary}' name = 'salary'><br>	
			
			�������� ������� ���������a:
			<input type ='hits' value = '{$phone}' name = 'phone'><br>
			<input type='submit' value = '������� ���������'> <a href = '/'>�����</a>
		</form>
		</center>		
	</body>
</html>