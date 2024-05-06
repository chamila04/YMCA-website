<?php
    if(isset($_POST['submitbtn'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pwd=$_POST['create_pwd'];
        $cpwd=$_POST['confirm_pwd'];

        $bcrypt_password=password_hash($cpwd,PASSWORD_BCRYPT);

        include_once('db_connection.php');

        $querys="SELECT * FROM login WHERE cus_email='$email' LIMIT 1";
        $result=mysqli_query($con,$querys);

        if($result){
            if(mysqli_num_rows($result)==0){

                $query="INSERT INTO login(cus_name,cus_email,cus_pwd) VALUES('$name','$email','$cpwd')";

                $res=mysqli_query($con,$query);
                if($res){
                    echo '<script language="javascript">';
                    echo 'alert("insert data successfully")';
                    echo '</script>';
                    header("Location: http://localhost/dse%20final/YMCA-website/home.php");
                }
                else{
                    echo 'Error inserting data: ' . mysqli_error($con);
                } 
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("email already entered")';
                echo '</script>';
                header("Location: http://localhost/dse%20final/YMCA-website/signup.php");
            }
        } 
    }
?>