<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


/**
 * Manager of the shop_purchase model
 * 
 * Represent an item added to the basket or an order with a certain amount a itss total price
 */
class PurchaseManager extends Manager {
    
    /**
     * Name of the database table
     *
     * @var string  $db_table Name of the database table
     */
    private $db_table = 'shop_purchase';
    
    /**
     * Get a list of all the Purchases
     *
     * @return  Pruchase[]  All the purchases done or ongoing
     */
    public function getAllPurchases(){
        return $this->getAllEntries($this->db_table);
    }
    
    /**
     * Get all the purchases made for one given order
     *
     * @param   int         $orderID ID of the order
     * @return  Purchase[]  Purchases of the order
     */
    public function getAllPurchases_byOrder($orderID){
        $db = $this->dbConnect();

        $request = $db->prepare('SELECT shop_purchase.id AS purchaseID, shop_purchase.*, shop_article.name AS name, shop_article.* FROM shop_purchase INNER JOIN shop_article ON shop_purchase.articleID = shop_article.id WHERE orderID=:orderID ORDER BY unit_price, quantity DESC');
        $request->execute(array(
            'orderID' => $orderID
        ));
        return $request;
    }
    
    /**
     * Get a specific purchase based on a given field and its value
     *
     * @param   string      $key Name of the field where the search is made on
     * @param   T           $value Value of the field where the search is made on
     * @return  Purchase    Looked purchase or empty value if the looked purchase doesn't exit
     */
    public function getPurchase($key, $value){
        return $this->getEntry($this->db_table, $key, $value);
    }
    
    /**
     * Get a specific purchase based on its ID
     *
     * @param   int         $purchaseID ID of the purchase
     * @return  Purchase    Looked purchase or empty value if the looked purchase doesn't exit
     */
    public function getPurchase_byID($purchaseID){
        return $this->getPurchase('id', $purchaseID);
    }

    public function getPurchase_byArticleID($articleID){
        return $this->getPurchase('articleID', $articleID);
    }

    /**
     * Create a new purchase
     *
     * @param   int     $orderID ID of the related order
     * @param   int     $articleID ID of the related item
     * @param   int     $quantity Amount of the selected item
     * @param   double  $total_price Total price of the total amounts of items
     * @return  boolean True if the purchase was correctly created
     */
    public function createPurchase($orderID, $articleID, $quantity, $total_price) {
        $query = 'INSERT INTO shop_purchase (orderID, articleID, quantity, total_price) VALUES (:orderID, :articleID, :quantity, :total_price)';
        $data_array = array(
            'orderID' => $orderID,
            'articleID' => $articleID,
            'quantity' => $quantity,
            'total_price' => $total_price
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Update the quantity amount and the total price of the purchase
     *
     * @param   int     $purchaseID ID of the purchase to update
     * @param   int     $quantity Updated quantity value
     * @param   double  $total_price Updated total price value
     * @return  boolean True if the purchase was correctly updated
     */
    public function updatePurchase($purchaseID, $quantity, $total_price) {
        $query = 'UPDATE shop_purchase SET quantity=:quantity, total_price=:total_price WHERE id=:purchaseID';
        $data_array = array(
            'purchaseID' => $purchaseID,
            'quantity' => $quantity,
            'total_price' => $total_price
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Delete a purchase from the database
     *
     * @param   int     $purchaseID ID of the purchase to delete
     * @return  boolean True if the purchase was correctly deleted
     */
    public function deletePurchase($purchaseID) {
        $query = 'DELETE FROM shop_purchase WHERE id=:purchaseID';
        $data_array = array(
            'purchaseID' => $purchaseID
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Calculate the sum of all the items in an order
     *
     * @param   int     $orderID Order's ID
     * @return  double  Sum of the prices of all the items in the order
     */
    public function sumPurchasesOrder($orderID){
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT SUM(total_price) FROM shop_purchase WHERE orderID=:orderID');
        $data_array = array(
            'orderID' => $orderID,
        );
        $order_total_price = $request->execute($data_array);
        $order_total_price = $request->fetch();

        $request->closeCursor();

        return $order_total_price[0];
    }
}
