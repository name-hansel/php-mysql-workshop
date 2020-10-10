<?php
session_start();
if ($_SESSION['id'] != 'admin') {
    header('Location: admin-login.php');
}

if (isset($_POST['logout'])) {
    unset($_SESSION['id']);
    session_destroy();
    header('Location: admin-login.php');
}
require('connect.php');
$stmt = "SELECT id,`name`,php,mysql,html FROM student WHERE NOT `name`='admin'";
$result = $connect->query($stmt);
?>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Welcome, admin</h1>
    <form action="admin-dashboard.php" method="POST">
        <input type="submit" name="logout" value="Logout" />
    </form>
    <form action="add-student.php" method="GET">
        <input type="submit" value="Add New Student" />
    </form>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>PHP Marks</th>
            <th>MySQL Marks</th>
            <th>HTML Marks</th>
            <th>Edit/Delete</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['php'] . "</td>";
            echo "<td>" . $row['mysql'] . "</td>";
            echo "<td>" . $row['html'] . "</td>";
            echo "<form method='GET' action='edit-student.php'><input type='hidden' name='id' value=" . $row['id'] . ">";
            echo "<td><input type='submit' value='x'/></td>";
            echo "</tr></form>";
        }
        ?>
    </table>
</body>