<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <title>Home</title>
  <link href="library/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="library/css/bootstrap-datepicker.min.css" />
  <link rel="stylesheet" href="styles/home.css" />
  <script src="library/js/jquary.js"></script>
</head>

<body>
  <!--navigation bar-->
  <div class="row nav_bar bg-dark fixed-top">
    <div class="elements col-md-9 nav">
      <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item" style="padding-right: 40px">
              <a class="nav-link" id="logo" href="home.php">YMCA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutus.html">About Us</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="elements col-md-3 acc d-flex align-items-center">
      <div class="container-fluid d-flex justify-content-end" id="logindiv">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#loginModal" style="margin-right: 10px">
          Login
        </button>
        <button type="button" id="signup_btn" class="btn btn-danger">
          Sign Up
        </button>
      </div>
    </div>
  </div>
  <!--welcome div-->
  <div class="row welcome">
    <div class="welcome_img" style="background-image: url(images/build.png)">
      <h1 class="welcome_head text-danger text-center pt-5">
        Welcome to YMCA
      </h1>
      <p class="welcome_text text-white text-center">
        The Kandy Young Men's Christian Association, commonly known as YMCA,
        is a community-driven organization dedicated to actively engaging with
        and addressing pressing social issues in the local community. With a
        commitment to making a positive impact, YMCA seeks to unite young men
        who share a belief in Jesus Christ as their God and Savior, as guided
        by the Holy Scriptures. Their mission is to foster discipleship in
        faith and life, working collaboratively to extend the Kingdom of Jesus
        Christ among young men.
      </p>
    </div>
  </div>
  <!--booking div-->
  <div class="row booking justify-content-center bg-black pb-4">
    <h2 class="text-center text-white">Reservation</h2>
    <div class="elements col-md-6 book" id="room_book" style="margin-right: 10%;">
      <div class="card">
        <img src="images/room.jpg" class="card-img-top" alt="room" />
        <div class="card-body bg-dark text-white">
          <h5 class="card-title fw-bold">Room Reservation</h5>
          <p class="card-text">
          YMCA offers 5 cozy rooms with attached bathrooms, perfect for your stay in Kandy. Each room is designed for comfort and convenience, providing a relaxing atmosphere after a day of exploration.
          </p>
          <a href="#" class="btn book_btn btn-danger" data-bs-toggle="modal" data-bs-target="#roombookModal">Book
            Now</a>
        </div>
      </div>
    </div>
    <div class="elements col-md-6 book" id="court_book">
      <div class="card">
        <img src="images/court.jpg" class="card-img-top" alt="court" />
        <div class="card-body bg-dark text-white">
          <h5 class="card-title fw-bold">Court Reservation</h5>
          <p class="card-text">
          YMCA offers a well-maintained badminton court for your enjoyment. Whether you're a beginner or an experienced player, our court is the perfect place to stay active and have fun with friends and family.
          </p>
          <a href="#" class="btn book_btn btn-danger" data-bs-toggle="modal" data-bs-target="#courtbookModal">Book
            Now</a>
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

  <!--login replace-->
  <?php
    if(isset($_SESSION['login']) && $_SESSION['uname']){
      $login=$_SESSION['login'];
      $uname=$_SESSION['uname'];
    }
  ?>
  <script>
    var login = <?php echo json_encode($login); ?>;
    var uname = <?php echo json_encode($uname); ?>;

    $(document).ready(function () {
      if (login == true) {
        $("#logindiv").replaceWith('<div class="container-fluid d-flex justify-content-end" id="logoutdiv"><h5 class="text-white mb-0">welcome ' + uname + '</h5><a href="home.php?logout=true;" class="btn btn-danger ms-5" id="logout_btn">Logout</a></div>')
        
        $(document).on('click','#logout_btn',function(){
        login = false;
        $("#logoutdiv").replaceWith('<div class="container-fluid d-flex justify-content-end" id="logindiv"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#loginModal" style="margin-right: 10px">Login</button><a href="signup.php" class="btn btn-danger">Sign Up</a></div>');
        <?php
          if(isset($_GET['logout'])){
            unset($_SESSION['login']);
            $_SESSION['status']="logout successfull";
            $_SESSION['status_code']="success";
          }
        ?>
      });
      }
      
    });
  </script>

  <script src="javascript/home.js"></script>
  <script src="library/js/bootstrap.bundle.min.js"></script>
  <script src="library/js/bootstrap-datepicker.min.js"></script>
  <script src="library/js/bootstrap-number-input.js"></script>
  <script src="library/js/sweetalert.js"></script>
</body>

  <!--login form modal-->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" data-bs-focus="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="login-form bg-dark">
            <h1 id="login_head">Login</h1>
            <form action="database/db_login.php" method="post">
              <div class="mb-3 mt-4">
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
        </div>
      </div>
    </div>
  </div>

  <!--room booking modal-->
  <div class="modal fade" id="roombookModal" tabindex="-1" aria-labelledby="roombookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bookingcont">
        <div class="modal-body">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="room-form bg-dark text-white">
            <h1 class="text-center text-white">Book Room</h1>
            <form action="database/db_room.php" method="post">
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
              <div class="mb-3 mt-4" style="width: 30%">
                <label for="roomcount" class="form-label">number of rooms</label>
                <input type="number" class="form-control" id="roomcount" name="roomcount" value="1" min="1" max="5" required/>
              </div>
              <button type="submit" name="roombtn" class="btn btn-danger mt-4">Book</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--court booking modal-->
  <div class="modal fade" id="courtbookModal" tabindex="-1" aria-labelledby="courtbookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bookingcont">
        <div class="modal-body">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="court-form bg-dark text-white">
            <h1 class="text-center text-white">Book Court</h1>
            <form action="database/db_court.php" method="post">
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
              <button type="submit" class="btn btn-danger mt-4" name="courtbtn" >Book</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</html>