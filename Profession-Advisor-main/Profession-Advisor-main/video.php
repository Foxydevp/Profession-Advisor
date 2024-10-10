<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Guidance</title>
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
            to { transform: rotate(360deg); }
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
        /* Responsive iframe container */
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loader = document.getElementById('loader');
            setTimeout(function() {
                loader.style.display = 'none';
            }, 1000);
        });
    </script>
</head>

<body class="bg-gray-100">
    <!-- Loader HTML -->
    <div id="loader" class="loader-overlay">
        <div class="loader"></div>
    </div>

    <!-- Navigation Bar -->
    <header class="bg-black text-white font-sans">
        <div class="container mx-auto px-4 py-5 flex flex-wrap items-center justify-between">
            <a class="flex items-center text-white-900 mb-4 md:mb-0">
                <img src="./img/logo.png" alt="Logo" class="w-auto h-12 max-h-20">
            </a>
            <nav class="flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-blue-300" href="index.php">Home</a>
                <a class="mr-5 hover:text-blue-300" href="index.php/#about">About</a>
                <a class="mr-5 hover:text-blue-300" href="contact.php">Contact</a>
                <a class="mr-5 hover:text-blue-300" href="index.php/#services">Services</a>
                <a class="hover:text-blue-300" href="roadmap.php">Roadmap</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Guidance Videos</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Diploma Guidance -->
            <div class="mb-8">
                <div class="video-container rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://www.youtube.com/embed/urlKvu9Yfjo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <h2 class="text-xl font-semibold text-gray-900 mt-4 mb-2">Diploma Guidance</h2>
                <p class="text-gray-600">How to do Diploma after 10th and which one to do!</p>
            </div>

            <!-- ITI Guidance -->
            <div class="mb-8">
                <div class="video-container rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://www.youtube.com/embed/FIAQeHyeKEU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <h2 class="text-xl font-semibold text-gray-900 mt-4 mb-2">ITI Guidance</h2>
                <p class="text-gray-600">How to do ITI after 10th and which one to do!</p>
            </div>

            <!-- Science Stream Guidance -->
            <div class="mb-8">
                <div class="video-container rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://www.youtube.com/embed/o0yiax0_1eg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <h2 class="text-xl font-semibold text-gray-900 mt-4 mb-2">Science Stream Guidance</h2>
                <p class="text-gray-600">How Science stream is after 10th</p>
            </div>

            <!-- Commerce Stream Guidance -->
            <div class="mb-8">
                <div class="video-container rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://www.youtube.com/embed/Gp4ke7ztFtU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <h2 class="text-xl font-semibold text-gray-900 mt-4 mb-2">Commerce Stream Guidance</h2>
                <p class="text-gray-600">How Commerce stream is after 10th</p>
            </div>

            <!-- Arts Stream Guidance -->
            <div class="mb-8">
                <div class="video-container rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://www.youtube.com/embed/9qrevCIvXFg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <h2 class="text-xl font-semibold text-gray-900 mt-4 mb-2">Arts Stream Guidance</h2>
                <p class="text-gray-600">How Arts stream is after 10th</p>
            </div>

            <!-- Engineering Field Selection Guidance -->
            <div class="mb-8">
                <div class="video-container rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://www.youtube.com/embed/WgG9Y3-LMQs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <h2 class="text-xl font-semibold text-gray-900 mt-4 mb-2">Engineering Field Selection Guidance</h2>
                <p class="text-gray-600">How to select the correct Engineering field after 12th or diploma.</p>
            </div>

            <!-- IIT Guidance -->
            <div class="mb-8">
                <div class="video-container rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://www.youtube.com/embed/IV-4YCVlVW0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <h2 class="text-xl font-semibold text-gray-900 mt-4 mb-2">IIT Guidance</h2>
                <p class="text-gray-600">How to get into IIT through JEE Mains & Advanced</p>
            </div>

            <!-- MPSC & UPSC Guidance -->
            <div class="mb-8">
                <div class="video-container rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://www.youtube.com/embed/11n4Uzr3I3U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <h2 class="text-xl font-semibold text-gray-900 mt-4 mb-2">MPSC & UPSC Guidance</h2>
                <p class="text-gray-600">How to crack India's Top Exams</p>
            </div>
        </div>
    </main>
</body>

</html>