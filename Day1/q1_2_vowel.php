<?php
$letter = 's';

switch ($letter) {
  case 'a':
  case 'A':
  case 'e':
  case 'E':
  case 'i':
  case 'I':
  case 'o':
  case 'O':
  case 'u':
  case 'U':
    echo $letter;
    break;
  default:
    echo 'Consonant';
}
