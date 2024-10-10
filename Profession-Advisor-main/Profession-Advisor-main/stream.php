<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stream Selection Form</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
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

<body >
     <!-- Loader HTML -->
  <div id="loader" class="loader-overlay">
        <div class="loader"></div>
    </div>
    <!-- Navigation Bar -->
    <header  style="background-color: black; font-family: Oswald, sans-serif">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-white-900 mb-4 md:mb-0">
                <img src="./img/logo.png" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" style="width: 208px; height: auto; max-height: 80px;">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center" style="color: white; font-size:large">
                <a class="mr-6 hover:text-blue-900" href="index.php">Home</a>
                <a class="mr-6 hover:text-blue-900" href="index.php/#about">About</a>
                <a class="mr-6 hover:text-blue-900" href="contact.php">Contact</a>
                <a class="mr-6 hover:text-blue-900" href="index.php/#services">Services</a>
                <a class="mr-6 hover:text-blue-900" href="roadmap.php">Roadmap</a>

            </nav>
        </div>
    </header>
    <script>
        (function(w, d, s, o, f, js, fjs) {
            w["botsonic_widget"] = o;
            w[o] =
                w[o] ||
                function() {
                    (w[o].q = w[o].q || []).push(arguments);
                };
            (js = d.createElement(s)), (fjs = d.getElementsByTagName(s)[0]);
            js.id = o;
            js.src = f;
            js.async = 1;
            fjs.parentNode.insertBefore(js, fjs);
        })(window, document, "script", "Botsonic", "https://widget.writesonic.com/CDN/botsonic.min.js");
        Botsonic("init", {
            serviceBaseUrl: "https://api-azure.botsonic.ai",
            token: "7df3ea59-bd1d-406d-a085-4bf5ad3b32ae",
        });
    </script>
    
    <h2 class="text-2xl text-gray-800 text-center ">Stream Selection</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
        <label for="stream" class="block mb-4 font-bold">Which stream do you want to choose?</label>
        <select name="stream" id="stream" class="w-full p-2 border border-gray-300 rounded mb-4">
            <option value="">-- Select a stream --</option>
            <option value="diploma">Diploma</option>
            <option value="science">Science</option>
            <option value="art">Art</option>
            <option value="commerce">Commerce</option>
            <option value="iti">ITI</option>
        </select>
        <input type="submit" name="submit" value="Submit" class="bg-green-500 text-white p-2 rounded cursor-pointer hover:bg-green-600">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedStream = $_POST["stream"];
        if ($selectedStream == "") {
            echo "<p class='text-center text-red-500 '>Please select a stream.</p>";
        } else {
            $streamFile = $selectedStream . ".php";
            if (file_exists($streamFile)) {
                $streamContent = file_get_contents($streamFile);
                echo "<div class='  shadow-md rounded-lg'>$streamContent</div>";
            } else {
                echo "<p class='text-center text-red-500 mt-4'>The file for the selected stream does not exist.</p>";
            }
        }
    }
    ?>
</body>

</html>