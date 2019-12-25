<html>
<head>
    <meta charset = "UTF-8">
    <style>
        h1 {
            text-align: center;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
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
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emp List</title>
</head>
<body>
    <h1>Emp List</h1>
    <br/>
    <button><a href="link/newemp.html">New Emp+</a></button>
    <br/>
    <table id="t01">
        <tr>
        <th>รหัสพนักงาน</th>
        <th>ชื่อ</th>
        <th>เพศ</th>
        <th>email</th>
        <th>วัน/เดือน/ปี เกิด</th>
        <th>เงินเดือน</th>
        <th>ดำเนินการ</th>
        </tr>
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
                  
          while($row = $result->fetch_object()){
                  echo "<div>";
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
                  echo "<a href='link/edit.php?emp_no=$row->emp_no'>[edit]</a>";
                  echo " , ";
                  echo "<a href='link/delete.php?emp_no=$row->emp_no'>[delete]</a>";
                  echo "</td>";
                  echo "</tr>";
                  echo "</div>";      
              } 
             
      }
      ?> 
    </table>
</body>
</html>
