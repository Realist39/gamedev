<?php 
$read_post = $db->q("SELECT `id` FROM `post` WHERE `p1`='".$_SESSION['user_id']."' AND `read`='1'"); 
# Если найдены непрочтенные сообщения, то выводится их количество 
if ($num_messages == 0)    $num_messages = ''; 
else $num_messages = '(<b>'.$num_messages.'</b>)'; 
# Если есть непрочтенные сообщения и игрок перешел в модуль почты, то отмечаем сообщения прочтенными 
if ($num_messages != '' && $a == 'post') { 
      $db->q("UPDATE `post` SET `read`='2' WHERE `p1`='".$_SESSION['user_id']."'"); 
      $num_messages = ''; 
} 
?> 
<!DOCTYPE html> 
<html> 
         <head> 
             <title>Браузерная игра "Картишки"</title> 
             <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
       <link rel="stylesheet" type="text/css" href="style/style.css" /> 
         </head> 
         <body> 
       <table> 
       <tr> 
        <td valign="top" style="width:120px;display:block;"> 
         <table> 
         <tr><td><a href="?a=main">Персонаж</a></td></tr> 
         <tr><td><a href="?a=post">Почта <?php echo $num_messages; ?></a></td></tr> 
         <tr><td><a href="?a=maps">Список карт</a></td></tr> 
         <tr><td><a href="?a=trade">Аукцион</a></td></tr> 
         <tr><td><a href="?a=shop">Магазин</a></td></tr> 
         <tr><td><a href="?a=battle">Арена</a></td></tr> 
         <tr><td><a href="?a=exit">Выход</a></td></tr> 
         </table> 
        </td> 
        <td valign="top">