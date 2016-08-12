<?php 
	$count_questions = mysql_fetch_array($db->q("SELECT count(*) as cnt FROM questions;"));
	$ans = rand(1, $count_questions['cnt']);
	$question = mysql_fetch_array($db->q("SELECT * FROM questions WHERE id_question=".$ans.""));
?> 

<!DOCTYPE html> 
<html> 
	<body>
		<main>
			<div class="site_info">
				Вы зашли на сайт Игры-Викторины: "Москали".<br>
				Здесь вы можете проверить свои знания на прочность в самых разных сферах. <br>
				Сразитесь с настоящим противником или же сыграйте в одиночную игру.<br>
				Удачи!
			</div>
			<div class="answers">
				
				<div class="buttons">
					<input type ="button" value="Начать одиночную игру <?php echo $question['id_question'];?>" name="q1">
					<input type ="button" value="Искать соперника <?php echo $question['id_question'];?>" name="q2">
					
				</div>
			</form>
		</div>
	</main>
</body>
</html>