<?php 
session_start(); # Подключается сессия 
if (!empty($_POST['auth'])) { 
              include('inc/db.php'); # Подключается класс БД 
              $db = new db; # Создается переменная для работы с классом БД 
              # Фильтруются входящие данные 
              $login = str_replace("'","\'",$_POST['login']); 
              $password = str_replace("'","\'",$_POST['password']); 
              # Проверяется существует ли запись в БД с получеными данными 
              $sql = $db->q("SELECT * FROM `user` WHERE `login`='".$login."' AND `password`=MD5('".$password."')"); 
              if (mysql_num_rows($sql) == 1) { # Если существует, то сохраняется сессия и переадресовывает в игру 
               $row = mysql_fetch_array($sql); 
               $_SESSION['user_id'] = $row['id']; 
               header("Location: game.php"); 
              } else { # Если нет, то выводится ошибка 
               $err = '<div style="text-align: center;color: red;">Игрок не найден</div>'; 
              } 
} 
?> 
<!DOCTYPE html> 
<html> 
                 <head> 
                     <title>Браузерная игра</title> 
                     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
					 <link rel="stylesheet" href="/css/main.css">
                 </head> 
                 <body> 
               <?php echo $err; # Вывод ошибки ?> 
                     <div style="text-align:center;">
				<div class="Header-site">
                <form method="post"> 
                 Логин: <input type="text" name="login" placeholder="Введите Логин" />              
                 Пароль: <input type="password" name="password" placeholder="Введите пароль" />   
				<div class="buttons"> 
                 <input type="submit" value="Войти" name="auth" />
				 <input type="reset" value="Сбросить" name="reset" />
				<div>
                </form> 
                <br> 
                <a href="reg.php">Регистрация</a> 
               </div> 
                 </body> 
</html>