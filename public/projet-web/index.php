<?php

require('controller/frontend.php');

try {
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        
        if ($_GET['action'] == 'home') {

            # controller: homepage

        } else {
            # code...
        }
        

    } else {
        # code...
    }
    
} catch (\Throwable $th) {
    //throw $th;
}