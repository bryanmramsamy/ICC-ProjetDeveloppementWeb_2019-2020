<?php
session_start();

# Database access
try {
    $database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $error) {
    die('Erreur : ' . $error->getMessage());
}

# Check if pseudo already exist in database
if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
    
    $pseudo = htmlspecialchars($_POST['pseudo']);

    $request = $database->prepare('SELECT pseudo FROM membres WHERE pseudo = ?');
    $request->execute(array($pseudo));
    $result = $request->fetch();

    $pseudo_exist = false;
    if (isset($result) && !empty($result)) $pseudo_exist = true;

    $request->closeCursor();
}

# Check if password and confirmation match
if (isset($_POST['password']) && !empty($_POST['password'])
    && isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
        
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    $password_mismatch = (!password_verify($confirm_password, $password));

}

# Check if mail address is valid
if (isset($_POST['mail'])
    && !empty($_POST['mail'])) {

    $mail = htmlspecialchars($_POST['mail']);

    $mail_invalid = !preg_match("#^[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#", $_POST['mail']);

}

# Store data into $_SESSION or show errors if data are incorrect:
if (!$pseudo_exist && !$password_mismatch && !$mail_invalid) {

    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['pass'] = $password;
    $_SESSION['email'] = $mail;

    header('Location: inscription-insert.php');

} else {
    header('Location: inscription.php?error_pseudo='.$pseudo_exist.'&error_password='.$password_mismatch.'&error_mail='.$mail_invalid);
}

?>