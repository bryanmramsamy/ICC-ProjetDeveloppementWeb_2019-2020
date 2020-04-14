<?php

namespace ProjetWeb\Model;


class Manager {

    protected function dbConnect(){
        $db = new \PDO('mysql:host=mysql;dbname=projet_web_db;charset=utf8',
                       'root', 'admin',
                       array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }

    protected function getNumberEntries($db_table){
        $db = $this->dbConnect();

        $req = $db->query('SELECT COUNT(*) AS count_entries FROM ' . $db_table);
        $nb_entries = $req->fetch();

        $req->closeCursor();

        return $nb_entries['count_entries'];
    }


    // public function getTotalPages($nb_message_per_page){
    //     $nb_message = $this->getNumberEntries();
    //     return intdiv($nb_message, $nb_message_per_page) + 1;
    // }


    // public function getActualPage($page, $nb_message_per_page){
    //     $total_pages = $this->getTotalPages($nb_message_per_page);

    //     if ($page < 1) {
    //         $page = 1;
    //     } else if ($page > $total_pages) {
    //         $page = $total_pages;
    //     }

    //     return $page;
    // }


    // public function getMessages_byPage($page, $nb_message_per_page){
    //     $actual_page = $this->getActualPage($page, $nb_message_per_page);
        
    //     $offset = $nb_message_per_page * ($actual_page - 1);
    //     $row_count = $nb_message_per_page;

    //     return $this->getMessages_byRange($offset, $row_count);
    // }

}