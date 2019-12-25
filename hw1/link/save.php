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
    
    $emp_no = $_POST ['emp_no'];
    $emp_name = $_POST ['emp_name'];
    $emp_email = $_POST ['emp_email'];
    $emp_password = $_POST ['emp_password'];

    $sql = "INSERT 
    INTO emp (emp_no, emp_name, emp_email, emp_password) 
    VALUES (?, ?,?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss", $emp_no, $emp_name, $emp_email, $emp_password);
    $stmt->execute();
    //echo $stmt->affected_rows . " row inserted, ", "last insert id is $mysqli->insert_id.<br/>";
    
    header("location: ../emplist.php");
    
    ?>
</body>
</html>