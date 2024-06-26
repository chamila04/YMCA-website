<html>
<head>
    <title>Signup</title>

    <link href="library/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/signup.css" />
    <script src="library/js/jquary.js"></script>
</head>

<body class="bg-dark">
    <div class="signup-form bg-black">
        <h2>Sign Up</h2>
        <form class="was-validated" id="signup_form" action="database/db_signup.php" method="post">
            <div class="mb-3 mt-2">
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
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Name cannot be empty.</div>
            </div>
            <div class="mb-3 mt-2">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">please enter a valid email address.</div>
            </div>
            <div class="mb-3 mt-2">
                <label for="create_pwd" class="form-label">Create Password</label>
                <input type="password" class="form-control" id="cre_pwd" name="create_pwd" pattern=".{5,}" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Please enter a password.</div>
            </div>
            <div class="mb-3 mt-2">
                <label for="confirme_pwd" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="con_pwd" name="confirm_pwd" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Please confirm the password.</div>
            </div>
            <div class="mb-3 mt-2 form-check">
                <input type="checkbox" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms">I accept all <a href="terms.html">terms &
                        conditions</a></label>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Please agree to terms & conditions to continue.</div>
            </div>
            <button type="submit" class="btn mt-2 btn-danger" name="submitbtn">Sign Up</button>
        </form>
    </div>

    <!--footer-->
    <div class="p-4 bg-dark text-white">
        <p class="foot_head">YMCA Kandy</p>
        <small>Copyright by KADSE231F-G11. All rights reserved.</small>
    </div>

<!--alert box-->
<?php
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

    <script src="javascript/signup.js"></script>
    <script src="library/js/bootstrap.bundle.min.js"></script>
    <script src="library/js/sweetalert.js"></script>
</body>
</html>