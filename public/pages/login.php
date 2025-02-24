<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($_GET['error'])) { ?>
            <div class="message error"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <div class="message success"><?php echo htmlspecialchars($_GET['success']); ?></div>
        <?php } ?>
        <form action="../../backend/login_process.php" method="POST">
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </form>

        <h2>Don't have an account? <a href="../index.php">Register</a></h2>
    </div>
</body>
</html>
