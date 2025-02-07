<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.html');
    exit;
}

require 'db.php';

// Handle form submission for adding/updating services
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];

    // Insert new service
    $sql = "INSERT INTO services (service_name, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $service_name, $description);

    if ($stmt->execute()) {
        echo "Service added successfully.";
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
    <meta name="description" content="Manage Services - KINGANGITECH">
    <meta name="keywords" content="Manage Services, KINGANGITECH">
    <meta name="author" content="KINGANGITECH">
    <title>Manage Services - KINGANGITECH</title>
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
                <h1>Manage Services</h1>
                <p>Add or update services.</p>
            </div>
        </div>
    </header>
    <main>
        <section id="manage-services" class="manage-services">
            <div class="container">
                <h2>Add New Service</h2>
                <form action="manage_services.php" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="service_name">Service Name:</label>
                        <input type="text" id="service_name" name="service_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary">Add Service</button>
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