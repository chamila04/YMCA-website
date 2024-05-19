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

<!--update account-->
<?php
    include_once('db_connection.php');
    $id=$_SESSION['cusid'];
    $pwd=$_SESSION['pwd'];

    if(isset($_POST['accbtn'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $curpwd=$_POST['cur_pwd'];
        $conpwd=$_POST['confirm_pwd'];

        if($pwd == $curpwd){
            $query="UPDATE login SET cus_name='$name',cus_email='$email',cus_pwd='$conpwd' WHERE cus_id='$id'";
            $res=mysqli_query($con,$query);

            if($res){
                $_SESSION['status'] = "update successfull";
                $_SESSION['status_code'] = "success";
                header('location:../userdashboard.php');
            }
            else{
                $_SESSION['status'] = "update fail";
                $_SESSION['status_code'] = "warning";
                header('location:../userdashboard.php');
            }
        }
        else{
            $_SESSION['status'] = "current password worng!";
            $_SESSION['status_code'] = "warning";
            header('location:../userdashboard.php');    
        }
    }
?>

<!--view details-->
<?php
    include_once('db_connection.php');
    $cusid=$_SESSION['cusid'];

    $query = "SELECT * FROM login WHERE cus_id='$cusid'";
    $res = mysqli_query($con,$query);

    while($row = mysqli_fetch_assoc($res)){
        $dbname=$row['cus_name'];
        $dbemail=$row['cus_email'];
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
                    <a class="nav-link" id="logo" href="../home.php">YMCA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../aboutus.html">About Us</a>
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
            <form action="db_updateacc.php" method="post" id="updateacc_form">
              <div class="mb-3 mt-4">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control text-primary" name="name" value="<?php echo $dbname ?>" required/>
              </div>
              <div class="mb-3 mt-4">
                <label for="email" class="form-label">email</label>
                <input type="text" class="form-control text-primary" name="email" value="<?php echo $dbemail ?>" required/>
              </div>
              <div class="mb-3 mt-4">
                <label for="cur_pwd" class="form-label">current Password</label>
                <input type="password" class="form-control" id="cur_pwd" name="cur_pwd" required>
              </div>
              <div class="mb-3 mt-2">
                <label for="create_pwd" class="form-label">Create Password</label>
                <input type="password" class="form-control" id="cre_pwd" name="create_pwd" pattern=".{5,}" required>
            </div>
              <div class="mb-3 mt-4">
                <label for="confirme_pwd" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="con_pwd" name="confirm_pwd" required>
              </div>
              <button type="submit" name="accbtn" class="btn btn-danger mt-4">Update</button>
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