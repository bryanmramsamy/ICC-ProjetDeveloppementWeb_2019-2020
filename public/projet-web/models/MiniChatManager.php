<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');

class MiniChatManager extends Manager {

    public $db_table = 'minichat';

    # Calcule nombre de message par page et appelle l'execution de la requête
    public function getMessages_byPage($page, $nb_message_per_page){

        // $db_table = 'minichat';
        $query = 'SELECT minichat.*, users.id, users.username, users.last_name, users.first_name FROM minichat INNER JOIN users ON minichat.userID = users.id ORDER BY date_edition DESC';

        return $this->getEntries_byPage($this->db_table, $query, $page, $nb_message_per_page);

        // $actual_page = $this->getActualPage($page, $nb_message_per_page);
        
        // $offset = $nb_message_per_page * ($actual_page - 1);
        // $row_count = $nb_message_per_page;

        // return $this->getMessages_byRange($offset, $row_count);
    }

    // # Vérifie si la page passé en paramètre est valide
    public function getActualPageMessage($page, $nb_message_per_page){

        return $this->getActualPage($this->db_table, $page, $nb_message_per_page);
    //     $total_pages = $this->getTotalPages($nb_message_per_page);

    //     if ($page < 1) {
    //         $page = 1;
    //     } else if ($page > $total_pages) {
    //         $page = $total_pages;
    //     }

    //     return $page;
    }

    // # Compte le nombre de pages total selon le nombre de nombre de message
    public function getTotalPagesMessage($nb_message_per_page){

        return $this->getTotalPages($this->db_table, $nb_message_per_page);

    //     $nb_message = $this->getNumberMessages();
    //     return intdiv($nb_message, $nb_message_per_page) + 1;
    // }

    // # Calcule le nombre de message
    // private function getNumberMessages(){
    //     return $this->getNumberEntries('minichat');
    }

    // # Effectue la requête en utilisant offset en row_count calculé dans getMessage_byPage
    // private function getMessages_byRange($offset, $row_count){
    //     $db = $this->dbConnect();

    //     $req = $db->query('SELECT minichat.*, users.id, users.username, users.last_name, users.first_name FROM minichat INNER JOIN users ON minichat.userID = users.id ORDER BY date_edition DESC LIMIT ' . $offset . ',' . $row_count);

    //     return $req;
    // }









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
