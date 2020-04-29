<?php

require_once('models/CommentManager.php');
require_once('models/MiniChatManager.php');
require_once('models/PostManager.php');
require_once('models/UserManager.php');

use \ProjetWeb\Model\CommentManager;
use \ProjetWeb\Model\MiniChatManager;
use \ProjetWeb\Model\PostManager;
use \ProjetWeb\Model\UserManager;


# Authentication

function clean_userID() {
    clean_GET('userID');
}

function check_userExist($userID){
    $userManager = new UserManager();
    $user = $userManager->getUser_byID($userID);

    if (empty($user['id'])) header('Location: index.php?action=404');
}


# Permissions

const PERMISSION = array(
    'guest' => 0,
    'user' => 10,
    # 'spec' => 30,
    'moderator' => 40,
    'admin' => 50,
);

function checkPermissions($required_permissions, $redirection) {
    $premissions_granted = $_SESSION['user_role_lvl'] >= PERMISSION[$required_permissions];

    if (!$premissions_granted && $redirection) header('Location: index.php?action=forbidden');
    else return $premissions_granted;
}

# Posts

function clean_postID() {
    return clean_GET('postID');
}

function check_postExist($postID){
    $postManager = new PostManager();
    $post = $postManager->getPost_byID($postID);

    if (empty($post['id'])) header('Location: index.php?action=404');
}

function clean_commentID() {
    return clean_GET('commentID');
}

function check_commentExist($commentID){
    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($commentID);

    if (empty($comment['id'])) header('Location: index.php?action=404');
}

# MiniChat

function clean_messageID() {
    return clean_GET('messageID');
}

function check_messageExist($messageID){
    $minichatManager = new MiniChatManager();
    $message = $minichatManager->getMessage($messageID);

    if (empty($message['messageID'])) header('Location: index.php?action=404');
}

# Utility

function clean_GET($value) {
    if (isset($_GET[$value]) && !empty($_GET[$value])) return htmlspecialchars($_GET[$value]);
    else header ('Location: index.php?action=404');
}

function check_signal($signal_message, $alert){
    if (!empty($signal_message)) echo ("<div class=\"alert alert-$alert\" role=\"alert\">$signal_message</div>");
}
