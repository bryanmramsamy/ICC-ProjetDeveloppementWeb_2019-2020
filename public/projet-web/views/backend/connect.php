<?php

// Reçoit $_POST['input_username'] et $_POST['input_password']

$invalid_credentials = true;

if (isset($_POST['input_username']) && !empty($_POST['input_username'])
    && isset($_POST['input_password']) && !empty($_POST['input_password'])) {
        
    
} else {
    # code... Renvoyer vers page d'erreur 
}
