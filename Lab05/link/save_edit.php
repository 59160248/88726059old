<?php
// print_r($_POST);
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

$sql = "UPDATE
            emp
        SET 
            emp_prefix = ?,
            emp_name = ?,
            emp_gender = ?,
            emp_birthdate = ?,
            emp_email = ?,
            emp_salay = ?
        WHERE emp_no = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssssss", $emp_prefix, $emp_name, $emp_gender, $emp_birthdate, $emp_email, $emp_salay, $emp_no);
$stmt->execute();


header("location: ../emplist.php");