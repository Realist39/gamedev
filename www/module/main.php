<?php 
	$count_questions = mysql_fetch_array($db->q("SELECT count(*) as cnt FROM questions;"));
	$ans = rand(1, $count_questions['cnt']);
	$question = mysql_fetch_array($db->q("SELECT * FROM questions WHERE id_question=".$ans.""));
?> 
<table> 
<tr> 
      <td>Вопрос: </td><td><b><?php echo $question['text']; ?></b></td> 
</tr> 
<tr> 
      <td>Ответ: </td><td><?php echo $User['life']; ?>/<?php echo $User['mlife']; ?></td> 
</tr> 
<tr> 
      <td>Ответ: </td><td><?php echo $ans ?></td> 
</tr> 
</table>