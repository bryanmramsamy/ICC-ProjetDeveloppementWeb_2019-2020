<?php

namespace ProjetWeb\Model;


class Manager {

    protected function dbConnect(){
        $db = new \PDO('mysql:host=mysql;dbname=projet_web_db;charset=utf8',
                       'root', 'admin',
                       array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }

    protected function getEntry($db_table, $key, $value){
        $db = $this->dbConnect();

        $request = $db->prepare('SELECT * FROM ' . $db_table . ' WHERE ' . $key . ' = ? ');
        $request->execute(array($value));
        $entry = $request->fetch();

        $request->closeCursor();

        return $entry;
    }

    # Calcule nombre de message par page et appelle l'execution de la requestuête
    protected function getEntries_byPage($db_table, $query, $page, $nb_entries_per_page){
        $actual_page = $this->getActualPage($db_table, $page, $nb_entries_per_page);
        
        $offset = $nb_entries_per_page * ($actual_page - 1);
        $row_count = $nb_entries_per_page;

        return $this->getEntries_byRange($query, $offset, $row_count);
    }

    # Vérifie si la page passé en paramètre est valide
    protected function getActualPage($db_table, $page, $nb_entries_per_page){
        $total_pages = $this->getTotalPages($db_table, $nb_entries_per_page);

        if ($page < 1) {
            $page = 1;
        } else if ($page > $total_pages) {
            $page = $total_pages;
        }

        return $page;
    }

    # Compte le nombre de pages total selon le nombre de nombre de message
    protected function getTotalPages($db_table, $nb_entries_per_page){
        $nb_entries = $this->getNumberEntries($db_table);
        return intdiv($nb_entries, $nb_entries_per_page) + 1;
    }

    private function getNumberEntries($db_table){
        $db = $this->dbConnect();

        $request = $db->query('SELECT COUNT(*) AS count_entries FROM ' . $db_table);
        $nb_entries = $request->fetch();

        $request->closeCursor();

        return $nb_entries['count_entries'];
    }

    # Effectue la requestuête en utilisant offset en row_count calculé dans getMessage_byPage
    protected function getEntries_byRange($query, $offset, $row_count){
        $db = $this->dbConnect();

        $request = $db->query($query . ' LIMIT ' . $offset . ',' . $row_count);

        return $request;
    }

    protected function getAllEntries($db_table){
        $db = $this->dbConnect();
        $request = $db->query('SELECT * FROM ' . $db_table);

        return $request;
    }

    protected function createUpdateDeleteEntry($query, $data_array){
        $db = $this->dbConnect();

        $request = $db->prepare($query);
        $creationUpdateDelete_succeeded = $request->execute($data_array);
        $request->closeCursor();

        return $creationUpdateDelete_succeeded;
    }

}
