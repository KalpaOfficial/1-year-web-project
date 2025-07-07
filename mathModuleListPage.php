<?php
// Start session to get user data
session_start();

// Check if the user is logged in by verifying if the username is stored in the session
if (!isset($_SESSION['username'])) {
    // Redirect to login page if the user is not logged in
    header('Location: login.php');
    exit();
}

// Fetch the username from the session
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EDU Online Examination System</title>
    <link rel="stylesheet" href="bio module list page.css">
<style>
    
                        * {
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                        }

                        body {
                            font-family: Arial, sans-serif;
                        }

                        .container{
                            display: grid;
                            height: 100%;
                            grid-template-columns: 100%;
                            grid-template-rows: 
                            77px
                            900px
                            200px
                            15px;

                            grid-template-areas: 
                                            "nav"
                                            "exam-section"
                                            "footer"
                                            "footer-bottom"

                        }

                        /* header{
                            grid-area: header;
                            background-color: aquamarine;
                            
                        } */
                        nav{
                            grid-area: nav;
                            background-color: #303c44;
                            width: 100%;
                            padding: 10px 50px;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            position: relative;
                        }

                        .nav ul {
                            width: 100%;   
                            list-style: none;
                        }

                        nav ul li {
                            display: inline-block;
                            margin: 20px 30px;  
                        }

                        .navbar ul li a {
                            text-decoration: none;
                            color:white;
                        }




                        /* .icon {
                            
                            width: 30px;
                            height: 30px;
                        } */
                        /* .sub-menu-wrap{
                            position: absolute;
                            top:100%;
                            right:10%;
                            width:320px;

                        }
                        .sub-menu{
                            background-color: #fff;
                            padding:20px;
                            margin:10px; 

                        }
                        .user-info{
                            display: flex;
                            align-items: center;
                        }
                        .user-info h3{
                            font-weight: 500;
                        } */



                        .user-menu {
                            position: relative;
                            display: inline-block;
                        }



                        .icon {
                            cursor: pointer;
                            width: 40px;
                            height: 40px;
                            border-radius: 50%;
                            transition: transform 0.3s ease;
                        }

                        /* Hidden dropdown initially */
                        .sub-menu-wrap {
                            display: none;
                            position: absolute;
                            top: 100%;
                            right: 0;
                            background-color: #fff;
                            width: 300px;
                            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                            z-index: 1;
                        }

                        .sub-menu {
                            padding: 15px;
                        }




                        .user-info h4 {
                            margin-bottom: 30px;
                            color: #333;
                            font-size: 18px;
                        }





                        .logout a {
                            display: block;
                            text-decoration: none;
                            color: #ff3333;
                            font-weight: bold;
                            padding: 10px;
                            text-align: center;
                            border-radius: 5px;
                            transition: background-color 0.3s ease;
                        }






                        .logout a:hover {
                            background-color: #ffdddd;
                        }






                        /* Show the dropdown on hover */
                        .user-menu:hover .sub-menu-wrap {
                            display: block;
                        }

                    
                        /* Exam Section */
                        .exam-section {
                            grid-area: exam-section;
                            text-align: center;
                            padding: 40px;
                            background-color: #fff;
                        }

                        .exam-section h2 {
                            margin-bottom: 30px;
                        }

                        .subject-dropdown {
                            margin-bottom: 20px;
                            font-size: 20px;
                        }




                        .course-list {
                            list-style-type: none;
                            padding: 0;
                        }

                        .course-list li {
                            font-size: 18px;
                            margin-bottom: 5px;
                        }


                        .course-list a {
                            color: #007bff; /* Blue color for links */
                            text-decoration: none; /* Remove underline */
                        }

                        .course-list a:hover {
                            text-decoration: underline; /* Underline on hover */
                            color: #0056b3; /* Darker blue on hover */
                        }

                        /* Back Button */
                        #backButton {
                            padding: 10px 20px;
                            background-color: #333;
                            color: white;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            font-size: 16px;
                            transition: background 0.3s;
                        }

                        #backButton:hover {
                            background-color: #555;
                        }

                        footer {
                            background-color: #333;
                            color: #fff;
                            padding: 40px 0;
                            text-align: center;
                        }

                        .footer-content {
                            display: grid;
                            grid-template-columns: 1fr 2fr 1fr;
                            gap: 30px;
                            align-items: center;
                            max-width: 1200px;
                            margin: 0 auto;
                        }

                        .footer-logo img {
                            width: 80px; /* Placeholder size for the logo */
                            margin-bottom: 20px;
                        }

                        .footer-contact h3,
                        .footer-quick-links h3 {
                            font-size: 20px;
                            margin-bottom: 10px;
                            color: #fff;
                        }

                        .footer-contact p,
                        .footer-quick-links ul {
                            font-size: 14px;
                            line-height: 1.6;
                        }

                        .footer-contact p {
                            margin-bottom: 5px;
                        }

                        .footer-quick-links ul {
                            list-style: none;
                            padding: 0;
                        }

                        .footer-quick-links ul li {
                            margin-bottom: 10px;
                        }

                        .footer-quick-links ul li a {
                            text-decoration: none;
                            color: #fff;
                            font-weight: bold;
                        }

                        .footer-quick-links ul li a:hover {
                            text-decoration: underline;
                        }

                        .footer-bottom {
                            grid-area: "footer-bottom";
                            
                            font-size: 14px;
                            background-color: #222;
                            padding: 10px 0;
                            width: 100%;
                        }

                        .footer-bottom p {
                            margin: 0;
                        }

</style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="container">
        <header>
            <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Exam</a></li>
                        <li><a href="#">Result</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                    
                    <img src="./photo/images.png" alt="User Icon" class="icon">
                    <div class="sub-menu-wrap">
                        <div class="sub-menu">
                            <div class="user-info">
                                <!-- Display the logged-in username dynamically -->
                                <h4><?php echo htmlspecialchars($username); ?></h4>
                            </div>
                            <div class="logout">
                                <a href="home.php">Logout</a>
                                <script>
                                    const avatar = document.querySelector('.icon');
                                    const dropdown = document.querySelector('.sub-menu-wrap');
                                
                                    avatar.addEventListener('click', () => {
                                        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                                    });
                                
                                    // Optional: Close dropdown when clicking outside
                                    window.addEventListener('click', (e) => {
                                        if (!avatar.contains(e.target) && !dropdown.contains(e.target)) {
                                            dropdown.style.display = 'none';
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                
                </nav>
            </div>
    </header>

  

<!-- Exam Section -->
<section class="exam-section">
    <h2>Exam</h2>
    <div class="subject-dropdown">
        <details>
            <summary>Mathematics</summary>
            <ul class="course-list">
                <li><a href="eng101.html">MAT101: Calculus</a></li>
                <li><a href="eng102.html">MAT102: Linear Algebra</a></li>
                <li><a href="eng103.html">MAT103: Probability and Statistics</a></li>
                <li><a href="eng104.html">MAT104: Differential Equations</a></li>
                <li><a href="eng105.html">MAT105: Discrete Mathematics</a></li>
            </ul>
        </details>
    </div>

    <!-- Back Button -->
    <button id="backButton">Back</button>
</section>


<footer>
                <div class="footer-content">
                    <!-- Logo Section -->
                    <div class="footer-logo">
                        <img src="./photo/EDU Exam.png" alt="Edu Online Logo">
                    </div>
            
                    <!-- Contact Information Section -->
                    <div class="footer-contact">
                        <h3>Contact</h3>
                        <p>Address: 1234 Street, Colombo, Sri Lanka</p>
                        <p>Email: info@eduonline.com</p>
                        <p>Hotline: +94 112 345 678</p>
                        <p>Telephone: +94 112 345 679</p>
                    </div>
            
                    <!-- Quick Links Section -->
                    <div class="footer-quick-links">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="#">Exam</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                </div>
            
                <!-- Bottom Footer Section -->
                <div class="footer-bottom">
                    <p>Designed By Kalpa | &copy; 2024 - Edu Online Examination, Sri Lanka. All Rights Reserved</p>
                </div>
            </footer>

    <script src="C:\xampp\htdocs\Webpage Online examination system\src\js\bio module list page.js"></script>
</body>
</html>