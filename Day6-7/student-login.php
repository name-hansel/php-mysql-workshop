<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location: student-dashboard.php');
}
?>

<html>

<head>
    <title>Student Login</title>
</head>

<body>
    <a href="index.php">Home</a>
    <h2>Student Login</h2>
    <form method="POST">
        <label for="email">email</label>
        <input type="email" name="email" required /><br><br>
        <label for="password">password</label>
        <input type="password" name="password" required /><br><br>
        <button type="submit">Login</button>
    </form>
    <?php
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        // Get user with email
        require('connect.php');
        $stmt = $connect->prepare("SELECT id,`password` FROM student WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        // Check if user exists
        if ($row) {
            if ($row['password'] == $password) {
                $_SESSION['id'] = $row['id'];
                header('Location: student-dashboard.php');
            } else {
                echo "Wrong password";
                session_unset();
                session_destroy();
            }
        } else {
            echo "No user found with this email.<br>";
            echo "<a href='student-register.php'>Register</a>";
            session_unset();
            session_destroy();
        }
    }

    ?>
</body>

</html>