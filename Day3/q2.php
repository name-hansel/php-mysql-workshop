<?php
include('connect.php');
$sub5 = 0;
$total = 0;
$percent = 0;
$new_sub5 = 99;

$stmt = ("SELECT * FROM class1 WHERE `name`='Rohan'");
$result = $connect->query($stmt);
while ($row = $result->fetch_assoc()) {
    $sub5 = $row['sub5'];
    $total = $row['total obtained'];
}

$total = $total - $sub5 + $new_sub5;
$percent = $total / 5;

$stmt = $connect->prepare("UPDATE class1 SET sub5=?,`total obtained`=?,percent=? WHERE `name`='Rohan'");
$stmt->bind_param("iid", $new_sub5, $total, $percent);
if ($stmt->execute()) {
    echo "Updated<br>";
} else {
    echo "Not updated. Try again.";
}
