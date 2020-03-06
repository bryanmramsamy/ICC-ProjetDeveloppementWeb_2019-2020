<?php

class Manager{
    protected function dbConnect(){
        $db = new PDO('mysql:host=mysql;dbname=test_mvc;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
        
    }

}