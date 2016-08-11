<?php 
	$question = $db->q("SELECT text FROM questions WHERE id_question=1");
	#$question = 'Яички';
?> 
<table> 
<tr> 
      <td>Вопрос: </td><td><b><?php echo $question.; ?></b></td> 
</tr> 
<tr> 
      <td>Ответ: </td><td><?php echo $User['life']; ?>/<?php echo $User['mlife']; ?></td> 
</tr> 
<tr> 
      <td>Ответ: </td><td><?php echo $User['money']; ?></td> 
</tr> 
</table>