<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');

class MiniChatManager extends Manager {

    private $db_table = 'minichat';

    public function getMessages_byPage($page, $nb_message_per_page){
        $query = 'SELECT minichat.*, users.id, users.username, users.last_name, users.first_name FROM minichat INNER JOIN users ON minichat.userID = users.id ORDER BY date_edition DESC';

        return $this->getEntries_byPage($this->db_table, $query, $page, $nb_message_per_page);
    }

    public function getActualPageMessage($page, $nb_message_per_page){
        return $this->getActualPage($this->db_table, $page, $nb_message_per_page);
    }

    public function getTotalPagesMessage($nb_message_per_page){
        return $this->getTotalPages($this->db_table, $nb_message_per_page);
    }

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
