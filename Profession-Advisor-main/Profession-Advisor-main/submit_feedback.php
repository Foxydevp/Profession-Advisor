<?php
// submit_feedback.php

// Database connection details
$servername = "localhost";
$db_username = "id22342758_root";
$db_password = "Advisor1@";
$dbname = "id22342758_careerprof";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $created_date = $_POST['created_date'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Get the current timestamp for created_at
    $created_at = date('Y-m-d H:i:s');
    
    // Start a transaction
    $conn->begin_transaction();

    try {
        // Get the maximum user_id
        $result = $conn->query("SELECT MAX(user_id) as max_id FROM feedback");
        $row = $result->fetch_assoc();
        $user_id = $row['max_id'] + 1;

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO feedback (user_id, username, created_date, subject, message, created_at) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $user_id, $username, $created_date, $subject, $message, $created_at);
        
        // Execute the statement
        if ($stmt->execute()) {
            $conn->commit();
            echo "Feedback submitted successfully";
        } else {
            throw new Exception($stmt->error);
        }
        
        $stmt->close();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>