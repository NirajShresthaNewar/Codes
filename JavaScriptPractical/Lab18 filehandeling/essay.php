<?php
// Reading and Counting Words from "essay.txt"
$file = fopen("essay.txt", "r");
$wordCount = 0;
while (!feof($file)) {
    $char = fgetc($file);
    if ($char == " " || $char == "\n") {
        $wordCount++;
    }
}
fclose($file);
echo "Word count: ".$wordCount;
?>
