<?php
// Start session
session_start();

// Database connection
$con = new mysqli("localhost", "root", "", "eduexam");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


// Get the result ID from the URL
$resultID = $_GET['id'];

// Fetch the existing result for this ID
$stmt = $con->prepare("SELECT email, Course_name, MAT101, MAT102, MAT103, MAT104, MAT105 FROM result WHERE ResultID = ?");
$stmt->bind_param("i", $resultID);
$stmt->execute();
$stmt->bind_result($email, $course_name, $mat101, $mat102, $mat103, $mat104, $mat105);
$stmt->fetch();
$stmt->close();

// Handle form submission for updating the result
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $course_name = $_POST['course_name'];
    $mat101 = $_POST['mat101'];
    $mat102 = $_POST['mat102'];
    $mat103 = $_POST['mat103'];
    $mat104 = $_POST['mat104'];
    $mat105 = $_POST['mat105'];

    // Update the result in the database
    $stmt = $con->prepare("UPDATE result SET email = ?, Course_name = ?, MAT101 = ?, MAT102 = ?, MAT103 = ?, MAT104 = ?, MAT105 = ? WHERE ResultID = ?");
    $stmt->bind_param("sssssssi", $email, $course_name, $mat101, $mat102, $mat103, $mat104, $mat105, $resultID);

    if ($stmt->execute()) {
        echo "Result updated successfully!";
        header("Location: adminResult.php"); // Redirect back to the admin results page
        exit();
    } else {
        echo "Error updating result: " . $stmt->error;
    }

    $stmt->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Result</title>
</head>
<body>

<h2>Update Student Result</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $resultID; ?>">
    Email: <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
    Course Name: <input type="text" name="course_name" value="<?php echo $course_name; ?>"><br><br>
    MAT101: <input type="text" name="mat101" value="<?php echo $mat101; ?>"><br><br>
    MAT102: <input type="text" name="mat102" value="<?php echo $mat102; ?>"><br><br>
    MAT103: <input type="text" name="mat103" value="<?php echo $mat103; ?>"><br><br>
    MAT104: <input type="text" name="mat104" value="<?php echo $mat104; ?>"><br><br>
    MAT105: <input type="text" name="mat105" value="<?php echo $mat105; ?>"><br><br>
    <input type="submit" value="Update">
</form>

</body>
</html>