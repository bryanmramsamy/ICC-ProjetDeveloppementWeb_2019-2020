<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


class ShopArticleManager extends Manager {

    private $db_table = 'shop_article';

    public function getArticles_byPage($page, $nb_post_per_page){
        $query = 'SELECT shop_article.name AS article_name, shop_article.*, shop_categories.name AS categorie_name FROM shop_article INNER JOIN shop_categories ON shop_article.categorieID = shop_categories.id ORDER BY categorieID, shop_article.name, availability DESC';

        return $this->getEntries_byPage($this->db_table, $query, $page, $nb_post_per_page);
    }

    public function getActualPageArticle($page, $nb_post_per_page){
        return $this->getActualPage($this->db_table, $page, $nb_post_per_page);
    }

    public function getTotalPagesArticle($nb_post_per_page){
        return $this->getTotalPages($this->db_table, $nb_post_per_page);
    }

    public function getArticle($key, $value){
        return $this->getEntry($this->db_table, $key, $value);
    }

    public function getArticle_byID($articleID){
        return $this->getArticle('id', $articleID);
    }

    public function createArticle($name, $categorieID, $permission_lvl, $unit_price, $quantity_left, $description, $availibility) {
        $query = 'INSERT INTO shop_article (name, categorieID, permission_lvl, unit_price, quantity_left, description, availibility) VALUES (:name, :categorieID, :permission_lvl, :unit_price, :quantity_left, :description, :availibility)';
        $data_array = array(
            'name' => $name,
            'categorieID' => $categorieID,
            'permission_lvl' => $permission_lvl,
            'unit_price' => $unit_price,
            'quantity_left' => $quantity_left,
            'description' => $description,
            'availibility' => $availibility,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function updateArticle($articleID, $name, $categorieID, $permission_lvl, $unit_price, $quantity_left, $description, $availibility) {
        $query = 'UPDATE shop_article SET name=:name, categorieID=:categorieID, permission_lvl=:permission_lvl, unit_price=:unit_price, quantity_left=:quantity_left, description=:description, availibility=:availibility WHERE id=:articleID';
        $data_array = array(
            'articleID' => $articleID,
            'name' => $name,
            'categorieID' => $categorieID,
            'permission_lvl' => $permission_lvl,
            'unit_price' => $unit_price,
            'quantity_left' => $quantity_left,
            'description' => $description,
            'availibility' => $availibility,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function changeArticleAvailibility($articleID){
        $is_available = $this->getPost_byID($articleID)['availibility'];
        $set_available = $is_available ? 0 : 1;

        $query = 'UPDATE article SET availibility=:set_available WHERE id=:articleID';
        $data_array = array(
            'articleID' => $articleID,
            'set_available' => $set_available
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

}
