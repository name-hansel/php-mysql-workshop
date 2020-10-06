<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: student-login.php');
} else if (isset($_SESSION['id']) && $_SESSION['id'] == 'admin') {
    header('Location: admin-dashboard.php');
}
?>
<html>

<head>
    <title>Mail to parent</title>
</head>

<body>
    <form method="POST">
        <label>Parent's Email</label>
        <input type="email" name="email" required />
        <input type="submit" name="mail" value="Mail" />
    </form>
    <?php
    if (isset($_POST['mail'])) {
        $header = "From admin";
        $subject = $_SESSION['name'] . "'s marksheet";
        $body = $_SESSION['name'] . "'s marksheet:<br> PHP marks- " . $_SESSION['php'] . " <br>MySQL marks- " . $_SESSION['mysql'] . " <br>HTML marks- " . $_SESSION['html'] . " <br>Percentage = " . $_SESSION['percent'] . "%";
        $body = html_entity_decode($body);
        mail($_POST['email'], $subject, $body, $header);
        unset($_SESSION['name']);
        unset($_SESSION['php']);
        unset($_SESSION['mysql']);
        unset($_SESSION['html']);
        unset($_SESSION['percent']);
    }

    ?>
</body>

</html>