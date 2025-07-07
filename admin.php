<?php

require 'config.php';

session_start();

// Check if the session exists
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Handle delete operation
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM registration WHERE id = '$delete_id'";
    mysqli_query($con, $delete_sql);
    header("Location: admin.php"); // Refresh the page after deletion
}

// Fetch data from the database where userType is 'admin'
$sql = "SELECT * FROM registration WHERE userType = 'admin'";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <title>Admin Dashboard</title>
    <style> 
        
            body {
                font-family: Arial, sans-serif;
                margin: 0;
            }

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
            

            .content {
                width: 80%;
                padding: 20px;
                background-color: #f4f4f4;
            }

            .content h1 {
                margin-bottom: 20px;
            }

            /* Add button styling */
            .add-btn {
                background-color: #28a745;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-bottom: 20px;
                float: right;
            }

            .add-btn:hover {
                background-color: #218838;
            }

            /* Table styling */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            table, th, td {
                border: 1px solid #333;
            }

            th, td {
                padding: 10px;
                text-align: left;
            }

            thead {
                background-color: #333;
                color: white;
            }

            /* Edit and Delete button styling */
            .edit-btn, .delete-btn {
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .edit-btn {
                background-color: #ffc107;
                color: white;
            }

            .edit-btn:hover {
                background-color: #e0a800;
            }

            .delete-btn {
                background-color: #dc3545;
                color: white;
            }

            .delete-btn:hover {
                background-color: #c82333;
            }

    </style> 
</head>
<body>
    <div class="container">
        <div class="navbar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="admin.php" class="active">Manage Users</a></li> <!-- Link to Manage Users -->
                <li><a href="#">Manage Exams</a></li> <!-- Link to Manage Exams -->
                <li><a href="adminResult.php">Manage Result</a></li>
                <li><a href="home.php">Logout</a></li> <!-- Link to Logout -->
            </ul>
        </div>
        <div class="content">
            <h1>Manage Admin Users</h1>

            <!-- Add button -->
            <button class="add-btn" onclick="window.location.href='admin_form.php?action=add'">Add New Admin</button>

            <!-- Table for displaying admins -->
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th>Contact No</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['dob'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['contact'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td><a href='admin_form.php?action=edit&id=" . $row['id'] . "' class='edit-btn'>Edit</a></td>";
                            echo "<td><a href='admin.php?delete_id=" . $row['id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this admin?\")'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No admin users found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
