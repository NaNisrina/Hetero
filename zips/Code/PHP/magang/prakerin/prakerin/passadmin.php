<?php
    session_start();

    include 'connect.php';

    if(!isset($_SESSION['register'])) {
        header("Location: signup.php");
        exit;
    }

    if(isset($_POST['confirm'])) {
        if($_POST['password'] == 'babayo') {
            $type = $_SESSION['type'];
            $nickname = $_SESSION['nickname'];
            $username = $_SESSION["username"];
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];

            $password = password_hash($password, PASSWORD_DEFAULT);

            mysqli_query($conn, "INSERT INTO user (type,nickname,username,email,password) VALUES ('$type','$nickname','$username','$email','$password')");
            echo "<script>
                alert('Registrasi Berhasil!');
                document.location.href='signin.php';
            </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
?>

<html>
<head>
    <link rel="icon" type="image/png" href="smkn1sby.png">
	<title>Password Verification • SMK Negeri 1 Surabaya</title>
    <link rel="stylesheet" href="light.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<style>
    body {
        background: #E0E1DC;
        font-family: 'Montserrat', sans-serif;
    }
    form {
        width: 40%;
        border-radius: 5px;
        background-color: #e0e0e0;
        padding: 20px;
        margin: auto;
        margin-top: 318px;
    }
    input[type=password] {
        width: 83%;
    }
    button {
        float: right;
    }
</style>
    <form class="form" action="" method="POST">
        <input type="password" name="password" id="password" required="" placeholder="Password Verify">
        <button type="submit" class="btn" name="confirm">Confirm</button>
    </form>
</body>
</html>