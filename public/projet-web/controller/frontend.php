<?php

require_once('models/UserManager.php');

use \ProjetWeb\Model\UserManager;


function home(){
    require('views/frontend/home.php');
}


function signin(){
    require('views/frontend/signin.php');
}


function register(){
    require('views/frontend/register.php');
}
