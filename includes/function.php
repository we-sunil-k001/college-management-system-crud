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

    //Fetch all college data
    public function get_All_College($sql){
        $query = $this->connection->query($sql);
        $rows = array();

        // Fetch all rows from the result set
        while ($row = $query->fetch_assoc()) {
            $rows[] = $row; // Add each row to the array
        }

        return $rows;
    }

    // Method to insert college data into the database
    public function insert_College($college_name, $phone, $address, $created_by) {
        $query = "INSERT INTO `college` (`name`, `phone`, `address`, `created_by`,`status`) VALUES ('$college_name', '$phone', '$address', '$created_by','1')";
        $stmt = $this->connection->prepare($query);

        return $stmt->execute();
    }
}




if(isset($_POST['add_college'])){

    $college_name = $_POST['college_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $created_by = $_POST['created_by'];

    $user = new User();
    $run = $user->insert_College($college_name, $phone, $address, $created_by);

    if($run){
        echo "  <script>  
                    alert('College Added successfully.');
                    window.location.href='../index.php?colleges';
                </script> ";
    }
    else{
        echo "  <script>
                    alert('Something went wrong! Please try again');
                    window.location.href='../index.php?colleges';
                </script> ";
    }
}