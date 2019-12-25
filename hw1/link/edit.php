<html>
<head>
    <meta charset = "UTF-8">
</head>
<body>
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
    if($row->emp_prefix == "นาย"){
        $prefix1 = "นาง";
        $prefix2 = "นางสาว";
    }elseif($row->emp_prefix == "นาง"){
        $prefix1 = "นาย";
        $prefix2 = "นางสาว";
    }else{
        $prefix1 = "นาย";
        $prefix2 = "นาง";
    }
    if($row->emp_gender == "M"){
        $genderoutvalue = "F";
        $gender1 = "ชาย";
        $gender2 = "หญิง";
    }else{
        $genderoutvalue = "M";
        $gender1 = "หญิง";
        $gender2 = "ชาย";
    }
    ?>
    <form action="save_edit.php" method="post">
    <h1>Update Emp</h1>
    <p>กรุณาใส่รายละเอียดต่อไปนี้ให้ครบถ้วน</p>
        รหัสพนักงานของคุณ : <?php echo $row->emp_no;?>
        <input type="hidden" name="emp_no" value="<?php echo $row->emp_no;?>">
        <br />
        ชื่อของคุณ :<select name="emp_prefix">
            <option value="<?php echo $row->emp_prefix;?>" selected><?php echo $row->emp_prefix;?></option>
            <option value="<?php echo $prefix1;?>"><?php echo $prefix1;?></option>
            <option value="<?php echo $prefix2;?>"><?php echo $prefix2;?></option>
        </select> 
        <input type="text" name="emp_name" maxlength="50" value="<?php echo $row->emp_name;?>">
        <br />
        เพศ : <input type="radio" name="emp_gender" value="<?php echo $row->emp_gender;?>" checked> <?php echo $gender1;?>
              <input type="radio" name="emp_gender" value="<?php echo $genderoutvalue;?>" > <?php echo $gender2;?>
        <br/>
        วัน/เดือน/ปี เกิด : <input type="date" name="emp_birthdate" value="<?php echo $row->emp_birthdate;?>">
        <br/>
        emailของคุณ : <input type="email" name="emp_email" maxlength="50" value="<?php echo $row->emp_email;?>">
        <br />
        เงินเดือน : <input type="int" name="emp_salay" maxlength="7" value="<?php echo $row->emp_salay;?>">
        <br/>
        <p>
            <input type="submit" value="Update">
        </p>
    </form>
</body>
</html>