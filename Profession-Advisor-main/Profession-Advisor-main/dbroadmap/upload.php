<?php
$servername = "localhost";
$username = "id22342758_root";
$password = "Advisor1@";
$dbname = "id22342758_careerprof";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $file_name = $_FILES['roadmap']['name'];
    $file_type = $_FILES['roadmap']['type'];
    $file_data = file_get_contents($_FILES['roadmap']['tmp_name']);

    $stmt = $conn->prepare("INSERT INTO files (file_name, file_type, file_data) VALUES (?, ?, ?)");
    // Use 'b' for blob data
    $stmt->bind_param("ssb", $file_name, $file_type, $null);

    // Split data into chunks and send it
    $chunkSize = 1024 * 1024; // 1MB chunk size
    $offset = 0;
    while ($offset < strlen($file_data)) {
        $stmt->send_long_data(2, substr($file_data, $offset, $chunkSize));
        $offset += $chunkSize;
    }

    if ($stmt->execute()) {
        echo "File uploaded successfully.";
    } else {
        echo "Failed to upload file: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
