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

    public function getComment($value){
        return $this->getEntry($this->db_table, 'id', $value);
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

    public function updateComment($commentID, $comment, $is_visible) {
        $query = 'UPDATE comments SET comment = :comment, date_edited = NOW(), is_visible = :is_visible WHERE id = :commentID';
        $data_array = array(
            'commentID' => $commentID,
            'comment' => $comment,
            'is_visible' => $is_visible
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function makeCommentVisible($commentID){
        $is_visible = $this->getComment($commentID)['is_visible'];
        $set_visible = $is_visible ? 0 : 1;

        $query = 'UPDATE comments SET is_visible = :set_visible WHERE id = :commentID';
        $data_array = array(
            'commentID' => $commentID,
            'set_visible' => $set_visible
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function getLastComments_ofUser($userID, $offset){
        $db = $this->dbConnect();

        $request = $db->prepare('SELECT comments.id AS commentID, comments.*, posts.id, posts.title FROM comments INNER JOIN posts ON posts.id = comments.post_id WHERE comments.created_by=:userID ORDER BY date_edited DESC LIMIT 0, ' . $offset);
        $data_array = array(
            'userID' => $userID
        );
        $request->execute($data_array);

        return $request;
    }
}
