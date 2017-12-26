{* Smarty *}
<html>
	<head>
		<title>
			Login Page
		</title>		
	</head>
	<body>
		<center>
			<form method = 'post' action = '/?step=1'>
				Введите логин: <input type ='text' name = 'login'><br>
				Введите пароль: <input type ='password' name = 'password'><br>
				<input type = "submit" value = "Отправить">
			</form>
			<form method = 'post' action = '/?step=2'>
				<input type = "submit" value = "Продолжить без логина">
			</form>
		</center>
	</body>
</html>