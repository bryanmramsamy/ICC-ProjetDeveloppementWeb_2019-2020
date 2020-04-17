<?php

require_once('models/MiniChatManager.php');
require_once('models/PostManager.php');
require_once('models/UserManager.php');

use \ProjetWeb\Model\MiniChatManager;
use \ProjetWeb\Model\PostManager;
use \ProjetWeb\Model\UserManager;


# Authentication

function signin_post(){
    if (isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['password']) && !empty($_POST['password'])) {

        $cleaned_username = htmlspecialchars($_POST['username']);
        $cleaned_password = htmlspecialchars($_POST['password']);

        $userManager = new UserManager;

        $user_found = $userManager->getUser_byUsername($cleaned_username);

        if (!empty($user_found) && password_verify($cleaned_password, $user_found['passwd'])) {
            if ($user_found['active'] == true) {
                set_session($user_found);

                $post_signin_signal = 'connected';
            } else {
                $post_signin_signal = 'inactive';
            }
        } else {
            $post_signin_signal = 'incorrect_credentials';
        }
        
    } else {
        $post_signin_signal = 'invalid_input';
    }
    header('Location: index.php?post_signin_signal=' . $post_signin_signal);
}

function signout(){
    unset_session();

    $post_signin_signal = 'disconnected';
    header('Location: index.php?post_signin_signal=' . $post_signin_signal);
}

function register_post(){
    if (isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['password']) && !empty($_POST['password'])
        && isset($_POST['password_confirmation']) && !empty($_POST['password_confirmation'])) {

        $cleaned_username = htmlspecialchars($_POST['username']);
        $cleaned_password = htmlspecialchars($_POST['password']);
        $cleaned_password_confirmation = htmlspecialchars($_POST['password_confirmation']);

        $userManager = new UserManager();

        $already_exist = $userManager->getUser_byUsername($cleaned_username);

        if (empty($already_exist)) {
            

            if ($cleaned_password === $cleaned_password_confirmation) {
                
                $hashed_password = password_hash($cleaned_password, PASSWORD_DEFAULT);

                $cleaned_email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : NULL;
                $cleaned_last_name = (isset($_POST['last_name']) && !empty($_POST['last_name'])) ? $_POST['last_name'] : NULL;
                $cleaned_first_name = (isset($_POST['first_name']) && !empty($_POST['first_name'])) ? $_POST['first_name'] : NULL;

                $userManager = new UserManager();

                $creation_succeeded = $userManager->createUser($cleaned_username, $hashed_password, $cleaned_email, $cleaned_last_name, $cleaned_first_name);

                if ($creation_succeeded) {
                    set_session($userManager->getUser_byUsername($cleaned_username));

                    $post_register_signal = 'created';
                } else {
                    $post_register_signal = 'failed';
                }

            } else {
                $post_register_signal = 'passwords_mismatch';
            }

        } else {
            $post_register_signal = 'already_exist';
        }
        

    } else {
        $post_register_signal = 'invalid_inputs';
    }

    if ($post_register_signal == 'created') {
        header('Location: index.php?post_register_signal=' . $post_register_signal);
    } else {
        header('Location: index.php?action=register&post_register_signal=' . $post_register_signal);
    }
    
}

function set_session($user){
    $_SESSION['userID'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role_lvl'] = $user['role_lvl'];
    $_SESSION['user_last_name'] = $user['last_name'];
    $_SESSION['user_first_name'] = $user['first_name'];
    $_SESSION['user_image'] = $user['image'];
}

function unset_session(){
    unset($_SESSION['userID']);
    unset($_SESSION['username']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_role_lvl']);
    unset($_SESSION['user_last_name']);
    unset($_SESSION['user_first_name']);
    unset($_SESSION['user_image']);
    unset($_SESSION['user_displayed_name']);
}


# Posts

function post_post(){
    if ($_SESSION['user_role_lvl'] < 50) header('Location: index.php?action=forbidden');

    $cleaned_title = htmlspecialchars($_POST['title']);
    $cleaned_content = htmlspecialchars($_POST['content']);
    $cleaned_is_published = htmlspecialchars($_POST['is_published']);
    $boolean_is_published = $cleaned_is_published != 1 ? 0 : 1;

    $postManager = new PostManager();
    $creation_succeeded = $postManager->createPost($cleaned_title, $cleaned_content, $boolean_is_published);

    $signal_post_postCreation = $creation_succeeded ? 'created' : 'failed';

    header('Location: index.php?action=posts&signal_post_postCreation=' . $signal_post_postCreation);
}


# MiniChat

function minichat_post(){
    if ($_SESSION['user_role_lvl'] < 10) header('Location: index.php?action=forbidden');
    
    $cleaned_message = htmlspecialchars($_POST['message']);

    $minichatManager = new MiniChatManager();
    $creation_succeeded = $minichatManager->createMessage($cleaned_message);

    if ($creation_succeeded) {
        $post_message_signal = 'created';
    } else {
        $post_message_signal = 'creation_failed';
    }
    
    header('Location: index.php?action=minichat&post_new_message_signal=' . $post_new_message_signal);
}