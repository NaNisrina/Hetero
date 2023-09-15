<?php

  $host     = "localhost";
  $usern     = "root";
  $passw     = "";
  $db       = "phpcrud";

    session_start();

  $con  = mysqli_connect($host, $usern, $passw, $db);

  /**---**/
  if (!$con) { //cek koneksi
    die("Connection Error");
  }

  //---//
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $names   = $_POST["uname"];
      $passes  = md5($_POST["upass"]);

    $sql1 = "SELECT * FROM `usert`
            WHERE user = '$names'
            AND pass = '$passes';";
    $q1   = mysqli_query($con, $sql1);
    $r1   = mysqli_fetch_array($q1);

    /*$cek  = mysqli_num_rows($q1);
      echo $cek;
    */

    //---//
    if(isset($r1['hak'])){

      if($r1["hak"] == "user"){
        
        $_SESSION["names"] = $names;
        header("location:userhome.php");
  
      } else if($r1["hak"] == "admin"){
        $_SESSION["names"] = $names;
        header("location:adminhome.php");
  
      } else if($r1["hak"] == "mod"){
        $_SESSION["names"] = $names;
        header("location:modhome.php");
      }
    } else {
      echo "Username or Password is incorrect";
    }

  } 
