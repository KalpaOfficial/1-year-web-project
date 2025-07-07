<?php
session_start();
require 'config.php';

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM course WHERE id = $id";
$result = $con->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Edit</title>    
    <link rel="stylesheet" href="course.css">
</head>
<body>
<br>
<button class="add-btn" onclick="window.location = 'course.php';">Go Couse Menu</button>
<br>

<h2 style="text-align: center;">Update Course</h2>
    <br>

<form method="post" action="courseupdate.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Course ID: <input readonly type="text" name="course_id" value="<?php echo $row['course_id']; ?>"><br>
    Course Name: <input type="text" name="course_name" value="<?php echo $row['course_name']; ?>"><br>

    Module 1: <input name="module_1" type="text" value="<?php echo $row['module_1']; ?>"><br>
    Module 2: <input name="module_2" type="text" value="<?php echo $row['module_2']; ?>"><br>
    Module 3: <input name="module_3" type="text" value="<?php echo $row['module_3']; ?>"><br>
    Module 4: <input name="module_4" type="text" value="<?php echo $row['module_4']; ?>"><br>
    Module 5: <input name="module_5" type="text" value="<?php echo $row['module_5']; ?>"><br>
    
    <input type="submit" value="Update Course">
</form>

</body>
</html>