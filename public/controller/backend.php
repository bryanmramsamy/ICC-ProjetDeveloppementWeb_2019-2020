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


# Administration

/**
 * Change the user activation status
 *
 * @return void Redirect to the User ListView after the user status update
 */
function user_activation(){
    checkPermissions('modo', true);
    $userID = clean_GET('userID');

    $userManager = new UserManager();
    
    $user = $userManager->getUser_byID($userID);

    if (!empty($user['id'])) {
        if ($user['active']) {
            $activationStateSwitch = $userManager->deactivateUser($userID);
        } else {
            $activationStateSwitch = $userManager->activateUser($userID);
        }
        $activationStateSwitch ? $signal_post_user_activationStateSwitch = 'succeeded' : $signal_post_user_activationStateSwitch = 'failed';
    } else {
        $signal_post_user_activationStateSwitch = 'not_found';
    }

    header('Location: index.php?action=admin&signal_post_user_activationStateSwitch=' . $signal_post_user_activationStateSwitch);
}


# Authentication

/**
 * Log the user in.
 * 
 * Check if the credential inputs are valid and safe.
 * Check if the logged user already exist in the database and if the password hash match with the one stored in the database.
 * Then assign the sessions variables to the user.
 * 
 * Returns error messages acording the the error thrown.
 * Save a login log in the database if the user successfully logged itself in.
 *
 * @return  void Redirect to the homepage, no matter if the user succeed to log itself in or not.
 */
function signin_post(){
    if (isset($_POST['username']) && !empty($_POST['username'])
        && isset($_POST['password']) && !empty($_POST['password'])) {

        $cleaned_username = htmlspecialchars($_POST['username']);
        $cleaned_password = htmlspecialchars($_POST['password']);

        $userManager = new UserManager;
        $userLogsManager = new UserLogsManager();

        $user_found = $userManager->getUser_byUsername($cleaned_username);

        if (!empty($user_found) && password_verify($cleaned_password, $user_found['passwd'])) {
            if ($user_found['active'] == true) {
                set_session($user_found);
                $connection_logged = $userLogsManager->login($_SESSION['userID']);

                $connection_logged ? $signal_post_userSignin = 'connected' : $signal_post_userSignin = 'logged_failed';
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
                $userLogsManager = new UserLogsManager();

                $creation_succeeded = $userManager->createUser($cleaned_username, $hashed_password, $cleaned_email, $cleaned_last_name, $cleaned_first_name, PERMISSION['user']);

                if ($creation_succeeded) {
                    set_session($userManager->getUser_byUsername($cleaned_username));
                    $connection_logged = $userLogsManager->login($_SESSION['userID']);

                    $connection_logged ? $signal_post_userRegister = 'created' : $signal_post_userRegister = 'logged_failed';
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

/**
 * Set all session variables when a user is logged in
 *
 * @param   User    $user The logged in user
 * @return  void    Set the user session variables for the user
 */
function set_session($user){
    $_SESSION['userID'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role_lvl'] = $user['role_lvl'];
    $_SESSION['user_last_name'] = $user['last_name'];
    $_SESSION['user_first_name'] = $user['first_name'];
    $_SESSION['user_image'] = $user['image'];

    if (isset($_COOKIE['orderID']) && !empty($_COOKIE['orderID'])
        && order_is_from_user($_SESSION['userID'], $_COOKIE['orderID'])) {
            $_SESSION['orderID'] = $_COOKIE['orderID'];
    } else {
        $_SESSION['orderID'] = 0;
    }
}

/**
 * Check if the given order was made from the given user
 *
 * @param   int     $userID User ID
 * @param   int     $orderID Order ID
 * @return  boolean True if the order was made by the user
 */
function order_is_from_user($userID, $orderID){
    $orderManager = new OrderManager();

    $order = $orderManager->getOrder_byID($orderID);
    return $userID == $order['userID'];
}

/**
 * Unset all the session's variables
 *
 * @return void Unset all the session's variables
 */
function unset_session(){
    unset($_SESSION['userID']);
    unset($_SESSION['username']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_role_lvl']);
    unset($_SESSION['user_last_name']);
    unset($_SESSION['user_first_name']);
    unset($_SESSION['user_image']);
    unset($_SESSION['user_displayed_name']);
    unset($_SESSION['orderID']);
}

function password_change_post(){
    if (isset($_POST['userID']) && !empty($_POST['userID'])) {
        $userID = htmlspecialchars($_POST['userID']);

        check_userExist($userID);

        if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
            $cleaned_old_password = htmlspecialchars($_POST['old_password']);

            if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
                $cleaned_new_password = htmlspecialchars($_POST['new_password']);

                if (isset($_POST['new_password_confirmation']) && !empty($_POST['new_password_confirmation'])) {
                    $cleaned_new_password_confirmation = htmlspecialchars($_POST['new_password_confirmation']);
                } else { 
                    $signal_post_password_change = 'empty_new_password_confirmation';
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
        $user = $userManager->getUser_byID($userID);

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

    $profileID_GET = checkPermissions('admin', false) ? "&userID=" . $userID : "";

    if ($signal_post_password_change == 'succeed') {
        header('Location: index.php?action=profile&signal_post_password_change=' . $signal_post_password_change . $profileID_GET);
    } else {
        header('Location: index.php?action=password_change&signal_post_password_change=' . $signal_post_password_change . $profileID_GET);
    }
}

function profile_update_post() {
    checkPermissions('user', true);

    if (isset($_POST['userID']) && !empty($_POST['userID'])) {
        $userID = htmlspecialchars($_POST['userID']);

        $userManager = new UserManager();
        $user = $userManager->getUser_byID($userID);

        $cleaned_email = (isset($_POST['email']) & !empty($_POST['email'])) ? htmlspecialchars($_POST['email']) : null;
        $cleaned_first_name = (isset($_POST['first_name']) & !empty($_POST['first_name'])) ? htmlspecialchars($_POST['first_name']) : null;
        $cleaned_last_name = (isset($_POST['last_name']) & !empty($_POST['last_name'])) ? htmlspecialchars($_POST['last_name']) : null;
        $cleaned_address = (isset($_POST['address']) & !empty($_POST['address'])) ? htmlspecialchars($_POST['address']) : null;
        $cleaned_zipcode = (isset($_POST['zipcode']) & !empty($_POST['zipcode'])) ? htmlspecialchars($_POST['zipcode']) : null;
        $cleaned_birthday = (isset($_POST['birthday']) & !empty($_POST['birthday'])) ? htmlspecialchars($_POST['birthday']) : null;

        $update_succeeded = $userManager->updateUser($userID, $cleaned_email, $cleaned_last_name, $cleaned_first_name, $cleaned_address, $cleaned_zipcode, $cleaned_birthday);

        $signal_post_profileUpdate = $update_succeeded ? 'updated' : 'failed';
        
        $profileID_GET = checkPermissions('admin', false) ? "&userID=" . $userID : "";

    } else {
        $signal_post_profileUpdate = "unknown_user";
    }

    if ($signal_post_profileUpdate === 'updated') {
        $user = $userManager->getUser_byID($userID);
        set_session($user);

        header('Location: index.php?action=profile&signal_post_profileUpdate=' . $signal_post_profileUpdate . $profileID_GET);
    } else {
        header('Location: index.php?action=profile_update&signal_post_profileUpdate=' . $signal_post_profileUpdate . $profileID_GET);
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
    
    header('Location: index.php?action=post&postID=' . $postID . '&signal_post_commentVisibility=' . $signal_post_commentVisibility);
}


# Shop

/**
 * Create a new order if the user didn't created one before the start of his session.
 * If the user already had one order not closed yet, this one will be chosen.
 * 
 * The purchase created and added to the order.
 * The total price of the order is updated.
 * 
 * A signal is returned as URL-GET paramter to be use as information message to the user.
 *
 * @return void Redirect the user to the shop page and send a $signal_post_add_to_basket signal
 */
function shop_add_to_basket_post($max_item_allowed){
    $orderManager = new OrderManager();
    
    # If no order or purchase was made, we create a new one
    if ($_SESSION['orderID'] == 0) {
        $order_creation_succeeded = $orderManager->createOrder($_SESSION['userID']);
        $order = $orderManager->getLatestCreatedOrder($_SESSION['userID']);

        $_SESSION['orderID'] = $order['id'];
        setcookie('orderID', $_SESSION['orderID'], time() + 10 * 12 * 30 * 24 * 60 * 60, null, null, false, true);
    } else {
        $order_creation_succeeded = true;
    }

    # Check if order was created correctly
    if (!$order_creation_succeeded) {
        $signal_post_add_to_basket = 'failed_order_creation';
        header('Location: index.php?action=shop&signal_post_add_to_basket=' . $signal_post_add_to_basket);
    }

    # Check if the chosen article exist
    if (isset($_POST['articleID']) && !empty($_POST['articleID'])) {
        $cleaned_articleID = htmlspecialchars($_POST['articleID']);

        # Check if quantity is valid
        if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {
            $cleaned_quantity = htmlspecialchars($_POST['quantity']);

            $purchaseManager = new PurchaseManager();
            $shopArticleManager = new ShopArticleManager();

            # Get article
            $article = $shopArticleManager->getArticle_byID($cleaned_articleID);
            $total_price = $article['unit_price'] * $cleaned_quantity;

            # Check if article already in order
            $article_already_in_order = $orderManager->isArticle_inOrder($article['id'], $_SESSION['orderID']);

            if ($article_already_in_order) {
                # Deny purchase if quantity over 10
                $purchase = $purchaseManager->getPurchase_byArticleID($article['id']);
                $purchase_item_quantity = $purchase['quantity'];

                $number_items_under_limit = $purchase_item_quantity + $cleaned_quantity <= $max_item_allowed;

                if ($number_items_under_limit) {
                    $purchase_creationUpdate_succeeded = $purchaseManager->updatePurchase($purchase['id'], $cleaned_quantity, $total_price);
                }
            } else {
                $number_items_under_limit = $cleaned_quantity <= $max_item_allowed;

                if ($number_items_under_limit) {
                    $purchase_creationUpdate_succeeded = $purchaseManager->createPurchase($_SESSION['orderID'], $cleaned_articleID, $cleaned_quantity, $total_price);
                }
            }

            if ($purchase_creationUpdate_succeeded) {
                # Add quantity and total_price
                $order_total_update = shop_update_total_price_order($_SESSION['orderID']);
                if ($order_total_update) {
                    $signal_post_add_to_basket = 'succeeded';
                } else {
                    $signal_post_add_to_basket = 'failed_order_total_update';
                }
            } else {
                $number_items_under_limit ? $signal_post_add_to_basket = 'too_much_items' : $signal_post_add_to_basket = 'failed_purchase_creation';
            }
        } else {
            $signal_post_add_to_basket = 'invalid_quantity';
        }
    } else {
        $signal_post_add_to_basket = 'invalid_article';
    }

    header('Location: index.php?action=shop&signal_post_add_to_basket=' . $signal_post_add_to_basket);
}

function shop_article_change_availability(){
    checkPermissions('modo', true);

    $articleID = clean_GET('articleID');

    $articleManager = new ShopArticleManager();
    $article = $articleManager->getArticle_byID($articleID);

    if (!empty($article['id'])) {
        $article_availability_change_succeeded = $articleManager->changeArticleAvailability($articleID);
        $article_availability_change_succeeded
            ? $signal_post_articleChangeAvailability = 'succeeded'
            : $signal_post_articleChangeAvailability = 'failed';
    } else {
        $signal_post_articleChangeAvailability = 'not_found';
    }

    header('Location: index.php?action=shop&signal_post_articleChangeAvailability=' . $signal_post_articleChangeAvailability);
}

/**
 * Remove a purchase from the basket order and delete the order from the basket when the last item is removed
 *
 * @return void Remove a purchase from the basket order
 */
function shop_remove_from_basket_post(){
    if ($_SESSION['orderID'] != 0) {
        $purchaseManager = new PurchaseManager();

        if (isset($_GET['purchaseID']) && !empty($_GET['purchaseID'])) {
            $cleaned_purchaseID = htmlspecialchars($_GET['purchaseID']);

            $purchase_deletion_succeeded = $purchaseManager->deletePurchase($cleaned_purchaseID);
            $purchase_deletion_succeeded ? $signal_post_remove_from_basket = 'succeeded' : $signal_post_remove_from_basket = 'failed';

            $order_total_update = shop_update_total_price_order($_SESSION['orderID']);
        } else {
            $signal_post_remove_from_basket = 'invalid_purchaseID';
        }
    } else {
        $signal_post_remove_from_basket = 'no_order';
    }
    
    if (empty($order_total_update)) {
        header('Location: index.php?action=cancel_order');
    } else {
        header('Location: index.php?action=basket&signal_post_remove_from_basket=' . $signal_post_remove_from_basket);
    }
    
}

/**
 * Delete the basket by deleting the related order
 *
 * @return void Delete the current basket and its related order
 */
function cancel_order(){
    $orderManager = new OrderManager();

    $deletion_succeeded = $orderManager->deleteOrder($_SESSION['orderID']);
    $deletion_succeeded ? $signal_post_order_cancel = 'succeeded' : $signal_post_order_cancel = 'failed';

    $_SESSION['orderID'] = 0;
    setcookie("orderID", "", time() - 3600);

    header('Location: index.php?action=shop&signal_post_order_cancel=' . $signal_post_order_cancel);
}

/**
 * Confirm the basket as checkout and update the quantity left of each items from the order.
 * Add the payement and delivery informations to the order.
 * Redirect the user to the payment view.
 *
 * @return void Flag the order as ordered, add the payement and delivery data to the order and redirect the user to the payment view
 */
function checkout_post(){
    $cleaned_bank_account = htmlspecialchars($_POST['bank_account']);
    $cleaned_address = htmlspecialchars($_POST['delivery_address']);
    $cleaned_zipcode = htmlspecialchars($_POST['zipcode']);

    $quantity_substraction_return_code = remove_ordered_items_from_available_articles($_SESSION['orderID']);

    switch ($quantity_substraction_return_code) {
        case 0:
            $signal_post_checkout = 'success';
            break;

        case 1:
            $signal_post_checkout = 'not_enough_items';
            break;

        case 2:
            $signal_post_checkout = 'failed_substraction';
            break;
    }

    if ($signal_post_checkout == 'success') {
        $orderManager = new OrderManager();
        $order_succeeded = $orderManager->order($_SESSION['orderID'], $cleaned_bank_account, $cleaned_address, $cleaned_zipcode);
        $order_succeeded ? $signal_post_checkout = 'success' : $signal_post_checkout = 'failed_order_update';

        header('Location: index.php?action=payment&signal_post_checkout=' . $signal_post_checkout);
    } else {
        header('Location: index.php?action=shop&signal_post_checkout=' . $signal_post_checkout);
    }
}

/**
 * Substract the quantities of all the purchases made in an order form the quantity_left of the related article
 *
 * @param   int     $orderID Order's ID
 * @return  boolean True if all the quantities of all the related articles have successfully been substracted
 */
function remove_ordered_items_from_available_articles($orderID){
    $purchaseManager = new PurchaseManager();
    $shopArticleManager = new ShopArticleManager();

    $purchases = $purchaseManager->getAllPurchases_byOrder($orderID);

    $substraction_succeeded_return_code = 0;  # 0 if everything is fine; 1 if not enought quantity left; 2 if substraction failed
    while ($substraction_succeeded_return_code == 0 && $purchase = $purchases->fetch()) {
        $substraction_succeeded_return_code = $shopArticleManager->substractQuantity($purchase['articleID'], $purchase['quantity']);
    }
    
    $purchases->closeCursor();
    return $substraction_succeeded_return_code;
}

function payment_post(){
    checkPermissions('user', true);

    $orderManager = new OrderManager();

    $payment_succeeded = $orderManager->payment($_SESSION['orderID']);
    if ($payment_succeeded) {
        $_SESSION['orderID'] = 0;
        header('Location: index.php?action=thank_you&signal_post_payment=succeeded');
    } else {
        header('Location: index.php?action=checkout&signal_post_payment=failed');
    }
}

/**
 * Create a new article based on the data gotten by the CreationFrom.
 * All the inputs are cleaned before insertion.
 *
 * @return void Create a new article
 */
function shop_article_create_post(){
    checkPermissions('modo', true);

    $cleaned_name = htmlspecialchars($_POST['name']);
    $cleaned_categorieID = htmlspecialchars($_POST['categorieID']);
    $cleaned_permission_lvl = htmlspecialchars($_POST['permission_lvl']);
    $cleaned_unit_price = htmlspecialchars($_POST['unit_price']);
    $cleaned_quantity_left = htmlspecialchars($_POST['quantity_left']);
    $cleaned_description = htmlspecialchars($_POST['description']);
    $cleaned_availability = htmlspecialchars($_POST['availability']);
    $boolean_availability = $cleaned_availability != 1 ? 0 : 1;

    $shopArticleManager = new ShopArticleManager();
    $creation_succeeded = $shopArticleManager->createArticle($cleaned_name, $cleaned_categorieID, $cleaned_permission_lvl, $cleaned_unit_price, $cleaned_quantity_left, $cleaned_description, $boolean_availability);

    $signal_post_articleCreation = $creation_succeeded ? 'created' : 'failed';

    header('Location: index.php?action=shop&signal_post_articleCreation=' . $signal_post_articleCreation);
}

function shop_article_update_post(){
    checkPermissions('modo', true);

    $articleID = clean_articleID();
    check_articleExist($articleID);

    $cleaned_name = htmlspecialchars($_POST['name']);
    $cleaned_categorieID = htmlspecialchars($_POST['categorieID']);
    $cleaned_permission_lvl = htmlspecialchars($_POST['permission_lvl']);
    $cleaned_unit_price = htmlspecialchars($_POST['unit_price']);
    $cleaned_quantity_left = htmlspecialchars($_POST['quantity_left']);
    $cleaned_description = htmlspecialchars($_POST['description']);
    $cleaned_availability = htmlspecialchars($_POST['availability']);
    $boolean_availability = $cleaned_availability != 1 ? 0 : 1;

    $shopArticleManager = new ShopArticleManager();
    $creation_succeeded = $shopArticleManager->updateArticle($articleID, $cleaned_name, $cleaned_categorieID, $cleaned_permission_lvl, $cleaned_unit_price, $cleaned_quantity_left, $cleaned_description, $boolean_availability);

    $signal_post_articleUpdate = $creation_succeeded ? 'created' : 'failed';

    if ($signal_post_articleUpdate == 'created') {
        header('Location: index.php?action=shop_article&articleID=' . $articleID . '&signal_post_articleUpdate=' . $signal_post_articleUpdate);
    } else {
        header('Location: index.php?action=shop_article_update&articleID=' . $articleID . '&signal_post_articleUpdate=' . $signal_post_articleUpdate);
    }
}

/**
 * Update the total price of an order by calculation the sum of all the total prices of each of its purchases
 *
 * @param   int     $orderID ID of the order which total price must be calculated
 * @return  boolean True if the value updated succeeded
 */
function shop_update_total_price_order($orderID){
    $orderManager = new OrderManager();
    $purchaseManager = new PurchaseManager();

    $order_total_price = $purchaseManager->sumPurchasesOrder($_SESSION['orderID']);
    if (empty($order_total_price)) {
        return null;
    } else {
        $order_total_update_succeeded = $orderManager->updateTotal($_SESSION['orderID'], $order_total_price);
        return $order_total_update_succeeded;
    }


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

function minichat_publish(){
    checkPermissions('modo', true);

    $messageID = clean_messageID();
    check_messageExist($messageID);

    $minichatManager = new MiniChatManager();

    $visibility_modification_succeed = $minichatManager->makeMessageVisible($messageID);

    $signal_post_messageVisibility = $visibility_modification_succeed ? 'succeed' : 'failed';
    
    header('Location: index.php?action=minichat&signal_post_messageVisibility=' . $signal_post_messageVisibility);
}

function minichat_update_post(){
    checkPermissions('user', true);

    $messageID = clean_messageID();
    check_messageExist($messageID);

    $minichatManager = new MiniChatManager();
    $message = $minichatManager->getMessage($messageID);

    if (!checkPermissions('modo', false) || $message['userID'] != $_SESSION['userID']) header ('Location: index.php?action=forbidden');

    $cleaned_message = (isset($_POST['message']) & !empty($_POST['message'])) ? htmlspecialchars($_POST['message']) : null;
    $cleaned_is_visible = htmlspecialchars($_POST['is_visible']);
    $boolean_is_visible = $cleaned_is_visible != 1 ? 0 : 1;

    $update_succeeded = $minichatManager->updateMessage($messageID, $cleaned_message, $boolean_is_visible);

    $signal_post_messageUpdate = $update_succeeded ? 'updated' : 'failed';
    
    if ($signal_post_messageUpdate === 'updated') {
        header('Location: index.php?action=minichat&signal_post_messageUpdate=' . $signal_post_messageUpdate);
    } else {
        header('Location: index.php?action=minichat_update&messageID=' . $messageID . '&signal_post_messageUpdate=' . $signal_post_messageUpdate);
    }
}