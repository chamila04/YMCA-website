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
                            <a class="nav-link" id="logo" href="#">YMCA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="roominfo.php">Room Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courtinfo.php">Court Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customerinfo.php">Customers</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!--content-->
    <div class="container mb-5 mt-5">
        <div class="row mt-5">
        <h2 class="text-white fw-bolder mt-5">Total Report</h2>
            <!--Total Room Bookings-->
            <div class="col-md-4 mb-3 mt-5">
            <div class="card card-body bg-primary p-3">
                <p class="text-sm mb-0 text-capitalize">Total Room Bookings
                    <?php
                    $table="room_book";
                    $query="SELECT * FROM $table";
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
            <!--Total Court Bookings-->
            <div class="col-md-4 mb-3 mt-5">
            <div class="card card-body bg-warning p-3">
                <p class="text-sm mb-0 text-capitalize">Total Court Bookings
                <?php
                    $table="court_book";
                    $query="SELECT * FROM $table";
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
            <!--Total Customers-->
            <div class="col-md-4 mb-3 mt-5">
            <div class="card card-body bg-success p-3">
                <p class="text-sm mb-0 text-capitalize">Total Customers
                <?php
                    $table="login";
                    $query="SELECT * FROM $table";
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
        <div class="row">
           <!--Total Income-->
            <div class="col-md-5 mb-3 mt-5 text-center">
            <div class="card card-body bg-Danger p-3">
                <p class="text-sm mb-0 text-capitalize">Total Income
                <?php
                    $table="room_book";
                    $query="SELECT SUM(price) AS total FROM $table";
                    $res=mysqli_query($con,$query);
            
                    if($res){
                        $row = mysqli_fetch_assoc($res);
                        $total1 = $row['total'];
                    }
                    else{
                        $total= "#";
                    }

                    $table2="room_book";
                    $query2="SELECT SUM(price) AS total FROM $table";
                    $res2=mysqli_query($con,$query2);
            
                    if($res2){
                        $row2 = mysqli_fetch_assoc($res2);
                        $total2 = $row2['total'];
                    }
                    else{
                        $total= "#";
                    }

                    $total=$total1+$total2;
                    ?>
                </p>
                <h5 class="fw-bold mb-0">Rs. <?php echo $total; ?>.00</h5>
            </div>
            </div> 
        </div>
        <div class="row mt-5">
            <h2 class="text-white fw-bolder">Daily Report</h2>
            <!--Today Room Check Ins-->
            <div class="col-md-3 mb-3 mt-5">
            <div class="card card-body bg-primary p-3">
                <p class="text-sm mb-0 text-capitalize">Today Room Check Ins
                <?php
                    $table="room_book";
                    date_default_timezone_set('Asia/Colombo');
                    $date = date('Y-m-d', time());
                    $query="SELECT * FROM $table WHERE checkin='$date'";
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
            <!--Today Room Check Ins-->
            <div class="col-md-3 mb-3 mt-5">
            <div class="card card-body bg-warning p-3">
                <p class="text-sm mb-0 text-capitalize">Today Court Check Ins
                <?php
                    $table="court_book";
                    date_default_timezone_set('Asia/Colombo');
                    $date = date('Y-m-d', time());
                    $query="SELECT * FROM $table WHERE checkin='$date'";
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
            <!--Today Room Check Outs-->
            <div class="col-md-3 mb-3 mt-5">
            <div class="card card-body bg-success p-3">
                <p class="text-sm mb-0 text-capitalize">Today Room Check Outs
                <?php
                    $table="room_book";
                    date_default_timezone_set('Asia/Colombo');
                    $date = date('Y-m-d', time());
                    $query="SELECT * FROM $table WHERE checkout='$date'";
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
            <!--Today Court Check Outs-->
            <div class="col-md-3 mb-3 mt-5">
            <div class="card card-body bg-danger p-3">
                <p class="text-sm mb-0 text-capitalize">Today Court Check Outs
                <?php
                    $table="court_book";
                    date_default_timezone_set('Asia/Colombo');
                    $date = date('Y-m-d', time());
                    $query="SELECT * FROM $table WHERE checkout='$date'";
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
    <div class="p-4 bg-dark text-white">
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
</body>

</html>