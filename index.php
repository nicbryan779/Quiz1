<html>
  <head>
    <title>Car Sharing</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
      function ValidateForm()
      {
        let user = document.forms["login"]["user"].value;
        let pass = document.forms["login"]["pass"].value;
        if(user=="")
        {
          alert("Please input username");
          return false;
        }
        else if (pass=="")
        {
          alert("Please input password");
          return false;
        }
        else
        {
          return true;
        }
      }
    </script>
  </head>
  <body>
    <div class="heading">
      <img src="logo.jpg">
    </div>
    <div class="menu">

    </div>
    <div class="content">
      <div id="loginForm">
        <form  action="index.php" name="login" method="post" onsubmit="return ValidateForm()">
          <h1>Username:</h1><input type="text" name="user" class="box"><br>
          <h1>Password:</h1><input type="password" name="pass" class="box"><br>
          <br>
          <br>
          <br><br>
      </div>
      <div class="submit">
        <input name ="submit" type="submit" value="LOGIN" class="button">
      </div>
      </form>
      <?php
        $message = "Login Failed!Username password mismatch";
        if(isset($_POST["submit"]))
        {
          $user = $_POST["user"];
          $pass = $_POST["pass"];
          $conn = mysqli_connect("localhost","root","","quiz1db");
          if (!$conn)
          {
            die("Connection failed");
          }
          $result = mysqli_query($conn,"SELECT * FROM usertbl WHERE username = '$user'");
          if(mysqli_num_rows($result)>0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
              if($pass=== $row["password"])
              {
                header('Location: home.php');
              }
              else
              {
                echo("<script>alert('LoginFailed');</script>");
              }
            }
            if($row["role"]==="driver")
            {
              header('Location: homedriver.php');
            }
          }
          else
          {
            echo("<script>alert('LoginFailed');</script>");
          }
        }
      ?>
    </div>
  </body>
</html>
