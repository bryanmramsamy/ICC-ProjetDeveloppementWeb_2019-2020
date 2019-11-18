<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mon MiniChat</title>
	</head>

	<style>
		h1, form, .comment {
			text-align:center;
		}
	</style>

	<body>
		<h1>MiniChat</h1>

		<?php // ADD NEW COMMENT ?>
		<form method="post" action="minichat_post.php">
			
			Pseudo : <input type="text" name="pseudo"/>
			<br/>
			Votre message ici : <textarea name="message" rows="8" cols="45"></textarea>
			<br/>
			<input type="submit" value="Envoyer"/>

		</form>


		<?php
		// Try to access to the MySQL database and show error thrown if any is catched
		try {
		  $database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $error) {
		  die('Erreur : ' . $error->getMessage());
		}

		// DISPLAY 10 LAST MESSAGES FROM CHAT STARTING FROM MOST RECENT !
		$last_messages = $database->query('SELECT * FROM minichat ORDER BY date DESC LIMIT 0,10');

		while($comment = $last_messages->fetch()){
			?>
			<p class="comment">
				<strong><?php echo (htmlspecialchars($comment['pseudo'])) ?></strong> a envoyé le <?php echo (htmlspecialchars($comment['date'])) ?>:
				<br/><br/>
				<?php echo (htmlspecialchars($comment['message'])) ?>
			</p>
			<?php
		}

		$last_messages->closeCursor();

		?>
	</html>