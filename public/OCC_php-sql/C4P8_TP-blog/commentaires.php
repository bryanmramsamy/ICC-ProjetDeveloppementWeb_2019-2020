<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mon super site</title>
		<link href="styles.css" rel="stylesheet"/>
	</head>

	<body>
		<h1>Mon super blog !</h1>
		<a href="index.php">Retour à la liste des billets</a>
		<?php 

		try {
			$database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $error) {
			die('Erreur : ' . $error->getMessage());
		}

		if (isset($_GET['id_billet']) /*&& is_int($_GET['id_billet'])*/) {
			$id_billet = htmlspecialchars($_GET['id_billet']);
			$request = $database->prepare('SELECT *, DATE_FORMAT(date_creation, \' le %d/%m/%Y à %Hh%imin%ss\') AS date_creation_formatee FROM billets WHERE id = ?');
			$request->execute(array($id_billet));
			$billet = $request->fetch();
			
			// If the billet doesn't exist, the $billet variable should be empty. The empty() function can check if the billet exist or not by checking if the variable is set or empty.
			if (!empty($billet)) {
				?>
				<div class="news">
					<h3><?php echo($billet['titre'] . $billet['date_creation_formatee']); ?></h3>
					<p>
						<?php echo($billet['contenu']); ?>
					</p>
				</div>
				<?php
				}
				$request->closeCursor();
				?>

				<form method="post" action="commentaires_post.php">
					<input type="hidden" name="id_billet" value="<?php echo ($id_billet); ?>"/>
					Auteur : <input type="text" name="auteur"/>
					<br/>
					Commentaire : <textarea name="commentaire" rows="8" cols="45"></textarea>
					<br/>
					<input type="submit" value="Envoyer"/>
				</form>

				<?php
				echo('<h2>Commentaires</h2>');
				$request = $database->prepare('SELECT *, DATE_FORMAT(date_commentaire, \' le %d/%m/%Y à %Hh%imin%ss\') AS date_creation_formatee FROM commentaires WHERE id_billet = ?');
				$request->execute(array($id_billet));
				while ($comment = $request->fetch()) {
					?>
					<div class="comment">
						<p><?php echo('<strong>' . $comment['auteur'] . '</strong>' . $comment['date_creation_formatee']); ?></p>
						<p>
							<?php echo nl2br(((htmlspecialchars($comment['commentaire'])))); ?>
						</p>
					</div>
					<?php
				}
				$request->closeCursor();
			} else {
				echo ("Ce billet n'existe pas !");
			}
		?>
	</body>
</html>
