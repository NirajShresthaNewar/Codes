<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reader Details</title>
</head>
<body>

<h2>Add Reader Details</h2>

<?php
require_once('../../../connection/config.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form is submitted, handle insertion of reader details

    // Retrieve admin ID from session
    $admin_id = $_SESSION['admin_id'];

    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Insert reader details into the database
    $sql = "INSERT INTO reader (admin_id, username, email, password, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("issss", $admin_id, $username, $email, $password, $phone);

    if ($stmt->execute()) {
        echo "Reader details inserted successfully!";
    } else {
        echo "Error inserting reader details: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Display the form for adding reader details
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <button type="submit">Submit</button>
    </form>
    <?php
}
?>

</body>
</html>
