<?php

session_start();

if (!isset($_SESSION["names"])) {
  header("location:login.php");
}

?>

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

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>User Home</title>

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

  <h1> Welcome to User Home </h1>

  <?php
  $_SESSION["names"]
  ?>

  <div class="mx-auto">

    <div class="card-header">
      Read Data
    </div>

    <!-- mengeluarkan data -->
    <div class="card">
      <div class="card-header text-white bg-secondary">
        Data User
      </div>
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Username</th>
              <th scope="col">Hak</th>
            </tr>
          </thead>

          <tbody>

            <?php
            $sql2   = " SELECT * FROM usert";
            $q2     = mysqli_query($con, $sql2);
            $urut   = 1;

            while ($r2 = mysqli_fetch_array($q2)) {
              $id_user     = $r2['id_user'];
              $user        = $r2['user'];
              $hak         = $r2['hak'];

            ?>
              <tr>
                <th scope="row"> <?php echo $urut++ ?> </th>
                <td scope="row"> <?php echo $user   ?> </td>
                <td scope="row"> <?php echo $hak    ?> </td>

                </td>
              </tr>

            <?php
            }
            ?>

          </tbody>

        </table>

      </div>
    </div>
  </div>

  <center>
    <button>
      <a href="logout.php"> Log Out </a>
    </button>
  </center>

</body>

</html>