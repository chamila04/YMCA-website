<!--view table-->
<?php
    session_start();
    
    include_once('database/db_connection.php');

    $query = "SELECT * FROM room_book";
    $res = mysqli_query($con,$query);
?>

<html>
<head>
    <title>room info</title>

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
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Room Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="courtinfo.php">Court Booking</a>
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
                        <h2 class="display-6 text-center fw-bolder">--Room Booking--</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="table-dark">
                                <th>booking id</th>
                                <th>customer id</th>
                                <th>checkin date</th>
                                <th>checkout date</th>
                                <th>number of rooms</th>
                                <th>number of days</th>
                                <th>total price</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            <tr>
                                <?php
                                    while($row = mysqli_fetch_assoc($res)){
                                        ?>
                                            <td><?php echo $row['rbook_id']; ?></td>
                                            <td><?php echo $row['cus_id']; ?></td>
                                            <td><?php echo $row['checkin']; ?></td>
                                            <td><?php echo $row['checkout']; ?></td>
                                            <td><?php echo $row['rooms']; ?></td>
                                            <td><?php echo $row['days']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><a href="database/db_updateroom.php?updateid=<?php echo $row['rbook_id']; ?>" class="btn btn-primary">Update</a></td>
                                            <td><a href="database/db_deleteroom.php?deleteid=<?php echo $row['rbook_id']; ?>" class="btn btn-danger">Delete</a></td>
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