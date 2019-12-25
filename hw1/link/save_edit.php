<?php
// print_r($_POST);
$db_host = "localhost";
$db_user = "s59160248";
$db_password = "456kasemsak";
$db_name = "s59160248";

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
$mysqli->set_charset("utf8");

$emp_no = $_POST['emp_no'];
$emp_name = $_POST['emp_name'];
$emp_email = $_POST['emp_email'];

$sql = "UPDATE
            emp
        SET 
            emp_name = ?,
            emp_email = ?
        WHERE emp_no = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $emp_name, $emp_email, $emp_no);
$stmt->execute();
// echo $stmt->affected_rows . " row inserted.";

header("location: ../emplist.php");