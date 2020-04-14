<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');

class MiniChatManager extends Manager {

    private function getMessages_byRange($range_begin, $range_end){
        $db = $this->dbConnect();

        $req = $db->query('SELECT minichat.*, users.id, users.username FROM minichat INNER JOIN users ON minichat.userID = users.id ORDER BY date_edition DESC LIMIT ' . $range_begin . ',' . $range_end);

        return $req;
    }


    private function getMessagesCount(){
        $db = $this->dbConnect();

        $req = $db->query('SELECT COUNT(*) AS nb_message FROM minichat');
        $nb_message = $req->fetch();

        $req->closeCursor();

        return $nb_message['nb_message'];
    }


    public function getMessages_byPage($page){
        $nb_message = $this->getMessagesCount();
        $nb_message_per_page = 10;
        $nb_page = intdiv($nb_message, $nb_message_per_page) + 1;

        if ($page < 1) {
            $page = 1;
        } else if ($page > $nb_page) {
            $page = $nb_page;
        }
        

        $range_begin = 0 + $nb_message_per_page * ($page - 1);
        $range_end = ($nb_message_per_page - 1) + $nb_message_per_page * ($page - 1);

        // $range_begin = 0;
        // $range_end = 6;

        echo ($range_begin . " + " . $range_end . "<br/><br/>" . $nb_message_per_page . " + " . $nb_message . " + " . $nb_page);

        return $this->getMessages_byRange($range_begin, $range_end);
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
