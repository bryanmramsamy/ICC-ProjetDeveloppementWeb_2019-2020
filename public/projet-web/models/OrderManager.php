<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


/**
 * Manager of the shop_order model
 * 
 * Acts like a basket containing purchases and like an order when payed
 */
class OrderManager extends Manager {
    
    /**
     * Name of the database of the shop_order model
     *
     * @var string  $db_table Name of the database of the shop_order model
     */
    private $db_table = 'shop_orders';
    
    /**
     * Get a list of all existing orders
     *
     * @return  Order[] List of all the existing orders
     */
    public function getAllOrders(){
        return $this->getAllEntries($this->db_table);
    }
    
    /**
     * Get all the orders of a specific user
     *
     * @param   int     $userID Related user's Id
     * @return  Order[] List of all user's orders made or ongoing
     */
    public function getAllOrders_ofUser($userID){
        $db = $this->dbConnect();

        $request = $db->prepare('SELECT * FROM shop_orders WHERE (userID=:userID) AND (ordered=1) ORDER BY date_ordered DESC');
        $data_array = array(
            'userID' => $userID,
        );
        $request->execute($data_array);

        return $request;
    }

    /**
     * Get a specific order
     *
     * @param   string  $key Search field to catch in the SQL request
     * @param   T       $value Value of the searched field
     * @return  Order   Looked order or null if the order doesn't exist
     */
    public function getOrder($key, $value){
        return $this->getEntry($this->db_table, $key, $value);
    }
    
    /**
     * Get a specific order by its ID
     *
     * @param   int     $orderID ID of the looked order
     * @return  Order   Looked order or null if the order doesn't exist
     */
    public function getOrder_byID($orderID){
        return $this->getOrder('id', $orderID);
    }
    
    /**
     * Create an order assigned to a specific user
     *
     * @param   int     $userID ID of the user who did the order
     * @return  boolean True if the order was correctly created
     */
    public function createOrder($userID) {
        $query = 'INSERT INTO shop_orders (userID) VALUES (:userID)';
        $data_array = array(
            'userID' => $userID,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Get the latest created order of a specific user on his ID
     *
     * @param   int     $userID Id of the related user of the order
     * @return  Order   Latest order created by the given user or null if the user didn't create any order before
     */
    public function getLatestCreatedOrder($userID){
        $db = $this->dbConnect();

        $request = $db->prepare('SELECT * FROM shop_orders WHERE userID=:userID ORDER BY id DESC');
        $data_array = array(
            'userID' => $userID,
        );
        $orderID = $request->execute($data_array);
        $orderID = $request->fetch();

        $request->closeCursor();

        return $orderID;
    }

    /**
     * Update the total price of the order based on the total price of each purchase part of that order
     * The calculation must be made beforehand !It isn't proceeded in this function !
     *
     * @param   int     $orderID ID of the order
     * @param   double  $total Total price of all the pruchases of the order
     * @return  boolean True if the total price of the order correctly updated
     */
    public function updateTotal($orderID, $total) {
        $query = 'UPDATE shop_orders SET total=:total WHERE id=:orderID';
        $data_array = array(
            'orderID' => $orderID,
            'total' => $total,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Set a new value to thhe bank account of the order
     *
     * @param   int     $orderID ID of the order
     * @param   string  $bank_account Bank account ID
     * @return  boolean True if the bank account number was correctly updated
     */
    public function updateBankAccount($orderID, $bank_account){
        $query = 'UPDATE shop_orders SET bank_account=:bank_account WHERE id=:orderID';
        $data_array = array(
            'orderID' => $orderID,
            'bacnk_account' => $bank_account,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Flag an order as ordered.
     * The user's bank account and its delivery address and zipcodes are added to the order.
     *
     * @param   int     $orderID User's ID
     * @param   string  $bank_account User's bank account number
     * @param   string  $address User's delivery address
     * @param   string  $zipcode User's devivery address' zip code
     * @return  boolean True if the order was correctly updated and flagged as ordered
     */
    public function order($orderID, $bank_account, $address, $zipcode){
        $query = 'UPDATE shop_orders SET bank_account=:bank_account, address=:address, zipcode=:zipcode, ordered=1, date_ordered=NOW() WHERE id=:orderID';
        $data_array = array(
            'orderID' => $orderID,
            'bank_account' => $bank_account,
            'address' => $address,
            'zipcode' => $zipcode
        );
        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Flag an order as payed and add the payed date to the current datetime.
     *
     * @param   int     $orderID Order's Id
     * @return  boolean True if the order was corretcly flagged as paid
     */
    public function payment($orderID){
        $query = 'UPDATE shop_orders SET payed=1, date_payed=NOW() WHERE id=:orderID';
        $data_array = array(
            'orderID' => $orderID
        );
        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Delete an order from the database
     *
     * @param   int     $orderID ID of the order
     * @return  boolean True if the order was correctly deleted from the database
     */
    public function deleteOrder($orderID) {
        $query = 'DELETE FROM shop_orders WHERE id=:orderID';
        $data_array = array(
            'orderID' => $orderID
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
    
    /**
     * Counts the amout of article in a specific order
     *
     * @param   int $orderID ID of the order
     * @return  int Number of items in the order
     */
    public function getNumberItems($orderID){
        $db = $this->dbConnect();

        $request = $db->prepare('SELECT SUM(quantity) AS total_items FROM shop_purchase WHERE orderID=:orderID');
        $data_array = array(
            'orderID' => $orderID,
        );
        $request->execute($data_array);
        $data = $request->fetch();

        $request->closeCursor();

        return $data['total_items'];
        ; 
    }

    public function isArticle_inOrder($articleID, $orderId){
        $db = $this->dbConnect();

        $request = $db->prepare('SELECT COUNT(*) FROM shop_purchase INNER JOIN shop_article ON shop_purchase.articleID = shop_article.id INNER JOIN shop_orders ON shop_purchase.orderID = shop_orders.id WHERE shop_purchase.orderID = :orderID AND shop_purchase.articleID = :articleID');
        $request->execute(array(
            'articleID' => $articleID,
            'orderID' => $orderID
        ));
        $result = $request->fetch();
        return $result == 1;
    }
}
