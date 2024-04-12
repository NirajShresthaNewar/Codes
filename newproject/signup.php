<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load Composer's autoloader


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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if name, email, password, contact_num, and address are set in the $_POST array
    if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['contact_num'], $_POST['address'])) {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $contact_num = $_POST['contact_num']; // Changed to use contact_num instead of phone
        $address = $_POST['address'];

        // Check if email already exists
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Email already exists";
        } else {
            // Generate OTP
            $otp = rand(1000, 9999);

            // Insert user data into the database
            $sql = "INSERT INTO user (username, email, password, otp, contact_num, address) 
                    VALUES ('username', '$email', '$password', '$otp', '$contact_num', '$address')";
            if ($conn->query($sql) === TRUE) {
                // Store OTP in session
                session_start(); // Start the session
                $_SESSION['otp'] = str_split($otp); // Convert OTP to an array for easier comparison

                // Send OTP email
                sendOTP($email, $otp);

                // Redirect to OTP verification page
                header("Location: otp.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Please fill in all required fields.";
    }
}

// Close connection
$conn->close();

// Function to send OTP email
function sendOTP($email, $otp) {
    $mail = new PHPMailer(true);
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'serjoramos4444@gmail.com'; // Update with your email
        $mail->Password = 'ymlgikngcfcnznel'; // Update with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipient
        $mail->setFrom('your_email@gmail.com', 'Your Name'); // Update with your email and name
        $mail->addAddress($email);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'OTP Verification';
        $mail->Body = 'Your OTP is: ' . $otp;

        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Water-Billing System</title>
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="signup.php" method="post">
                <h1>Create Account</h1>
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="text" name="contact_num" placeholder="Contact Number"> <!-- Changed to contact_num -->
                <input type="text" name="address" placeholder="Address"> <!-- Added address field -->
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="signin.php" method="post">
                <h1>Sign In</h1><br><br>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>
