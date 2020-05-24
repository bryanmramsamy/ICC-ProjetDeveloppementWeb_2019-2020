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

    $orderManager = new OrderManager();
    $nbItems_inBasket = $orderManager->getNumberItems($_SESSION['orderID']);

    require('views/authentication/signin.php');
}

function register(){
    require('views/authentication/register.php');
}

/**
 * Display a user profile to the user itself, or to a moderator or an administrator.
 *
 * @return void Display the user profile
 */
function profile(){
    checkPermissions('user', true);

    if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) $userID = $_SESSION['userID'];
    else if (checkPermissions('modo', false)) {
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

/**
 * Display the basket of the user with all the items added to and all the details of its purchases and its orders.
 * This view can lead to the order confirmation with the checkout view.
 *
 * @return void Display the basket views
 */
function basket(){
    checkPermissions('user', true);

    if ($_SESSION['orderID'] != 0) {
        $empty_basket = false;

        $orderManager = new OrderManager();
        $purchaseManager = new PurchaseManager();

        $order = $orderManager->getOrder_byID($_SESSION['orderID']);
        $number_items = $orderManager->getNumberItems($_SESSION['orderID']);
        $purchases = $purchaseManager->getAllPurchases_byOrder($_SESSION['orderID']);
    } else {
        $empty_basket = true;
    }

    require('views/shop/basket.php');
}

/**
 * Display the checkout view where the user can confirm its order.
 * One must enters its bank account and its address before being redirected to the payment view.
 *
 * If the user saved an address in his profile, this will pre-fill the form by default.
 * Otherwise, the form will be empty and one must enter the data manually.
 *
 * @return void Display the checkout view
 */
function checkout(){
    checkPermissions('user', true);

    if ($_SESSION['orderID'] == 0) header('Location: index.php?action=basket');

    $userManager = new UserManager();
    $orderManager = new OrderManager();
    $purchaseManager = new PurchaseManager();

    $user = $userManager->getUser_byID($_SESSION['userID']);
    $order = $orderManager->getOrder_byID($_SESSION['orderID']);
    $number_items = $orderManager->getNumberItems($_SESSION['orderID']);
    $purchases = $purchaseManager->getAllPurchases_byOrder($_SESSION['orderID']);

    require('views/shop/checkout.php');
}

/**
 * Display the payment view where the user validate his payment
 *
 * @return void Diplay the payment view
 */
function payment(){
    checkPermissions('user', true);

    $orderManager = new OrderManager();

    $orderTotalPrice = $orderManager->getOrder_byID($_SESSION['orderID'])['total'];
    $user_display_name = displayed_name($_SESSION['username'], $_SESSION['user_first_name'], $_SESSION['user_last_name']);
    $cleaned_bank_account = htmlspecialchars($_POST['bank_account']);

    require('views/shop/payment.php');
}

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

/**
 * Display a thank you page to the user when one finished to proceed to the payment of its order
 *
 * @return void Display the thank you page
 */
function thank_you(){
    $user_display_name = displayed_name($_SESSION['username'], $_SESSION['user_first_name'], $_SESSION['user_last_name']);
    require('views/shop/thank_you.php');
}

# Utilities

/**
 * Display the name of the user based on the data filled by the user.
 * 
 * If the user didn't enter any firstname and lastname, its username will be displayed by default.
 * If the firstname is filled, this will be shown. Same for the lastname, but preceeded by a "Mister/Miss".
 * In the case both were filled, btoh will be displayed.
 *
 * @param   string  $username User's username
 * @param   string  $first_name User's filled firstname
 * @param   string  $last_name User's filled lastname
 * @return  string  Name of the user to display
 */
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

/**
 * Truncate a string to a given amount of characters without cutting through words and adds suspension points at the end of the truncated string.
 * Doesn't truncate the string if shorter than the nomber of allowed characters.
 *
 * @param   string  $text String to truncate
 * @param   int     $chars Number of caracters allowed before truncation.
 * @return  string  Truncated string
 */
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
