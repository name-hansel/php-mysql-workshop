<html>

<head>
    <title>Home</title>
</head>

<body>
    <h2>Student Marks</h2>
    <form method="POST">
        <input type="submit" name="student-login" value="Student Login" />
        <input type="submit" name="student-register" value="Student Registration" />
        <input type="submit" name="admin-login" value="Admin Login" />
    </form>
    <?php
    if (isset($_POST['student-login'])) {
        header('Location: student-login.php');
    } elseif (isset($_POST['student-register'])) {
        header('Location: student-register.php');
    } elseif (isset($_POST['admin-login'])) {
        header('Location: admin-login.php');
    }
    ?>
</body>

</html>