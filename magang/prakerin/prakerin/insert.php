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
					<form action="insert.php" method="POST">
						<div class="screen-body-item">
							<div class="app-form">
								<div class="app-form-group">
									<input class="app-form-control" placeholder="NIS" name="no_id" required="">
								</div>
								<div class="app-form-group">
									<input class="app-form-control" placeholder="NAMA" name="nama" required="">
								</div>
                                <div class="app-form-group">
                                    <select name="kelas_id" required="">
                                        <option value="">KELAS</option>
                                        <option value="1">XI RPL 1</option>
                                        <option value="2">XI RPL 2</option>
                                    </select>
								</div>
								<div class="app-form-group">
									<input type="date" class="app-form-control" name="tgl_lahir" required="">
								</div>
								<div class="app-form-group">
									<input class="app-form-control" placeholder="ALAMAT" name="alamat" required="">
								</div>
								<div class="app-form-group">
									<input class="app-form-control" placeholder="NO. TELEPON" name="no_telp" required="">
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

<?php
    include "connect.php";

    if(isset($_POST['submit'])){
        $no_id=$_POST['no_id'];
        $nama=$_POST['nama'];
        $kelas_id=$_POST['kelas_id'];
        $tgl_lahir=$_POST['tgl_lahir'];
        $alamat=$_POST['alamat'];
        $no_telp=$_POST['no_telp'];

        $sql="INSERT INTO member (no_id,nama,kelas_id,tgl_lahir,alamat,no_telp) VALUES ('$no_id','$nama','$kelas_id','$tgl_lahir','$alamat','$no_telp')";
        
        $result=mysqli_query($conn,$sql);
            if($result){
                echo "<script>alert('Data Saved Succesfully!');
                document.location.href='index.php'</script>\n";
            }else{
                echo "<script>alert('Data Failed to Save!');
                document.location.href='insert.php'</script>\n";
            }
    }
?>