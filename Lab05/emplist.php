<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emp List</title>
    <style>
        h1 {
            text-align: center;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        table#t01 {
            width: 100%;    
            background-color: #ccf2ff;
        }
        table#t01 th {
            background-color: #00bfff;
            color: white;
            text-align: center;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="emplist.php">Emp list</a>
  
     <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Link 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link 3</a>
        </li>
    </ul>
    </nav>
    <br>
    <h1>Emp List</h1>
    <br>
    <div class="container">
    <button style="font-size:20px"><a href="link/newemp.html"> New Emp <i class="material-icons">library_add</i> </a></button>
    <br>
   
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
      $sql = "SELECT *,CONCAT(day(emp_birthdate),'-',month(emp_birthdate),'-',year(emp_birthdate)) as dmy
              FROM emp
              ORDER BY 1 
              LIMIT 0, $limit";
      $result = $mysqli->query($sql);

      if (!result) {
              echo ("Error: ". $mysqli->error);
      } else {
                  echo"<br>";
                  echo"<table class='table table-hover table-bordered' id='t01'>";
                  echo"<thead>";
                  echo"<tr>";
                  echo"<th>รหัสพนักงาน</th>";
                  echo"<th>ชื่อ</th>";
                  echo"<th>เพศ</th>";
                  echo"<th>email</th>";
                  echo"<th>วัน/เดือน/ปี เกิด</th>";
                  echo"<th>เงินเดือน</th>";
                  echo"<th>ดำเนินการ</th>";
                  echo"</thead>";
          while($row = $result->fetch_object()){
                  echo "<div>";
                  echo"</tr>";
                  echo "<tr>";
                  echo "<td>$row->emp_no</td>";
                  echo "<td>$row->emp_prefix $row->emp_name </td>";
                  echo "<td>";
                  if($row->emp_gender == 'M'){
                    echo "ชาย";   
                  }
                  else{
                    echo "หญิง";
                  }
                  echo "</td>";
                  echo "<td>$row->emp_email</td>";
                  echo "<td>$row->dmy</td>";
                  echo "<td>$row->emp_salay</td>";
                  echo "<td>";
                  echo "<a href='link/edit.php?emp_no=$row->emp_no'>[<i class='material-icons' style='font-size:20px'>edit</i>]</a>";
                  echo " , ";
                  echo "<a href='link/delete.php?emp_no=$row->emp_no'>[<i class='material-icons' style='font-size:20px'>delete_forever</i>]</a>";
                  echo "</td>";
                  echo "</tr>";
                  echo "</div>"; 
                  
              } 
                  echo "</table>";
      }
      ?> 
    </div>
</body>
</html>
