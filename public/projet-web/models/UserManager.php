<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


class UserManager extends Manager {

    private $db_table = 'users';

    public function getUser($user, $isID){
        $key = ($isID ? 'id' : 'username');

        return $this->getEntry($this->db_table, $key, $user);
    }

    public function getUser_byID($user){
        return $this->getUser($user, true);
    }

    public function getUser_byUsername($user){
        return $this->getUser($user, false);
    }

    public function createUser($username, $hashed_password, $email, $last_name, $first_name) {
        $query = 'INSERT INTO users (username, passwd, email, register_date, last_name, first_name) VALUES (:username, :passwd, :email, NOW(), :last_name, :first_name)';

        $data_array = array(
            'username' => $username,
            'passwd' => $hashed_password,
            'email' => $email,
            'last_name' => $last_name,
            'first_name' => $first_name
        );

        return $this->createEntry($query, $data_array);
    }

}
