<html>
<head>
    <link rel="icon" type="image/png" href="smkn1sby.png">
	<title>Connection • Library SMK Negeri 1 Surabaya</title>
</head>
<body>
</body>
</html>

<?php
    $servername="localhost";
    $user="root";
    $password="";
    $db="prakerin";

    $conn=mysqli_connect($servername,$user,$password,$db);
        if($conn){
            echo " ";
        }else{
            echo "Failed to Connect : ".mysqli_connect_error();
        }
?>