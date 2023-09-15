<html>
<head>
    <link rel="icon" type="image/png" href="smkn1sby.png">
	<title>Sign In • SMK Negeri 1 Surabaya</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<style>
    body {
        background: #E0E1DC;
        font-family: 'Montserrat', sans-serif;
    }
</style>
</body>
</html>

<?php 
	session_start();
 
	include 'connect.php';
 
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	$login = mysqli_query($conn,"SELECT * from user where username='$username'");

	$cek = mysqli_num_rows($login);

	if($cek>0){
		$data = mysqli_fetch_assoc($login);
		if($data['type']=="1"){
			if(password_verify($password,$data['password'])) {
				$_SESSION['username'] = $username;
				$_SESSION['type'] = "1";
				header("location:home.php");
			}
		}else if($data['type']=="2"){
			if(password_verify($password,$data['password'])) {
				$_SESSION['username'] = $username;
				$_SESSION['type'] = "2";
				header("location:index_read.php");
			}
		}else{
			header("location:signin.php");
		}
	}else{
		echo "<script>alert('Incorrect username or password');
	    document.location.href='signin.php'</script>\n";
	}
?>