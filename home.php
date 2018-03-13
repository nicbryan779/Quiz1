<html>
  <head>
    <title>Car Sharing</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="heading">
      <img src="logo.jpg">
    </div>
    <div class="menu">
      <button class="btnmenu">Available Offers</button>
      <button class="btnmenu" onclick="window.location.href='route.php'">Requested Routes</button>
      <button class="btnmenu" onclick="window.location.href='book.php'">My Routes Booked</button>
    </div>
    <div class="content">
      <?php
      $conn = mysqli_connect("localhost","root","","quiz1db");
      if (!$conn)
      {
        die("Connection failed");
      }
        $result1 = mysqli_query($conn,"SELECT * FROM routetbl");
        if(mysqli_num_rows($result1)>0)
        {
          echo("<table>");
          while($row = mysqli_fetch_assoc($result1))
          {
            $name=$row["name"];
            echo("<tr>");
            echo("<td>");
            echo($row["name"]);
            echo("</td>");
            echo("<td>");
            echo($row["fromp"]);
            echo("</td>");
            echo("<td>");
            echo($row["top"]);
            echo("</td>");
            echo("<td>");
            echo($row["date"]);
            echo("</td>");
            echo("<td>");
            echo($row["time"]);
            echo("</td>");
            $result2 = mysqli_query($conn,"SELECT * FROM usertbl WHERE name=$name");
            while($row2 = mysqli_fetch_assoc($result2))
            {
              echo("<td>");
              echo($row2["avg"]);
              echo("</td>");
              echo("<td>");
              echo($row2["num"]);
              echo("</td>");
              echo("</tr>");
            }
            echo("<td>");
            echo("<form action='post' method='post'><input type='submit' value='book'></form>");
            echo("</td>");
          }
          echo("</table>");
        }
        else
        {
          echo("<h1>No Routes Available<h1>");
        }
      ?> ?>
    </div>
  </body>
</html>
