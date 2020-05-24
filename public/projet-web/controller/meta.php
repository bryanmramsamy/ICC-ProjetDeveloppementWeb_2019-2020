<?php

require_once('models/CommentManager.php');
require_once('models/MiniChatManager.php');
require_once('models/OrderManager.php');
require_once('models/PostManager.php');
require_once('models/PurchaseManager.php');
require_once('models/ShopArticleManager.php');
require_once('models/ShopCategoryManager.php');
require_once('models/UserManager.php');
require_once('models/UserLogsManager.php');

use \ProjetWeb\Model\CommentManager;
use \ProjetWeb\Model\MiniChatManager;
use \ProjetWeb\Model\OrderManager;
use \ProjetWeb\Model\PostManager;
use \ProjetWeb\Model\PurchaseManager;
use \ProjetWeb\Model\ShopArticleManager;
use \ProjetWeb\Model\ShopCategoryManager;
use \ProjetWeb\Model\UserManager;
use \ProjetWeb\Model\UserLogsManager;


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
    'premium' => 20,
    'vip' => 30,
    'modo' => 40,
    'admin' => 50,
);

/**
 * Check if the access is granted or denied to a user based on its permission level.
 * Return boolean according to the permission level and the needed access.
 * Redirect the user which access was denied if the redirection arugment is set to true.
 *
 * @param   string  $required_permissions Needed permission level to have the access granted
 * @param   boolean $redirection Indicates if the user whom access was denied must be redirected to the forbidden page
 * @return  boolean True if the access was granted. False if the access was denied but the redirection argument is set to false.
 */
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


# Shop

function clean_articleID() {
    return clean_GET('articleID');
}

function check_articleExist($articleID){
    $shopArticleManager = new ShopArticleManager();
    $article = $shopArticleManager->getArticle_byID($articleID);

    if (empty($article['id'])) header('Location: index.php?action=404');
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

/**
 * Check and clean a GET argument and redirect to a not found page if the argument doesn't isn't valid
 *
 * @param  mixed $key Keyword of the GET argument
 * @return void The cleaned GET argument value or redirect to the not found page
 */
function clean_GET($key) {
    if (isset($_GET[$key]) && !empty($_GET[$key])) return htmlspecialchars($_GET[$key]);
    else header ('Location: index.php?action=404');
}

/**
 * Display a signal alert based on its message and its warning level to display
 *
 * @param   string  $signal_message Message of the signal
 * @param   string  $alert Warning level of the signal
 * @return  void    Display the signal
 */
function check_signal($signal_message, $alert){
    $alert == 'danger' ?  $contact_mail = "<a href=\"mailto:raccoon-city@rpd.com\">Veuillez nous contacter en cliquant sur ce lien pour obtenir assistance</a>" : $contact_mail = "";

    if (!empty($signal_message)) echo ("<div class=\"alert alert-$alert\" role=\"alert\">$signal_message $contact_mail</div>");
}
