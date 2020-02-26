<p>
    <?php
    if (isset($_POST['mail'])) {
        $_POST['mail'] = htmlspecialchars($_POST['mail']);  # Never forget !

        if (preg_match("#^[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {
            echo ($_POST['mail'] . ' est une adresse mail <strong>valide</strong> !');
        } else {
            echo ($_POST['mail'] . ' est une adresse mail <strong>refusé</strong> ! <br /> Veuillez réessayer');
        }
    }
    ?>
</p>

<form method='post'>
    <p>
        <label for='mail'>Veuillez entrer une adresse mail valide: </label> <input id='mail' name='mail' /><br />
        <input type='submit' value="Vérifier l'adresse mail" />
    </p>
</form>