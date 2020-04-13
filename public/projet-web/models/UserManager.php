<?php

namespace ProjetWeb\Model;


require_once('models/Manager.php');

class UserManager extends Manager {

    private function getUser($wanted_user, $isID){
        $db = $this->dbConnect();

        $value_type = ($isID ? 'id' : 'username');

        $req = $db->prepare('SELECT * FROM users WHERE ' . $value_type . '= ?');
        $req->execute(array($wanted_user));
        $user = $req->fetch();

        return $user;
    }

    public function getUser_byID($user){
        return $this->getUser($user, true);
    }

    public function getUser_byUsername($user){
        return $this->getUser($user, false);
    }


    public function createUser($username, $hashed_password, $email, $last_name, $first_name) {
         $db = $this->dbConnect();

         $req = $db->prepare('INSERT INTO users (username, passwd, email, register_date, last_name, first_name) VALUES (:username, :passwd, :email, NOW(), :last_name, :first_name)');

        $creation_succeeded = $req->execute(array(
            'username' => $username,
            'passwd' => $hashed_password,
            'email' => $email,
            'last_name' => $last_name,
            'first_name' => $first_name
        ));

        return $creation_succeeded;
    }
}
