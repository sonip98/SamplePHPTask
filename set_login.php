<?php
ob_start();
require("include/include.inc.php");
session_unset();
$db = new dbic();

$stmt = $db->conn->prepare("SELECT * from users WHERE username=?");
$stmt->execute(array($_POST['username']));
$rows = $stmt->fetchAll();
$pass=$_POST['password'];
$row = $rows[0];
if($row['password']==($pass)) {
    setcookie("username",$row['username']);
    $_SESSION['username'] = $row['username'];
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['lname'] = $row['lname'];
    header("Location: index.php");
}else{
    header("Location: index.php?cmd=login");
}

ob_end_flush();