<?php
include('connect.php');
?>

<html>

<body>
  <form action="q1.php" method="POST">
    <label>Name of Student*: </label>
    <input type="text" name="name" required />
    <h4>Marks in Each Subject</h4>

    <label>Subject 1*: </label>
    <input type="number" name="sub1" required />
    <br>
    <label>Subject 2*: </label>
    <input type="number" name="sub2" required />
    <br>
    <label>Subject 3*: </label>
    <input type="number" name="sub3" required />
    <br>
    <label>Subject 4*: </label>
    <input type="number" name="sub4" required />
    <br>
    <label>Subject 5*: </label>
    <input type="number" name="sub5" required />

    <br>
    <button type="submit">Submit</button>

    <?php
    if (isset($_POST['name'])) {
      $total = $_POST['sub1'] + $_POST['sub2'] + $_POST['sub3'] + $_POST['sub4'] + $_POST['sub5'];
      echo "<h3>";
      echo "<br>Total Marks: $total";
      $total_marks = 500;
      echo "<br>Total marks: 500";
      $percent = $total / 5;
      echo "<br>Percentage: " . $percent;
      echo "</h3>";

      //Add to database
      $stmt = $connect->prepare("INSERT INTO class1(`name`,sub1,sub2,sub3,sub4,sub5,`total obtained`,`total marks`,`percent`) VALUES (?,?,?,?,?,?,?,?,?)");
      $stmt->bind_param("siiiiiiid", $_POST['name'], $_POST['sub1'], $_POST['sub2'], $_POST['sub3'], $_POST['sub4'], $_POST['sub5'], $total, $total_marks, $percent);
      if ($stmt->execute()) {
        echo "<br>Record added successfully";
      } else {
        echo "<br>Record not added. Please try again.";
      }
    }
    ?>
  </form>
</body>

</html>