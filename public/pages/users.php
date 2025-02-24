<?php
include '../../includes/db_connect.php';

// Pagination
$limit = 5; // records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Search functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = $search ? "WHERE name LIKE '%$search%' OR email LIKE '%$search%'" : '';

// Get total records
$total_records = $conn->query("SELECT COUNT(*) as count FROM users $where")->fetch_assoc()['count'];
$total_pages = ceil($total_records / $limit);

// Get records with limit
$sql = "SELECT id, name, email FROM users $where LIMIT $start, $limit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <link rel="stylesheet" href="../css/users.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>Registered Users</h2>
        
        <!-- Search Form -->
        <form class="search-form" method="GET">
            <input type="text" name="search" placeholder="Search users..." value="<?php echo $search; ?>">
            <button type="submit">Search</button>
        </form>

        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["id"]); ?></td>
                    <td><?php echo htmlspecialchars($row["name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <?php for($i = 1; $i <= $total_pages; $i++) { ?>
                <a href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>" 
                   class="<?php echo $page == $i ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php } ?>
        </div>

        <h2><a href="../index.php">Back to Home</a></h2>
    </div>
</body>
</html>

<?php $conn->close(); ?>
