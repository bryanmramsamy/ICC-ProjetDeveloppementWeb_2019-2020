<?php
session_start();

require('controller/meta.php');
require('controller/backend.php');
require('controller/frontend.php');

const MINICHAT_NB_MESSAGE_PER_PAGE = 10;
const POSTS_NB_COMMENT_PER_PAGE = 10;
const POSTS_NB_POST_PER_PAGE = 10;
const SHOP_NB_ARTICLE_PER_PAGE = 10;

try {
    if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0) $page = $_GET['page'];

    if (isset($_GET['action']) && !empty($_GET['action'])) {
        switch ($_GET['action']) {
            case 'forbidden':
                forbidden();
                break;

            case 'home':
                home();
                break;

            case 'minichat':
                minichat($page, MINICHAT_NB_MESSAGE_PER_PAGE);
                break;

            case 'minichat_post':
                minichat_post();
                break;

            case 'minichat_update':
                minichat_update();
                break;

            case 'minichat_update_post':
                minichat_update_post();
                break;

            case 'minichat_publish':
                minichat_publish();
                break;

            case 'password_change':
                password_change();
                break;

            case 'password_change_post':
                password_change_post();
                break;

            case 'post':
                post($page, POSTS_NB_COMMENT_PER_PAGE);
                break;

            case 'post_comment_create_post':
                post_comment_create_post();
                break;

            case 'post_comment_update':
                post_comment_update();
                break;

            case 'post_comment_update_post':
                post_comment_update_post();
                break;

            case 'post_comment_publish':
                post_comment_publish();
                break;

            case 'post_create':
                post_create();
                break;

            case 'post_create_post':
                post_create_post();
                break;

            case 'post_update':
                post_update();
                break;
            
            case 'post_update_post':
                post_update_post();
                break;

            case 'post_publish':
                post_publish();
                break;

            case 'posts':
                posts($page, POSTS_NB_POST_PER_PAGE);
                break;

            case 'profile':
                profile();
                break;
            
            case 'profile_update':
                profile_update();
                break;

            case 'profile_update_post':
                profile_update_post();
                break;

            case 'register':
                register();
                break;
            
            case 'register_post':
                register_post();
                break;

            case 'shop':
                shop($page, SHOP_NB_ARTICLE_PER_PAGE);
                break;

            case 'shop_article':
                shop_article();
                break;

            case 'shop_article_create':
                shop_article_create();
                break;

            case 'shop_article_create_post':
                shop_article_create_post();
                break;

            case 'shop_article_update':
                shop_article_update();
                break;

            // case 'signin':
            //     signin();
            //     break;

            case 'signin_post':
                signin_post();
                break;

            case 'signout':
                signout();
                break;

            default:
                not_found();
                break;
        }
    } else {
        home();
    }
    
} catch (Exception $e) {
    echo ('Erreur: ' . $e->getMessage());
    echo ("<br/><a href='index.php'>Revenir à l'accueil</a>");
}
