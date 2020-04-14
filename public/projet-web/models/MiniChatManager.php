<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');

class MiniChatManager extends Manager {

    private function getMessages_byRange($offset, $row_count){
        $db = $this->dbConnect();

        $req = $db->query('SELECT minichat.*, users.id, users.username FROM minichat INNER JOIN users ON minichat.userID = users.id ORDER BY date_edition DESC LIMIT ' . $offset . ',' . $row_count);

        return $req;
    }


    private function getMessagesCount(){
        $db = $this->dbConnect();

        $req = $db->query('SELECT COUNT(*) AS nb_message FROM minichat');
        $nb_message = $req->fetch();

        $req->closeCursor();

        return $nb_message['nb_message'];
    }


    public function getTotalPages($nb_message_per_page){
        $nb_message = $this->getMessagesCount();
        return intdiv($nb_message, $nb_message_per_page) + 1;
    }


    public function getActualPage($page, $nb_message_per_page){
        $total_pages = $this->getTotalPages($nb_message_per_page);

        if ($page < 1) {
            $page = 1;
        } else if ($page > $total_pages) {
            $page = $total_pages;
        }

        return $page;
    }


    public function getMessages_byPage($page, $nb_message_per_page){
        $actual_page = $this->getActualPage($page, $nb_message_per_page);
        
        $offset = $nb_message_per_page * ($actual_page - 1);
        $row_count = $nb_message_per_page;

        return $this->getMessages_byRange($offset, $row_count);
    }


    // public function getUser_byID($user){
    //     return $this->getUser($user, true);
    // }

    // public function getUser_byUsername($user){
    //     return $this->getUser($user, false);
    // }


    // public function createUser($username, $hashed_password, $email, $last_name, $first_name) {
    //      $db = $this->dbConnect();

    //      $req = $db->prepare('INSERT INTO users (username, passwd, email, register_date, last_name, first_name) VALUES (:username, :passwd, :email, NOW(), :last_name, :first_name)');

    //     $creation_succeeded = $req->execute(array(
    //         'username' => $username,
    //         'passwd' => $hashed_password,
    //         'email' => $email,
    //         'last_name' => $last_name,
    //         'first_name' => $first_name
    //     ));

    //     return $creation_succeeded;
    // }
}
