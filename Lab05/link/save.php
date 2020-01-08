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
    $emp_prefix = $_POST['emp_prefix'];
    $emp_name = $_POST ['emp_name'];
    $emp_gender = $_POST['emp_gender'];
    $emp_birthdate = $_POST['emp_birthdate'];
    $emp_email = $_POST ['emp_email'];
    $emp_password = $_POST ['emp_password'];
    $emp_salay = $_POST{'emp_salay'};
    $sql = "INSERT 
    INTO emp (emp_no, emp_name, emp_email, emp_password, emp_prefix, emp_gender, emp_birthdate, emp_salay) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssssss", $emp_no, $emp_name, $emp_email, $emp_password,  $emp_prefix, $emp_gender, $emp_birthdate, $emp_salay);
    $stmt->execute();  
    
    header("location: ../emplist.php");
    
    ?>
</body>
</html>