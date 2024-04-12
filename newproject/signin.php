<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wbillingsystem";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve email and password from the sign-in form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Query the database to check if the email and password exist
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        
        // Check if the connection is successful
        if ($conn) {
            $result = mysqli_query($conn, $sql);

            // Check if a matching record is found
            if ($result && mysqli_num_rows($result) == 1) {
                // Redirect the user to the main page
                header("Location: ../ebill/user/index.php");
                exit();
            } else {
                // Display an error message
                echo "Incorrect email or password. Please try again.";
            }
        } else {
            // Display an error message if connection fails
            echo "Failed to connect to the database.";
        }
    }
?>