<?php   

require_once('model/Manager.php');

class PostManager extends Manager{

    public function getPosts(){
        $db = $this->dbConnect();
    
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
    
        return $req;
    
    }
    
    
    public function getPost($postID){
        $db = $this->dbConnect();
    
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = :postID ');
        $req->execute(array('postID' => $postID));
        $post = $req->fetch();
    
        return $post;
    
    }

}