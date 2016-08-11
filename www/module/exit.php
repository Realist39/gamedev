<?php 
$User = mysql_fetch_array($db->q("SELECT * FROM `users` WHERE `id_user`='".$_SESSION['new_session']."'")); 
?> 
<table> 
<tr> 
      <td>Игрок: </td><td><b><?php echo $User['login']; ?></b></td> 
</tr> 
<tr> 
      <td>Жизни: </td><td><?php echo $User['life']; ?>/<?php echo $User['mlife']; ?></td> 
</tr> 
<tr> 
      <td>Деньги: </td><td><?php echo $User['money']; ?></td> 
</tr> 
</table>