
<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $name = $_GET["name"];
        $email = $_GET["email"];
        $message = $_GET["message"];

        // Connect to the database
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "myDB";

        // Create connection
        $conn = new mysqli($host, $user, $password, $dbname);

        // connection check garca
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into database
        $sql = "INSERT INTO formTable(name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully in database ok";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>
