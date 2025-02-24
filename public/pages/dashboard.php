<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <nav class="dashboard-nav">
            <h2>Dashboard</h2>
            <a href="../functions/logout.php" class="nav-link logout">Logout</a>
        </nav>
        
        <div class="dashboard-content">
            <div class="welcome-section">
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION["user"]); ?>!</h2>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary" onclick="editProfile()">Edit Profile</button>
                <button class="btn btn-danger" onclick="confirmDeletion()">Delete Account</button>
            </div>
        </div>
    </div>

    <script src="../js/dashboard.js"></script>
</body>
</html>
