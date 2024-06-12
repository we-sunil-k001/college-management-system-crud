<?php
include_once('db.php');

class User extends DbConnection{

    public function __construct(){

        parent::__construct();
    }

    public function check_login($username, $password){

        $sql = "SELECT * FROM `user` WHERE `email` = '$username' AND `password` = '$password'";
        $query = $this->connection->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }

    // Fetching all data and using in multiple pages
    public function details($sql){
        $query = $this->connection->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row;
        }
        else{
            return false;
        }
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


    // Insert college data into the database
    public function insert_College($college_id, $college_name, $phone, $address, $created_by) {
        $query = "INSERT INTO `college` (`college_id`,`name`, `phone`, `address`, `created_by`,`status`) VALUES ('$college_id','$college_name', '$phone', '$address', '$created_by','1')";
        $stmt = $this->connection->prepare($query);

        return $stmt->execute();
    }


    // Update college data into the database
    public function update_College($college_id, $college_name, $phone, $address) {
        $query = "UPDATE `college` SET `name`='$college_name',`address`='$address',`phone`='$phone' WHERE `college_id`='$college_id' ";
        $stmt = $this->connection->prepare($query);

        return $stmt->execute();
    }


    // Add College image
    public function add_college_Image($media, $college_id) {
        $query_add_image = "UPDATE `college` SET `image_url`='$media' WHERE `college_id`='$college_id'";
        $run_add_image = $this->connection->prepare($query_add_image);

        return $run_add_image->execute();
    }


    // Delete College
    public function delete_college($college_id) {

        $sql = "SELECT * FROM `college` WHERE `college_id` = '$college_id'";
        $query = $this->connection->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();

            $query = "DELETE FROM `college` WHERE `college_id`='$college_id'";
            $run = $this->connection->prepare($query);
            if($run->execute())
            {
                return $row['image_url'];
            }


        }
    }


    // Remove College image
    public function remove_college_image($sql) {
        return $query = $this->connection->query($sql);
    }



    // insert college data into the database
    public function create_user($first_name, $last_name, $phone, $email, $password) {
        $query = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `phone`, `password`, `status`) VALUES ('$first_name','$last_name','$email','$phone','$password','1')";
        $run = $this->connection->prepare($query);

        return $run->execute();
    }



}
// Class ends above


//=========================================================================================================================
// Add college
if(isset($_POST['add_college'])){

    $college_id = $_POST['college_id'];
    $college_name = $_POST['college_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $created_by = $_POST['created_by'];

    $user = new User();
    $run = $user->insert_College($college_id,$college_name, $phone, $address, $created_by);

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
                $run_image = $user->add_college_Image($file_name, $college_id);
                if($run_image)
                {
                      echo $run_image;     // alert will run at the end
                }

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                    </script>";

            }

        }

        else
        {
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath))
            {

                $run_image = $user->add_college_Image($filename, $college_id);
                if($run_image)
                {
                    echo $run_image; // alert will run at the end
                }

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                    </script>";
            }
        }


        echo "<script>
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


//=========================================================================================================================
// Delete college
if(isset($_GET['delete_college'])) {

    $college_id = $_GET['delete_college'];

    $user = new User();
    $run = $user->delete_college($college_id);  //calling function

    if($run)
    {
        $image_url = $run;

        unlink('../uploaded_college_images/'.$image_url);

        echo "  <script>
                    alert('College Deleted Successfully.');
                    window.location.href='../index.php?colleges';
                </script> ";
    }
}


//=========================================================================================================================
// Update college - Delete college image
if(isset($_GET['delete_image'])) {

    $college_id = $_GET['delete_image'];

    $user = new User();
    $sql = "SELECT * FROM `college` WHERE `college_id` = '$college_id'";
    $row = $user->details($sql);

    $image_url = $row['image_url'];

    $filepath = '../uploaded_college_images/'.$image_url;

    unlink($filepath);   //unlinking the file/image


    if (!file_exists($filepath))
    {
        $sql = "UPDATE `college` SET `image_url` = '' WHERE `college_id` = '$college_id'";
        $run = $user->remove_college_image($sql);

        if($run)
        {
            echo "<script>
                    window.history.back();
                </script> ";
        }

    }

}




//=========================================================================================================================
// Update/ Edit college
if(isset($_POST['edit_college'])){
    error_reporting(0);

    $college_id = $_POST['college_id'];
    $college_name = $_POST['college_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $filename = $_FILES["upload_main_image"]["name"];
    $tempname = $_FILES["upload_main_image"]["tmp_name"];
    $upload_dir = "../uploaded_college_images/";
    $filepath = $upload_dir.$filename;

    $user = new User();

    //if form submit without image ==========================================================
    if(empty($filename))
    {
        $run = $user->update_College($college_id,$college_name, $phone, $address);
        if($run)
        {
            echo "<script>
                                    alert('College Updated successfully.');
                                    window.location.href='../index.php?colleges';
                                </script> ";
        }

    }
    else
    {
        $run = $user->update_College($college_id,$college_name, $phone, $address);

        if($run){

            // If file with name already exist then append time in
            // front of name of the file to avoid overwriting of file
            if(file_exists($filepath))
            {
                $filepath = $upload_dir.time().$filename;

                $file_name = time().$filename;


                // Now let's move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $filepath))
                {
                    $run_image = $user->add_college_Image($file_name, $college_id);
                    if($run_image)
                    {
                        // echo $run_image;     // alert will run at the end
                    }

                }
                else
                {
                    echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                    </script>";

                }

            }

            else
            {
                // Now let's move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $filepath))
                {

                    $run_image = $user->add_college_Image($filename, $college_id);
                    if($run_image)
                    {
                        //  echo $run_image; // alert will run at the end
                    }

                }
                else
                {
                    echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                    </script>";
                }
            }


            echo "<script>
                                    alert('College Updated successfully.');
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


}




//=========================================================================================================================
// Create/register new User
if(isset($_POST['register_user'])) {
    error_reporting(0);

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $user = new User();

    $run = $user->create_user($first_name, $last_name, $phone, $email, $password);

    if ($run) {
        echo "<script>
                                    alert('Registeration successfull.');
                                    window.location.href='login.php';
                                </script> ";
    }

}
