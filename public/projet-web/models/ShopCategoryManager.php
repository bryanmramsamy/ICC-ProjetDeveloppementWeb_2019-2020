<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


class ShopCategoryManager extends Manager {

    private $db_table = 'shop_categories';

    // public function getCategories_byPage($page, $nb_post_per_page){
    //     $query = 'SELECT shop_article.name AS article_name, shop_article.*, shop_categories.name AS categorie_name FROM shop_article INNER JOIN shop_categories ON shop_article.categorieID = shop_categories.id ORDER BY categorieID, shop_article.name, availability DESC';

    //     return $this->getEntries_byPage($this->db_table, $query, $page, $nb_post_per_page);
    // }

    // public function getActualPageArticle($page, $nb_post_per_page){
    //     return $this->getActualPage($this->db_table, $page, $nb_post_per_page);
    // }

    // public function getTotalPagesArticle($nb_post_per_page){
    //     return $this->getTotalPages($this->db_table, $nb_post_per_page);
    // }

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
