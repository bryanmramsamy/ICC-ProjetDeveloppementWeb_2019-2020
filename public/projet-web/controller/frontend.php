<?php

require_once('models/MiniChatManager.php');
require_once('models/PostManager.php');
require_once('models/UserManager.php');

use \ProjetWeb\Model\MiniChatManager;
use \ProjetWeb\Model\PostManager;
use \ProjetWeb\Model\UserManager;


# Static pages

function home(){
    require('views/frontend/home.php');
}

function forbidden(){
    require('views/frontend/forbidden.php');
}


# Authentication

function signin(){
    require('views/frontend/signin.php');
}

function register(){
    require('views/frontend/register.php');
}

function profile(){
    $userManager = new UserManager();

    $profile = $userManager->getUser_byID($_SESSION['userID']);

    require('views/frontend/profile.php');
}


# Posts

function posts($page=1, $nb_post_per_page){
    $postManager = new PostManager();

    $posts = $postManager->getPosts_byPage($page, $nb_post_per_page);
    $actual_page = $postManager->getActualPagePost($page, $nb_post_per_page);
    $total_pages = $postManager->getTotalPagesPost($nb_post_per_page);

    $previous_page = $actual_page - 1;
    $next_page = $actual_page + 1;

    require('views/frontend/posts.php');
}

function post($postID){
    $postManager = new PostManager();
    $userManager = new UserManager();

    $post = $postManager->getPost_byID($postID);
    $created_by = $userManager->getUser_byID($post['created_by']);

    require('views/frontend/post_detailview.php');
}

function post_create(){
    require('views/frontend/post_CreateView.php');
}


# MiniChat

function minichat($page=1, $nb_message_per_page){
    $minichatManager = new MiniChatManager();

    $messages = $minichatManager->getMessages_byPage($page, $nb_message_per_page);
    $actual_page = $minichatManager->getActualPageMessage($page, $nb_message_per_page);
    $total_pages = $minichatManager->getTotalPagesMessage($nb_message_per_page);

    $previous_page = $actual_page - 1;
    $next_page = $actual_page + 1;

    require('views/frontend/minichat.php');
}


# Utilities

function displayed_name($username, $first_name=null, $last_name=null){
    if ($first_name != null && $last_name != null) {
        $displayed_name = $first_name . " " . $last_name;
    } else if ($last_name != null) {
        $displayed_name = "M/Mme " . $last_name;
    } else if ($first_name != null) {
        $displayed_name = $first_name;
    } else {
        $displayed_name = $username;
    }

    return $displayed_name;
}

function truncate($text, $chars=150) {
    if (strlen($text) <= $chars) {
        return $text;
    }
    $text = $text." ";
    $text = substr($text,0,$chars);
    $text = substr($text,0,strrpos($text,' '));
    $text = $text."...";
    return $text;
}
