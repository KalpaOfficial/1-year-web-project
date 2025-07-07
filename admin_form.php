<?php

require 'config.php';

session_start();

// Initialize variables
$name = $email = $dob = $address = $contact = $username = $password = '';
$action = $_GET['action'];
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Check if editing
if ($action == 'edit' && $id) {
    $sql = "SELECT * FROM registration WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $email = $row['email'];
    $dob = $row['dob'];
    $address = $row['address'];
    $contact = $row['contact'];
    $username = $row['username'];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($action == 'edit') {
        // Update existing admin
        $sql = "UPDATE registration SET name='$name', email='$email', dob='$dob', address='$address', contact='$contact', username='$username', password='$password' WHERE id = '$id'";
    } else {
        // Add new admin
        $sql = "INSERT INTO registration (name, email, dob, address, contact, username, password, userType) VALUES ('$name', '$email', '$dob', '$address', '$contact', '$username', '$password', 'admin')";
    }

    if (mysqli_query($con, $sql)) {
        header("Location: admin.php"); // Redirect back to the dashboard
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Form</title>
</head>
<body>
    <div class="form-container">
        <h2><?php echo ucfirst($action); ?> Admin</h2>
        <form method="POST">
            <label>Name:</label><br>
            <input type="text" name="name" value="<?php echo $name; ?>" required><br><br>

            <label>Email:</label><br>
            <input type="email" name="email" value="<?php echo $email; ?>" required><br><br>

            <label>DOB:</label><br>
            <input type="date" name="dob" value="<?php echo $dob; ?>" required><br><br>

            <label>Address:</label><br>
            <input type="text" name="address" value="<?php echo $address; ?>" required><br><br>

            <label>Contact:</label><br>
            <input type="text" name="contact" value="<?php echo $contact; ?>" required><br><br>

            <label>Username:</label><br>
            <input type="text" name="username" value="<?php echo $username; ?>" required><br><br>

            

            <input type="submit" value="<?php echo ucfirst($action); ?> Admin" class="submit-btn">
        </form>
    </div>
</body>
</html>
