<?php

require('controller/frontend.php');

if (isset($_GET['action']) && !empty($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();

    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            post();
        } else {
            echo ('Erreur: identifiant du billet inconnu');
        }
        
    }

} else {
    listPosts();

}
