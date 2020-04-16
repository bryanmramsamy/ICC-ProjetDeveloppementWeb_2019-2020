<?php

namespace ProjetWeb\Model;


class Manager {

    protected function dbConnect(){
        $db = new \PDO('mysql:host=mysql;dbname=projet_web_db;charset=utf8',
                       'root', 'admin',
                       array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }




 





    # Calcule nombre de message par page et appelle l'execution de la requête
    public function getEntries_byPage($db_table, $query, $page, $nb_message_per_page){
        $actual_page = $this->getActualPage($db_table, $page, $nb_message_per_page);
        
        $offset = $nb_message_per_page * ($actual_page - 1);
        $row_count = $nb_message_per_page;

        return $this->getEntries_byRange($query, $offset, $row_count);
    }

    # Vérifie si la page passé en paramètre est valide
    public function getActualPage($db_table, $page, $nb_message_per_page){
        $total_pages = $this->getTotalPages($db_table, $nb_message_per_page);

        if ($page < 1) {
            $page = 1;
        } else if ($page > $total_pages) {
            $page = $total_pages;
        }

        return $page;
    }

    # Compte le nombre de pages total selon le nombre de nombre de message
    public function getTotalPages($db_table, $nb_message_per_page){
        $nb_message = $this->getNumberEntries($db_table);
        return intdiv($nb_message, $nb_message_per_page) + 1;
    }

    public function getNumberEntries($db_table){
        $db = $this->dbConnect();

        $req = $db->query('SELECT COUNT(*) AS count_entries FROM ' . $db_table);
        $nb_entries = $req->fetch();

        $req->closeCursor();

        return $nb_entries['count_entries'];
    }

    # Effectue la requête en utilisant offset en row_count calculé dans getMessage_byPage
    public function getEntries_byRange($query, $offset, $row_count){
        $db = $this->dbConnect();

        // $req = $db->query('SELECT minichat.*, users.id, users.username, users.last_name, users.first_name FROM minichat INNER JOIN users ON minichat.userID = users.id ORDER BY date_edition DESC LIMIT ' . $offset . ',' . $row_count);

        $req = $db->query($query . ' LIMIT ' . $offset . ',' . $row_count);

        return $req;
    }

}