<?php
session_start();
if (isset($_POST['delete']) && isset($_SESSION['id']) && $_SESSION['id'] == 'admin') {
    require('connect.php');
    $stmt = $connect->prepare("DELETE FROM student WHERE id=?");
    $stmt->bind_param("i", $_SESSION['student-id']);
    if ($stmt->execute()) {
        echo "<h3>Record deleted successfully.</h3>";
        echo "<br><br><a href='admin-dashboard.php'>Back</a>";
    } else {
        echo "<h3>Record not deleted. Try again.</h3>";
        echo "<br><br><a href='admin-dashboard.php'>Back</a>";
    }
} else {
    echo "<h1>Forbidden</h1>";
}
