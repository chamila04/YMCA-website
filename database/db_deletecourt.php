<?php
    include_once('db_connection.php');

    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $query="DELETE FROM court_book WHERE cbook_id=$id";
        $res=mysqli_query($con,$query);

        if($res){
            $_SESSION['status'] = "delete successfull";
            $_SESSION['status_code'] = "success";
            header('location:../courtinfo.php');
        }
        else{
            $_SESSION['status'] = "fail to delete";
            $_SESSION['status_code'] = "error";
            header('location:../courtinfo.php');
        }
    }
?>