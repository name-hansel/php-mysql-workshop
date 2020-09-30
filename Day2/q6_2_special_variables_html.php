<html>

<body>
  <form action="q6_2_special_variables_html.php" method="POST">
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
      echo "<br>Total marks: 500";
      echo "<br>Percentage: " . $total / 5;
      echo "</h3>";
    }
    ?>
  </form>
</body>

</html>