<?php

function getPosts(){

    try {
        $db = new PDO('mysql:host=mysql;dbname=test_mvc;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    } catch (Exception $error) {
        die('Erreur : ' . $error->getMessage());

    }

    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    return $req;

}