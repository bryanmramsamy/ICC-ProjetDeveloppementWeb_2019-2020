<?php

require('controller/frontend.php');

if (isset($_GET['action']) && !empty($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();

    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            echo ('Erreur: identifiant du billet inconnu');
        }
        
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] > 0) {
            if (isset($_POST['author']) && !empty($_POST['author']) 
                && isset($_POST['comment']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);

            } else {
                echo('Erreur: Tous les champs ne sont pas remplis !');

            }

            echo ('Erreur: Aucun identifiant de billet détecté');

        } else {
            echo ('Erreur: identifiant du billet inconnu');

        }
        
    }

} else {
    listPosts();

}
