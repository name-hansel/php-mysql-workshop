<?php
if (isset($_FILES['file'])) {
    echo "File uploaded";
    echo $_FILES['file']['name'];
    echo "<br>";
    echo $_FILES['file']['type'];
    echo "<br>";
    echo $_FILES['file']['size'];
    echo "<br>";
}
?>

<html>
<form method="POST" action="q3.php" enctype="multipart/form-data">
    <input type="file" name="file" />
    <button type="submit">Upload File</button>
</form>

</html>