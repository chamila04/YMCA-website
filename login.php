<html>

<head>
    <title>Login</title>

    <link href="library/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/login.css" />
    <script src="library/js/jquary.js"></script>
</head>

<body class="bg-black">
    <div class="login-form bg-dark">
        <h1 id="login_head">Login</h1>
        <form action="db_login.php" method="post">
            <div class="mb-3 mt-4">
            <?php
                    session_start();

                    if(isset($_SESSION['error'])){
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo $_SESSION['error']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['error']);
                    } 
                ?>
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required />
            </div>
            <div class="mb-3 mt-4">
                <label for="pwd" class="form-label">Password</label>
                <input type="password" class="form-control" id="pwd" name="l_pwd" required />
            </div>
            <button type="submit" class="btn btn-danger mt-4" id="loginbtnm" name="loginbtn">Login</button>
        </form>
        <p class="mt-4 ">
            Not a Member? <a href="signup.php" class="text-decoration-none"> SignUp Now</a>
        </p>
    </div>

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