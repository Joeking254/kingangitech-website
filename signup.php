<?php
require 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Prepare SQL query to insert user
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $password);

    if ($stmt->execute()) {
        echo "User registered successfully.";
        header('Location: login.html');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>