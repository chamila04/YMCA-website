<?php
    session_start();

    include_once('database/db_connection.php');
?>

<html>

<head>
    <title>Document</title>
    <link rel="stylesheet" href="styles/info.css" />
    <link href="library/css/bootstrap.css" rel="stylesheet" />
    <script src="library/js/jquary.js"></script>
</head>

<body class="bg-black">
    <!--navigation bar-->
    <div class="row nav_bar bg-dark fixed-top">
        <div class="elements col-md-9 nav">
            <nav class="navbar navbar-expand-sm navbar-dark">
                <div class="container-fluid">
                    <ul class="navbar-nav fw-bold">
                        <li class="nav-item" style="padding-right: 40px">
                            <a class="nav-link" id="logo" href="home.php">YMCA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.html">About Us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!--content-->
    <div class="container mb-5">
        <div class="row mt-5">
            <h2 class="text-white mt-5 fw-bolder">Booking Details</h2>
            <div class="col-md-4 mb-3 mt-5 me-5" id="roombookdiv">
            <div class="card card-body bg-primary p-3">
                <p class="text-sm mb-0 text-capitalize">Total Room Bookings
                    <?php
                    $table="room_book";
                    $cusid=$_SESSION['cusid'];
                    $query="SELECT * FROM $table WHERE cus_id='$cusid'";
                    $res=mysqli_query($con,$query);
            
                    if($res){
                        $total=mysqli_num_rows($res);
                    }
                    else{
                        $total= "#";
                    }
                    ?>
                </p>
                <h5 class="fw-bold mb-0"><?php echo $total; ?></h5>
            </div>
            </div>
            <div class="col-md-4 mb-3 mt-5" id="courtbookdiv">
            <div class="card card-body bg-warning p-3">
                <p class="text-sm mb-0 text-capitalize">Total Court Bookings
                <?php
                    $table="court_book";
                    $cusid=$_SESSION['cusid'];
                    $query="SELECT * FROM $table WHERE cus_id='$cusid'";
                    $res=mysqli_query($con,$query);
            
                    if($res){
                        $total=mysqli_num_rows($res);
                    }
                    else{
                        $total= "#";
                    }
                    ?>
                </p>
                <h5 class="fw-bold mb-0"><?php echo $total; ?></h5>
            </div>
            </div>
        </div>      
    </div>


    <!--footer-->
    <div class="p-4 bg-dark text-white fixed-bottom">
        <p class="foot_head">YMCA Kandy</p>
        <small>Copyright by KADSE231F-G11. All rights reserved.</small>
    </div>


    <!--alert php-->
<?php
    //session_start();

    if(isset($_SESSION['status'])){
      ?>
    <script>
        $(document).ready(function () {
            swal({
                title: '<?php echo $_SESSION['status']; ?>',
                icon: '<?php echo $_SESSION['status_code']; ?>',
                button: "OK",
            });
        });
    </script>
    <?php
      unset($_SESSION['status']);
      unset($_SESSION['status_code']);
    }
?>

    <script src="library/js/bootstrap.bundle.min.js"></script>
    <script src="library/js/sweetalert.js"></script>
    <script src="javascript/userdashboard.js"></script>
</body>

</html>