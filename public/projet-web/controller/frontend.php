<?php

require_once('models/UserManager.php');

use \ProjetWeb\Model\UserManager;

/**
 * Show the default view
 */ 
function home(){
    require('views/frontend/home.php');
}


function signin(){
    require('views/frontend/signin.php');
}

function signout(){
    unset($_SESSION['userID']);
    unset($_SESSION['username']);
}


function register(){
    require('views/frontend/register.php');
}
