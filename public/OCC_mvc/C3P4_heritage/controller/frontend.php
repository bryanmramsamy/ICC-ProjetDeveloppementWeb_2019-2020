<?php

# require_once = Class is loaded only once
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts(){
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    
    require('view/frontend/listPostsView.php');

}

function post(){
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $posts = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');

}


function addComment($postID, $author, $comment){
    $commentManager = new CommentManager();
    
    $insertSucceed = $commentManager->postComment($postID, $author, $comment);

    if ($insertSucceed === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
        
    } else {
        header('Location: index.php?action=post&id=' . $postID);
    }
}
