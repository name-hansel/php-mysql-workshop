<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] != 'admin') {
    echo "<h1>Forbidden</h1>";
    die();
}

if (!isset($_GET['id']) || $_GET['id'] == '') {
    echo "Please select a student record to edit.";
    echo "<a href='admin-dashboard.php>Go back to dashboard</a>";
    die();
}

$id = $_GET['id'];
$_SESSION['student-id'] = $_GET['id'];
require('connect.php');

$stmt = $connect->prepare("SELECT `name`,email,php,mysql,html FROM student WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<html>

<head>
    <title>Edit Student</title>
</head>

<body>
    <h1>Edit details for <?php echo $row['name'] ?></h1>
    <form method="POST" action="delete.php">
        <input type="submit" name="delete" value="Delete record" />
    </form>

    <form method="POST" action="">
        <label for="name">name</label>
        <input type="text" value="<?php echo $row['name'] ?>" name="name"><br><br>

        <label for="email">email</label>
        <input type="email" value="<?php echo $row['email'] ?>" name="email"><br><br>

        <h3>Marks</h3>
        <label for="php">php</label>
        <input type="number" value="<?php echo $row['php'] ?>" name="php" min="0" max="100"><br><br>

        <label for="mysql">mysql</label>
        <input type="number" value="<?php echo $row['mysql'] ?>" name="mysql" min="0" max="100"><br><br>

        <label for="html">html</label>
        <input type="number" value="<?php echo $row['html'] ?>" name="html" min="0" max="100"><br><br>

        <input type="submit" name="edit" value="Edit" />
    </form>
    <?php
    if (isset($_POST['edit'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : $row['name'];
        $email = isset($_POST['email']) ? $_POST['email'] : $row['email'];
        $php = isset($_POST['php']) ? $_POST['php'] : $row['php'];
        $mysql = isset($_POST['mysql']) ? $_POST['mysql'] : $row['mysql'];
        $html = isset($_POST['html']) ? $_POST['html'] : $row['html'];

        $stmt = $connect->prepare("UPDATE student SET `name`=?,email=?,php=?,mysql=?,html=? WHERE id=?");
        $stmt->bind_param("ssiiii", $name, $email, $php, $mysql, $html, $id);
        if ($stmt->execute()) {
            header('Location: admin-dashboard.php');
        } else {
            echo "<h3>Error.</h3>";
        }
    }
    ?>
</body>

</html>