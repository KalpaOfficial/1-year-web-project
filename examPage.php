<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EDU Online Examination System</title>
    <link rel="stylesheet" href="exampage.css">

</head>

<body>
    <div class="container">
    <div class="container">
        <header>
            <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="examPage">Exam</a></li>
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

        <section class="exam-section">
            <section class="bold-text">
                <h2>Exam</h2>
            </section>
            <div class="exam-cards">
                <?php

                $query = "SELECT * FROM `course` ORDER BY `course`.`id` ASC";
                $result = mysqli_query($con, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="card" onclick="window.location.href='ModuleListPage.php?id=<?php echo $row['id']; ?>';">
                            <a><?php echo $row['course_name'] ?></a>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
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
                            <li><a href="examPage.php">Exam</a></li>
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

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                console.log("Page loaded successfully!");

            });
        </script>

<style>
    
      /* General Styles */
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
                            1000px
                            200px
                            15px;

                            grid-template-areas: 
                                            "nav"
                                            "exam-section"
                                            "footer-content"
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
                    text-align: center;
                    padding: 100px;
                    background-color: hwb(228 87% 9%);
                    grid-area: exam-section;
                }

                .exam-section h2 {
                    margin-bottom: 80px;
                }

                .bold-text {
                    font-weight: bold;
                    color: hsl(0, 0%, 7%);
                }

                .exam-cards {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                    gap: 20px;
                    
                }

                .card {
                    background-color: hwb(125 76% 15%);
                    padding: 2mm;
                    border-radius: 10px;
                    transition: transform 0.3s, box-shadow 0.3s;
                    padding: 40px;
                }

                .card:hover {
                    transform: translateY(-20px);
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.459);
                }

                

                .card a {
                    display: block;
                    font-size: 16px;
                    text-decoration: none;
                    color: #333;
                    margin-top: 10px;
                }

                /* Footer */
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
                            grid-area: exam-content;
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
</body>

</html>