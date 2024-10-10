<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Roadmap Image</title>
    <style>
        body {
            font-family:  "Oswald", sans-serif;
            margin: 50px;
        }
        .upload-form {
            width: 300px;
            margin: 0 auto;
        }
        .upload-form h2 {
            text-align: center;
        }
        .upload-form input[type="file"] {
            margin-bottom: 10px;
        }
        .upload-form input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .upload-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="upload-form">
        <h2>Upload Roadmap Image</h2>
        <form action="./upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="roadmap" accept="image/*" required>
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
</body>
</html>
