<?php
session_start();
// Logout
if (isset($_POST['logout'])) {
    unset($_SESSION['id']);
    session_destroy();
    header('Location: student-login.php');
}
// Logged out
if (!isset($_SESSION['id'])) {
    header('Location: student-login.php');
}

require('connect.php');
$stmt = $connect->prepare("SELECT `name`, php, mysql, html FROM student WHERE id=?");
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$php = isset($row['php']) ? $row['php'] : NULL;
$mysql = isset($row['mysql']) ? $row['mysql'] : NULL;
$html = isset($row['html']) ? $row['html'] : NULL;
$c = false;

if ($php == NULL || $mysql == NULL || $html == NULL) {
    $total = "-";
    $percent = "-";
} else {
    $total = $php + $mysql + $html;
    $percent = $total / 3;
    if ($percent > 60) {
        $c = true;
    }
}

?>
<html>

<head>
    <title>Student Dashboard</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h1>Welcome,
        <?php echo $row['name'] ?>
    </h1>
    <form action="student-dashboard.php" method="POST">
        <input type="submit" name="logout" value="Logout" />
    </form>
    <!-- logout -->
    <h3>Your marks:</h3>
    <table>
        <tr>
            <th>Subject</th>
            <th>Marks</th>
        </tr>
        <tr>
            <th>PHP</th>
            <td><?php echo $php ?></td>
        </tr>
        <tr>
            <th>MySQL</th>
            <td><?php echo $mysql ?></td>
        </tr>
        <tr>
            <th>HTML</th>
            <td><?php echo $html ?></td>
        </tr>
        <tr>
            <th>Total marks</th>
            <td><?php echo $total . " / 300" ?></td>
        </tr>
        <tr>
            <th>Percentage</th>
            <td><?php echo number_format((float)$percent, 2, '.', '') . "%" ?></td>
        </tr>
    </table>
    <h2><?php
        if ($c) {
            echo "Congratulations! You have scored more than 60%!";
            // mail option
        }
        ?></h2>
</body>

</html>