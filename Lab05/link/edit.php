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
    <title>Edit Emp</title>
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
    <a class="navbar-brand" href="../emplist.php">Emp list</a>
  
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
    <?php
    // connect database 
    $db_host = "localhost";
    $db_user = "s59160248";
    $db_password = "456kasemsak";
    $db_name = "s59160248";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");
    
    $emp_no = $_GET['emp_no'];
    $sql = "SELECT *
    FROM emp
    WHERE emp_no = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $emp_no);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_object();
    ?>
    <form action="save_edit.php" method="post">
    <h1>Update Emp</h1>
    <div class="container">
    <p>กรุณาใส่รายละเอียดต่อไปนี้ให้ครบถ้วน</p>
        <label for="emp_no"> รหัสพนักงานของคุณ :<?php echo $row->emp_no;?></label>
        <input type="hidden" name="emp_no" value="<?php echo $row->emp_no;?>">
        <br>
        <br>
        <div class="form-group">
        <label for="emp_name">ชื่อของคุณ :</label> 
        <select name="emp_prefix">
        <option value="นาย" <?php if($row->emp_prefix == "นาย") echo "selected"; ?> >นาย</option>
        <option value="นาง" <?php if($row->emp_prefix == "นาง") echo "selected"; ?> >นาง</option>
        <option value="นางสาว" <?php if($row->emp_prefix == "นางสาว") echo "selected"; ?> >นางสาว</option>
        </select> 
        <input type="text" class="form-control" name="emp_name" maxlength="50" value="<?php echo $row->emp_name;?>">
        </div>
        <br>
        <br>
        <label for="emp_gender">เพศ :</label>
        <input type="radio" name="emp_gender" value="M" <?php if($row->emp_gender == "M") echo "checked"; ?>> ชาย
        <input type="radio" name="emp_gender" value="F" <?php if($row->emp_gender == "F") echo "checked"; ?>> หญิง
        <br>
        <br>
        วัน/เดือน/ปี เกิด : <input type="date" name="emp_birthdate" value="<?php echo $row->emp_birthdate;?>">
        <br>
        <br>
        <div class="form-group">
                <label for="emp_email">emailของคุณ :</label>
                <input type="email" class="form-control" name="emp_email" maxlength="50" value="<?php echo $row->emp_email;?>">
        </div>
        <br>
        <div class="form-group">
                <label for="emp_salay">เงินเดือน :</label>
                <input type="int" class="form-control" name="emp_salay" maxlength="7" value="<?php echo $row->emp_salay;?>">
        </div>
        <br>
        <p>
            <input type="submit" value="Update">
        </p>
    </form>
    </div>
</body>
</html>