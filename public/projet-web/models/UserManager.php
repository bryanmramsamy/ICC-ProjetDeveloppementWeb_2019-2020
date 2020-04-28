<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


class UserManager extends Manager {

    private $db_table = 'users';

    public function getUser($key, $user){
        return $this->getEntry($this->db_table, $key, $user);
    }

    public function getUser_byID($user){
        return $this->getUser('id', $user);
    }

    public function getUser_byUsername($user){
        return $this->getUser('username', $user);
    }

    public function createUser($username, $hashed_password, $email, $last_name, $first_name, $role_lvl) {
        $query = 'INSERT INTO users (username, passwd, email, register_date, last_name, first_name, role_lvl) VALUES (:username, :passwd, :email, NOW(), :last_name, :first_name, :role_lvl)';

        $data_array = array(
            'username' => $username,
            'passwd' => $hashed_password,
            'email' => $email,
            'last_name' => $last_name,
            'first_name' => $first_name,
            'role_lvl' => $role_lvl
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    // public function updateUser($userID, $email, $last_name, $first_name, $address, $zipcode, $birthday) {
    //     $query = 'UPDATE users SET email = :email, last_name = :last_name, first_name = :first_name, zipcode = :zipcode, date_birth = :birthday WHERE id = :id';
    //     $data_array = array(
    //         'id' => $userID,
    //         'email' => $email,
    //         'last_name' => $last_name,
    //         'first_name' => $first_name,
    //         'address' => $address,
    //         'zipcode' => $zipcode,
    //         'date_birth' => $birthday
    //     );

    //     return $this->createUpdateDeleteEntry($query, $data_array);
    // }

    public function updateUser($userID, $email, $last_name, $first_name, $address, $zipcode, $birthday) {
        $query = 'UPDATE users SET email=:email, last_name=:last_name, first_name=:first_name, address=:address, zipcode=:zipcode, date_birth=:date_birth WHERE id=:id';
        $data_array = array(
            'id' => $userID,
            'email' => $email,
            'last_name' => $last_name,
            'first_name' => $first_name,
            'address' => $address,
            'zipcode' => $zipcode,
            'date_birth' => $birthday
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function password_change($userID, $hashed_password) {
        $query = 'UPDATE users SET passwd=:passwd WHERE id = :id';

        $data_array = array(
            'id' => $userID,
            'passwd' => $hashed_password
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

}
