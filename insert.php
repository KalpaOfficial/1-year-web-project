<?php
 session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="insert.css">
    </head>

    <body>
       <!-- <nav class="navbar">

             
            <div class="navbar-brand">Student Management</div>

            <div class="navbar-actions">
            <a href="logout.php">Log out</a>
            <a  href="create.php" role="button">New Student</a>
            </div>
        </nav>  -->
            <nav class="navbar">
            <div class="navbar-brand">Student Management</div>
            <div class="navbar-actions">
            <a href="create.php" class="btn btn-primary">New Student</a>
            <a href="logout.php" class="btn btn-danger">Log out</a>
    </div>
</nav>

            <br><br>

            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    require 'config.php';
                //read all row from database table

                $sql = "SELECT id,username,password FROM admin_user";
                $result = $con->query($sql);


                if($result -> num_rows>0){
                
                    while($row=$result->fetch_assoc())
                    {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['password']}</td>



                            <td>
                                <a class='btn-edit' href='edit.php?sid={$row['sid'] }'>Edit</a>
                                <a class='btn-delete'  href='delete.php?sid={$row['sid']}'>Delete</a>
                            </td>
                         </tr>";
                    }
                }


               

                ?>



                </tbody>
            </table>


         </div>
    </body>
</html>