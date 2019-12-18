<html>
<head>
    <meta charset = "UTF-8">
</head>
<body>
    Edit emp
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
        Emp No : <?php echo $row->emp_no;?>
        <input type="hidden" name="emp_no"
                    value="<?php echo $row->emp_no;?>">
        <br />
        Name : <input type="text" name="emp_name" maxlength="50"
                    value="<?php echo $row->emp_name;?>">
        <br />
        Email : <input type="email" name="emp_email" maxlength="50"
                    value="<?php echo $row->emp_email;?>">
        <br />
        <p>
            <input type="submit" value="Update">
        </p>
    </form>
</body>
</html>