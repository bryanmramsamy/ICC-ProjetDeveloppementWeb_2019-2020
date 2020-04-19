<?php

const PERMISSION = array(
    'guest' => 0,
    'user' => 10,
    # 'spec' => 30,
    'moderator' => 40,
    'admin' => 50,
);

function checkPremissions($required_permissions) {
    if ($_SESSION['user_role_lvl'] < PERMISSION[$required_permissions]) {
        header('Location: index.php?action=forbidden');
    }
}
