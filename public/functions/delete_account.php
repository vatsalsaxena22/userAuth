<?php
session_start();
include '../../includes/db_connect.php';

if (!isset($_SESSION["user"])) {
    header("Location: ../pages/login.php");
    exit();
}

$email = $_SESSION["email"];
$sql = "DELETE FROM users WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
    session_destroy();
    echo "<script>alert('Your account has been deleted successfully!'); window.location.href='../index.php';</script>";
    exit();
} else {
    echo "<script>alert('Error deleting account! Please try again.'); window.location.href='dashboard.php';</script>";
}
?>
