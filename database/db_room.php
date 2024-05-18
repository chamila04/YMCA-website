<?php
    session_start();
    
    // room booking
    if(isset($_POST['roombtn'])){
        $checkinr=$_POST['checkinR'];
        $checkoutr=$_POST['checkoutR'];
        $roomcount=$_POST['roomcount'];
        $days=$_POST['daycountr'];
        $rprice=$_POST['pricevalr'];

        include_once('db_connection.php');

        $login = false;
        $login = $_SESSION['login'];
        $cusid = $_SESSION['cusid'];

        if($login == true){
            $query="INSERT INTO room_book(cus_id,checkin,checkout,rooms,days,price) VALUES('$cusid','$checkinr','$checkoutr','$roomcount','$days','$rprice')";
            $res=mysqli_query($con,$query);
            $_SESSION['status'] = "booking success";
            $_SESSION['status_code'] = "success";
            header('location:../home.php');
        }
        else{
            $_SESSION['status'] = "please login";
            $_SESSION['status_code'] = "warning";
            header('location:../home.php');
        }
    }
?>

