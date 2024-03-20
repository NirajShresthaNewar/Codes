<?php
// Task 2: Demonstrating the use of $GLOBALS
$x = 5;
$y = 10;

function addition() {
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}

addition();
echo $z."<br>";
?>