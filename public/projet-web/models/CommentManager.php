<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


class CommentManager extends Manager {

    private $db_table = 'comments';

    public function getComments_byPage($page, $nb_comment_per_page){
        $query = 'SELECT comments.id AS commentID, comments.*, users.id, users.username, users.last_name, users.first_name FROM comments INNER JOIN users ON comments.created_by = users.id ORDER BY date_edited DESC';

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

    public function createComment($postID, $comment) {
        $query = 'INSERT INTO comments (post_id, created_by, comment, date_created, date_edited) VALUES (:postID, :userID, :comment, NOW(), NOW())';
        $data_array = array(
            'postID' => $postID,
            'userID' => $_SESSION['userID'],
            'comment' => $comment
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
}
