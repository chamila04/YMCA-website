<?php
    session_start();

    // court booking
    if(isset($_POST['courtbtn'])){
        $checkinc=$_POST['checkinC'];
        $checkoutc=$_POST['checkoutC'];
        $mor=$_POST['morningcheck'];
        $aft=$_POST['afternooncheck'];
        $days=$_POST['daycountc'];
        $rprice=$_POST['pricevalc'];


        include_once('db_connection.php');

        $login = false;
        $login = $_SESSION['login'];
        $cusid = $_SESSION['cusid'];

        if($login == true){
            $query="INSERT INTO court_book(cus_id,checkin,checkout,morning,afternoon,days,price) VALUES('$cusid','$checkinc','$checkoutc','$mor','$aft','$days','$rprice')";
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