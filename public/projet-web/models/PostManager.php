<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


class PostManager extends Manager {

    public function getPosts($offset, $row_count){
        $db = $this->dbConnect();

        $req = $db->query('SELECT posts.* FROM posts INNER JOIN users ON posts.created_by = users.id ORDER BY date_edited DESC LIMIT ' . $offset . ',' . $row_count);

        return $req;
    }
 
    private function getNumberMessages(){
        return $this->getNumberEntries('posts');
    }

    public function getTotalPages($nb_message_per_page){
        $nb_message = $this->getNumberMessages();
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


    public function newMessage($message) {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO minichat (userID, message, date_creation, date_edition) VALUES (:userID, :message, NOW(), NOW())');
        $creation_succeeded = $req->execute(array(
            'userID' => $_SESSION['userID'],
            'message' => $message
        ));

        return $creation_succeeded;
    }
}
}
