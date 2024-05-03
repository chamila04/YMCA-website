<?php
    if(isset($_POST['submitbtn'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pwd=$_POST['create_pwd'];
        $cpwd=$_POST['confirm_pwd'];

        $bcrypt_password=password_hash($cpwd,PASSWORD_BCRYPT);

        include_once('db_connection.php');

        $querys="SELECT * FROM login WHERE cus_email='$email' LIMIT 1";
        $ress=mysqli_query($con,$querys);

        if($ress){
            if(mysqli_num_rows($ress)==0){

                $query="INSERT INTO login(cus_name,cus_email,cus_pwd) VALUES('$name','$email','$cpwd')";

                $res=mysqli_query($con,$query);
                if($res){
                    echo 'data insert successfully';
                }
                else{
                    echo 'Error inserting data: ' . mysqli_error($con);
                } 
            }
            else{
                echo 'email already entered';
            }
        }

        
    }
?>