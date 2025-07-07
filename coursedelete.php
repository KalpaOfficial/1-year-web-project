<?php
session_start();
require 'config.php';

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM course WHERE id=$id";

if ($con->query($sql) === TRUE) {
?>
    <script>
        alert("Course deleted successfully");
        window.location = "course.php";
    </script>
<?php
} else {
    echo "Error deleting record: " . $con->error;
}

$con->close();
?>