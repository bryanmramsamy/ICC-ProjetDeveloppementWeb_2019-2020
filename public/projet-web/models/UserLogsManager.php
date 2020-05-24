<?php

namespace ProjetWeb\Model;

require_once('models/Manager.php');


/**
 * Manager of the user_log model
 * 
 * Record the logs of each login of each user
 */
class UserLogsManager extends Manager {
    
    /**
     * Name of the database of the user_log model
     *
     * @var string  $db_table Name of the database of the user_log model
     */
    private $db_table = 'user_logs';
    
    /**
     * Get a specific log based on a key value
     *
     * @param   string  $key Key value to do the search on
     * @param   mixed   $value Value of the key which the search is made on
     * @return  Log     Searched log of null if the log doens't exist
     */
    public function getLog($key, $value){
        return $this->getEntry($this->db_table, $key, $value);
    }

    /**
     * Get a log by its ID
     *
     * @param   int $logID Log's ID
     * @return  Log Looked log of null if the log doesn't exist
     */
    public function getLog_byID($logID){
        return $this->getLogs('id', $logID);
    }
    
    /**
     * Get a log by its related user's ID
     *
     * @param   int $userID Related user's ID
     * @return  Log Looked log of null if the log doesn't exist
     */
    public function getLog_byUserID($userID){
        return $this->getUser('userID', $userID);
    }
    
    /**
     * Add a login log when a user log itself in
     *
     * @param   int     $userID User's ID
     * @return  boolean True if the login was correctly logged
     */
    public function login($userID) {
        $query = 'INSERT INTO user_logs (userID, login) VALUES (:userID, NOW())';

        $data_array = array(
            'userID' => $userID,
        );

        return $this->createUpdateDeleteEntry($query, $data_array);
    }
}
