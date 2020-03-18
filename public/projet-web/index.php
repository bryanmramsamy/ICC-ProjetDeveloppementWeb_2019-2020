<?php
session_start();

require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action']) && !empty($_GET['action'])) {

        if ($_GET['action'] == 'home') {

            home();

        } else if ($_GET['action'] == 'connect') {



        } else if ($_GET['action'] == 'disconnect') {

        } else if ($_GET['action'] == 'register') {

        }


        
    } else {
        home();
    }
    
} catch (\Throwable $th) {
    //throw $th;
}