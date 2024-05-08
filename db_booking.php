<?php
    session_start();
    
    // room booking
    if(isset($_POST['roombtn'])){
        $checkinr=$_POST['checkinR'];
        $checkoutr=$_POST['checkoutR'];
        $roomcount=$_POST['roomcount'];

        include_once('db_connection.php');

        $login = false;
        $login = $_SESSION['login'];
        $cusid = $_SESSION['cusid'];

        if($login == true){
            $query="INSERT INTO room_book(cus_id,checkin,checkout,rooms) VALUES('$cusid','$checkinr','$checkoutr','$roomcount')";
            $res=mysqli_query($con,$query);
        }
        else{
            $_SESSION['status'] = "please login";
            $_SESSION['status_code'] = "warning";
            header('location:login.php');
        }
    }

    // court booking
    if(isset($_POST['courtbtn'])){
        $checkinc=$_POST['checkinC'];
        $checkoutc=$_POST['checkoutC'];
        $mor=$_POST['mor'];
        $aft=$_POST['aft'];

        include_once('db_connection.php');

        $login = false;
        $login = $_SESSION['login'];
        $cusid = $_SESSION['cusid'];

        if($login == true){
            $querys="INSERT INTO court_book(cus_id,checkin,checkout,rooms) VALUES('$cusid','$checkinc','$checkoutc','$mor','$aft')";
            $ress=mysqli_query($con,$querys);

            $_SESSION['status'] = "booking success";
            $_SESSION['status_code'] = "success";
            header('location:home.php');
        }
        else{
            $_SESSION['status'] = "please login";
            $_SESSION['status_code'] = "warning";
            header('location:login.php');
        }
    }
?>