<?php
    if(isset($_POST['submitbtn'])){
       $name=$_POST['name'];
        $email=$_POST['email'];
        $pwd=$_POST['create_pwd'];
        $cpwd=$_POST['confirm_pwd'];

        $bcrypt_password=password_hash($cpwd,PASSWORD_BCRYPT);

        include_once('db_connection.php');

        $query="INSERT INTO login(cus_name,cus_email,cus_pwd) VALUES('$name','$email','$bcrypt_password')";

        $res=mysqli_query($con,$query);
        if($res){
            echo 'data insert successfully';
        }
        else{
            echo 'Error inserting data: ' . mysqli_error($con);
        } 
    }
?>