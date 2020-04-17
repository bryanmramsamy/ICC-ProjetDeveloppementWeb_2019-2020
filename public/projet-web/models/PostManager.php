<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


class PostManager extends Manager {

    private $db_table = 'posts';

    public function getPosts_byPage($page, $nb_post_per_page){
        $query = 'SELECT posts.id AS postID, posts.*, users.id, users.username, users.last_name, users.first_name FROM posts INNER JOIN users ON posts.created_by = users.id ORDER BY date_edited DESC';

        return $this->getEntries_byPage($this->db_table, $query, $page, $nb_post_per_page);
    }

    public function getActualPagePost($page, $nb_post_per_page){
        return $this->getActualPage($this->db_table, $page, $nb_post_per_page);
    }

    public function getTotalPagesPost($nb_post_per_page){
        return $this->getTotalPages($this->db_table, $nb_post_per_page);
    }

    public function getPost($key, $value){
        return $this->getEntry($this->db_table, $key, $value);
    }

    public function getPost_byID($postID){
        return $this->getPost('id', $postID);
    }

    public function createPost($message) {
        $query = 'INSERT INTO minichat (userID, message, date_creation, date_edition) VALUES (:userID, :message, NOW(), NOW())';  # To modify
        $data_array = array(  # To modify
            'userID' => $_SESSION['userID'],
            'message' => $message
        );

        return $this->createEntry($query, $data_array);
    }
}
