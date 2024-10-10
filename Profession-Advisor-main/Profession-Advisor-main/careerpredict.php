<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stream and Career Selection</title>
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
<body class="bg-gray-100 font-sans ">
     <!-- Loader HTML -->
  <div id="loader" class="loader-overlay">
        <div class="loader"></div>
    </div>
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
    <div class="max-w-xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-6">
        <h1 class="text-3xl text-gray-800 text-center mb-4">Career Options</h1>
        <form method="post" class="text-center mb-6">
            <div class="flex flex-col md:flex-row justify-center items-center gap-4 mb-6">
                <div>
                    <h2 class="text-xl text-gray-700 mb-2">Select a Stream:</h2>
                    <select name="stream" class="px-3 py-2 text-lg rounded border border-gray-300">
                        <option value="">Select a Stream</option>
                        <option value="diploma">Diploma</option>
                        <option value="engineering">Engineering</option>
                        <option value="pharmacy">Pharmacy</option>
                        <option value="law">Law</option>
                        <option value="doctor">Doctor</option>
                        <option value="iti">ITI</option>
                    </select>
                </div>
                <div>
                    <h2 class="text-xl text-gray-700 mb-2">Select a Branch:</h2>
                    <select name="branch" id="branchDropdown" class="px-3 py-2 text-lg rounded border border-gray-300" disabled>
                        <option value="">Select a Branch</option>
                    </select>
                </div>
            </div>
            <input type="submit" name="submit" value="Submit" class="px-6 py-2 text-lg rounded bg-green-600 text-white cursor-pointer">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $stream = $_POST['stream'];
            $branch = $_POST['branch'];

            echo "<h2 class='text-2xl text-gray-800 text-center mb-4'>Career Options:</h2>";
            switch ($stream) {
                case 'diploma':
                    $branches = array(
                        "Computer" => array("Web developer", "Programmer", "Network Analyst"),
                        "Mechanical" => array("Assistant Engineer", "Pump Industry", "CNC Training", "Mechanical Engineer"),
                        "Civil" => array("Civil Engineer", "Surveying", "Construction Engineer", "DRDO"),
                        "Electrical" => array("Electrical Technician", "Electronics Engineer", "Project Engineer", "Control System Engineer", "Electrical Design Engineer")
                    );
                    displayCareers($branches, $branch);
                    break;
                case 'engineering':
                    $branches = array(
                        "Computer" => array("Data Analyst", "Full Stack Developer", "AI Engineer", "Software Developer", "Machine Learning Engineer"),
                        "Mechanical" => array("Aerospace Engineer", "Automotive Engineer", "Mechanical Engineer", "Maintenance Engineer", "Mining Engineer"),
                        "Civil" => array("Design Engineer", "CAD Technician", "Civil Engineer", "Estimator", "Nuclear Engineer"),
                        "Electrical" => array("Power Engineer", "Robotics Engineer", "Electronics Engineer", "Electrical Engineer", "Electrical Design Engineer"),
                        "EnTC" => array("Telecom Engineer", "R&D Software Engineer", "Software Analyst", "Electronic Design Engineer", "Technical Director"),
                        "Chemical" => array("Environmental Engineer", "Energy Engineer", "Product Development Engineer", "Chemical Plant Manager")
                    );
                    displayCareers($branches, $branch);
                    break;
                case 'pharmacy':
                    $branches = array(
                        "Pharmaceutics" => array("Microbiologist", "Biomedical Engineer", "Product Development Scientist", "Senior Scientist"),
                        "Medicinal Chemistry" => array("Microbiologist", "Biomedical Engineer", "Product Development Scientist", "Senior Scientist"),
                        "Pharmacognosy" => array("Microbiologist", "Biomedical Engineer", "Product Development Scientist", "Senior Scientist"),
                        "Pharmacology" => array("Microbiologist", "Biomedical Engineer", "Product Development Scientist", "Senior Scientist")
                    );
                    displayCareers($branches, $branch);
                    break;
                case 'law':
                    $branches = array(
                        "Law" => array("Criminal Lawyer", "Family Lawyer", "Tax Lawyer")
                    );
                    displayCareers($branches, $branch);
                    break;
                case 'doctor':
                    $branches = array(
                        "MBBS" => array("Hospital Administration", "Health Informatics and Analytics", "Medical-Legal Advisors")
                    );
                    displayCareers($branches, $branch);
                    break;
                case 'iti':
                    $branches = array(
                        "Auto Electrician" => array("Electrician"),
                        "Auto CAD Technic" => array("CAD Expert", "Visualizer 3D", "Design Engineer"),
                        "Agriculture Engineering" => array("Plant Supervisor", "Agriculture Sales", "Bio Energy Solutions")
                    );
                    displayCareers($branches, $branch);
                    break;
                default:
                    echo "<p class='text-center text-red-500'>Please select a stream.</p>";
            }
        }

        function displayCareers($branches, $branch)
        {
            if (!empty($branch) && array_key_exists($branch, $branches)) {
                echo "<ul class='list-none p-0 flex flex-wrap justify-center'>";
                echo "<li class='bg-white p-5 m-2 rounded-lg shadow-lg w-64 text-center relative transform transition-transform duration-300 hover:scale-105'>";
                echo "<h3 class='text-xl mb-2'>$branch</h3>";
                echo "<ul class='list-disc list-inside'>";
                foreach ($branches[$branch] as $career) {
                    echo "<li class='text-left'>$career</li>";
                }
                echo "</ul>";
                echo "</li>";
                echo "</ul>";
            } else {
                echo "<p class='text-center text-red-500'>Please select a branch.</p>";
            }
        }
        ?>

        <script>
            const streamDropdown = document.querySelector('select[name="stream"]');
            const branchDropdown = document.getElementById('branchDropdown');

            streamDropdown.addEventListener('change', function() {
                branchDropdown.innerHTML = '<option value="">Select a Branch</option>';
                branchDropdown.disabled = false;

                const stream = this.value;
                let branches;

                switch (stream) {
                    case 'diploma':
                        branches = ['Computer', 'Mechanical', 'Civil', 'Electrical'];
                        break;
                    case 'engineering':
                        branches = ['Computer', 'Mechanical', 'Civil', 'Electrical', 'EnTC', 'Chemical'];
                        break;
                    case 'pharmacy':
                        branches = ['Pharmaceutics', 'Medicinal Chemistry', 'Pharmacognosy', 'Pharmacology'];
                        break;
                    case 'law':
                        branches = ['Law'];
                        break;
                    case 'doctor':
                        branches = ['MBBS'];
                        break;
                    case 'iti':
                        branches = ['Auto Electrician', 'Auto CAD Technic', 'Agriculture Engineering'];
                        break;
                    default:
                        branches = [];
                }

                branches.forEach(function(branch) {
                    const option = document.createElement('option');
                    option.value = branch;
                    option.text = branch;
                    branchDropdown.add(option);
                });
            });
        </script>
    </div>

</body>
</html>
