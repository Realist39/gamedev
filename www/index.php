<?php 
	session_start(); # Подключается сессия 
	if (!empty($_POST['auth'])) { 
		include('inc/db.php'); # Подключается класс БД 
		$db = new db; # Создается переменная для работы с классом БД 
		# Фильтруются входящие данные 
		$login = str_replace("'","\'",$_POST['login']); 
		$password = str_replace("'","\'",$_POST['password']); 
		# Проверяется существует ли запись в БД с получеными данными 
		$sql = $db->q("SELECT * FROM `users` WHERE `login`='".$login."' AND `password`=('".$password."')");
		
		if (mysql_num_rows($sql) == 1) { # Если существует, то сохраняется сессия и переадресовывает в игру 
			#$err = '<div style="text-align: center;color: red;">Пися</div>';
			$row = mysql_fetch_array($sql); 
			$_SESSION['new_session'] = $row['id_user']; 
			header("Location: lobby.php"); 
			} else { # Если нет, то выводится ошибка 
			$err = '<div style="text-align: center;color: red;">Игрок не найден</div>'; 
		} 
	} 
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Браузерная игра Москали</title> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<link rel="stylesheet" href="/css/entry.css">
	</head> 
	<body> 
		<?php echo $err; # Вывод ошибки ?> 
		<div style="text-align:center;">
			<div class="game_name"><p>Викторина: Москали</p></div>
			<form method="post"> 
				<b>Логин:</b> <input type="text" name="login" placeholder="Введите Логин" />              
				<b>Пароль:</b> <input type="password" name="password" placeholder="Введите пароль" />   
				<div class="buttons"> 
					<input type="submit" value="Войти" name="auth"/>
					<input type="reset" value="Сбросить" name="reset" />
				</div>
			</form> 
			<br> 
			<button class="to_main"><a href="reg.php">Зарегистрироваться</a></button>
			<div class="druz">
				<img src="/assets/images/aleksandr-druz02.jpg" width=70% height=70%>
			</div>
			<div class="vasser"><img src="/assets/images/vasserman_2.jpg" width=60% height=60%></div>
		</body> 
	</html>	