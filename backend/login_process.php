<?php
session_start();
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user"] = $row["name"];
            $_SESSION["email"] = $row["email"]; 
            header("Location: ../public/pages/dashboard.php?success=Welcome back, " . urlencode($row["name"]));
            exit();
        } else {
            header("Location: ../public/pages/login.php?error=Incorrect password");
            exit();
        }
    } else {
        header("Location: ../public/pages/login.php?error=User not found");
        exit();
    }
}

$conn->close();
?>
