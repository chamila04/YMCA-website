<?php
    if(isset($_POST['loginbtn'])){
        
        $email=$_POST['email'];

        include_once('db_connection.php');

        $query="SELECT * FROM login WHERE cus_email='$email' LIMIT 1";
        $res=mysqli_query($con,$query);

        if($res){
            if(mysqli_num_rows($res)==1){
                $row=mysqli_fetch_assoc($res);
                $dbpwd=$row['cus_pwd'];

                $pwd=$_POST['l_pwd'];

                if($pwd == $dbpwd){
                    echo ' login success ';
                }
                else{
                    echo 'login fail';
                }
            }
            else{
                echo 'email wrong';
            }
        }
    }
    else{
        echo 'user not found';
    }
?>