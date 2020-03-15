<!DOCTYPE html>
<html>
        <?php
        include("../c2p7_inclurePortionPages/entete.php");
        include("../c2p7_inclurePortionPages/menus.php");
	?>
	
	<body>
		<?php
		$prenom = "Jean";
		$nom = "Dupont";
		echo "<a href=\"bonjour.php?nom=$nom&amp;prenom=$prenom\">Dis-moi bonjour !</a>"
		?>
	</body>

	<?php
        include("../c2p7_inclurePortionPages/pied_de_page.php");
        ?>
</html> 
