<html>
<form action="q2_send_mail.php" method="POST">
    <label for="name">Name </label><input name="name" required><br><br>

    <label for="email">Email </label><input type="email" name="email" required><br><br>

    <label for="feedback">Feedback </label><br><br><textarea name="feedback" required></textarea><br><br>

    <button type="submit">Send feedback</button>
</form>

<?php
if (isset($_POST['feedback'])) {
    $name = $_POST["name"];
    $to = $_POST["email"];
    $feedback = $_POST["feedback"];

    $subject = "Thank you for your feedback!";
    $body = "Thank you, $name!";
    $header = "From: abc@gmail.com";
    mail($to, $subject, $body, $header);

    $to = "admin@admin.com";
    $subject = "Feedback from $name";
    $body = "Received new feedback from $name, with email address $email. The feedback given is: $feedback";
    $header = "From: abc@gmail.com";
    mail($to, $subject, $body, $header);
}
?>

</html>