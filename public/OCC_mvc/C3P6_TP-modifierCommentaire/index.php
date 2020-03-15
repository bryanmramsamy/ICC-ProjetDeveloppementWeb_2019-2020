<?php

require('controller/frontend.php');

try {
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
            
        } elseif ($_GET['action'] == 'getComment') {
            if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] > 0) {
                getComment();

            } else {
                throw new Exception('Commentaire (ID = ' . htmlspecialchars($_GET['id']) . ') inconnu !');

            }

        } elseif ($_GET['action'] == 'setComment') {
            if (isset($_GET['postID']) && !empty($_GET['postID']) && $_GET['postID'] > 0
            && isset($_GET['commentID']) && !empty($_GET['commentID']) && $_GET['commentID'] > 0) {
                if (isset($_POST['comment']) && !empty($_POST['comment'])) {
                    setComment($_GET['postID'], $_GET['commentID'], $_POST['comment']);
    
                } else {
                    throw new Exception('Mise à jour du commentaire (ID = ' . htmlspecialchars($_GET['id']) . ') impossible !');
    
                }

            } else {
                throw new Exception('Commentaire (ID = ' . htmlspecialchars($_GET['id']) . ') inconnu !');
            }
        }
    
    } else {
        listPosts();
    
    }
    
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    require('view/errorView.php');
    
}