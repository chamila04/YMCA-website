<?php
    include_once('database/db_connection.php');

    $query = "SELECT * FROM court_book";
    $res = mysqli_query($con,$query);
?>

    <!--alert php-->
<?php
    session_start();

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

<html>
<head>
    <title>info</title>

    <link rel="stylesheet" href="styles/info.css" />
    <link href="library/css/bootstrap.css" rel="stylesheet" />
    <script src="library/js/jquary.js"></script>
</head>

<body class="bg-black">

    <!--navigation bar-->
    <div class="row nav_bar bg-dark">
        <div class="elements col-md-9 nav">
        <nav class="navbar navbar-expand-sm navbar-dark">
            <div class="container-fluid">
            <ul class="navbar-nav fw-bold">
                <li class="nav-item" style="padding-right: 40px">
                <a class="nav-link" id="logo" href="home.php">YMCA</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="roominfo.php">Room Booking</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="#">Court Booking</a>
                </li>
            </ul>
            </div>
        </nav>
        </div>
    </div>

    <!--room book table-->
    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center fw-bolder">--Court Booking--</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="table-dark">
                                <th>booking id</th>
                                <th>customer id</th>
                                <th>checkin date</th>
                                <th>checkout date</th>
                                <th>morning</th>
                                <th>afternoon</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            <tr>
                                <?php
                                    while($row = mysqli_fetch_assoc($res)){
                                        ?>
                                            <td><?php echo $row['cbook_id']; ?></td>
                                            <td><?php echo $row['cus_id']; ?></td>
                                            <td><?php echo $row['checkin']; ?></td>
                                            <td><?php echo $row['checkout']; ?></td>
                                            <td><?php echo $row['morning']; ?></td>
                                            <td><?php echo $row['afternoon']; ?></td>
                                            <td><a href="database/db_updatecourt.php?updateid=<?php echo $row['cbook_id']; ?>" class="btn btn-primary">Update</a></td>
                                            <td><a href="database/db_deletecourt.php?deleteid=<?php echo $row['cbook_id']; ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <div class="p-4 mt-5 bg-dark text-white">
        <p class="foot_head">YMCA Kandy</p>
        <small>Copyright by KADSE231F-G11. All rights reserved.</small>
    </div>

    <script src="library/js/bootstrap.bundle.min.js"></script>
    <script src="library/js/sweetalert.js"></script>
</body>

</html>