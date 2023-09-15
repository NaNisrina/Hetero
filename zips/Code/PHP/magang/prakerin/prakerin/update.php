<?php
    include "connect.php";

    if(isset($_POST['submit'])){
        $no_id=$_POST['no_id'];
        $nama=$_POST['nama'];
        $kelas=$_POST['kelas'];
        $tgl_lahir=$_POST['tgl_lahir'];
        $alamat=$_POST['alamat'];
        $no_telp=$_POST['no_telp'];

        $sql="UPDATE member SET nama='$nama',kelas_id=$kelas,tgl_lahir='$tgl_lahir',alamat='$alamat',no_telp='$no_telp' WHERE no_id='$no_id'";
        
        $result=mysqli_query($conn,$sql);
            if($result){
                echo "<script>alert('Data Updated Succesfully!');
                document.location.href='index.php'</script>\n";
            }else{
                echo "<script>alert('Data Failed to Update!');
                document.location.href='update.php'</script>\n";
            }
    }

    $query="SELECT * FROM member WHERE no_id='$_GET[id]'";
    $result=mysqli_query($conn, $query);
    $data=mysqli_fetch_array($result);
?>

<html>
<head>
    <link rel="icon" type="image/png" href="smkn1sby.png">
	<title>Form • Library SMK Negeri 1 Surabaya</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="background">
		<div class="container">
			<div class="screen">
				<div class="screen-header">
					<div class="screen-header-left">
						<div class="screen-header-button close"></div>
						<div class="screen-header-button maximize"></div>
						<div class="screen-header-button minimize"></div>
					</div>
					<div class="screen-header-right">
						<div class="screen-header-ellipsis"></div>
						<div class="screen-header-ellipsis"></div>
						<div class="screen-header-ellipsis"></div>
					</div>
				</div>
				<div class="screen-body">
					<div class="screen-body-item left">
						<div class="app-title">
							<span>FORM</span>
							<span>ANGGOTA</span>
						</div>
						<div class="app-contact">SMK Negeri 1 Surabaya - smkn1-sby.sch.id</div>
					</div>
					<form action="" method="POST">
						<div class="screen-body-item">
							<div class="app-form">
								<div class="app-form-group">
									<input class="app-form-control" placeholder="NIS" name="no_id" required="" value="<?php echo $data['no_id']; ?>">
								</div>
								<div class="app-form-group">
									<input class="app-form-control" placeholder="NAMA" name="nama" required="" value="<?php echo $data['nama']; ?>">
								</div>
								<div class="app-form-group">
                                    <select name="kelas" required="">
                                        <option value="">KELAS</option>
                                        <option <?= ($data['kelas_id'] == 1) ? "selected":""?> value="1">XI RPL 1</option>
                                        <option <?= ($data['kelas_id'] == 2) ? "selected":""?> value="2">XI RPL 2</option>
                                    </select>
								</div>
								<div class="app-form-group">
									<input type="date" class="app-form-control" placeholder="TANGAL LAHIR" name="tgl_lahir" required="" value="<?php echo $data['tgl_lahir']; ?>">
								</div>
								<div class="app-form-group">
									<input class="app-form-control" placeholder="ALAMAT" name="alamat" required="" value="<?php echo $data['alamat']; ?>">
								</div>
								<div class="app-form-group">
									<input class="app-form-control" placeholder="NO. TELEPON" name="no_telp" required="" value="0<?php echo $data['no_telp']; ?>">
								</div>
								<div class="app-form-group buttons">
									<button class="app-form-button"><a href="index.php">CANCEL</a></button>
									<button type="submit" class="app-form-button" name="submit">SEND</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>