<?php
    session_start();
    include_once('db_connection.php');

    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $query="DELETE FROM room_book WHERE rbook_id=$id";
        $res=mysqli_query($con,$query);

        if($res){
            $_SESSION['status'] = "delete successfull";
            $_SESSION['status_code'] = "success";
            header('location:../viewroom.php');
        }
        else{
            $_SESSION['status'] = "fail to delete";
            $_SESSION['status_code'] = "error";
            header('location:../viewroom.php');
        }
    }
?>