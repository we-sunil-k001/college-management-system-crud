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

        //*************************************************
        //upload college Image
        $filename = $_FILES["upload_main_image"]["name"];
        $tempname = $_FILES["upload_main_image"]["tmp_name"];
        $upload_dir = "../uploaded_college_images/";
        $filepath = $upload_dir.$filename;


        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath))
        {
            $filepath = $upload_dir.time().$filename;

            $file_name = time().$filename;


            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath))
            {
                $run_image = $user->add_college_Image($college_name, $phone, $address, $created_by);
                if($run_image)
                {
                            echo "<script>
                                    alert('College Added successfully.');
                                    window.location.href='../index.php?colleges';
                                </script> ";
                }

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.location.href='../index.php?colleges';
                    </script>";

            }

        }

        else
        {
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath))
            {

                $query="INSERT INTO `practice_area`( `sequence`,`title`, `slug`, `content`, `cover_image`) VALUES ('99999','$title','$slug','$content', '$filename')";

                $run=mysqli_query($db,$query);

                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Practice Area Added successfully.');
                            window.location.href = '../index.php?manage_practice_area';
                        </script>";

                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                        </script>";
                }


            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                    </script>";

            }
        }


    }
    else{
        echo "  <script>
                    alert('Something went wrong! Please try again');
                    window.location.href='../index.php?colleges';
                </script> ";
    }
}