<?php

require_once('models/MiniChatManager.php');
require_once('models/UserManager.php');

use \ProjetWeb\Model\MiniChatManager;
use \ProjetWeb\Model\UserManager;


function forbidden(){
    require('views/frontend/forbidden.php');
}

function home(){
    require('views/frontend/home.php');
}

function minichat($page, $nb_message_per_page){
    $minichatManager = new MiniChatManager();

    # To be removed ***
        $db_table = 'minichat';

    $messages = $minichatManager->getMessages_byPage($page, $nb_message_per_page);
    $actual_page = $minichatManager->getActualPageMessage($page, $nb_message_per_page);
    $total_pages = $minichatManager->getTotalPagesMessage($nb_message_per_page);

    $previous_page = $actual_page - 1;
    $next_page = $actual_page + 1;

    require('views/frontend/minichat.php');
}

function post(){

}

function profile(){
    $userManager = new UserManager();

    $profile = $userManager->getUser_byID($_SESSION['userID']);

    require('views/frontend/profile.php');
}

function register(){
    require('views/frontend/register.php');
}

function signin(){
    require('views/frontend/signin.php');
}
