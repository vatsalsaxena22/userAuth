<?php
session_start();
include '../../includes/db_connect.php';

if (!isset($_SESSION["user"]) || !isset($_SESSION["email"])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = $_SESSION["email"];

    $sql = "UPDATE users SET name=? WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $new_name, $email);
    
    if ($stmt->execute()) {
        $_SESSION["user"] = $new_name;
        header("Location: dashboard.php?success=Profile updated successfully!");
        exit();
    } else {
        header("Location: edit_profile.php?error=Error updating profile");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/edit_profile.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="edit-profile-container">
        <nav class="profile-nav">
            <h2>Edit Profile</h2>
            <a href="./dashboard.php" class="nav-link back-btn">Back to Dashboard</a>
        </nav>

        <?php if (isset($_GET['error'])): ?>
            <div class="message error"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <div class="profile-form-container">
            <form action="edit_profile.php" method="POST" class="profile-form">
                <div class="form-group">
                    <label for="name">New Name</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_SESSION['user']); ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="./dashboard.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
