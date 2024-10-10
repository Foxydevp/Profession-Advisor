<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        /* Basic styling for the popup */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            z-index: 1000;
        }
        .popup .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: red;
            border: none;
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            cursor: pointer;
            font-size: 18px;
            line-height: 25px;
            text-align: center;
        }
        .popup .tick-icon {
            font-size: 50px;
            color: green;
        }
        .popup h2 {
            margin: 20px 0 10px;
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    // Database connection parameters
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

    // Process form data and insert into database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact_form (name, email, phone, subject, message)
                VALUES ('$name', '$email', '$phone', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="popup" id="success-popup">
                    <button class="close-btn" onclick="closePopup()">x</button>
                    <div class="tick-icon">&#10004;</div>
                    <h2>Message sent successfully!</h2>
                  </div>';
            echo '<script>
                    function closePopup() {
                        document.getElementById("success-popup").style.display = "none";
                        window.location.href = "index.php";
                    }
                    document.getElementById("success-popup").style.display = "block";
                  </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>

    <script>
        // Close popup when clicking outside of it
        window.onclick = function(event) {
            var popup = document.getElementById("success-popup");
            if (event.target == popup) {
                closePopup();
            }
        }
    </script>
</body>
</html>
