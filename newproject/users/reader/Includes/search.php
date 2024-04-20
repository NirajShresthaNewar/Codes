<?php
// Establish MySQL connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wbillingsystem";
//$dbname = "waterbillingsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from the form
    $userId = $_POST["userId"];

    // Fetch last meter reading for the user from the database
    $query = "SELECT current_reading_value, current_reading_date FROM meter_reading WHERE user_id = ? ORDER BY current_reading_date DESC LIMIT 1";
    $statement = $conn->prepare($query);
    $statement->bind_param('i', $userId);
    $statement->execute();
    $result = $statement->get_result();

    // If user ID exists in database
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $prevReading = $row['current_reading_value'];
        $prevDate = $row['current_reading_date'];
    } else {
        // User ID not found in database
        echo '<script>';
        echo 'alert("User id does not exist!");';
        echo 'window.location.href="reader.php";';
        echo '</script>';

       
        
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Current Reading</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       
       <link rel="stylesheet" href="../assets/css/style.css"></link>
</head>
<body>
    <h2>Enter Current Reading</h2>
    <form action="update.php" method="POST">
        <label for="prevReading">Previous Reading:</label>
        <input type="text" id="prevReading" name="prevReading" value="<?php echo $prevReading; ?>" readonly>
        <label for="prevDate">Previous Reading Date:</label>
        <input type="text" id="prevDate" name="prevDate" value="<?php echo $prevDate; ?>" readonly>
        <label for="currReading">Current Reading:</label>
        <input type="text" id="currReading" name="currReading" required>
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
        <input type="submit" value="Submit">
    </form>
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>