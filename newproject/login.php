<?php
require_once("connection/session.php");

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
                <input type="text" name="contact_num" placeholder="Contact Number"> <!-- Added contact number field -->
                <input type="text" name="address" placeholder="Address"> <!-- Added address field -->
        <select id="admin_id" name="admin_id" required>
            <option value="1">Admin 1</option>
            <option value="2">Admin 2</option>
            
        </select><br>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="connection/session.php" method="post">
                <h1>Sign In</h1><br><br>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Water-Billing System</h1>
                    <p>Efficiency Flows Through Every Drop</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Water-Billing System</h1>
                    <p>Billing Made Simple, Water Conservation Made Easy</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>
