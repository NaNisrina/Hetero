<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
</head>

<body>

  <center>

    <h1>Login Form</h1>


    <br> <br> <br> <br>
    <div style="background-color:beige; width: 500px;">
      <br> <br>

      <form action="proses.php" method="POST">

        <div>
          <label>Username</label>
          <input type="text" name="uname" required>
        </div>
        <br> <br>

        <div>
          <label>Password</label>
          <input type="password" name="upass" required>
        </div>
        <br> <br>

        <div>
          <input type="submit" value="Submit">

          <button>
            <a href="signin.php"> Sign In </a>
          </button>

        </div>

        </div>
        <br> <br>

      </form>

  </center>

</body>

</html>