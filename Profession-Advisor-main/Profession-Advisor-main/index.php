<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);

// Assuming you're storing the username in the session after successful login
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <title>Profession Advisor</title>

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        .icon {
            width: 48px;
            height: 48px;
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

         /* Custom styles for the back to top button */
         .back-to-top {
            position: fixed;
            bottom: 3cm; /* Adjust as needed */
            right: 3cm; /* Adjust as needed */
            background-color: #4CAF50; /* Green color */
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none; /* Initially hidden */
        }

        .back-to-top:hover {
            background-color: #45a049; /* Darker green color on hover */
        }
    </style>
    <script>
        function checkLoginAndRedirect(event) {
            <?php if (!isset($_SESSION['user_id'])) : ?>
                event.preventDefault(); // Prevent the default link behavior
                var confirmLogin = confirm("Please login first to access this service. Click OK to proceed to login page.");
                if (confirmLogin) {
                    window.location.href = 'login.php'; // Redirect to login page
                }
            <?php endif; ?>
        }

      
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

    <!--Navbar--->
    <header class="text-white-600 body-font" style="background-color: black; font-family: Oswald, sans-serif">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-white-900 mb-4 md:mb-0">
                <img src="./img/logo.png" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" style="width: 208px; height: auto; max-height: 80px;">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center" style="color: white; font-size:large">
                <a class="mr-6 hover:text-blue-900" href="#">Home</a>
                <a class="mr-6 hover:text-blue-900" href="#about">About</a>
                <a class="mr-6 hover:text-blue-900" href="contact.php">Contact</a>
                <a class="mr-6 hover:text-blue-900" href="#services">Services</a>
                <?php if ($is_logged_in): ?>
                    <div class="mr-6 hover:text-blue-900 flex items-center">
                        <i class="fas fa-user-circle mr-2"></i>
                        <span>Welcome, <?php echo $username; ?></span>
                    </div>
                    <div x-data="{ isOpen: false }" class="relative">
                        <button @click="isOpen = !isOpen" class="flex items-center focus:outline-none">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div x-show="isOpen" @click.away="isOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                            <a href="feedback.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Feedback
                            </a>
                            <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <button style="color: black;" class="ml-2 inline-flex bg-gray-100 border-0 py-1 px-4 focus:outline-none hover:bg-gray-100 rounded text-lg">
                        <a href="login.php">Login</a>
                    </button>
                <?php endif; ?>
            </nav>
        </div>
    </header>


    <!----Main Page--->
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img class="object-cover object-center rounded" alt="hero" src="./img/all.gif">
            </div>
            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Profession Advisor
                    <br class="hidden lg:inline-block">Get Guide here!
                </h1>
                <p class="mb-8 leading-relaxed">"An explore different career options like further studies, vocational training, or apprenticeships to find what suits you best for a successful career ahead."</p>
                <div class="flex justify-center">
                    <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"><a href="#about">Get More</a></button>
                    <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg"><a href="#services">Explore</a></button>
                </div>
            </div>
        </div>
    </section>

    <!----About US--->
    <center style="background-color: black; color:white;">
        <div id="about" class="sm:flex items-center max-w-screen-xl">
            <div class="sm:w-1/2 p-10">
                <div class="image object-center text-center">
                    <img src="https://i.imgur.com/WbQnbas.png">
                </div>
            </div>
            <div class="sm:w-1/2 p-5">
                <div class="text">
                    <span class="text-white-500 border-b-2 border-indigo-600 uppercase">About us</span>
                    <h2 class="my-4 font-bold text-3xl  sm:text-4xl ">About <span class="text-indigo-600">Our Website</span>
                    </h2>
                    <p class="text-white-700" style="text-align: justify;">
                        At Profession Advisor, we are dedicated to empowering individuals to make informed career choices. Our mission is to provide comprehensive career guidance through advanced prediction tools and personalized roadmaps. We analyze your unique skills, interests, and market trends to suggest optimal career paths tailored to your profile. Our step-by-step roadmaps offer clear direction on educational and professional milestones, ensuring you are well-prepared for your chosen career. Additionally, we provide insights into various streams and industries, helping you navigate through the complexities of career planning. Whether you're a student exploring your options or a professional seeking a career change, Profession Advisor is here to support you every step of the way.
                    </p>
                </div>
            </div>
        </div>
    </center>


    <!---Services--->

    <section id="services" class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Services</h1>
                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full leading-relaxed text-black-500">
                    Professional Advisor helps you find the best career paths based on your skills and interests. We also provide step-by-step roadmaps to guide you through the education and training needed to reach your career goals.
                </p>
            </div>
            <div class="flex flex-wrap -m-6">
                <!-- RoadMap Service -->
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="rounded w-full object-cover object-center mb-6" src="./img/roadmap.png" alt="Roadmap">
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                            <a href="roadmap.php" onclick="checkLoginAndRedirect(event);">RoadMap</a>
                        </h2>
                        <p class="leading-relaxed text-base">
                            A visual representation of the career flowchart that guides the student.
                        </p>
                    </div>
                </div>

                <!-- Stream Information Service -->
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="rounded w-full object-cover object-center mb-6" src="./img/stream.png" alt="Stream Information">
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                            <a href="stream.php" onclick="checkLoginAndRedirect(event);">Stream Information</a>
                        </h2>
                        <p class="leading-relaxed text-base">
                            Access information in an easy and point-wise format.
                        </p>
                    </div>
                </div>

                <!-- Career Prediction Service -->
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="rounded w-full object-cover object-center mb-6" src="./img/careerpredict.png" alt="Career Prediction">
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                            <a href="careerpredict.php" onclick="checkLoginAndRedirect(event);">Career Prediction</a>
                        </h2>
                        <p class="leading-relaxed text-base">
                            Predict the trending branches of jobs based on current trends.
                        </p>
                    </div>
                </div>

                <!-- Video Guidance Service -->
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="rounded w-full object-cover object-center mb-6" src="./img/video.png" alt="Video Guidance">
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                            <a href="video.php" onclick="checkLoginAndRedirect(event);">Video Guidance</a>
                        </h2>
                        <p class="leading-relaxed text-base">
                            AI-created videos that guide students about careers and jobs.
                        </p>
                    </div>
                </div>

                <!-- Competitive Exam Service -->
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="rounded w-full object-cover object-center mb-6" src="./img/competitiveexam.png" alt="Competitive Exam">
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                            <a href="competitiveexam.php" onclick="checkLoginAndRedirect(event);">Competitive Exam</a>
                        </h2>
                        <p class="leading-relaxed text-base">
                            Basic guidance on competitive exams.
                        </p>
                    </div>
                </div>

                <!-- More Services (Coming Soon) -->
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="rounded w-full object-cover object-center mb-6" src="./img/more.png" alt="More">
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                            <a href="#" onclick="checkLoginAndRedirect(event);">More</a>
                        </h2>
                        <p class="leading-relaxed text-base">
                            More services coming soon...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!----WHat we do---->
    <section class="bg-gray-50 flex justify-center py-16" style="background-color: black; ">
        <div class="max-w-7xl w-full px-4">
            <h1 class="text-4xl font-bold text-center mb-12" style="color: white;">What We Do</h1>
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Guide Student Section -->
                <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2838/2838779.png" alt="Guide Student Icon" class="icon mx-auto mb-4">
                    <h2 class="text-xl font-semibold mb-4">Guide Student</h2>
                    <p class="text-gray-600">After completing 10th grade, students face an important crossroads in their educational journey. It is crucial to carefully evaluate their interests, strengths, and future goals to choose the right stream for higher secondary education.</p>
                </div>
                <!-- Improve Interest Section -->
                <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2847/2847650.png" alt="Improve Interest Icon" class="icon mx-auto mb-4">
                    <h2 class="text-xl font-semibold mb-4">Improve Interest</h2>
                    <p class="text-gray-600">This is a pivotal moment to explore subjects that truly captivate their curiosity and align with their passions. By engaging with knowledgeable counselors, attending career fairs, and seeking inspiration from role models, students can develop a keen understanding of the vast array of disciplines awaiting them.</p>
                </div>
                <!-- Best Choice Section -->
                <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2917/2917990.png" alt="Best Choice Icon" class="icon mx-auto mb-4">
                    <h2 class="text-xl font-semibold mb-4">Best Choice</h2>
                    <p class="text-gray-600">Each listing provides detailed information about the property, including its size, features, and amenities. We also provide high-quality photos and virtual tours to help you get a better sense of the property's layout and design.</p>
                </div>
                <!-- Management Section -->
                <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2838/2838765.png" alt="Management Icon" class="icon mx-auto mb-4">
                    <h2 class="text-xl font-semibold mb-4">Management</h2>
                    <p class="text-gray-600">When you invest with us, you can trust that your investment is in good hands. We are committed to transparency and communication, and we provide regular updates and reports on the performance of your investment.</p>
                </div>
            </div>
        </div>
    </section>

    <!---Testimonials--->
    <section class="text-white-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="text-3xl font-medium title-font text-white-900 mb-12 text-center">Testimonials</h1>
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/2 w-full">
                    <div class="h-full bg-gray-100 p-8 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg>
                        <p class="leading-relaxed mb-6">"Excellent customer support with quick response times. They provided innovative solutions that significantly boosted our business efficiency."</p>
                        <a class="inline-flex items-center">
                            <img alt="testimonial" src="./img/a1.png" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">Ram</span>
                                <span class="text-gray-500 text-sm">Student</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 w-full">
                    <div class="h-full bg-gray-100 p-8 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                        </svg>
                        <p class="leading-relaxed mb-6">"Professional and prompt service. Their team went above and beyond to meet our project needs, delivering exceptional results."</p>
                        <a class="inline-flex items-center">
                            <img alt="testimonial" src="./img/a2.png" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                            <span class="flex-grow flex flex-col pl-4">
                                <span class="title-font font-medium text-gray-900">Jay</span>
                                <span class="text-gray-500 text-sm">Student</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!---Footer---->
    <footer style="background-color: black; ">
        <div class="flex flex-col space-y-10 justify-center m-1"><br>
            <nav class="flex justify-center flex-wrap gap-6 text-gray-500 font-medium">
                <a class="hover:text-gray-900" href="privacypolicy.html">Privacy Policy</a>
                <a class="hover:text-gray-900" href="privacypolicy.html">Terms & Conditions</a>
                <a class="hover:text-gray-900" href="#services">Services</a>
                <a class="hover:text-gray-900" href="#about">About</a>
                <a class="hover:text-gray-900" href="contact.php">Contact</a>
            </nav>

            <div class="flex justify-center space-x-5">
                <a  target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/people/Profession-Advisor/61561346577275/">
                    <img src="https://img.icons8.com/fluent/30/000000/facebook-new.png" />
                </a>
                
            </div>
            <p class="text-center text-white-700 font-medium" style="color: white;">&copy; 2024 Company Ltd. All rights reserved.</p>
        </div>
    </footer>
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

<!-- Back to top button -->
<button onclick="scrollToTop()" title="Go to top" class="back-to-top" id="backToTopBtn">
        <i class="fa fa-arrow-up"></i> <!-- Font Awesome icon for arrow up -->
    </button>

    <!-- Scripts at the end of body -->
    <script>
        // Function to scroll to the top
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Show or hide the back to top button based on scroll position
        window.onscroll = function () {
            const btn = document.getElementById('backToTopBtn');
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                btn.style.display = 'block';
            } else {
                btn.style.display = 'none';
            }
        };
    </script>
</body>

</html>