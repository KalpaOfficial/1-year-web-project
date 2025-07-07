<?php
// Database connection
$servername = "localhost";
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "eduexam"; // Your database name

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and collect form data
    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $dob = $con->real_escape_string($_POST['dob']);
    $address = $con->real_escape_string($_POST['address']);
    $contact = $con->real_escape_string($_POST['contact']);
    $username = $con->real_escape_string($_POST['username']);
    $password = password_hash($con->real_escape_string($_POST['password']), PASSWORD_BCRYPT); // Hash the password
    $usertype = $con->real_escape_string($_POST['userType']);  // Ensure this matches the form field

    // Debugging: Check if the userType is being captured correctly
    // if (empty($usertype)) {
    //     echo "<div style='color:red;'>User Type is empty!</div>";
    // } else {
    //     echo "<div>User Type: $usertype</div>"; // For debugging purposes
    // }

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM registration WHERE email = '$email'";
    $result = $con->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // If email exists, show an error message
        echo "<div style='color:red; font-size:18px;'>Error: Email already exists, please log in!</div>";
        echo "<br><a href='login.php'>Go to login page</a>"; // Optionally redirect to login page
    } else {
        // If email doesn't exist, proceed with the registration
        $sql = "INSERT INTO registration (name, email, dob, address, contact, username, password, userType)
                VALUES ('$name', '$email', '$dob', '$address', '$contact', '$username', '$password', '$usertype')";

        // Execute query and check success
        if ($con->query($sql) === TRUE) {
            // Redirect to index.php with a success message
            header("Location: login.php?status=success");
            exit();
        } else {
            // Show an error and provide a button to go back
            echo "<div style='color:red; font-size:18px;'>Error: " . $con->error . "</div>";
            echo "<br><a href='register.php'>Go back and try again</a>";
        }
    }

    // Close connection
    $con->close();
}
?>
