<?php

function dbConnect(){
    $db = new PDO('mysql:host=mysql;dbname=test_mvc;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    return $db;

}


function getPosts(){
    $db = dbConnect();

    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    return $req;

}


function getPost($postID){
    $db = dbConnect();

    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = :postID ');
    $req->execute(array('postID' => $postID));
    $post = $req->fetch();

    return $post;

}


function getComments($postID){
    $db = dbConnect();

    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ?');
    $comments->execute(array($postID));

    return $comments;

}


function postComment($postID, $author, $comment){
    $db = dbConnect();

    $comments = $db->prepare('INSERT INTO comments (post_id, author, comment, comment_date) VALUES (:post_id, :author, :comment, NOW())');

    $insertSucceed = $comments->execute(array(
        'post_id' => $postID,
        'author' => $author,
        'comment' => $comment
    ));

    return $insertSucceed;

}