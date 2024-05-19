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
    <title>update room</title>

    <link href="../library/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="../library/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="../styles/update.css" />
    <script src="../library/js/jquary.js"></script>

  <!--update query-->
<?php
    //session_start();

      if(isset($_POST['roombtn'])){
          $checkinr=$_POST['checkinR'];
          $checkoutr=$_POST['checkoutR'];
          $roomcount=$_POST['roomcount'];
          $days=$_POST['daycountr'];
          $price=$_POST['pricevalr'];
          $getid=$_POST['getid'];
          
          include_once('db_connection.php');

          $query="UPDATE room_book SET checkin='$checkinr',checkout='$checkoutr',rooms='$roomcount',days='$days',price='$price' WHERE rbook_id='$getid'";
          $res=mysqli_query($con,$query);

          if($res){
              $_SESSION['status'] = "update successfull";
              $_SESSION['status_code'] = "success";
              header('location:../roominfo.php');
          }
          else{
              $_SESSION['status'] = "fail to update!";
              $_SESSION['status_code'] = "error";
              header('location:db_updateroom.php');
          }
      }
?>

</head>
<body class="bg-black">
        <div class="room-form bg-dark text-white">
            <h1 class="text-center text-white">Update Room</h1>
            <form action="db_updateroom.php" method="post">
              <div class="mb-3 mt-4">
                <div class="row">
                <div class="col">
                    <label for="checkin" class="form-label">Check In Date</label>
                    <input type="text" class="form-control checkdate" id="checkinR" name="checkinR" required/>
                  </div>
                  <div class="col">
                    <label for="checkout" class="form-label">Check Out Date</label>
                    <input type="text" class="form-control checkdate" id="checkoutR" name="checkoutR" required/>
                  </div>
                </div>
              </div>
              <div class="mb-3 mt-4">
                <div class="row">
                    <div class="col">
                      <label for="roomcount" class="form-label">number of rooms</label>
                      <input type="number" class="form-control" id="roomcount" name="roomcount" value="1" min="1" max="5" required readonly/>
                    </div>
                    <div class="col">
                    <label for="daycount" class="form-label">number of days</label>
                    <input type="number" class="form-control daycount" id="daycountr" name="daycountr" value="1" min="1" max="30" required readonly/>
                    </div>
                </div>
              </div>
              <div class="mb-3 mt-4" style="width:30%;">
                <label for="price" class=form-label>price</label>
                <input type="number" class="form-control text-white priceval" id="pricevalr" name="pricevalr" value="0.00" readonly/>
              </div>
              <input type="hidden" class="form-control getid" name="getid" value="<?php echo $_GET['updateid']; ?>" required/>
              <button type="submit" name="roombtn" class="btn btn-danger mt-4">Update</button>
            </form>
        </div>

    <!--footer-->
    <div class="p-4 bg-dark text-white fixed-bottom">
        <p class="foot_head">YMCA Kandy</p>
        <small>Copyright by KADSE231F-G11. All rights reserved.</small>
    </div>

<script src="../library/js/bootstrap.bundle.min.js"></script>
<script src="../library/js/bootstrap-datepicker.min.js"></script>
<script src="../library/js/bootstrap-number-input.js"></script>
<script src="../library/js/sweetalert.js"></script>
<script src="../javascript/home.js"></script>
</body>
</html>