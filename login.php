<?php
require 'config.php'; // Include database connection

session_start();

$error = ''; // Initialize an empty error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare SQL statement to avoid SQL injection
    $stmt = $con->prepare("SELECT * FROM registration WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row["password"])) {
            // Check user type and redirect accordingly
            if ($row["userType"] === "admin") {
                $_SESSION["username"] = $username;
                header("Location: admin.php");
                exit();
            } else if ($row["userType"] === "student") {
                $_SESSION["username"] = $username;
                header("Location: index.php");
                exit();
            }
        } else {
            // If password is incorrect, set password-specific error message
            $error = "Incorrect password!";
        }
    } else {
        // If username not found, set username-specific error message
        $error = "Incorrect username!";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$con->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="login.css">
  <title>Exam Information Center</title>
</head>
<body>
  <div class="container">
    <img src="./photo/typefiteamwithkids.jpg" class="photo">
    <div class="login">
      <div class="logo"><h2>Welcome to EDU Online Examination platform</h2>
      <p>If You Have an Account, Please Login Otherwise Register from university </p></div>
      <div class="inputform">
        <h2>Login</h2>
          <form action="#" method="post">
            <div class="input-group">
                
                <input type="text" id="username" name="username" required>
                <label for="username">Username</label>
            </div>
            <div class="input-group">
                
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>
          <!-- Error message displayed here -->
          <?php if (!empty($error)): ?>
                <div style="color: red; font-size: 16px;">
                    <?= $error; ?>
                </div>
            <?php endif; ?>

            <button type="submit">Log In</button>
            <div class="signuplink">
              not a member? <a href="signup.php">register</a></div>
      </div>
    </div>
  </div>
    

    
</body>  
</html>