<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.html');
    exit;
}

require 'db.php';

// Handle form submission for adding/updating blog posts
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insert new blog post
    $sql = "INSERT INTO blog (title, content) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $title, $content);

    if ($stmt->execute()) {
        echo "Blog post added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage Blog - KINGANGITECH">
    <meta name="keywords" content="Manage Blog, KINGANGITECH">
    <meta name="author" content="KINGANGITECH">
    <title>Manage Blog - KINGANGITECH</title>
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
                    <li><a href="admin_dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <div class="hero-content">
                <h1>Manage Blog</h1>
                <p>Add or update blog posts.</p>
            </div>
        </div>
    </header>
    <main>
        <section id="manage-blog" class="manage-blog">
            <div class="container">
                <h2>Add New Blog Post</h2>
                <form action="manage_blog.php" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea id="content" name="content" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary">Add Blog Post</button>
                </form>
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