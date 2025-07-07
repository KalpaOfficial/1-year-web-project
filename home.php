<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="home.css">
  <script src="index.js"></script>
  <title>Exam Information Center</title>
  <script>
        // Check if a success message is present in the URL
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('status') === 'success') {
                alert('Registration successful!');
            }
        }
    </script>
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
                670px
                400px
                900px
                400px
                600px
                200px
                15px;

                grid-template-areas: 
                                "nav"
                                "photo"
                                "welcome"
                                "announcement"
                                "sections"
                                "recent-activity"
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

            /* Style for Sign Up and Login buttons */
            .auth-buttons {
                display: flex;
                gap: 15px; /* Space between the buttons */
            }

            .sign-up-btn, .login-btn {
                padding: 10px 20px;
                text-decoration: none;
                color: white;
                border-radius: 5px;
                font-family: 'Lexend', sans-serif;
                font-weight: 600;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }

            /* Specific styles for each button */
            .sign-up-btn {
                background-color: #4CAF50; /* Green color for Sign Up */
            }

            .login-btn {
                background-color: #0056b3; /* Blue color for Login */
            }

            /* Hover effects for buttons */
            .sign-up-btn:hover, .login-btn:hover {
                transform: translateY(-3px);
                filter: brightness(1.1); /* Slightly increase brightness on hover */
            }

            /* Active state for button click feedback */
            .sign-up-btn:active, .login-btn:active {
                transform: translateY(1px);
                filter: brightness(0.9); /* Dim the brightness when clicked */
            }

            .photo {
                position: relative;
                width: 100%;
                height: 700px; /* Adjust based on your design */
                background-color: #333;
            }

            .photo img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .overlay {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                background: rgba(0, 0, 0, 0.8); /* semi-transparent background */
                padding: 20px 20px;
                margin: 10px 20px;
                border-radius: 10px;
                font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                -webkit-text-stroke: 0.1px white;
                text-align:center;
                font-weight: 40px;            
            }


            .welcome {
                background-color: #c1c8cf;
                padding: 50px 30px; /* Padding to give it breathing room */
                
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
                //margin: 20px 0; /* Margin to separate it from other sections */
                font-family: 'Lexend', sans-serif; /* Matching the font you've imported */
                text-align: center; /* Center text alignment */
            } 

            .welcome h2 {
                color: #303c44; /* Dark color for the title */
                font-size: 28px; /* Font size for the heading */
                margin-bottom: 20px; /* Space below the heading */
                font-weight: 700; /* Bold heading */
            }


            .welcome p {
                color: #555; /* Slightly dark grey for readability */
                font-size: 16px; /* Comfortable reading size */
                line-height: 1.6; /* Better spacing between lines for readability */
                margin-bottom: 15px; /* Spacing between paragraphs */
            }



            .welcome strong {
                color: #303c44; /* Highlight the team name */
                font-size: 16px;
                font-weight: 700;
            }






            .announcement-section {
                padding: 20px;
                background-color: #f2f6f9;
                border-radius: 5px;
                //margin-top: 20px;
            }

            .announcement-section h2 {
                font-size: 26px;
                color: #303c44;
                margin-bottom: 20px;
                text-align: center;
                font-family: 'Lexend', sans-serif;
            }

            .announcement-card {
                background-color: rgb(232, 231, 237);
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                transition: transform 0.3s ease;
            }

            .announcement-card h3 {
                color: #303c44;
                font-size: 22px;
                margin-bottom: 10px;
            }

            .announcement-card .date {
                color: #888;
                font-size: 14px;
                margin-bottom: 10px;
            }

            .announcement-card p {
                color: #555;
                line-height: 1.6;
                margin-bottom: 10px;
            }

            .announcement-card a {
                color: #0056b3;
                text-decoration: none;
                font-weight: bold;
            }

            .announcement-card a:hover {
                text-decoration: underline;
            }

            /* Hover effect */
            .announcement-card:hover {
                transform: translateY(-5px);
            }



            .sections{
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 45px;
                background-color:#f2f6f9;
            }
            .exam{
                text-align: center;
                align-content: center;
                width: 250px;
                height: 300px;
                background-color: #b5bec9; 
                box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                transition: transform 0.3s ease; 
                
            }


            .result{
                text-align: center;
                align-content: center;
                width: 250px;
                height: 300px;
                background-color: #b5bec9;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                transition: transform 0.3s ease;

            }
            .Support{
                text-align: center;
                align-content: center;
                width: 250px;
                height: 300px;
                background-color: #b5bec9;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                transition: transform 0.3s ease;

            }
            .aboutus{
                text-align: center;
                align-content: center;
                width: 250px;
                height: 300px;
                background-color: #b5bec9;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                transition: transform 0.3s ease;

            }

            .exam a{
                text-decoration: none;
                color: #303c44;
                font-family: 'Lexend', sans-serif;
            
            }
            .result a{
                text-decoration: none;
                color: #303c44;
                font-family: 'Lexend', sans-serif;
            }
            .Support a{
                text-decoration: none;
                color: #303c44;
                font-family: 'Lexend', sans-serif;
            }
            .aboutus a{
                text-decoration: none;
                color: #303c44;
                font-family: 'Lexend', sans-serif;
            }

            .exam:hover{
                text-decoration: none;
                transition: transform 0.3s ease;
                transform: translateY(-5px);

            }
            .result:hover{
                text-decoration: none;
                transform: translateY(-5px);
                

            }
            .Support:hover{
                text-decoration: none;
                transform: translateY(-5px);
            
            
            }
            .aboutus:hover{
                text-decoration: none;
                transform: translateY(-5px);

                
            }






            .recent-activities-section {
                padding: 20px;
                background-color: #f4f7fa;
                border-radius: 8px;
                //margin-top: 20px;
            }

            .recent-activities-section h2 {
                font-size: 26px;
                color: #303c44;
                margin-bottom: 20px;
                text-align: center;
                font-family: 'Lexend', sans-serif;
            }

            .activity-card {
                background-color: white;
                padding: 20px;
                margin-bottom: 15px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                transition: transform 0.3s ease;
                position: relative;
            }

            .activity-card:hover {
                transform: translateY(-5px);
            }

            .activity-date {
                color: #888;
                font-size: 14px;
                margin-bottom: 8px;
            }

            .activity-card p {
                color: #333;
                font-size: 16px;
                margin-bottom: 10px;
            }

            .activity-card a {
                color: #0056b3;
                text-decoration: none;
                font-weight: bold;
                position: absolute;
                bottom: 20px;
                right: 20px;
            }

            .activity-card a:hover {
                text-decoration: underline;
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
                    <div class="auth-buttons">
                    <a href="signup.php" class="sign-up-btn">Sign Up</a>
                    <a href="login.php" class="login-btn">Login</a>
                    </div>
                
                  
                    
                    
                
                </nav>
            </div>
        </header>
    
        
           
            <div class="photo">
                <img src="./photo/ph_47064_181458.jpg" alt="poto" class="pto">
                <div class="overlay">
                    <h2 id="welcomeMessage">Hi,<br>Let’s get started with your exams or check your latest results!</h2>
                </div>
            </div>
      
            <?php
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        echo "<div style='color:green; font-size:18px;'>Registration successful!</div>";
    }
    ?>
            <div class="welcome">
                <h2>Welcome to Edu Online Examination System!</h2>
                <p>We are pleased to have you with us. Our platform is designed to provide a seamless and secure examination experience. Whether you are a student, an instructor, or an administrator, 
                    this system offers all the tools you need to excel and manage your assessments effectively.</p>
                <p>Feel free to navigate through the sections for your upcoming exams, results, and support. If you need any assistance, our support team is here to help.</p>
                <p>Good luck with your exams, and we wish you the best in achieving your academic goals!</p>
                <p><strong>Edu Online Examination Team</strong></p>

            </div>
            
    
            <div class="announcement-section">
                <h2>Announcements, Updates, and News</h2>
            
                <!-- Announcement 1 -->
                <div class="announcement-card">
                    <h3>Important: Exam Schedule Released</h3>
                    <p class="date">Date: September 25, 2024</p>
                    <p>The final exam schedule for the fall semester has been published. Please check your exam dates in the 'Exam' section and ensure you're prepared. If you have any scheduling conflicts, reach out to support immediately.</p>
                    <a href="#">Read More</a>
                </div>
            
                <!-- Announcement 2 -->
                <div class="announcement-card">
                    <h3>System Update: Improved User Interface</h3>
                    <p class="date">Date: September 20, 2024</p>
                    <p>We have introduced a new user interface to enhance your exam experience. The platform is now more user-friendly and responsive. Explore the new changes and let us know your feedback!</p>
                    <a href="#">Read More</a>
                </div>
            
                <!-- Announcement 3 -->
                <div class="announcement-card">
                    <h3>Reminder: Submit Your Assignments</h3>
                    <p class="date">Date: September 15, 2024</p>
                    <p>This is a friendly reminder to submit all your pending assignments before the deadline. Late submissions will incur penalties unless a valid reason is provided.</p>
                    <a href="#">Read More</a>
                </div>
            
                <!-- Announcement 4 -->
                <div class="announcement-card">
                    <h3>Upcoming Webinar: Exam Preparation Tips</h3>
                    <p class="date">Date: September 10, 2024</p>
                    <p>Join us for an exclusive webinar where our experts will share essential tips to prepare effectively for your upcoming exams. Don’t miss out on this valuable session!</p>
                    <a href="#">Read More</a>
                </div>
            </div>
            
         
    
            <div class="sections">
                <div class="exam"><a href="#">Exam</a></div>
                <div class="result"><a href="#">Result</a></div>
                <div class="Support"><a href="#">Support</a></div>
                <div class="aboutus"><a href="#">About Us</a></div>
            </div>
    
            <div class="recent-activities-section">
                <h2>Recent Activities</h2>
            
                <!-- Activity 1 -->
                <div class="activity-card">
                    <p class="activity-date">September 25, 2024</p>
                    <p><strong>Exam Submitted:</strong> Final Year Mathematics Exam has been submitted successfully.</p>
                    <a href="#">View Details</a>
                </div>
            
                <!-- Activity 2 -->
                <div class="activity-card">
                    <p class="activity-date">September 23, 2024</p>
                    <p><strong>Result Released:</strong> Physics Midterm results are now available. Check your scores.</p>
                    <a href="#">View Results</a>
                </div>
            
                <!-- Activity 3 -->
                <div class="activity-card">
                    <p class="activity-date">September 20, 2024</p>
                    <p><strong>Support Ticket Resolved:</strong> Your request regarding the exam rescheduling has been successfully addressed.</p>
                    <a href="#">View Support Ticket</a>
                </div>
            
                <!-- Activity 4 -->
                <div class="activity-card">
                    <p class="activity-date">September 18, 2024</p>
                    <p><strong>Webinar Attended:</strong> You attended the 'Effective Exam Preparation Strategies' webinar.</p>
                    <a href="#">View Webinar Details</a>
                </div>
            </div>
            
            
        
    
            <footer>
                <div class="footer-content">
                    <!-- Logo Section -->
                    <div class="footer-logo">
                        <img src="logo-placeholder.png" alt="Edu Online Logo">
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
            
    
    </div>
    
</body>  
</html>