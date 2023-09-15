<?php
    session_start();

    include 'checkup.php';

    if(isset($_POST['register'])){
        $_SESSION['register']=true;
        if (registrasi($_POST)>0) {
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
	<title>Sign Up • SMK Negeri 1 Surabaya</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<style>
    body {
        background: #E0E1DC;
        font-family: 'Montserrat', sans-serif;
    }
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #E0E1DC;
    }
    .h-custom {
        height: calc(100% - 0px);
    }
    .form-outline input {
        color: #1E2538;
    }
    .d-flex a {
        color: #1E2538;
        text-decoration: none;
    }
    .d-flex a:hover {
        color: #475B74;
        text-decoration: none;
    }
    .btn {
        background: #7D8DA6;
        border: none;
        color: #1E2538;
        padding-left: 2.5rem;
        padding-right: 2.5rem;
    }
    .btn:hover {
        background: #1E2538;
        border: none;
        color: #7D8DA6;
    }
    .form-check {
        color: #1E2538;
    }
    .text-center {
        color: #1E2538;
    }
</style>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <form action="" method="post">
                        <!-- Type Input -->
                        <div class="form-outline mb-4">
                            <!-- <label class="form-label" for="form3Example3">Type</label> -->
                            <select id="form3Example3" class="form-control form-control-lg"
                            name="type" required="">
                                <option value="">User Type</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <!-- Nickname Input -->
                        <div class="form-outline mb-4">
                            <!-- <label class="form-label" for="form3Example3">Nickname</label> -->
                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                            placeholder="Nickname" name="nickname" value="" required=""/>
                        </div>
                        <!-- Username Input -->
                        <div class="form-outline mb-4">
                            <!-- <label class="form-label" for="form3Example3">Username</label> -->
                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                            placeholder="Username" name="username" value="" required=""/>
                        </div>
                        <!-- Email Input -->
                        <div class="form-outline mb-4">
                            <!-- <label class="form-label" for="form3Example3">Email</label> -->
                            <input type="email" id="form3Example3" class="form-control form-control-lg"
                            placeholder="Email" name="email" value="" required=""/>
                        </div>
                        <!-- Password Input -->
                        <div class="form-outline mb-3">
                            <!-- <label class="form-label" for="form3Example4">Password</label> -->
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                            placeholder="Password" name="password" value="" required=""/>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <div class="input-group">
                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="submit" class="btn btn-lg" name="register">Log In</button>
                                    <p class="small fw-bold mt-2 pt-1 mb-0">Have an account? <a href="signin.php"
                                    class="link-danger">Sign In</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <img src="signin.webp"
                    class="img-fluid" alt="Sample image">    
                </div>
            </div>
        </div>
    </section>
</body>
</html>