<?php
session_start();
require('connect.php');
if (!$_SESSION['id'] == 'admin') {
    header('Location: admin-login.php');
}

if (isset($_POST['addstudent'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $php = $_POST['php'];
    $mysql = $_POST['mysql'];
    $html = $_POST['html'];
    $stmt = $connect->prepare("INSERT INTO student(`name`,email,`password`,php,mysql,html) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("sssiii", $name, $email, $password, $php, $mysql, $html);
    if ($stmt->execute()) {
        echo "Record added.";
        echo "<br><a href='admin-dashboard.php'>Go back to dashboard</a>";
    } else {
        echo "Error.";
    }
}

?>

<head>
    <title>Add New Student</title>
</head>

<body>
    <h1>Add New Student</h1>
    <form method="POST" action="add-student.php">
        <label for="email">email</label>
        <input type="email" name="email" required /><br><br>

        <label for="name">name</label>
        <input type="text" name="name" required /><br><br>

        <label for="password">password</label>
        <input type="password" name="password" required /><br><br>

        <h3>Marks</h3>
        <label for="php">PHP</label>
        <input type="number" name="php" min="0" max="100" /><br><br>
        <label for="mysql">MySQL</label>
        <input type="number" name="mysql" min="0" max="100" /><br><br>
        <label for="html">HTML</label>
        <input type="number" name="html" min="0" max="100" /><br><br>

        <input type="submit" name="addstudent" value="Add Student" />
    </form>
</body>