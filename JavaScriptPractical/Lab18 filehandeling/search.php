<?php
// Task 7: Reading Lines from "search.txt" until encountering "STOP"
$file = fopen("search.txt", "r");
while (!feof($file)) {
    $line = fgets($file);
    if (trim($line) == "STOP") {
        break;
    }
    echo $line."<br>";
}
fclose($file);
?>