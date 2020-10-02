<?php
include("connect.php");
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $stmt = $connect->prepare("INSERT INTO users(username, `password`) VALUES (?,?)");
    $stmt->bind_param("ss", $username, $password);
}
?>



<html>
<form action="q1_md5.php" method="POST">
    <label for="username">Enter username</label>
    <input type="text" name="username" required><br><br>
    <label for="password">Enter password</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Add record</button>
</form>

<?php
if (isset($username)) {
    if ($stmt->execute()) {
        echo "Record added.";
    } else {
        echo "Some problem has been encountered.";
    }
}
?>

</html>