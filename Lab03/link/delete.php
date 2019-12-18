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
    
    $empno = $_GET['empno'];

    $sql = "DELETE 
            FROM emp 
            WHERE emp_no = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $empno);
    $stmt->execute();
    //echo $stmt->affected_rows . " row inserted, ", "last insert id is $mysqli->insert_id.<br/>";
    
    header("location: ../emplist.php");
    
    ?>
</body>
</html>