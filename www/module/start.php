<?php 
	$question = $db->q("SELECT text FROM questions WHERE id_question=1");
	#$question = 'Яички';
?> 
<!DOCTYPE html> 
<html> 
<body>
<table> 
<tr> 
		
      <td>Вопрос: </td><td><b><?php echo $User['life']; ?></b></td> 
</tr> 
<tr> 
      <td>Ответ: </td><td><?php echo $User['life']; ?></td> 
</tr> 
<tr> 
      <td>Ответ: </td><td><?php echo $User['money']; ?></td> 
</tr> 
</table>
</body>
</html>