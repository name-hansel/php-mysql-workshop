<?php
require('connect.php');
session_start();
if (isset($_SESSION['id'])) {
    header('Location: student-dashboard.php');
}
?>
<html>

<head>
    <title>Student Register</title>
</head>

<body>
    <h2>Student Register</h2>
    <form method="POST">
        <label for="name">name</label>
        <input type="text" name="name" required /><br><br>
        <label for="email">email</label>
        <input type="email" name="email" required /><br><br>
        <label for="password">password</label>
        <input type="password" name="password" required /><br><br>
        <button type="submit">Register</button>
    </form>
    <?php
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $stmt = $connect->prepare("SELECT * FROM student WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            echo "email already exists";
        } else {
            $stmt = $connect->prepare("INSERT INTO student(email, `name`, password) VALUES(?,?,?)");
            $stmt->bind_param("sss", $email, $name, $password);
            if ($stmt->execute()) {
                echo "Record added.";
                echo "<br><a href='student-login.php'>Login</a>";
            } else {
                echo "Some problem has been encountered.";
            }
        }
    }

    ?>
</body>


</html>