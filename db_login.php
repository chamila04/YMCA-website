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
                    header('location:home.php');
                }
                else{
                    header("Location: http://localhost/dse%20final/YMCA-website/home.php");
                    echo '<script language="javascript">';
                    echo 'alert("wrong password")';
                    echo '</script>';
                }
            }
            else{
                header("Location: http://localhost/dse%20final/YMCA-website/home.php");
                echo '<script language="javascript">';
                echo 'alert("wrong email")';
                echo '</script>';
            }
        }
    }
    else{
        header("Location: http://localhost/dse%20final/YMCA-website/home.php");
        echo '<script language="javascript">';
        echo 'alert("user not found")';
        echo '</script>';
    }
?>