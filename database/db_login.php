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

                    $_SESSION['pwd'] = $dbpwd;
                    $_SESSION['login'] = $login;
                    $_SESSION['cusid']  = $cusid;
                    
                    $query_uname = "SELECT cus_name FROM login WHERE cus_email='$email'";
                    $res_uname = mysqli_query($con, $query_uname);
                    $row_uname = mysqli_fetch_assoc($res_uname);
                    $uname = $row_uname['cus_name'];

                    $_SESSION['uname'] = $uname;

                    header('location:../home.php');   
                }
                else{
                    $_SESSION['status'] = "wrong password";
                    $_SESSION['status_code'] = "error";
                    header('location:../home.php');
                }
            }
            else{
                $_SESSION['status'] = "wrong email";
                $_SESSION['status_code'] = "warning";
                header('location:../home.php');
            }
        }
    }
    else{
        $_SESSION['status'] = "user not found";
        $_SESSION['status_code'] = "warning";
        header('location:../home.php');
    }
?>