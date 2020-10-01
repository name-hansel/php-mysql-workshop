<?php
$s = readline('Enter a string: ');
echo "Number of characters: " . strlen($s);
echo "\nString to array: ";
print_r(explode(" ", $s));
echo "\nReverse: " . strrev($s);
echo "\nLowercase: " . strtolower($s);
echo "\nUppercase: " . strtoupper($s);
// Consider string as "Hello World"
$sub = "Hello";
echo "\nReplace with A: " . substr_replace($s, "Aloha", 0, 5);
