<?php
require 'config.php';
session_start();
require 'config.php';

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $module_1 = $_POST['module_1'];
    $module_2 = $_POST['module_2'];
    $module_3 = $_POST['module_3'];
    $module_4 = $_POST['module_4'];
    $module_5 = $_POST['module_5'];

    $sql = "UPDATE course SET 
            course_id='$course_id', 
            course_name='$course_name', 
            module_1='$module_1', 
            module_2='$module_2', 
            module_3='$module_3', 
            module_4='$module_4', 
            module_5='$module_5' 
            WHERE id=$id";

    if ($con->query($sql) === TRUE) {
?>
        <script>
            alert("Course updated successfully");
            window.location = "course.php";
        </script>
<?php

    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
}
?>