<?php
include('connect.php');
$stmt = ("SELECT `visitor count` FROM `counter`");
$result = $connect->query($stmt);
$row = $result->fetch_assoc();

echo "<h1>Visitor Count</h1>";
echo "<br><h2>" . $row['visitor count'] . " visitors!</h2>";

$new = $row['visitor count'] + 1;

$stmt = $connect->prepare("UPDATE `counter` SET `visitor count`=?");
$stmt->bind_param("i", $new);

if (!$stmt->execute()) {
  echo "Unable to update count";
}
