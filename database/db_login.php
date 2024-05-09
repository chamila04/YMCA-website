<?php
    session_start();

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
                $login = false;

                if($pwd == $dbpwd){
                    $_SESSION['status'] = "login successfull";
                    $_SESSION['status_code'] = "success";
                    
                    $login=true;
                    $query_cusid = "SELECT cus_id FROM login WHERE cus_email='$email'";
                    $res_cusid = mysqli_query($con, $query_cusid);
                    $row_cusid = mysqli_fetch_assoc($res_cusid);
                    $cusid = $row_cusid['cus_id'];

                    $_SESSION['login'] = $login;
                    $_SESSION['cusid']  = $cusid;

                    header('location:../home.php');   
                }
                else{
                    $_SESSION['error'] = "login fail";
                    header('location:../login.php');
                }
            }
            else{
                $_SESSION['error'] = "wrong email";
                header('location:../login.php');
            }
        }
    }
    else{
        $_SESSION['error'] = "user not found";
        header('location:../login.php');
    }
?>