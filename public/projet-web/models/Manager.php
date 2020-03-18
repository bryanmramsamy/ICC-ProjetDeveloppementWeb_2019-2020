<?php

namespace ProjetWeb\Model;


/**
 * Database object manager
 */ 
class Manager {
    protected function dbConnect(){
        $db = new \PDO('mysql:host=mysql;dbname=projet_web_db;charset=utf8',
                       'root', 'admin',
                       array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}