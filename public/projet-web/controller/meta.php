<?php

require_once('models/CommentManager.php');
require_once('models/MiniChatManager.php');
require_once('models/PostManager.php');
require_once('models/UserManager.php');

use \ProjetWeb\Model\CommentManager;
use \ProjetWeb\Model\MiniChatManager;
use \ProjetWeb\Model\PostManager;
use \ProjetWeb\Model\UserManager;


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
    if (isset($_GET['postID']) && !empty($_GET['postID'])) return htmlspecialchars($_GET['postID']);
    else header ('Location: index.php?action=404');
}

function check_postExist($postID){
    $postManager = new PostManager();
    $post = $postManager->getPost_byID($postID);

    if (empty($post['id'])) header('Location: index.php?action=404');
}