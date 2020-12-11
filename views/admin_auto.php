<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
</head>
<body style="text-align: center">
	<h1>Авторизация</h1>
	<h2>Введите логин и пароль</h2>

	<form action="/amenu" method="post">
		<label>Логин
			<input type="text" name="login" maxlength="50" style="width: 300px">			
		</label><br><br>
		<label>Пароль
			<input type="password" name="password" maxlength="50" style="width: 300px">	
		</label><br><br>
		<input type="hidden" name="type" value="1">
		<input type="hidden" name="form" value="from_form">
		<input type="submit" value="Ок">
	</form><br>
</body>
</html>
<!--D3h7san-->