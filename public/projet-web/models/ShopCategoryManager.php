<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


class ShopCategoryManager extends Manager {

    private $db_table = 'shop_categories';

    public function getAllCategories(){
        return $this->getAllEntries($this->db_table);
    }

    public function getCategory($key, $value){
        return $this->getEntry($this->db_table, $key, $value);
    }

    public function getCategory_byID($categoryID){
        return $this->getCategory('id', $categoryID);
    }

    public function createCategory($name) {
        $query = 'INSERT INTO shop_categories (name) VALUES (:name)';
        $data_array = array(
            'name' => $name,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function updateArticle($name) {
        $query = 'UPDATE shop_categories SET name=:name, WHERE id=:categoryID';
        $data_array = array(
            'categoryID' => $categoryID,
            'name' => $name,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

}
