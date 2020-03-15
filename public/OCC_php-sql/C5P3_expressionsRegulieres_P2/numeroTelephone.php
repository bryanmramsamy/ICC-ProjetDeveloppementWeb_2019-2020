<p>
    <?php
    if (isset($_POST['phone'])) {
        $_POST['phone'] = htmlspecialchars($_POST['phone']);  # Never forget !

        if (preg_match("#^0[1-68]([-. ]?\d{2}){4}#", $_POST['phone'])) {
            echo ('Le ' . $_POST['phone'] . ' est un numéro <strong>validé</strong> !');
        } else {
            echo ('Le ' . $_POST['phone'] . ' est un numéro <strong>refusé</strong> ! <br /> Veuillez réessayer');
        }
    }
    ?>
</p>

<form method='post'>
    <p>
        <label for='phone'>Votre numéro de téléphone ?</label> <input id='phone' name='phone' /><br />
        <input type='submit' value='Vérifier le numéro' />
    </p>
</form>