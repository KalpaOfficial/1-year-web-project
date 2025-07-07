<?php
session_start();
require 'config.php';

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Course</title>
    <link rel="stylesheet" href="course.css">
</head>

<body>
    <?php


    function generateNextCodes($lastCode)
    {
        $prefix = '#CID';
        $number = (int)str_replace($prefix, '', $lastCode);
        $nextNumber = $number + 1;

        $newCode = $prefix . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

        return $newCode;
    }

    $query = "SELECT * FROM course ORDER BY course_id DESC LIMIT 1";
    $result = $con->query($query);

    if ($result) {

        if ($result->num_rows != 0) {
            $row = $result->fetch_assoc();
            $lastCode = $row['course_id'];
        } else {
            $lastCode = '#CID000001';
        }

        $nextCode = generateNextCodes($lastCode);
    }

    ?>
    <br>
    <div>
        <button class="add-btn" onclick="window.location = 'course.php';">Go Couse Menu</button>

        <h2 style="text-align: center;">Insert Course</h2>
        <form method="post" action="courseinsert.php">
            Course ID: <input readonly value="<?php echo $nextCode; ?>" type="text" name="courseid"><br>
            Course Name: <input type="text" name="course_name"><br>

            Module 1: <input name="module_1" type="text"><br>
            Module 2: <input name="module_2" type="text"><br>
            Module 3: <input name="module_3" type="text"><br>
            Module 4: <input name="module_4" type="text"><br>
            Module 5: <input name="module_5" type="text"><br>
            <input class="" type="submit" value="Add Course">
        </form>
    </div>
    <br>

</body>

</html>


<script src="coursescript.js"></script>