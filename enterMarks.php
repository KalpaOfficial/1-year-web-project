<?php
// Start session
session_start();

// Database connection
$con = new mysqli("localhost", "root", "", "eduexam");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Initialize variables
$error = "";
$success = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $course_name = $_POST['course_name'];
    $mat101 = $_POST['mat101'];
    $mat102 = $_POST['mat102'];
    $mat103 = $_POST['mat103'];
    $mat104 = $_POST['mat104'];
    $mat105 = $_POST['mat105'];

    // Check if the email exists in the database (in the 'registration' table)
    $check_email = $con->prepare("SELECT * FROM registration WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        // Email exists, insert the marks into the 'result' table
        $stmt = $con->prepare("INSERT INTO result (email, Course_name, MAT101, MAT102, MAT103, MAT104, MAT105) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $email, $course_name, $mat101, $mat102, $mat103, $mat104, $mat105);

        if ($stmt->execute()) {
            $success = "Marks successfully entered for " . $email;
        } else {
            $error = "Error entering marks: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Email doesn't exist, show error message
        $error = "The email " . $email . " does not exist in the database.";
    }
    $check_email->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Student Marks</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">

<h2 style="text-align: center; color: #333;">Enter Student Marks</h2>

<?php if (!empty($error)) : ?>
    <p style="color: red; text-align: center;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if (!empty($success)) : ?>
    <p style="color: green; text-align: center;"><?php echo $success; ?></p>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="max-width: 400px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <label for="email" style="display: block; margin-bottom: 10px;">Email:</label>
    <input type="text" name="email" id="email" required style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">

    <label for="course_name" style="display: block; margin-bottom: 10px;">Course Name:</label>
    <input type="text" name="course_name" id="course_name" required style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">

    <label for="mat101" style="display: block; margin-bottom: 10px;">MAT101:</label>
    <input type="text" name="mat101" id="mat101" required style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">

    <label for="mat102" style="display: block; margin-bottom: 10px;">MAT102:</label>
    <input type="text" name="mat102" id="mat102" required style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">

    <label for="mat103" style="display: block; margin-bottom: 10px;">MAT103:</label>
    <input type="text" name="mat103" id="mat103" required style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">

    <label for="mat104" style="display: block; margin-bottom: 10px;">MAT104:</label>
    <input type="text" name="mat104" id="mat104" required style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">

    <label for="mat105" style="display: block; margin-bottom: 10px;">MAT105:</label>
    <input type="text" name="mat105" id="mat105" required style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">

    <input type="submit" value="Enter Marks" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
    
    <!-- Back button -->
    <a href="adminResult.php" style="display: inline-block; width: 30%; padding: 10px; background-color: #6c757d; color: white; text-align: center; border-radius: 4px; text-decoration: none; margin-top: 10px;">Back</a>
</form>

</body>
</html>
