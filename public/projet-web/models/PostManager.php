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

    public function createPost($title, $content, $is_published=1) {
        $query = 'INSERT INTO posts (created_by, title, content, date_created, date_edited, is_published) VALUES (:userID, :title, :content, NOW(), NOW(), :is_published)';
        $data_array = array(
            'userID' => $_SESSION['userID'],
            'title' => $title,
            'content' => $content,
            'is_published' => $is_published
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function updatePost($postID, $title, $content, $is_published) {
        $query = 'UPDATE posts SET title = :title, content = :content, date_edited = NOW(), is_published = :is_published WHERE id = :postID';
        $data_array = array(
            'postID' => $postID,
            'title' => $title,
            'content' => $content,
            'is_published' => $is_published
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function publishPost($postID){
        $is_published = $this->getPost_byID($postID)['is_published'];
        $set_published = $is_published ? 0 : 1;

        $query = 'UPDATE posts SET is_published = :set_published WHERE id = :postID';
        $data_array = array(
            'postID' => $postID,
            'set_published' => $set_published
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

}
