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
    <title>update account</title>

    <link href="../library/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="../library/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="../styles/update.css" />
    <link rel="stylesheet" href="../styles/info.css" />
    <script src="../library/js/jquary.js"></script>
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
        <div class="elements col-md-3 acc d-flex align-items-center">
        <div class="container-fluid d-flex justify-content-end">
            <button type="button" id="back_btn" class="btn btn-danger">Back</button>
        </div>
        </div>
    </div>

        <div class="room-form bg-dark text-white">
            <h1 class="text-center text-white">Update Account</h1>
            <form action="db_updateacc.php" method="post">
              <div class="mb-3 mt-4">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control text-white" name="name" value="" required/>
              </div>
              <div class="mb-3 mt-4">
                <label for="email" class="form-label">email</label>
                <input type="text" class="form-control text-white" name="email" value="" required/>
              </div>
              <div class="mb-3 mt-4">
                <label for="curr_pwd" class="form-label">current Password</label>
                <input type="password" class="form-control" id="curr_pwd" name="curr_pwd" required>
              </div>
              <div class="mb-3 mt-2">
                <label for="create_pwd" class="form-label">Create Password</label>
                <input type="password" class="form-control" id="cre_pwd" name="create_pwd" pattern=".{5,}" required>
            </div>
              <div class="mb-3 mt-4">
                <label for="confirme_pwd" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="con_pwd" name="confirm_pwd" required>
              </div>
              <button type="submit" name="roombtn" class="btn btn-danger mt-4">Update</button>
            </form>
        </div>

    <!--footer-->
    <div class="p-4 bg-dark text-white">
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