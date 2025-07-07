<?php
// Start session
session_start();

// Database connection
$con = new mysqli("localhost", "root", "", "eduexam");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle delete functionality
if (isset($_GET['delete'])) {
    $resultID = $_GET['delete'];

    // Prepare statement for deletion
    $stmt = $con->prepare("DELETE FROM result WHERE ResultID = ?");
    $stmt->bind_param("i", $resultID);

    if ($stmt->execute()) {
        echo "Result deleted successfully!";
    } else {
        echo "Error deleting result: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch all results
$sql = "SELECT ResultID, email, Course_name, MAT101, MAT102, MAT103, MAT104, MAT105 FROM result";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Student Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

        /* Navbar Styling */
        .container {
            display: flex;
            height: 100vh;
        }

        .navbar {
            width: 20%;
            background-color: #333;
            color: white;
            padding: 20px;
        }

        .navbar h2 {
            margin-bottom: 20px;
        }

        .navbar ul {
            list-style-type: none;
            padding: 0;
        }

        .navbar ul li {
            margin: 15px 0;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #555;
        }

        .navbar ul li a.active {
            background-color: #007bff;
            color: rgb(58, 47, 47);
        }

        /* Table and Result Section Styling */
        .content {
            width: 80%;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        thead {
            background-color: #333;
            color: white;
        }

        .actions a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            margin-right: 5px;
        }

        .actions a.update {
            background-color: #28a745;
            color: white;
        }

        .actions a.delete {
            background-color: #dc3545;
            color: white;
        }

        .actions a:hover {
            opacity: 0.8;
        }

        /* Button Styles */
        .add-button {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .add-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Navbar -->
    <div class="navbar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="admin.php">Manage Users</a></li>
            <li><a href="#">Manage Exams</a></li>
            <li><a href="adminResult.php" class="active">Manage Results</a></li>
            <li><a href="home.php">Logout</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h2>Student Results</h2>

        <!-- Button to Enter Marks -->
        <a href="enterMarks.php" class="add-button">Enter Marks</a>

        <table>
            <thead>
                <tr>
                    <th>ResultID</th>
                    <th>Email</th>
                    <th>Course Name</th>
                    <th>MAT101</th>
                    <th>MAT102</th>
                    <th>MAT103</th>
                    <th>MAT104</th>
                    <th>MAT105</th>
                    <th>Update</th> <!-- New column for update -->
                    <th>Delete</th> <!-- New column for delete -->
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['ResultID']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['Course_name']; ?></td>
                            <td><?php echo $row['MAT101']; ?></td>
                            <td><?php echo $row['MAT102']; ?></td>
                            <td><?php echo $row['MAT103']; ?></td>
                            <td><?php echo $row['MAT104']; ?></td>
                            <td><?php echo $row['MAT105']; ?></td>
                            <!-- Update button column -->
                            <td class="actions">
                                <a href="updateResult.php?id=<?php echo $row['ResultID']; ?>" class="update">Update</a>
                            </td>
                            <!-- Delete button column -->
                            <td class="actions">
                                <a href="adminResult.php?delete=<?php echo $row['ResultID']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this result?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="10">No results found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

<?php
$con->close();
?>
