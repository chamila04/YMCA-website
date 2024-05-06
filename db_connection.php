<?php
    $server="127.0.0.1";
    $user="root";
    $pwd="";
    $uname="ymca_web";

    $con=mysqli_connect($server,$user,$pwd,$uname) or die('something went wrong');
    echo '<script language="javascript">';
    echo 'alert("connection successful")';
    echo '</script>';
?>