<?php 

?> 
<!DOCTYPE html> 
<html> 
         <head> 
             <title>Браузерная игра "МосКали"</title> 
             <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
       <link rel="stylesheet" type="text/css" href="style/style.css" /> 
         </head> 
         <body> 
       <table> 
       <tr> 
        <td valign="top" style="width:120px;display:block;"> 
         <table> 
         <tr><td><a href="?a=start">Начать игру</a></td></tr> 
         <tr><td><a href="?a=rating">Рейтинг <?php echo $num_messages; ?></a></td></tr> 
         <tr><td><a href="?a=settings">Настройки</a></td></tr> 
         <tr><td><a href="?a=exit">Выход</a></td></tr> 
         </table> 
        </td> 
        <td valign="top">