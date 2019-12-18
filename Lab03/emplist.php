<html>
<head>
    <meta charset = "UTF-8">
</head>
<body>
    Emp List
    <a href="link/newemp.html">+</a>
    <?php
      // connect database 
      $db_host = "localhost";
      $db_user = "s59160248";
      $db_password = "456kasemsak";
      $db_name = "s59160248";
  
      $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
      $mysqli->set_charset("utf8");
  
      // check connection error 
      if ($mysqli->connect_errno) {
          echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      } else {
          // connect success, do nothing
      }
  
      // select data from tables
      $limit = ($_GET['limit']<>"")? $_GET['limit'] : 10;
      $sql = "SELECT *
              FROM emp
              ORDER BY 1 
              LIMIT 0, $limit";
      $result = $mysqli->query($sql);
  
      if (!result) {
              echo ("Error: ". $mysqli->error);
      } else {
          while($row = $result->fetch_object()){ 
                  echo "<div>";
                  echo "<a href='link/edit.php?emp_no=$row->emp_no'>edit</a>";
                  echo ",";
                  echo "<a href='link/delete.php?emp_no=$row->emp_no'>delete</a>";
                  echo "$row->emp_no, $row->emp_name, $row->emp_email, $row->emp_password";
                  echo "</div>";
              } 
      }
      ?>
</body>
</html>
