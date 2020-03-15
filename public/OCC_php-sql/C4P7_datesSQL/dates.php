<?php

try {
	$database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $error) {
	die('Erreur : ' . $error->getMessage());
}

//	The date variable is DATETIME type, so Date + Hour are required
//	For DATE, only date
//	Others:
/*	
 *	Others:
 *		DATE: 		'AAAA-MM-DD'
 *		TIME: 		'hh:mm:ss'
 *		DATETIME:	'AAAA-MM-DD hh:mm:ss'
 *		TIMESTAMP: 	'x' -> where x is the number of seconds since 1970-01-01 00:00:00
 *		YEAR:		'AA' or 'AAAA'
 */
$request = $database->query('SELECT pseudo, message, date FROM minichat WHERE date = \'2010-04-02 18:46:40\'');

echo('<h4>Commentaires datant du 2 mars 2010, à 18h46m40s uniquement !</h4>');
while ($data = $request->fetch()) {
?>
	<p class="comment">
		<strong><?php echo (htmlspecialchars($data['pseudo'])) ?></strong> a envoyé le <?php echo (htmlspecialchars($data['date'])) ?>:
		<br/><br/>
		<?php echo (htmlspecialchars($data['message'])) ?>
	</p>
<?php
}

$request->closeCursor();

//	Use of the BETWEEN keyword
$request = $database->query('SELECT pseudo, message, date FROM minichat WHERE date BETWEEN \'2018-01-01 00:00:00\' AND \'2020-01-01 00:00:00\'');

echo('<h4>Commentaires datant de 2018 ou de 2019</h4>');
while ($data = $request->fetch()) {
echo('
	<p class="comment">
		<strong>' . htmlspecialchars($data['pseudo']) . '</strong> a envoyé le '. htmlspecialchars($data['date']) . ':
		<br/><br/>' . htmlspecialchars($data['message']) . '
	</p>
	');
}

$request->closeCursor();

if ($_GET['val'] == 1) {
	$request = $database->prepare('INSERT INTO minichat (pseudo, message, date) VALUES(:in_pseudo, :in_message, :in_date)');
	$request->execute(array(
		'in_pseudo' => 'Dieu',
		'in_message' => 'Nique sa mère la pute !',
		'in_date' => '2019-12-25 00:00:00'
	));
	$request->closeCursor();

} else if ($_GET['val'] == 2) {
	// 	NOW() gives the current DATETIME
	// 		CURDATE() gives the current 'AAAA-MM-DD' while CURTIME gives the current 'hh:mm:ss'
	$request = $database->prepare('INSERT INTO minichat (pseudo, message, date) VALUES(:in_pseudo, :in_message, NOW())');
	$request->execute(array(
		'in_pseudo' => 'Satan',
		'in_message' => 'Amen'
	));
	$request->closeCursor();
}

$request = $database->query('SELECT pseudo, message, DAY(date) AS jour FROM minichat');

echo('<h4>Jour de chaque commentaire</h4>');
while ($data = $request->fetch()) {
echo('
	<p class="comment">
		<strong>' . htmlspecialchars($data['pseudo']) . '</strong> a envoyé le '. htmlspecialchars($data['jour']) . ':
		<br/><br/>' . htmlspecialchars($data['message']) . '
	</p>
	');
}

$request->closeCursor();

$request = $database->query('SELECT pseudo, message, DAY(date) AS jour, MONTH(date) AS mois, YEAR(date) AS annee, HOUR(date) AS heure, MINUTE(date) AS minute, SECOND(date) AS seconde FROM minichat');

echo('<h4>Date affichée différement</h4>');
while ($data = $request->fetch()) {
echo('
	<p class="comment">
		<strong>' . htmlspecialchars($data['pseudo']) . '</strong> a envoyé le '. htmlspecialchars($data['jour']) . '/' . htmlspecialchars($data['mois']) . '/' . htmlspecialchars($data['annee']) . ' ' . htmlspecialchars($data['heure']) . 'h' . htmlspecialchars($data['minute']) . 'm' . htmlspecialchars($data['seconde']) . 's :
		<br/><br/>' . htmlspecialchars($data['message']) . '
	</p>
	');
}

$request->closeCursor();

$request = $database->query('SELECT pseudo, message, DATE_FORMAT(date, \'%d|%m|%Y %Hh|%imin|%ss\') AS date_formatee FROM minichat');

echo('<h4>DATE_FORMAT</h4>');
while ($data = $request->fetch()) {
echo('
	<p class="comment">
		<strong>' . htmlspecialchars($data['pseudo']) . '</strong> a envoyé le '. htmlspecialchars($data['date_formatee']) . ':
		<br/><br/>' . htmlspecialchars($data['message']) . '
	</p>
	');
}

$request->closeCursor();

$request = $database->query('SELECT pseudo, message, DATE_ADD(date, INTERVAL 15 DAY) AS expiration FROM minichat');

echo('<h4>DATE_ADD and DATE_SUB</h4>');
while ($data = $request->fetch()) {
echo('
	<p class="comment">
		<strong>' . htmlspecialchars($data['pseudo']) . '</strong> expire le '. htmlspecialchars($data['expiration']) . ':
		<br/><br/>' . htmlspecialchars($data['message']) . '
	</p>
	');
}

$request->closeCursor();

?>