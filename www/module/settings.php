<?php 
$User = mysql_fetch_array($db->q("SELECT * FROM `users` WHERE `id_user`='".$_SESSION['new_session']."'")); 
?> 
<!DOCTYPE html> 
<html> 
<body>
<main>
<form method="post">
<div class="settings">
<table>
<tr> 
      <td>Ваш Ник: </td><td><b><?php echo $User['login']; ?></b></td> 
</tr> 
<tr> 
      <td>Ваш E-mail: </td><td><?php echo $User['email']; ?></td> 
</tr> 
<tr> 
      <td>Ваш пароль: </td><td><?php echo $User['password']; ?></td> 
</tr> 
</table>
</div>
<div class="change">

<input type="text" name="new_login" placeholder="Введите новый ник">
<p>
<input type="text" name="new_email" placeholder="Введите новую почту">
<p>
<input type="text" name="new_pass" placeholder="Введите новый пароль">
</div>
<div class="save_settings1">
<input class="save_settings" type="submit"  value="Сохранить изменения" name="save_settings">
</div>
</form>
</main>
</body>
</html>