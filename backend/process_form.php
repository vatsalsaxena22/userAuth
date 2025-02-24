<?php
session_start();
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Check if email already exists
    $check_sql = "SELECT * FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: ../public/index.php?error=Email already exists");
        exit();
    }

    // Insert new user
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: ../public/pages/login.php?success=Registration successful! Please login.");
        exit();
    } else {
        header("Location: ../public/index.php?error=Registration failed");
        exit();
    }
    
    $stmt->close();
    $conn->close();
}
?>
