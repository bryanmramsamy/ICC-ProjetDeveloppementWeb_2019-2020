<?php

require('model/frontend.php');

function listPosts(){
    $posts = getPosts();
    
    require('view/frontend/listPostsView.php');

}

function post(){
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('view/frontend/postView.php');

}


function addComment($postID, $author, $comment){
    $insertSucceed = postComment($postID, $author, $comment);

    if ($insertSucceed === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
        
    } else {
        header('Location: index.php?action=post&id=' . $postID);
    }
}