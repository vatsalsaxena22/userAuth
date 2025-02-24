<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Stack Website</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if (isset($_GET['error'])) { ?>
            <div class="message error"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <div class="message success"><?php echo htmlspecialchars($_GET['success']); ?></div>
        <?php } ?>
        <form action="../backend/process_form.php" method="POST">
            <input type="text" name="name" placeholder="Enter Name" required>
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Register</button>
        </form>

        <h2>Already have an account? <a href="./pages/login.php">Login</a></h2>
        <h2>All Users list <a href="./pages/users.php">Open</a></h2>
    </div>

    <script src="./js/script.js"></script>
</body>
</html>
