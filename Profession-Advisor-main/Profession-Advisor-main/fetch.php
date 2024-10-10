<?php
session_start();
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
    $roadmap_name = $_POST['roadmap_name'];
    $roadmap_name_like = "%" . $roadmap_name . "%";  // Add wildcards for the LIKE query

    $stmt = $conn->prepare("SELECT file_name, file_type, file_data FROM files WHERE file_name LIKE ?");
    $stmt->bind_param("s", $roadmap_name_like);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($file_name, $file_type, $file_data);
        $stmt->fetch();
        $_SESSION['file_name'] = $file_name;
        $_SESSION['file_type'] = $file_type;
        $_SESSION['file_data'] = base64_encode($file_data);  // Store base64 encoded data in session
        header("Location: roadmap.php");
        exit();
    } else {
        $error_message = "No roadmap found with the name: $roadmap_name";
        echo "<script>
            alert('$error_message');
            window.location.href = 'roadmap.php';
        </script>";
        exit();
    }
    $stmt->close();
}
$conn->close();
?>