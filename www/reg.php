<?php 
	session_start(); # Подключается сессия 
	if (!empty($_POST['reg'])) { 
		include('inc/db.php'); # Подключается класс БД 
		$db = new db; # Создается переменная для работы с классом БД 
		# Фильтруются входящие данные 
		$login = htmlspecialchars(str_replace("'","\'",$_POST['login'])); 
		$email = htmlspecialchars(str_replace("'","\'",$_POST['email'])); 
		$password = htmlspecialchars(str_replace("'","\'",$_POST['password'])); 
		# Проверяется существует ли запись в БД с получеными данными 
		$sql = $db->q("SELECT * FROM `users` WHERE `login`='".$login."' OR `email`='".$email."'"); 
		if (mysql_num_rows($sql) > 0) { # Если существует, то выводится ошибка 
			$err = '<div style="text-align: center;color: red;">Такой логин/email уже существует </div>'; 
			} else { # Если нет, то создается запись в БД, сохраняется сессия и переадресовывает в игру 
			$db->q("INSERT INTO `users` (`login`,`password`,`email`) VALUES ('".$login."',('".$password."'),'".$email."')"); 
			$_SESSION['user_id'] = mysql_insert_id(); 
			header("Location: lobby.php"); 
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
		<div id="main" style="text-align:center;"> 
			<form method="post"> 
				<b>Введите желаемый логин:</b><input type="text" name="login" value="<?php echo $_POST['login']; ?>"  placeholder="Введите Логин"/>
				<b>Введите пароль:</b><input type="password" name="password" placeholder="Введите пароль" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"  title="Не менее шести символов, содержащих хотя бы одну цифру и символы из верхнего и нижнего регистра"/>
				<b>Повторите пароль:</b><input type="password" name="password" placeholder="Введите пароль еще раз" /> 				 
				<b>Введите Email:</b><input type="text" name="email" value="<?php echo $_POST['email']; ?>" placeholder="Введите Email" />
				<input type="submit" value="Зарегистрироваться" name="reg">
			</form> 
			<button class="to_main"><a href="index.php"> Вернуться на Главную</a></button>
		</div> 
	</body> 
</html>