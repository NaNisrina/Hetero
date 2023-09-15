<?php

$host     = "localhost";
$usert     = "root";
$passw     = "";
$db       = "phpcrud";

$con  = mysqli_connect($host, $usert, $passw, $db);

if (!$con) { //cek koneksi
  die("Tidak bisa terkoneksi ke database");
}

$user     = "";
$pass     = "";
$hak      = "";

$sukses   = "";
$error    = "";

if (isset($_GET['op'])) {
  $op   = $_GET['op'];
} else {
  $op   = "";
}

if ($op == 'edit') {
  $id_user = $_GET['id'];
  $sql1    = "SELECT * from usert where id_user = '$id_user'";
  $q1      = mysqli_query($con, $sql1);
  $r1      = mysqli_fetch_array($q1);

  $user  = $r1['user'];
  $pass  = $r1['pass'];
  $hak   = $r1['hak'];

  if ($user == '') {
    $error  = "Data tidak ditemukan";
  }
}

if (isset($_POST['submit'])) { //untuk create
  $user  = $_POST['user'];
  $pass  = md5($_POST['pass']);
  $hak   = $_POST['hak'];

  if ($user && $pass && $hak) {

    if ($op == 'edit') { //unt insert
    } $sql1 = "INSERT into usert(user, pass, hak) 
                values('$user', '$pass', '$hak')";
      $q1   = mysqli_query($con, $sql1);

      if ($q1) {
        $sukses = "Berhasil memasukkan data baru";
      } else {
        $error  = "Gagal memasukkan data";
      }
    } else {
    $error  = "Silahkan masukkan semua data";
  }
}

?>

<!DOCTYPE html>
<html>

<head>

  <title>Sign In</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    .mx-auto {
      width: 800px
    }

    .card {
      margin-top: 10p;
    }

    h1 {
      text-align: center;
    }
  </style>

</head>

<body>

  <center>

    <h2> Sign In Page </h2>

    <div class="mx-auto">

      <!-- memasukkan data -->
      <div class="card">

        <div class="card-header">
          Create Data
        </div>

        <div class="card-body">

          <?php
          if ($error) {
          ?>

            <div class="alert alert-danger" role="alert">
              <?php echo $error ?>
            </div>

          <?php
            header("refresh:5;url=sigin.php");
          }
          ?>

          <?php
          if ($sukses) {
          ?>

            <div class="alert alert-success" role="alert">
              <?php echo $sukses ?>
            </div>

          <?php
            header("refresh:5;url=login.php");
          }
          ?>

          <form action="" method="POST">

            <div class="mb-3 row">
              <label for="user" class="col-sm-2 col-form-label">
                Username
              </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="user" name="user" value="<?php echo $user ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="pass" class="col-sm-2 col-form-label">
                Password
              </label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $pass ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="hak" class="col-sm-2 col-form-label">
                Hak Akses
              </label>
              <div class="col-sm-10">

                <select class="form-control" name="hak" id="hak">

                  <option value=""> Hak Akses </option>

                  <option value="user" <?php
                                        if ($hak == "user") echo "selected"
                                        ?>> User </option>
                </select>
              </div>
            </div>

            <div class="col-12">

              <input type="submit" name="submit" value="Submit" class="btn-btn primary" />

              <button name="cancel" value="Cancel" class="btn-btn-primary">
                <a href="login.php"> Cancel </a>
              </button>

            </div>

          </form>

        </div>
      </div>

  </center>

</body>