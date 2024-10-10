<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Cards</title>
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

<body>
     <!-- Loader HTML -->
  <div id="loader" class="loader-overlay">
        <div class="loader"></div>
    </div>
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
 <!-- Navigation Bar -->
 <header class="text-white-600 body-font" style="background-color: black; font-family: Oswald, sans-serif">
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

    <div class="flex justify-center items-center h-screen flex-col">
    <p class="text-xl font-semibold mb-4">Select your Exam type as per your choice</p>

    <div class="flex flex-wrap justify-center">
        <div class="mx-4">
            <div class="bg-gray-100 rounded-lg shadow-md p-6 m-5 cursor-pointer transition duration-300 ease-in-out transform hover:scale-105">
                <div class="flex justify-center items-center h-full">
                    <a href="exam/upsc.php" class="text-gray-800 no-underline">UPSC</a>
                </div>
            </div>
        </div>
        <div class="mx-4">
            <div class="bg-gray-100 rounded-lg shadow-md p-6 m-5 cursor-pointer transition duration-300 ease-in-out transform hover:scale-105">
                <div class="flex justify-center items-center h-full">
                    <a href="exam/mpsc.php" class="text-gray-800 no-underline">MPSC</a>
                </div>
            </div>
        </div>
        <div class="mx-4">
            <div class="bg-gray-100 rounded-lg shadow-md p-6 m-5 cursor-pointer transition duration-300 ease-in-out transform hover:scale-105">
                <div class="flex justify-center items-center h-full">
                    <a href="exam/neet.php" class="text-gray-800 no-underline">NEET</a>
                </div>
            </div>
        </div>
        <div class="mx-4">
            <div class="bg-gray-100 rounded-lg shadow-md p-6 m-5 cursor-pointer transition duration-300 ease-in-out transform hover:scale-105">
                <div class="flex justify-center items-center h-full">
                    <a href="exam/jee.php" class="text-gray-800 no-underline">JEE Mains & Advanced</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>