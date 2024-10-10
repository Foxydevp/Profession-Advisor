<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .footer a {
            color: white;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .footer .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }
        .footer .social-media {
            margin: 20px 0;
        }
        .footer .social-media a {
            margin: 0 10px;
            display: inline-block;
        }
        .footer .social-media a i {
            font-size: 24px;
        }
        .footer .reserved {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <footer class="footer">
        <div class="grid-container">
            <div class="quick-links">
                <a href="#home">Home</a><br>
                <a href="#about">About</a><br>
                <a href="#services">Services</a><br>
                <a href="#contact">Contact</a><br>
            </div>
            <div class="policies">
                <a href="#privacy-policy">Privacy Policy</a><br>
                <a href="#terms-conditions">Terms & Conditions</a><br>
            </div>
        </div>
        <div class="social-media">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="reserved">
            &copy; 2024 Professional Advisor. All rights reserved.
        </div>
    </footer>
</body>
</html>
