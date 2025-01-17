<?php
session_start();

$servername = "localhost";
$username = "id22342758_root";
$password = "Advisor1@";
$dbname = "id22342758_careerprof";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];
$registration_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/', $password)) {
        $errors[] = "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $sql = "SELECT id FROM users WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Username or email already exists.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                $registration_success = true;
            } else {
                $errors[] = "Error in registration. Please try again.";
            }
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
         /* Custom CSS for Loader */
         .loader {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-top-color: #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s ease-in-out infinite;
        }
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
        .loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
    </style>
     <script>
        // JavaScript to handle loader visibility
        document.addEventListener("DOMContentLoaded", function() {
            const loader = document.getElementById('loader');
            setTimeout(function() {
                loader.style.display = 'none';
            }, 1000); // Hides the loader after 1 second
        });
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
     <!-- Loader HTML -->
  <div id="loader" class="loader-overlay">
        <div class="loader"></div>
    </div>
<div class="w-full max-w-md">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-2xl mb-4 text-center">Register</h2>

        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="register.php" method="post" id="registerForm">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="username" id="username" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" id="email"  value="@gmail.com" required>
            </div>
            <div class="mb-4 relative">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
        <button type="button" class="ml-2 text-blue-500 hover:text-blue-700" id="password-info">
            <i class="fas fa-info-circle"></i>
        </button>
    </label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline pr-10" type="password" name="password" id="password" required>
    <button type="button" onclick="togglePasswordVisibility('password')" class="absolute inset-y-0 right-0 px-3 py-2 bg-transparent text-gray-700">
        <i class="fas fa-eye" id="password-eye"></i>
    </button>
</div>

<!-- Password Info Popup -->
<div id="password-popup" class="fixed inset-0 flex items-center justify-center hidden">
    <div class="bg-white p-4 rounded-lg shadow-lg max-w-sm">
        <h3 class="text-lg font-semibold mb-2">Password Requirements</h3>
        <p class="text-sm text-gray-600 mb-4">
            Password should be exactly 8 characters long, containing alphanumeric characters (both lowercase and uppercase).
        </p>
        <div class="text-center">
            <button id="closePopup" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                Close
            </button>
        </div>
    </div>
</div>

<script>
    const popup = document.getElementById('password-popup');
    const infoButton = document.getElementById('password-info');
    const closeButton = document.getElementById('closePopup');

    infoButton.addEventListener('click', () => {
        popup.classList.remove('hidden');
    });

    closeButton.addEventListener('click', () => {
        popup.classList.add('hidden');
    });

    // Close popup when clicking outside
    popup.addEventListener('click', (e) => {
        if (e.target === popup) {
            popup.classList.add('hidden');
        }
    });

    function togglePasswordVisibility(inputId) {
        const input = document.getElementById(inputId);
        const eye = document.getElementById(inputId + '-eye');
        if (input.type === 'password') {
            input.type = 'text';
            eye.classList.remove('fa-eye');
            eye.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            eye.classList.remove('fa-eye-slash');
            eye.classList.add('fa-eye');
        }
    }
</script>
            <div class="mb-4 relative">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm_password">Confirm Password</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline pr-10" type="password" name="confirm_password" id="confirm_password" required>
                <button type="button" onclick="togglePasswordVisibility('confirm_password')" class="absolute inset-y-0 right-0 px-3 py-2 bg-transparent text-gray-700">
                    <i class="fas fa-eye" id="confirm-password-eye"></i>
                </button>
            </div>
            <div class="mb-8">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">Register</button>
            </div>
            <div class="text-center text-sm">
                <p>Already have an account? <a href="login.php" class="font-bold text-blue-500 hover:text-blue-800">Login</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Popup div for success message -->
<div id="popup" class="popup">
    <p class="text-xl font-semibold text-center text-green-600">Registration successful!</p>
</div>

<script>
    function togglePasswordVisibility(fieldId) {
        var passwordField = document.getElementById(fieldId);
        var eyeIcon = document.getElementById(fieldId + '-eye');
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

    // Client-side password validation
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        var passwordField = document.getElementById('password');
        var confirmPasswordField = document.getElementById('confirm_password');
        var password = passwordField.value;
        var confirmPassword = confirmPasswordField.value;
        var passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/;

        if (!passwordRegex.test(password)) {
            alert('Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.');
            e.preventDefault();
        }

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            e.preventDefault();
        }
    });

    // Show popup if registration is successful
    <?php if ($registration_success): ?>
        document.getElementById('popup').style.display = 'block';
        setTimeout(function() {
            window.location.href = 'login.php';
        }, 2000); // Redirect after 2 seconds
    <?php endif; ?>
</script>

</body>
</html>
