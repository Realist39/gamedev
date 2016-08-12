<?php 
	$question = $db->q("SELECT text FROM questions WHERE id_question=1");
	#$question = 'Яички';
?> 
<!DOCTYPE html> 
<html> 
<body>
<main>
<div class="question">
Вопрос: Тут будет много букав очень много что прям очень много<b><?php echo $User['life']; ?></b>
</div>
<div class="answers">

	<form method="post">
	<div class="buttons">
      <input type ="button" value="Ответ <?php echo $question['id_question'];?>" name="q1">
	 <input type ="button" value="Ответ <?php echo $question['id_question'];?>" name="q2">
	 <p></p>
	 <input type ="button" value="Ответ <?php echo $question['id_question'];?>" name="q3">
	 <input type ="button" value="Ответ <?php echo $question['id_question'];?>" name="q4">
</div>
</form>

</div>
</main>
</body>
</html>