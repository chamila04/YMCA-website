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
                    <a class="nav-link active" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="roominfo.php">Room Booking</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="courtinfo.php">Court Booking</a>
                </li>
            </ul>
            </div>
        </nav>
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
          $(document).ready(function(){
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