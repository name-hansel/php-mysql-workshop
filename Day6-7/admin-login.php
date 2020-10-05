<?php
session_start();
if ($_SESSION['id'] == 'admin') {
    header('Location: admin-dashboard.php');
}
?>
<html>

<head>
    <title>Admin Login</title>
</head>

<body>
    <h2>Admin Login</h2>
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
        if ($email == "admin@xyz.com") {
            require('connect.php');
            $stmt = $connect->prepare("SELECT `password` FROM student WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($row['password'] == $password) {
                $_SESSION['id'] = 'admin';
                header('Location: admin-dashboard.php');
            } else {
                echo "Wrong password";
                session_unset();
                session_destroy();
            }
        } else {
            echo "Wrong email";
        }
    }

    ?>
</body>

</html>