<?php
    include "connect.php";

    $no_id=$_GET['id'];

    $query="DELETE FROM member WHERE no_id='$no_id'";

    if($conn->query($query)){
        header("location:index.php");
    }else{
        echo "Data Failed to Delete!";
    }
?>