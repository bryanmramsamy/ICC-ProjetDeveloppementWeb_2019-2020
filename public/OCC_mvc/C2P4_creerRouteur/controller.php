<?php
# <- Previous step: see index.php
# Controller will process the code with needed variables and put the result-variables in a view
# -> Next step: see listPostsView.php

require('model.php');

function listPosts(){
    $posts = getPosts();
    
    require('listPostsView.php');

}

function post(){
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('postView.php');

}