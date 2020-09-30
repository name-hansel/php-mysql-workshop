<?php
$a = array(
  array(1, 2),
  array(3, 4)
);

$b = array(
  array(5, 6),
  array(7, 8)
);

$s = array();

for ($r = 0; $r < 2; $r++) {
  for ($c = 0; $c < 2; $c++) {
    $s[$r][$c] = $a[$r][$c] + $b[$r][$c];
  }
}

print_r($s);
