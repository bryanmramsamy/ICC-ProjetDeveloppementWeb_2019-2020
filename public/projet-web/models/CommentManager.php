<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


class CommentManager extends Manager {

    private $db_table = 'comments';

    public function getComments_byPage($page, $nb_comment_per_page){
        $query = 'SELECT comments.*, users.id, users.username, users.last_name, users.first_name FROM comments INNER JOIN users ON comments.created_by = users.id ORDER BY date_edited DESC';

        return $this->getEntries_byPage($this->db_table, $query, $page, $nb_comment_per_page);
    }

    public function getActualPageComment($page, $nb_comment_per_page){
        return $this->getActualPage($this->db_table, $page, $nb_comment_per_page);
    }

    public function getTotalPagesComment($nb_comment_per_page){
        return $this->getTotalPages($this->db_table, $nb_comment_per_page);
    }

    public function getComment($key, $value){
        return $this->getEntry($db_table, $key, $value);
    }

    public function createComment($message) {
        $query = 'INSERT INTO comments (userID, message, date_creation, date_edition) VALUES (:userID, :message, NOW(), NOW())';  # To modify
        $data_array = array(  # To modify
            'userID' => $_SESSION['userID'],
            'message' => $message
        );

        return $this->createEntry($query, $data_array);
    }
}
