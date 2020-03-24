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

    public function getID($username) {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT *, DATE_FORMAT(birthday, \'%d/%m/%Y\') AS birthday_int FROM users WHERE username = ?');
        $req->execute(array($username));
        
        $ID = $req->fetch();

        return $ID;
    }


    public function createUser($username, $hashed_password, $email, $last_name, $first_name, $birthday) {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO users (username, passwd, email, register_date, last_name, first_name, birthday) VALUES (:username, :passwd, :email, NOW(), :last_name, :first_name, :birthday)');

        $creation_succeed = $req->execute(array(
            'username' => $username,
            'passwd' => $hashed_password,
            'email' => $email,
            'last_name' => $last_name,
            'first_name' => $first_name,
            'birthday' => $birthday
        ));

        return $creation_succeed;
    }



}