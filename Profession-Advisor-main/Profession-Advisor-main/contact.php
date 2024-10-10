<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">

    <style>
        /* For demonstration purposes, you can remove this style tag and link your external CSS file */
        .map {
            width: 100%;
            height: 300px;
        }
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
    <header class="text-white-600 body-font" style="background-color: black; font-family: Oswald, sans-serif">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-white-900 mb-4 md:mb-0">
                <img src="./img/logo.png" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" style="width: 208px; height: auto; max-height: 80px;">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center" style="color: white; font-size:large">
  <a class="mr-6 hover:text-blue-900" href="index.php">Home</a>
  <a class="mr-6 hover:text-blue-900" href="index.php#about">About</a>
  <a class="mr-6 hover:text-blue-900" href="contact.php">Contact</a>
  <a class="mr-6 hover:text-blue-900" href="index.php#services">Services</a>
</nav>
        </div>
    </header>
    <div class="container mx-auto py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="text-2xl font-bold mb-4">Location</h2>
                <!-- Google Maps iframe -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d60001.67761277958!2d73.5947295!3d19.9620923!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdded43e382f8c7%3A0x5cb37e903f1154f3!2sSandip%20foundation!5e0!3m2!1sen!2sin!4v1718280122790!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="map"></iframe>

            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Get In Touch</h2>
                <form action="submit_contact.php" method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="block font-bold">Your Name*</label>
                        <input type="text" id="name" name="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>
                    <div>
                        <label for="email" class="block font-bold">Email Address*</label>
                        <input type="email" id="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>
                    <div>
                        <label for="phone" class="block font-bold">Phone*</label>
                        <input type="tel" id="phone" name="phone" pattern="\+91 [0-9]{5} [0-9]{5}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="+91 " required>

<script>
    document.getElementById('phone').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,5})/);
        e.target.value = '+' + (x[1] || '91') + ' ' + (x[2] || '') + (x[3] ? ' ' + x[3] : '');
    });
</script>
                    </div>
                    <div>
                        <label for="subject" class="block font-bold">Subject</label>
                        <input type="text" id="subject" name="subject" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>
                    <div>
                        <label for="message" class="block font-bold">Comments</label>
                        <textarea id="message" name="message" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                    </div>
                    <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>