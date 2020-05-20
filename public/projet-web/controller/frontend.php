<?php

require_once('models/CommentManager.php');
require_once('models/MiniChatManager.php');
require_once('models/PostManager.php');
require_once('models/ShopArticleManager.php');
require_once('models/ShopCategoryManager.php');
require_once('models/UserManager.php');

use \ProjetWeb\Model\CommentManager;
use \ProjetWeb\Model\MiniChatManager;
use \ProjetWeb\Model\PostManager;
use \ProjetWeb\Model\ShopArticleManager;
use \ProjetWeb\Model\ShopCategoryManager;
use \ProjetWeb\Model\UserManager;


# Static pages

function home(){
    require('views/static/home.php');
}

function forbidden(){
    require('views/static/forbidden.php');
}

function not_found(){
    require('views/static/not_found.php');
}


# Authentication

function signin(){
    switch ($_SESSION['user_role_lvl']) {
        case 20:
            $role_colour = 'warning';
            $role_tag = 'Premium';
            break;

        case 30:
            $role_colour = 'success';
            $role_tag = 'V.I.P.';
            break;
        
        case 40:
            $role_colour = 'info';
            $role_tag = 'Modérateur';
            break;

        case '50':
            $role_colour = 'info';
            $role_tag = 'Administrateur';
            break;
    }

    require('views/authentication/signin.php');
}

function register(){
    require('views/authentication/register.php');
}

function profile(){
    checkPermissions('user', true);

    if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) $userID = $_SESSION['userID'];
    else if (checkPermissions('admin', false)) {
        $userID = clean_userID();
        check_userExist($userID);
    }

    $userManager = new UserManager();

    $user = $userManager->getUser_byID($userID);

    require('views/authentication/profile.php');
}

function password_change(){
    checkPermissions('user', true);

    if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) $userID = $_SESSION['userID'];
    else if (checkPermissions('admin', false)) {
        $userID = clean_userID();
        check_userExist($userID);
    }

    $userManager = new UserManager();
    $user = $userManager->getUser_byID($userID);

    require('views/authentication/password_change.php');
}

function profile_update(){
    checkPermissions('user', true);

    if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) $userID = $_SESSION['userID'];
    else if (checkPermissions('admin', false)) {
        $userID = clean_userID();
        check_userExist($userID);
    }

    $userManager = new UserManager();
    $user = $userManager->getUser_byID($userID);

    require('views/authentication/profile_UpdateView.php');
}


# MiniChat

function minichat($page=1, $nb_message_per_page){
    $minichatManager = new MiniChatManager();

    $messages = $minichatManager->getMessages_byPage($page, $nb_message_per_page);
    $actual_page = $minichatManager->getActualPageMessage($page, $nb_message_per_page);
    $total_pages = $minichatManager->getTotalPagesMessage($nb_message_per_page);

    require('views/minichat/minichat_ListView.php');
}

function minichat_update(){
    checkPermissions('user', true);

    $messageID = clean_messageID();
    check_messageExist($messageID);

    $minichatManager = new MiniChatManager();
    $message = $minichatManager->getMessage($messageID);

    require('views/minichat/minichat_UpdateView.php');
}


# Posts

function posts($page=1, $nb_post_per_page){
    $postManager = new PostManager();

    $posts = $postManager->getPosts_byPage($page, $nb_post_per_page);
    $actual_page = $postManager->getActualPagePost($page, $nb_post_per_page);
    $total_pages = $postManager->getTotalPagesPost($nb_post_per_page);

    require('views/posts/posts_ListView.php');
}

function post($page=1, $nb_comment_per_page){
    $postID = clean_postID();

    $commentManager = new CommentManager();
    $postManager = new PostManager();
    $userManager = new UserManager();

    $post = $postManager->getPost_byID($postID);
    $post_created_by = $userManager->getUser_byID($post['created_by']);

    $comments = $commentManager->getComments_byPage($page, $nb_comment_per_page);
    $actual_page = $commentManager->getActualPageComment($page, $nb_comment_per_page);
    $total_pages = $commentManager->getTotalPagesComment($nb_comment_per_page);

    require('views/posts/post_DetailView.php');
}

function post_create(){
    checkPermissions('admin', true);
    require('views/posts/post_CreateView.php');
}

function post_update(){
    checkPermissions('admin', true);

    $postID = clean_postID();
    check_postExist($postID);

    $cleaned_postID = htmlspecialchars($postID);

    $postManager = new PostManager();
    $post = $postManager->getPost_byID($cleaned_postID);

    require('views/posts/post_UpdateView.php');
}

function post_comment_update(){
    $is_admin = checkPermissions('user', true);

    $commentID = clean_commentID();
    check_commentExist($commentID);

    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($commentID);

    require('views/posts/comment_UpdateView.php');
}


# Shop

function shop($page=1, $nb_post_per_page){
    if (isset($_GET['category']) && !empty($_GET['category'])) $category = htmlspecialchars($_GET['category']);
    
    $shopArticleManager = new ShopArticleManager();

    $articles = $shopArticleManager->getArticles_byPage($page, $nb_post_per_page);
    $actual_page = $shopArticleManager->getActualPageArticle($page, $nb_post_per_page);
    $total_pages = $shopArticleManager->getTotalPagesArticle($nb_post_per_page);

    require('views/shop/articles_ListView.php');
}

function shop_add_to_basket(){
    checkPermissions('user', true);

    shop_add_to_basket_post();
}

function shop_article(){
    $articleID = clean_articleID();

    $shopArticleManager = new ShopArticleManager();
    $shopCategoryManager = new shopCategoryManager();

    $article = $shopArticleManager->getArticle_byID($articleID);
    $category = $shopCategoryManager->getCategory_byID($article['categorieID']);

    require('views/shop/article_DetailView.php');
}

function shop_article_create(){
    checkPermissions('modo', true);

    $shopCategoryManager = new ShopCategoryManager();

    $categories = $shopCategoryManager->getAllCategories();

    require('views/shop/article_CreateView.php');
}

function shop_article_update(){
    checkPermissions('modo', true);

    $articleID = clean_articleID();
    check_articleExist($articleID);

    $cleaned_articleID = htmlspecialchars($articleID);

    $shopArticleManager = new ShopArticleManager();
    $shopCategoryManager = new ShopCategoryManager();

    $article = $shopArticleManager->getArticle_byID($cleaned_articleID);
    $categories = $shopCategoryManager->getAllCategories();

    require('views/shop/article_UpdateView.php');
}

function shop_category_create(){
    checkPermissions('modo', true);

    require('views/shop/category_CreateView.php');
}

# Utilities

function displayed_name($username, $first_name=null, $last_name=null){
    if ($first_name != null && $last_name != null) {
        $displayed_name = $first_name . " " . $last_name;
    } else if ($last_name != null) {
        $displayed_name = "M/Mme " . $last_name;
    } else if ($first_name != null) {
        $displayed_name = $first_name;
    } else {
        $displayed_name = $username;
    }

    return $displayed_name;
}

function truncate($text, $chars=150) {
    if (strlen($text) <= $chars) {
        return $text;
    }
    $text = $text." ";
    $text = substr($text,0,$chars);
    $text = substr($text,0,strrpos($text,' '));
    $text = $text."...";
    return $text;
}
