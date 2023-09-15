<html>
<head>
    <link rel="icon" type="image/png" href="smkn1sby.png">
    <link rel="stylesheet" href="style.css">
	<title>Member • Library SMK Negeri 1 Surabaya</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<style>

</style>
    <section>
        <div class="header">
            <h1>DATA SISWA PRAKERIN</h1>
            <h2>Nusa Indo Konsultan IT SURABAYA</h2>
        </div>
        <div class="input-group">
            <span><a href="insert.php"></a></span>
        </div>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead> 
                    <tr>
                        <th width="4%"><h5>NO<h5></th>
                        <th><h5>NIS</h5></th>
                        <th><h5>NAMA</h5></th>
                        <th><h5>KELAS</h5></th>
                        <th><h5>TGL LAHIR</h5></th>
                        <th><h5>ALAMAT</h5></th>
                        <th><h5>NO. TELP</h5></th>
                        <th><h5>AKSI</h5></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <?php
                        include "connect.php";
                        $query="SELECT a.no_id,a.nama,b.kelas,a.tgl_lahir,a.alamat,a.no_telp FROM member a INNER JOIN class b ON a.kelas_id=b.kelas_id order by no_id;";
                        $sql=mysqli_query($conn, $query);
                        $no=1;
                        while($data=mysqli_fetch_assoc($sql)){    
                    ?>
                    <tr class="odd gradeX">
                        <td width="4%"><h5><?php echo $no?></h5></td>
                        <td><h5><?php echo $data['no_id'];?></h5></td>
                        <td><h5><?php echo $data['nama'];?></h5></td>
                        <td><h5><?php echo $data['kelas'];?></h5></td>
                        <td><h5><?php echo $data['tgl_lahir'];?></h5></td>
                        <td><h5><?php echo $data['alamat'];?></h5></td>
                        <td class="center"><h5>0<?php echo $data['no_telp'];?></h5></td>
                        <td class="center"><h5><a href="update.php?id=<?php echo $data['no_id']; ?>">EDIT</a> | <a href="delete.php?id=<?php echo $data['no_id']; ?>"onClick="return confirm('Apakah anda ingin menghapus <?php echo $data['nama']; ?>?')">HAPUS</a></h5></td>
                    </tr>
                    <?php $no++; }?>
                </tbody>
            </table>
        </div>
    </section>
    <div class="footer">
        <p>SMK Negeri 1 Surabaya - smkn1-sby.sch.id</p>
    </div>
</body>
</html>