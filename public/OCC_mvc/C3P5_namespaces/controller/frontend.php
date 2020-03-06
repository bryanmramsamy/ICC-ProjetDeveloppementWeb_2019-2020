<?php

# require_once = Class is loaded only once
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

use \OpenClassrooms\Blog\Model\PostManager;
use \OpenClassrooms\Blog\Model\CommentManager;

function listPosts(){
    #$postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $postManager = new PostManager();  # use
    $posts = $postManager->getPosts();
    
    require('view/frontend/listPostsView.php');

}

function post(){
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $posts = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');

}


function addComment($postID, $author, $comment){
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    
    $insertSucceed = $commentManager->postComment($postID, $author, $comment);

    if ($insertSucceed === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
        
    } else {
        header('Location: index.php?action=post&id=' . $postID);
    }
}
