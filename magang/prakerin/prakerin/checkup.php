<html>
<head>
    <link rel="icon" type="image/png" href="smkn1sby.png">
	<title>Sign In • SMK Negeri 1 Surabaya</title>
    <link rel="stylesheet" href="light.css">
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
    function registrasi($data) {
        session_start();

        include 'connect.php';

        $type = strtolower(stripslashes($data['type']));
        $nickname = strtolower(stripslashes($data['nickname']));
        $username = strtolower(stripslashes($data['username']));
        $email = strtolower(stripslashes($data['email']));
        $password = strtolower(stripslashes($data['password']));

        if($type == '1') {
            $_SESSION['type'] = $type;
            $_SESSION['nickname'] = $nickname;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            echo "<script>
                alert('Confirm password as admin!');
                document.location.href='passadmin.php';
            </script>";
            return false;
        }

        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Username is already registered');
            </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO user (type,nickname,username,email,password) VALUES ('$type','$nickname','$username','$email','$password')");

        return mysqli_affected_rows($conn);
    }
?>