<?php

require_once('models/UserManager.php');

use \ProjetWeb\Model\UserManager;

/**
 * Show the default view
 */ 
function home(){
    require('views/frontend/home.php');
}


function connect(){
    require('views/frontend/connect.php');
}

function disconnect(){
    unset($_SESSION['userID']);
    unset($_SESSION['username']);
}


function register(){
    require('views/frontend/register.php');
}


function register_post($username, $password, $password_confirmation, $email, $last_name, $first_name){

    $userManager = new UserManager();
    $error_code_register = 0;


    // Check if username already exist
    $cleaned_username = htmlspecialchars($username);
    echo($cleaned_username);
    $userID = $userManager->getID($cleaned_username);
    echo($userID);
    if(empty($userID) || $userID > 0) $error_code_register + 1;


    // Check if password and password_confirmation match
    $cleaned_password = htmlspecialchars($password);
    $cleaned_password_confirmation = htmlspecialchars($password_confirmation);

    if ($cleaned_password_confirmation != $cleaned_password) $error_code_register + 2;
    else $cleaned_password = password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);

    print("error_code_register = " . $error_code_register);

    // if ($error_code_register != 0) {
    //     header('Location: views/frontend/register.php?error=' . $error_code_register);

    // } else {
    //     $cleaned_email = htmlspecialchars($email);
    //     $cleaned_last_name = htmlspecialchars($last_name);
    //     $cleaned_first_name = htmlspecialchars($first_name);

    //     $creation_succeed = $userManager->createUser($cleaned_username,
    //                                                  $cleaned_password,
    //                                                  $cleaned_email,
    //                                                  $cleaned_last_name,
    //                                                  $cleaned_first_name);

    //     if ($creation_succeed) {
    //         $_SESSION['userID'] = $userManager->getID($cleaned_username);
    //         $_SESSION['username'] = $cleaned_username;
    //         header('Location: index.php');

    //     } else {
    //         throw new Exception("Creation du nouvel utilisateur échouée !");
    //     }
    // }
}