<?php
	$question = $db->q("SELECT text FROM questions WHERE id_question=1");
?>
<!DOCTYPE html>
<html>
	<body>
		<main>
			<div class="question">
				Вопрос: Тут будет много букав очень много что прям очень много<b><?php echo $User['life']; ?></b>
			</div>
			<div class="answers">
				<div class="buttons">
					<table align="center">
						<tr><td>
							<form method="post">
								<input type ="submit" value="Ответ <?php echo $question['id_question'];?>" name="q1">
							</form>
						</td>
						<td>
							<form method="post">
								<input type ="submit" value="Ответ <?php echo $question['id_question'];?>" name="q2">
							</form>
						</td></tr>
						<tr><td>
							<form method="post">
								<input type ="submit" value="Ответ <?php echo $question['id_question'];?>" name="q3">
							</form>
						</td>
						<td>
							<form method="post">
								<input type ="submit" value="Ответ <?php echo $question['id_question'];?>" name="q4">
							</form>
						</td></tr>
					</table>
				</div>
			</div>
		</main>
	</body>
</html>