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

                $signal_post_userSignin = 'connected';
            } else {
                $signal_post_userSignin = 'inactive';
            }
        } else {
            $signal_post_userSignin = 'incorrect_credentials';
        }
        
    } else {
        $signal_post_userSignin = 'invalid_input';
    }
    header('Location: index.php?signal_post_userSignin=' . $signal_post_userSignin);
}

function signout(){
    unset_session();

    $signal_post_userSignin = 'disconnected';
    header('Location: index.php?signal_post_userSignin=' . $signal_post_userSignin);
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

                    $signal_post_userRegister = 'created';
                } else {
                    $signal_post_userRegister = 'failed';
                }

            } else {
                $signal_post_userRegister = 'passwords_mismatch';
            }

        } else {
            $signal_post_userRegister = 'already_exist';
        }
        

    } else {
        $signal_post_userRegister = 'invalid_inputs';
    }

    if ($signal_post_userRegister == 'created') {
        header('Location: index.php?signal_post_userRegister=' . $signal_post_userRegister);
    } else {
        header('Location: index.php?action=register&signal_post_userRegister=' . $signal_post_userRegister);
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

function password_change_post(){
    if (isset($_POST['userID']) && !empty($_POST['userID'])) {
        $cleaned_userID = htmlspecialchars($_POST['userID']);

        if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
            $cleaned_old_password = htmlspecialchars($_POST['old_password']);

            if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
                $cleaned_new_password = htmlspecialchars($_POST['new_password']);

                if (isset($_POST['new_password_confirmation']) && !empty($_POST['new_password_confirmation'])) {
                    $cleaned_new_password_confirmation = htmlspecialchars($_POST['new_password_confirmation']);
                } else { 
                    $signal_post_password_change = 'empty_new_password';
                }

            } else {
                $signal_post_password_change = 'empty_new_password';
            }

        } else {
            $signal_post_password_change = 'empty_old_password';
        }

    } else {
        $signal_post_password_change = 'empty_userID';
    }

    if (empty($signal_post_password_change)) {
        $userManager = new UserManager();
        $user = $userManager->getUser_byID($cleaned_userID);

        if (!empty($user['id'])) {
            if (password_verify($cleaned_old_password, $user['passwd'])) {
                if ($cleaned_new_password === $cleaned_new_password_confirmation) {
                    $hashed_password = password_hash($cleaned_new_password, PASSWORD_DEFAULT);

                    $password_changed = $userManager->password_change($cleaned_userID, $hashed_password);

                    if ($password_changed) {
                        $signal_post_password_change = 'succeed';
                    } else {
                        $signal_post_password_change = 'failed';
                    }
                    
                } else {
                    $signal_post_password_change = 'passwords_mismatch';
                }
                
            } else {
                $signal_post_password_change = 'incorrect_credentials';
            }
        } else {
            $signal_post_password_change = 'user_unknown';
        }
    }

    $profileID_GET = checkPermissions('admin', false) ? "&userID=" . $cleaned_userID : "";

    if ($signal_post_password_change == 'succeed') {
        header('Location: index.php?action=profile' . $profileID_GET);
    } else {
        header('Location: index.php?action=profile_update' . $profileID_GET);
    }
}


# Posts

function post_create_post(){
    checkPermissions('admin', true);

    if (isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['content']) && !empty($_POST['content'])) {

        $cleaned_title = htmlspecialchars($_POST['title']);
        $cleaned_content = htmlspecialchars($_POST['content']);
        $cleaned_is_published = htmlspecialchars($_POST['is_published']);
        $boolean_is_published = $cleaned_is_published != 1 ? 0 : 1;

        $postManager = new PostManager();
        $creation_succeeded = $postManager->createPost($cleaned_title, $cleaned_content, $boolean_is_published);

        $signal_post_postCreation = $creation_succeeded ? 'created' : 'failed';
    } else {
        $signal_post_postCreation = 'invalid';
    }
    
    if ($signal_post_postCreation === 'created') {
        header('Location: index.php?action=posts&signal_post_postCreation=' . $signal_post_postCreation);
    } else {
        header('Location: index.php?action=post_create&signal_post_postCreation=' . $signal_post_postCreation);
    }
}

function post_update_post() {
    checkPermissions('admin', true);

    $postID = clean_postID();
    check_postExist($postID);

    $postManager = new PostManager();
    $post = $postManager->getPost_byID($postID);

    $cleaned_title = (isset($_POST['title']) & !empty($_POST['title'])) ? htmlspecialchars($_POST['title']) : null;
    $cleaned_content = (isset($_POST['content']) & !empty($_POST['content'])) ? htmlspecialchars($_POST['content']) : null;
    $cleaned_is_published = htmlspecialchars($_POST['is_published']);
    $boolean_is_published = $cleaned_is_published != 1 ? 0 : 1;

    $update_succeeded = $postManager->updatePost($postID, $cleaned_title, $cleaned_content, $boolean_is_published);

    $signal_post_postUpdate = $update_succeeded ? 'updated' : 'failed';
    
    if ($signal_post_postUpdate === 'updated') {
        header('Location: index.php?action=post&postID=' . $postID . '&signal_post_postUpdate=' . $signal_post_postUpdate);
    } else {
        header('Location: index.php?action=post_create&signal_post_postUpdate=' . $signal_post_postUpdate);
    }
}

function post_publish(){
    checkPermissions('admin', true);

    $postID = clean_postID();
    check_postExist($postID);

    $postManager = new PostManager();

    $publication_modification_succeed = $postManager->publishPost($postID);

    $signal_post_postPublication = $publication_modification_succeed ? 'succeed' : 'failed';

    header('Location: index.php?action=post&postID=' . $postID . '&signal_post_postPublication=' . $signal_post_postPublication);
}

function post_comment_create_post() {
    checkPermissions('user', true);

    $postID = clean_postID();
    check_postExist($postID);

    if (isset($_POST['comment']) && !empty($_POST['comment'])) {
        $cleaned_comment = htmlspecialchars($_POST['comment']);

        $commentManager = new CommentManager();
        $creation_succeeded = $commentManager->createComment($postID, $cleaned_comment);

        $signal_post_commentCreation = $creation_succeeded ? 'created' : 'failed';
    } else {
        $signal_post_commentCreation = 'invalid';
    }

    header('Location: index.php?action=post&postID=' . $postID . '&signal_post_commentCreation=' . $signal_post_commentCreation);
}

function post_comment_update_post() {
    checkPermissions('user', true);

    $commentID = clean_commentID();
    check_commentExist($commentID);

    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($commentID);

    if (!checkPermissions('admin', false) || $comment['created_by'] != $_SESSION['userID']) header ('Location: index.php?action=forbidden');

    $cleaned_comment = (isset($_POST['comment']) & !empty($_POST['comment'])) ? htmlspecialchars($_POST['comment']) : null;
    $cleaned_is_visible = htmlspecialchars($_POST['is_visible']);
    $boolean_is_visible = $cleaned_is_visible != 1 ? 0 : 1;

    $update_succeeded = $commentManager->updateComment($commentID, $cleaned_comment, $boolean_is_visible);

    $signal_post_commentUpdate = $update_succeeded ? 'updated' : 'failed';
    
    if ($signal_post_commentUpdate === 'updated') {
        header('Location: index.php?action=post&postID=' . $comment['post_id'] . '&signal_post_commentUpdate=' . $signal_post_commentUpdate);
    } else {
        header('Location: index.php?action=post_comment_update&commentID=' . $commentID . '&signal_post_commentUpdate=' . $signal_post_commentUpdate);
    }
}

function post_comment_publish(){
    checkPermissions('admin', true);

    $commentID = clean_commentID();
    check_commentExist($commentID);

    $commentManager = new CommentManager();

    $visibility_modification_succeed = $commentManager->makeCommentVisible($commentID);

    $signal_post_commentVisibility = $visibility_modification_succeed ? 'succeed' : 'failed';

    $postID = $commentManager->getComment($commentID)['post_id'];
    
    header('Location: index.php?action=post&postID=' . $postID . '&signal_post_comcommentVisibility=' . $signal_post_comcommentVisibility);
}

# MiniChat

function minichat_post(){
    checkPermissions('user', true);

    $cleaned_message = htmlspecialchars($_POST['message']);

    $minichatManager = new MiniChatManager();
    $creation_succeeded = $minichatManager->createMessage($cleaned_message);

    $signal_post_messageCreation = $creation_succeeded ? 'created' : 'failed';
    
    header('Location: index.php?action=minichat&signal_post_messageCreation=' . $signal_post_messageCreation);
}
