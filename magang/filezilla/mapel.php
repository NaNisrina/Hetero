<?php

$host     = "139.180.128.145";
$user     = "root";
$pass     = "nusaindo";
$db       = "phpcrud";

$koneksi  = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) { //cek koneksi
  die("Tidak bisa terkoneksi ke database");
}

$nama_mapel   = "";
$jam          = "";
$pendamping   = "";

$sukses   = "";
$error    = "";

if (isset($_GET['op'])) {
  $op   = $_GET['op'];
} else {
  $op   = "";
}

if($op == 'delete'){
  $mapel  = $_GET['id'];
  $sql1   = "DELETE from idm where mapel = '$mapel'";
  $q1     = mysqli_query($koneksi, $sql1);

  if($q1){
    $sukses   = "Berhasil hapus data";
  } else {
    $error    = "Gagal hapus data";
  }
}

if ($op == 'edit') {
  $mapel  = $_GET['id'];
  $sql1   = "SELECT * from idm where mapel = '$mapel'";
  $q1     = mysqli_query($koneksi, $sql1);
  $r1     = mysqli_fetch_array($q1);

  $nama_mapel   = $r1['nama_mapel'];
  $jam          = $r1['jam'];
  $pendamping   = $r1['pendamping'];

  if ($nama_mapel == '') {
    $error  = "Data tidak ditemukan";
  }
}

if (isset($_POST['simpan'])) { //untuk create
  $nama_mapel   = $_POST['nama_mapel'];
  $jam          = $_POST['jam'];
  $pendamping   = $_POST['pendamping'];

  if ($nama_mapel && $jam && $pendamping) {

    if ($op == 'edit') { //untuk update
        
      $sql1     = "UPDATE idm set nama_mapel = '$nama_mapel', 
                  jam = '$jam', pendamping = '$pendamping' 
                  where mapel = '$mapel' ";
      $q1       = mysqli_query($koneksi, $sql1);

      if ($q1) {
          $sukses = "Data berhasil di update";
        } else {
          $error  = "Data gagal di update";
        }

    } else { //untuk insert

      $sql1 = "INSERT into idm(nama_mapel, jam, pendamping) 
        values('$nama_mapel', '$jam', '$pendamping')";
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

  <title>Data Mapel</title>
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

          header("refresh:5;url=mapel.php"); //5 detik refresh

        }
        ?>

        <?php
          if ($sukses) {
        ?>

          <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
          </div>

        <?php

          header("refresh:5;url=mapel.php"); //5 detik
          
        }
        ?>

        <form action="" method="POST">

        <div class="mb-3 row">
            <label for="nama_mapel" class="col-sm-2 col-form-label">
              Nama Mapel
            </label>
            <div class="col-sm-10">

              <select class="form-control" name="nama_mapel" id="nama_mapel">

                <option value=""> Mata Pelajaran </option>

                <option value="IPS" <?php
                                      if ($nama_mapel == "IPS") echo "selected"
                                    ?>> IPS </option>
                <option value="IPA" <?php
                                      if ($nama_mapel == "IPA") echo "selected"
                                    ?>> IPA </option>
                <option value="BHS" <?php
                                      if ($nama_mapel == "BHS") echo "selected"
                                    ?>> BAHASA </option>
                <option value="MTK" <?php
                                      if ($nama_mapel == "MTK") echo "selected"
                                    ?>> MATEMATIKA </option>
                <option value="RPL" <?php
                                      if ($nama_mapel == "RPL") echo "selected"
                                    ?>> RPL </option>
              </select>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="jam" class="col-sm-2 col-form-label">
              Jam Ajaran
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="jam" 
                     name="jam" value="<?php echo $jam ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="pendamping" class="col-sm-2 col-form-label">
              Nama Pendamping
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="pendamping" 
                     name="pendamping" value="<?php echo $pendamping ?>">
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
        Data Mapel
      </div>
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Mapel</th>
              <th scope="col">Jam Ajaran</th>
              <th scope="col">Nama Pendamping</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

          <tbody>

            <?php
            $sql2   = "SELECT * from idm order by mapel desc";
            $q2     = mysqli_query($koneksi, $sql2);
            $urut   = 1;

            while ($r2 = mysqli_fetch_array($q2)) {
              $mapel           = $r2['mapel'];
              $nama_mapel      = $r2['nama_mapel'];
              $jam             = $r2['jam'];
              $pendamping      = $r2['pendamping'];

            ?>
              <tr>
                <th scope="row"> <?php echo $urut++       ?> </th>
                <td scope="row"> <?php echo $nama_mapel   ?> </td>
                <td scope="row"> <?php echo $jam          ?> </td>
                <td scope="row"> <?php echo $pendamping   ?> </td>

                <td scope="row">
                  <a href="mapel.php?op=edit&id=<?php echo $mapel ?>">
                    <button type="button" class="btn btn-warning">Edit</button>
                  </a>

                  <a href="mapel.php?op=delete&id= <?php echo $mapel ?>">
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