<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-!"/>
		<title>MA page web</title>
	</head>
	<body>
		<h1>Ma page web</h1>
		<p>
			Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.
			<?php
				echo "<br/>";
				echo "J'habite en Chine."; // Cette ligne indique où j'habite
				echo "<br/>";

				/* La Ligne suivante indique mon âge
				 * Si vous ne me croyez pas...
				 * ... vous avez raison ;o) */
				echo "J'ai 92 ans.";
				echo "<br/>";
			?>
		</p>
	</body>
</html>
