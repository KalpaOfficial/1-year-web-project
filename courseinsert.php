<?php
session_start();
require 'config.php';

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $course_name = $_POST['course_name'];
    $module_1 = $_POST['module_1'];
    $module_2 = $_POST['module_2'];
    $module_3 = $_POST['module_3'];
    $module_4 = $_POST['module_4'];
    $module_5 = $_POST['module_5'];
    $course_id = $_POST['courseid'];

    if (empty($course_id)) {
?>
        <script>
            alert("Please Enter course ID");
            window.location = "insert_course.php";
        </script>
    <?php
    } else if (empty($course_name)) {
    ?>
        <script>
            alert("Please Enter course Name");
            window.location = "insert_course.php";
        </script>
    <?php
    } else if (empty($module_1)) {
    ?>
        <script>
            alert("Please Enter Model 01");
            window.location = "insert_course.php";
        </script>
    <?php
    } else if (empty($module_2)) {
    ?>
        <script>
            alert("Please Enter Model 02");
            window.location = "insert_course.php";
        </script>
    <?php
    } else if (empty($module_3)) {
    ?>
        <script>
            alert("Please Enter Model 03");
            window.location = "insert_course.php";
        </script>
    <?php
    } else if (empty($module_4)) {
    ?>
        <script>
            alert("Please Enter Model 04");
            window.location = "insert_course.php";
        </script>
    <?php
    } else if (empty($module_5)) {
    ?>
        <script>
            alert("Please Enter Model 05");
            window.location = "insert_course.php";
        </script>
        <?php
    } else {

        $sql = "INSERT INTO course (course_id, course_name, module_1, module_2, module_3, module_4, module_5) 
            VALUES ('$course_id', '$course_name', '$module_1', '$module_2', '$module_3', '$module_4', '$module_5')";

        if ($con->query($sql) === TRUE) {
        ?>
            <script>
                alert("New course created successfully");
                window.location = "insert_course.php";
            </script>
<?php
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        $con->close();
    }
}
?>