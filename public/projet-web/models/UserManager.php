<?php

namespace ProjetWeb\Model;


require_once('models/Manager.php');

class UserManager extends Manager {

    public function getUser($userID) {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT *, DATE_FORMAT(birthday, \'%d/%m/%Y\') AS birthday_int FROM users WHERE id = ?');
        $req->execute(array($userID));
        
        $user = $req->fetch();

        return $user;
    }



}