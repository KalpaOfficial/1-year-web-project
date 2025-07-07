<?php
require 'config.php';
?>

<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM registration WHERE id = '$delete_id'";
    mysqli_query($con, $delete_sql);
    header("Location: admin.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Dashboard</title>

</head>

<body>
    <div class="container">
        <div class="navbar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="admin.php">Manage User</a></li>
                <li><a href="examPage.php">Manage Exams</a></li>
                <li><a href="course.php" class="active">Manage Course</a></li>
                <li><a href="adminResult.php">Manage Results</a></li>
                <li><a href="home.php">Logout</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Manage Course Create</h1>

            <button class="add-btn" onclick="window.location.href='insert_course.php'">Add Course</button>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Module 1</th>
                        <th>Module 2</th>
                        <th>Module 3</th>
                        <th>Module 4</th>
                        <th>Module 5</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM course";
                    $result = mysqli_query($con, $sql);
                    if ($result->num_rows > 0) {
                        echo "<table border='1'>
                        <tr>
                            
                        </tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr  style='align-items: center;'>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['course_id'] . "</td>
                                <td>" . $row['course_name'] . "</td>
                                <td>" . $row['module_1'] . "</td>
                                <td>" . $row['module_2'] . "</td>
                                <td>" . $row['module_3'] . "</td>
                                <td>" . $row['module_4'] . "</td>
                                <td>" . $row['module_5'] . "</td>
                                <td ><a class='editbtn' href='courseedit.php?id=" . $row['id'] . "'>Edit</a></td>
                                <td><a class='deletebtn' href='coursedelete.php?id=" . $row['id'] . "'>Delete</a></td>
                            </tr>";
                        }
                        echo "</table>";
                    }

                    $con->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>