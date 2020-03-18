<?php

require_once('models/UserManager.php');

use ProjetWeb\Model\UserManager;


function connect() {

    require('views/backend/connect.php');

}


/**
 * Show the default view
 */ 
function login($userID){

    $userManager = new UserManager();
    $user = $userManager->getUser($userID);

    require('views/backend/sign_in.php');

}