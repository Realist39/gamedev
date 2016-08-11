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
                     <title>Браузерная игра "Картишки"</title> 
                     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
                 </head> 
                 <body> 
               <?php echo $err; # Вывод ошибки ?> 
                     <div id="main" style="text-align:center;"> 
                <form method="post"> 
                 <table align="center"> 
                  <tr><td>Логин:</td><td><input type="text" name="login" value="<?php echo $_POST['login']; ?>" /></td></tr> 
                  <tr><td>Пароль:</td><td><input type="password" name="password" /></td></tr> 
                  <tr><td>email:</td><td><input type="text" name="email" value="<?php echo $_POST['email']; ?>" /></td></tr> 
                  <tr><td colspan="2"><input type="submit" value="Зарегистрироваться" name="reg" /></td></tr> 
                 </table> 
                </form> 

                <a href="index.php">Главная</a> 
               </div> 
                 </body> 
</html>