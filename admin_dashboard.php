<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Dashboard - KINGANGITECH">
    <meta name="keywords" content="Admin Dashboard, KINGANGITECH">
    <meta name="author" content="KINGANGITECH">
    <title>Admin Dashboard - KINGANGITECH</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <header class="hero">
        <div class="container">
            <nav class="navbar">
                <img src="logo.png" alt="KINGANGITECH Logo" class="logo">
                <ul class="menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <div class="hero-content">
                <h1>Admin Dashboard</h1>
                <p>Manage website content.</p>
            </div>
        </div>
    </header>
    <main>
        <section id="admin-dashboard" class="admin-dashboard">
            <div class="container">
                <h2>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h2>
                <div class="dashboard-links">
                    <a href="manage_blog.php" class="btn-primary">Manage Blog</a>
                    <a href="manage_portfolio.php" class="btn-primary">Manage Portfolio</a>
                    <a href="manage_services.php" class="btn-primary">Manage Services</a>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2025 KINGANGITECH. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>