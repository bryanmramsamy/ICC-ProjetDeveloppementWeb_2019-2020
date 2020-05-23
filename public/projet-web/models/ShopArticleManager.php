<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


class ShopArticleManager extends Manager {

    private $db_table = 'shop_article';

    public function getArticles_byPage($page, $nb_post_per_page){
        $query = 'SELECT shop_article.name AS article_name, shop_article.*, shop_categories.name AS categorie_name FROM shop_article INNER JOIN shop_categories ON shop_article.categorieID = shop_categories.id ORDER BY categorieID, availability DESC, shop_article.id DESC';

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
    
    /**
     * Get a specific article by its ID
     *
     * @param   int     $articleID Article's ID
     * @return  Article The looked article or a null value if the article doesn't exist
     */
    public function getArticle_byID($articleID){
        return $this->getArticle('id', $articleID);
    }

    public function createArticle($name, $categorieID, $permission_lvl, $unit_price, $quantity_left, $description, $availability) {
        $query = 'INSERT INTO shop_article (name, categorieID, permission_lvl, unit_price, quantity_left, description, availability) VALUES (:name, :categorieID, :permission_lvl, :unit_price, :quantity_left, :description, :availability)';
        $data_array = array(
            'name' => $name,
            'categorieID' => $categorieID,
            'permission_lvl' => $permission_lvl,
            'unit_price' => $unit_price,
            'quantity_left' => $quantity_left,
            'description' => $description,
            'availability' => $availability,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function updateArticle($articleID, $name, $categorieID, $permission_lvl, $unit_price, $quantity_left, $description, $availability) {
        $query = 'UPDATE shop_article SET name=:name, categorieID=:categorieID, permission_lvl=:permission_lvl, unit_price=:unit_price, quantity_left=:quantity_left, description=:description, availability=:availability WHERE id=:articleID';
        $data_array = array(
            'articleID' => $articleID,
            'name' => $name,
            'categorieID' => $categorieID,
            'permission_lvl' => $permission_lvl,
            'unit_price' => $unit_price,
            'quantity_left' => $quantity_left,
            'description' => $description,
            'availability' => $availability,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }

    public function changeArticleAvailability($articleID){
        $is_available = $this->getPost_byID($articleID)['availability'];
        $set_available = $is_available ? 0 : 1;

        $query = 'UPDATE article SET availability=:set_available WHERE id=:articleID';
        $data_array = array(
            'articleID' => $articleID,
            'set_available' => $set_available
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Update the quantity left of an article
     *
     * @param   int     $articleID Article's ID
     * @param   int     $quantity_left Quantity of the article left
     * @return  boolean True if the quantity has correctly been updated
     */
    public function updateQuantityLeft($articleID, $quantity_left){
        $query = 'UPDATE shop_article SET quantity_left=:quantity_left WHERE id=:articleID';
        $data_array = array(
            'articleID' => $articleID,
            'quantity_left' => $quantity_left,
        );
        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Substract the quantity left of an article by a given value
     *
     * @param   int     $articleID Article's ID
     * @param   int     $quantity_to_substract The quantity to substract from the article
     * @return  boolean True if the quantity has correctly been substracted
     */
    public function substractQuantity($articleID, $quantity_to_substract){
        $start_quantity_left = $this->getArticle_byID($articleID)['quantity_left'];
        $end_quantity_left = $start_quantity_left - $quantity_to_substract;
        return $this->updateQuantityLeft($articleID, $end_quantity_left);
    }

}
