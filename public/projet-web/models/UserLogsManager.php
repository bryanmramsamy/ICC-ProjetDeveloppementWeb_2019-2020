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
    
    /**
     * Calculate the numbe of logs of a specific user for the last specific days
     *
     * @param   int $userID Related user's ID
     * @param   int $nb_days Number of days in range calculation
     * @return  int Number of logs in this time range.
     */
    public function lastLogs($userID, $nb_days){
        $db = $this->dbConnect();

        $request = $db->prepare('SELECT COUNT(*) FROM user_logs WHERE (userID = :userID) AND (login > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL :nb_days DAY))');

        $request->execute(array(
            'userID' => $userID,
            'nb_days' => $nb_days
        ));

        $nb_logs = $request->fetch();
        $request->closeCursor();

        return $nb_logs[0];
    }
}
