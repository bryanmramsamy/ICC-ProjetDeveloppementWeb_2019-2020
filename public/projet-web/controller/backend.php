<?php

require_once('models/UserManager.php');

use \ProjetWeb\Model\UserManager;


function signin_post(){
    if (isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['password']) && !empty($_POST['password'])) {

        $cleaned_username = htmlspecialchars($_POST['username']);
        $cleaned_password = htmlspecialchars($_POST['password']);

        $userManager = new UserManager;

        $user_found = $userManager->getUser_byUsername($cleaned_username);

        // TODO: Add password verifiction !

        if (!empty($user_found)) {
            if ($user_found['active'] == true) {
                $_SESSION['userID'] = $user_found['id'];
                $_SESSION['username'] = $user_found['username'];
                $_SESSION['user_email'] = $user_found['email'];
                $_SESSION['user_role_lvl'] = $user_found['role_lvl'];
                $_SESSION['user_last_name'] = $user_found['last_name'];
                $_SESSION['user_first_name'] = $user_found['first_name'];

                $post_signin_signal = 'success';
            } else {
                $post_signin_signal = 'inactive';
            }
        } else {
            $post_signin_signal = 'not_found';
        }
        
    } else {
        $post_signin_signal = 'invalid_input';
    }
    header('Location: index.php?post_signin_signal=' . $post_signin_signal);
}