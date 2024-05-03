<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Page</title>
    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="/newproject/assets/style.css">
    <style>
    
        .hidden {
            display: none;
        }
    </style>
    
</head>
<body>
<?php 
         include "../userHeader.php";
         include "../sidebar.php";
?>   

    <div class="containers">
        <div class="complainWrapper">
    
        <div class="title"> View Complaints</div>
            <!-- Button to toggle complaint form visibility -->
            <button class="AddComplainButton" onclick="toggleComplaintForm()">Add Complaint</button>
        
        <!-- Complaint submission form -->
        <form id="complaintForm" action="complainUser.php" method="post" class="hidden">
                
                    <textarea id="complaint" name="complaint" placeholder="write complain" required></textarea><br>
                    <input type="submit" value="Submit Complaint">
                
            </form>
            <div>
                
                <!-- Complaint status section -->
                <h2>Complaint Status</h2>
                <?php
    // Include the PHP code to display complaint status
    require_once('complainStatus.php');
    
    ?>
    </div>    
</div>
</div>
<script>
        // Function to toggle visibility of complaint form
        function toggleComplaintForm() {
            var complaintForm = document.getElementById('complaintForm');
            complaintForm.classList.toggle('hidden');
        }
    </script>
     <script type="text/javascript" src="../assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    
</body>
</html>

<