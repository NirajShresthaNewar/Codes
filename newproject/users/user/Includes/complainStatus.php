<?php
//  Connect to the database
require_once('../../../connection/config.php'); 

// retriving user id
require_once('../../../connection/session.php');
$user_id =  $_SESSION['uid']; 





//  Retrieve complaints from the database
$sql = "SELECT c.complain_id, c.complain_text, c.complain_date, c.resolved
        FROM complain c 
        INNER JOIN user u ON c.user_id = u.user_id
        WHERE c.user_id = ?
        ORDER BY c.complain_date DESC";
// fetching the complain and userdata
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();


// Check if there are complaints
if ($result->num_rows > 0) {
    // Display complaints in a table
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
 </head>
 <body>
    
 </body>
 </html>
<div>

    <h2>Complaints</h2>
    <div class="container">

        <table  id="TableComplaintcss">
            <tr><th>Complaint ID</th><th>Complaint</th><th>Date</th><th>Action</th></tr>
            <?php   
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['complain_id'] . "</td>";
        echo "<td>" . $row['complain_text'] . "</td>";
        echo "<td>" . $row['complain_date'] . "</td>"; 
        if($row['resolved']==1){
            echo "<td>Resolved</td>";      
        }else {
            echo "<td>Pending </td>";      
        }
        echo "</tr>";
    }
    ?>
    </table>
</div>
    </div>
    <?php
} else {
    echo "No ` complaints found.";
}

// Close the database connection
$con->close();
?>