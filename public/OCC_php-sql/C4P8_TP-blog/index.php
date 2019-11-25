<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mon super blog !</title>
		<link rel="stylesheet" href="styles.css"/>
	</head>

	<body>
		<h1>Mon super blog !</h1>
		<p>Derniers billets du blog:</p>
		
		<?php 

		try {
			$database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $error) {
			die('Erreur : ' . $error->getMessage());
		}

		$all_billets = $database->query('SELECT *, DATE_FORMAT(date_creation, \' le %d/%m/%Y à %Hh%imin%ss\') AS date_creation_formatee FROM billets ORDER BY date_creation DESC LIMIT 0,5');

		while($one_billet = $all_billets->fetch()){
			?>
				<div class="news">
					<h3><?php echo($one_billet['titre'] . $one_billet['date_creation_formatee']); ?></h3>
					<p>
						<?php echo($one_billet['contenu']); ?><br/>
						<a href=<?php echo ('"commentaires.php?id_billet=' . $one_billet['id'] . '"');?>>Commentaires</a>
					</p>
				</div>
			<?php
		}

		$all_billets->closeCursor();
		?>
	</body>
</html>