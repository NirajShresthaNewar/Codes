<!DOCTYPE html>
<html>
<head>
    <title>PHP Basic Lab</title>
</head>
<body>
    <?php
        // Task a: Display "Hello, World!"
        echo "a. Hello, World!<br>";

        // Task b: Calculate and display the area of a rectangle
        $length = 5;
        $width = 3;
        $area = $length * $width;
        echo "b. Area of the rectangle: " . $area . "<br>";

        // Task c: Swap values of two variables without using a temporary variable
        $a = 5;
        $b = 10;
        echo "c. Before swapping: a = " . $a . ", b = " . $b . "<br>";
        $a = $a + $b;
        $b = $a - $b;
        $a = $a - $b;
        echo "After swapping: a = " . $a . ", b = " . $b . "<br>";

        // Task d: Demonstrate logical operators with conditional statements
        $x = 10;
        $y = 5;
        echo "d. ";
        if ($x > 0 && $y > 0) {
            echo "Both x and y are positive.";
        } elseif ($x > 0 || $y > 0) {
            echo "At least one of x or y is positive.";
        } else {
            echo "Neither x nor y is positive.";
        }
        echo "<br>";

        // Task e: Display the day of the week based on a numeric input using a switch statement
        $day = 3;
        echo "e. ";
        switch ($day) {
            case 1:
                echo "Monday";
                break;
            case 2:
                echo "Tuesday";
                break;
            case 3:
                echo "Wednesday";
                break;
            case 4:
                echo "Thursday";
                break;
            case 5:
                echo "Friday";
                break;
            case 6:
                echo "Saturday";
                break;
            case 7:
                echo "Sunday";
                break;
            default:
                echo "Invalid day";
        }
        echo "<br>";

        // Task f: Display the first 10 natural numbers using a while loop
        echo "f. ";
        $i = 1;
        while ($i <= 10) {
            echo $i . " ";
            $i++;
        }
        echo "<br>";

        // Task g: Display array elements using a loop
        echo "g. ";
        $countries = array("USA", "Canada", "UK", "Germany", "France");
        foreach ($countries as $country) {
            echo $country . " ";
        }
        echo "<br>";

        // Task h: Display all elements of a numeric array using a foreach loop
        echo "h. ";
        $numbers = array(1, 2, 3, 4, 5);
        foreach ($numbers as $number) {
            echo $number . " ";
        }
        echo "<br>";
    ?>
</body>
</html>
