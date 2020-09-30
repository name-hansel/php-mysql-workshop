<html>

<body>
  <form action="q6_1_special_variables_html.php" method="GET">
    <label>Side 1</label><input name="side1" />
    <label>Side 2</label><input name="side2" />
    <label>Side 3</label><input name="side3" />
    <button type="submit">Submit</button>
  </form>
</body>

<?php

if (isset($_GET['side1']) && isset($_GET['side2']) && isset($_GET['side3'])) {
  echo 'The triangle is ';
  getTriangle($_GET['side1'], $_GET['side2'], $_GET['side3']);
}

function getTriangle($x, $y, $z)
{
  if ((pow($x, 2) + pow($y, 2) == $z) || (pow($y, 2) + pow($z, 2) == $x) || (pow($x, 2) + pow($z, 2) == $y)) {
    echo "Right-angled ";
  }
  if ($x == $y || $y == $z || $x == $z) {
    if ($x == $y && $y == $z) {
      echo "Equilateral";
    } else {
      echo "Isosceles";
    }
  } else {
    echo "Scalene";
  }
}

?>

</html>