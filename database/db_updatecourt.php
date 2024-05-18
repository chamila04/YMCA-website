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
    <title>update court</title>

    <link href="../library/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="../library/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="../styles/update.css" />
    <script src="../library/js/jquary.js"></script>

  <!--update query-->
<?php
    //session_start();

      if(isset($_POST['courtbtn'])){
        $checkinc=$_POST['checkinC'];
        $checkoutc=$_POST['checkoutC'];
        $mor=$_POST['morningcheck'];
        $aft=$_POST['afternooncheck'];
        $getid=$_POST['getid'];

        include_once('db_connection.php');

        $query="UPDATE court_book SET checkin='$checkinc',checkout='$checkoutc',morning='$mor',afternoon='$aft' WHERE cbook_id='$getid'";
        $res=mysqli_query($con,$query);

        if($res){
            $_SESSION['status'] = "update successfull";
            $_SESSION['status_code'] = "success";
            header('location:../courtinfo.php');
        }
        else{
            $_SESSION['status'] = "fail to update!";
            $_SESSION['status_code'] = "error";
            header('location:db_updatecourt.php');
        }
    }
?>

</head>
<body class="bg-black">
<div class="court-form bg-dark text-white">
            <h1 class="text-center text-white">Book Court</h1>
            <form action="db_updatecourt.php" method="post">
              <div class="mb-3 mt-4">
                <div class="row">
                <div class="col">
                    <label for="checkin" class="form-label">Check In Date</label>
                    <input type="text" class="form-control checkdate" id="checkinC" name="checkinC" required />
                  </div>
                  <div class="col">
                    <label for="checkout" class="form-label">Check Out Date</label>
                    <input type="text" class="form-control checkdate" id="checkoutC" name="checkoutC" required/>
                  </div>
                </div>
              </div>
              <div class="mb-3 mt-4">
                <div class="row">
                  <h5 class="text-white pb-md-3">Pick Duration</h5>
                  <div class="form-ckeck col">
                    <input class="form-check-input" type="checkbox" value="book" id="morningcheck" name="morningcheck"/>
                    <label class="form-check-label" for="morningcheck">
                      Morning (6AM-12PM)
                    </label>
                  </div>
                  <div class="form-check col">
                    <input class="form-check-input" type="checkbox" value="book" id="afternooncheck" name="afternooncheck"/>
                    <label class="form-check-label" for="afternooncheck">
                      Afternoon (12PM-6PM)
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-3 mt-4" style="width:30%;">
                <label for="daycount" class="form-label">number of days</label>
                <input type="number" class="form-control daycount" id="daycountc" name="daycountc" value="1" min="1" max="30" required readonly/>
              </div>
              <div class="mb-3 mt-4" style="width:30%;">
                <label for="price" class=form-label>price</label>
                <input type="number" class="form-control priceval" id="pricevalc" name="pricevalc" value="0.00" readonly/>
              </div>
              <input type="hidden" class="form-control getid" name="getid" value="<?php echo $_GET['updateid']; ?>" required/>
              <button type="submit" class="btn btn-danger mt-4" name="courtbtn" >Update</button>
            </form>
          </div>

<script src="../library/js/bootstrap.bundle.min.js"></script>
<script src="../library/js/bootstrap-datepicker.min.js"></script>
<script src="../library/js/bootstrap-number-input.js"></script>
<script src="../library/js/sweetalert.js"></script>
<script src="../javascript/home.js"></script>
</body>
</html>