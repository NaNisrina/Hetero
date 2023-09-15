<?php

$host     = "localhost";
$user     = "root";
$pass     = "";
$db       = "phpcrud";

$koneksi  = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) { //cek koneksi
  die("Tidak bisa terkoneksi ke database");
}

$email    = "";
$nama     = "";
$telp     = "";
$mapel    = "";

$sukses   = "";
$error    = "";

if (isset($_GET['op'])) {
  $op   = $_GET['op'];
} else {
  $op   = "";
}

if($op == 'delete'){
  $id     = $_GET['id'];
  $sql1   = "DELETE from kontak where id = '$id'";
  $q1     = mysqli_query($koneksi, $sql1);

  if($q1){
    $sukses   = "Berhasil hapus data";
  } else {
    $error    = "Gagal hapus data";
  }
}

if ($op == 'edit') {
  $id     = $_GET['id'];
  $sql1   = "SELECT * from kontak where id = '$id'";
  $q1     = mysqli_query($koneksi, $sql1);
  $r1     = mysqli_fetch_array($q1);

  $email  = $r1['email'];
  $nama   = $r1['nama'];
  $telp   = $r1['telp'];
  $mapel  = $r1['mapel'];

  if ($email == '') {
    $error  = "Data tidak ditemukan";
  }
}

if (isset($_POST['simpan'])) { //untuk create
  $email  = $_POST['email'];
  $nama   = $_POST['nama'];
  $telp   = $_POST['telp'];
  $mapel  = $_POST['mapel'];

  if ($email && $nama && $telp && $mapel) {

    if ($op == 'edit') { //untuk update
        
      $sql1     = "UPDATE kontak set email = '$email', 
                  nama = '$nama', telp = '$telp', 
                  mapel = '$mapel' where id = '$id' ";
      $q1       = mysqli_query($koneksi, $sql1);

      if ($q1) {
          $sukses = "Data berhasil di update";
        } else {
          $error  = "Data gagal di update";
        }

    } else { //untuk insert

      $sql1 = "INSERT into kontak(email, nama, telp, mapel) 
        values('$email', '$nama', '$telp', '$mapel')";
      $q1   = mysqli_query($koneksi, $sql1);

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

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Data Guru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <style>
    .mx-auto {
      width: 800px
    }

    .card {
      margin-top: 10p;
    }
  </style>

</head>

<body>

  <div class="mx-auto">

    <!-- memasukkan data -->
    <div class="card">

      <div class="card-header">
        Create / Edit Data
      </div>

      <div class="card-body">

        <?php
          if ($error) {
        ?>

          <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
          </div>

        <?php

          header("refresh:5;url=index.php"); //5 detik refresh

        }
        ?>

        <?php
          if ($sukses) {
        ?>

          <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
          </div>

        <?php

          header("refresh:5;url=index.php"); //5 detik
          
        }
        ?>

        <form action="" method="POST">

          <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">
              Email
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" 
                     name="email" value="<?php echo $email ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">
              Nama
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" 
                     name="nama" value="<?php echo $nama ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="telp" class="col-sm-2 col-form-label">
              No Telp
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="telp" 
                     name="telp" value="<?php echo $telp ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="mapel" class="col-sm-2 col-form-label">
              Mapel
            </label>
            <div class="col-sm-10">

              <select class="form-control" name="mapel" id="mapel">

                <option value=""> Mata Pelajaran </option>

                <option value="IPS" <?php
                                      if ($mapel == "IPS") echo "selected"
                                    ?>> IPS </option>
                <option value="IPA" <?php
                                      if ($mapel == "IPA") echo "selected"
                                    ?>> IPA </option>
                <option value="BHS" <?php
                                      if ($mapel == "BHS") echo "selected"
                                    ?>> BAHASA </option>
                <option value="MTK" <?php
                                      if ($mapel == "MTK") echo "selected"
                                    ?>> MATEMATIKA </option>
                <option value="RPL" <?php
                                      if ($mapel == "RPL") echo "selected"
                                    ?>> RPL </option>
              </select>
            </div>
          </div>

          <div class="col-12">
            <input type="submit" name="simpan" value="Simpan Data" class="btn-btn primary" />
          </div>

        </form>

      </div>
    </div>

    <!-- mengeluarkan data -->
    <div class="card">
      <div class="card-header text-white bg-secondary">
        Data Guru
      </div>
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Email</th>
              <th scope="col">Nama</th>
              <th scope="col">No Telp</th>
              <th scope="col">Mapel</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

          <tbody>

            <?php
            $sql2   = "SELECT * from kontak order by id desc";
            $q2     = mysqli_query($koneksi, $sql2);
            $urut   = 1;

            while ($r2 = mysqli_fetch_array($q2)) {
              $id     = $r2['id'];
              $email  = $r2['email'];
              $nama   = $r2['nama'];
              $telp   = $r2['telp'];
              $mapel  = $r2['mapel'];

            ?>
              <tr>
                <th scope="row"> <?php echo $urut++ ?> </th>
                <td scope="row"> <?php echo $email  ?> </td>
                <td scope="row"> <?php echo $nama   ?> </td>
                <td scope="row"> <?php echo $telp   ?> </td>
                <td scope="row"> <?php echo $mapel  ?> </td>

                <td scope="row">
                  <a href="index.php?op=edit&id=<?php echo $id ?>">
                    <button type="button" class="btn btn-warning">Edit</button>
                  </a>

                  <a href="index.php?op=delete&id= <?php echo $id ?>">
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

</body>

</html>