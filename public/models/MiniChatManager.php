<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');

class MiniChatManager extends Manager {

    private $db_table = 'minichat';

    public function getMessage($messageID){
        return $this->getEntry($this->db_table, 'messageID', $messageID);
    }

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

    public function createMessage($message) {
        $query = 'INSERT INTO minichat (userID, message, date_creation, date_edition) VALUES (:userID, :message, NOW(), NOW())';
        $data_array = array(
            'userID' => $_SESSION['userID'],
            'message' => $message
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function updateMessage($messageID, $message, $is_visible) {
        $query = 'UPDATE minichat SET message=:message, date_edition=NOW(), is_visible=:is_visible WHERE messageID=:messageID';
        $data_array = array(
            'messageID' => $messageID,
            'message' => $message,
            'is_visible' => $is_visible,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function makeMessageVisible($messageID){
        $is_visible = $this->getMessage($messageID)['is_visible'];
        $set_visible = $is_visible ? 0 : 1;

        $query = 'UPDATE minichat SET is_visible=:set_visible WHERE messageID=:messageID';
        $data_array = array(
            'messageID' => $messageID,
            'set_visible' => $set_visible
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
}
