<?php

            if (isset($_POST['input_username']) && !empty($_POST['input_username'])
                && isset($_POST['input_password']) && !empty($_POST['input_password'])
                && isset($_POST['input_password_confirmation']) && !empty($_POST['input_password_confirmation'])) {
                
                register_post($_POST['input_username'],
                              $_POST['input_password'],
                              $_POST['input_password_confirmation'],
                              (isset($_POST['input_email']) && !empty($_POST['input_email'])) ? $_POST['input_email'] : 'null',
                              (isset($_POST['input_last_name']) && !empty($_POST['input_last_name'])) ? $_POST['input_last_name'] : 'null',
                              (isset($_POST['input_first_name']) && !empty($_POST['input_first_name'])) ? $_POST['input_first_name'] : 'null');

if (isset($_POST['input_username']) && !empty($_POST['input_username'])
    && isset($_POST['input_password']) && !empty($_POST['input_password'])
    && isset($_POST['input_password_confirmation']) && !empty($_POST['input_password_confirmation'])) {
    
    
    
} else {
    # code...
}


function register_post($username, $password, $password_confirmation, $email, $last_name, $first_name){

    $userManager = new UserManager();
    $error_code_register = 0;


    // Check if username already exist
    $cleaned_username = htmlspecialchars($username);
    echo($cleaned_username);
    $userID = $userManager->getID($cleaned_username);
    echo($userID);
    if(empty($userID) || $userID > 0) $error_code_register + 1;


    // Check if password and password_confirmation match
    $cleaned_password = htmlspecialchars($password);
    $cleaned_password_confirmation = htmlspecialchars($password_confirmation);

    if ($cleaned_password_confirmation != $cleaned_password) $error_code_register + 2;
    else $cleaned_password = password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);

    print("error_code_register = " . $error_code_register);

    // if ($error_code_register != 0) {
    //     header('Location: views/frontend/register.php?error=' . $error_code_register);

    // } else {
    //     $cleaned_email = htmlspecialchars($email);
    //     $cleaned_last_name = htmlspecialchars($last_name);
    //     $cleaned_first_name = htmlspecialchars($first_name);

    //     $creation_succeed = $userManager->createUser($cleaned_username,
    //                                                  $cleaned_password,
    //                                                  $cleaned_email,
    //                                                  $cleaned_last_name,
    //                                                  $cleaned_first_name);

    //     if ($creation_succeed) {
    //         $_SESSION['userID'] = $userManager->getID($cleaned_username);
    //         $_SESSION['username'] = $cleaned_username;
    //         header('Location: index.php');

    //     } else {
    //         throw new Exception("Creation du nouvel utilisateur échouée !");
    //     }
    // }