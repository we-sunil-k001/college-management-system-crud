<?php
include_once('db.php');

class User extends DbConnection{

    public function __construct(){

        parent::__construct();
    }

    public function check_login($username, $password){

        $sql = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
        $query = $this->connection->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }

    public function details($sql){

        $query = $this->connection->query($sql);

        $row = $query->fetch_array();

        return $row;
    }

    public function get_All_College($sql){
        $query = $this->connection->query($sql);
        $rows = array();

        // Fetch all rows from the result set
        while ($row = $query->fetch_assoc()) {
            $rows[] = $row; // Add each row to the array
        }

        return $rows;
    }



}