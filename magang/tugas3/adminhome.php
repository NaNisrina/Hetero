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

if (isset($_GET['op'])) {
  $op   = $_GET['op'];
} else {
  $op   = "";
}

if ($op == 'delete') {
  $id_user     = $_GET['id'];
  $sql1   = "DELETE from usert where id_user = '$id_user'";
  $q1     = mysqli_query($con, $sql1);

  if ($q1) {
    $sukses   = "Berhasil hapus data";
  } else {
    $error    = "Gagal hapus data";
  }
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
  $pass  = $_POST['pass'];
  $hak   = $_POST['hak'];

  if ($user && $pass && $hak) {

    if ($op == 'edit') { //untuk update

      $sql1     = "UPDATE usert set user = '$user', 
                  pass = '$pass', hak = '$hak' 
                  where id_user = '$id_user' ";
      $q1       = mysqli_query($con, $sql1);

      if ($q1) {
        $sukses = "Data berhasil di update";
      } else {
        $error  = "Data gagal di update";
      }
    } else { //untuk insert

      $sql1 = "INSERT into usert(user, pass, hak) 
                values('$user', '$pass', '$hak')";
      $q1   = mysqli_query($con, $sql1);

      if ($q1) {
        $sukses = "Berhasil memasukkan data baru";
      } else {
        $error  = "Gagal memasukkan data";
      }
    }
  } else {
    $error  = "Silahkan masukkan semua data";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Admin Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    .mx-auto {
      width: 800px
    }

    .card {
      margin-top: 10p;
    }
      h1{
        text-align: center;
      }
  </style>

</head>

<body>

  <h1> Welcome to Admin Home </h1>

  <?php
  $_SESSION["names"]
  ?>

  <div class="mx-auto">

    <!-- memasukkan data -->
    <div class="card">

      <div class="card-header">
        Create / Edit / Delete Data
      </div>

      <div class="card-body">

        <?php
        if ($error) {
        ?>

          <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
          </div>

        <?php
          header("refresh:5;url=adminhome.php");
        }
        ?>

        <?php
        if ($sukses) {
        ?>

          <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
          </div>

        <?php
           header("refresh:5;url=adminhome.php");
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
              <input type="text" class="form-control" id="pass" name="pass" value="<?php echo $pass ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="hak" class="col-sm-2 col-form-label">
              Hak Akses
            </label>
            <div class="col-sm-10">

              <select class="form-control" name="hak" id="hak">

                <option value=""> Hak Akses </option>

                <option value="admin" <?php
                                  if ($hak == "admin") echo "selected"
                                  ?>> Admin </option>
                <option value="mod" <?php
                                  if ($hak == "mod") echo "selected"
                                  ?>> Moderator </option>
                <option value="user" <?php
                                  if ($hak == "user") echo "selected"
                                  ?>> User </option>
              </select>
            </div>
          </div>

          <div class="col-12">
            <input type="submit" name="submit" value="Submit" class="btn-btn primary" />
          </div>

        </form>

      </div>
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
              <th scope="col">Password</th>
              <th scope="col">Hak</th>
              <th scope="col">Aksi</th>
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
              $pass        = $r2['pass'];
              $hak         = $r2['hak'];

            ?>
              <tr>
                <th scope="row"> <?php echo $urut++ ?> </th>
                <td scope="row"> <?php echo $user   ?> </td>
                <td scope="row"> <?php echo $pass   ?> </td>
                <td scope="row"> <?php echo $hak    ?> </td>

                <td scope="row">
                  <a href="adminhome.php?op=edit&id=<?php echo $id_user ?>">
                    <button type="button" class="btn btn-warning">Edit</button>
                  </a>

                  <a href="adminhome.php?op=delete&id= <?php echo $id_user ?>">
                    <button type="button" class="btn btn-danger">Delete</button>
                  </a>

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