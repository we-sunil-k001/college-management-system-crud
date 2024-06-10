<?php
class DbConnection{

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'college_management_system_crud';

    protected $connection;

    public function __construct(){

        if (!isset($this->connection)) {

            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
            else
            {
                echo 'Connection established successfull!';
                exit;
            }
        }

        return $this->connection;
    }
}
?>