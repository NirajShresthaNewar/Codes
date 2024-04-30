<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Page</title>
    <style>
        textarea {
            width: 100%;
            height: 100px;
        }
        .hidden {
            display: none;
        }
    </style>
    <script>
        // Function to toggle visibility of complaint form
        function toggleComplaintForm() {
            var complaintForm = document.getElementById('complaintForm');
            complaintForm.classList.toggle('hidden');
        }
    </script>
</head>
<body>
    <div>

        <h2>Add Complaint</h2>
        <!-- Button to toggle complaint form visibility -->
        <button onclick="toggleComplaintForm()">Add Complaint</button>
        
        <!-- Complaint submission form -->
        <form id="complaintForm" action="complainUser.php" method="post" class="hidden">
            <label for="complaint">Complaint:</label><br>
            <textarea id="complaint" name="complaint" required></textarea><br>
            <input type="submit" value="Submit Complaint">
        </form>
    </div>
    <div>

        <!-- Complaint status section -->
        <h2>Complaint Status</h2>
        <!-- Here you can include the PHP code to display the user's complaints -->
        <?php
    // Include the PHP code to display complaint status
    require_once('complainStatus.php');
    
    ?>
    </div>    
</body>
</html>

<