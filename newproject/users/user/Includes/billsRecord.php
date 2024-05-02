<?php
// Step 1: Connect to the database
require_once('../../../connection/config.php'); 

// Step 2: Retrieve userid through session
require_once('../../../connection/session.php'); 
$user_id =  $_SESSION['uid']; 


$sql = "SELECT b.bill_id,b.tariff_id, m.previous_reading_value, m.current_reading_value, b.units, b.total_amount, b.payment_status
        FROM bill b
        JOIN meter_reading m ON b.reading_id = m.reading_id
        WHERE b.user_id = $user_id
        AND b.payment_status = 'paid'";

$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Bills</title>
    <link rel="stylesheet" href="../../../assets/style.css">
</head>
<body>

<?php
// Step 3: Display bills in a table
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<thead><tr><th>Bill ID</th><th>Previous Reading</th><th>Current Reading</th><th>Units</th><th>Rate</th><th>Total Amount</th><th>Status</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        $tariff_id = $row['tariff_id'];
        $tariff_rate_sql = "SELECT additional_charge_rate FROM tariff WHERE tariff_id = $tariff_id";
        $tariff_result = $con->query($tariff_rate_sql);
        $tariff_row = $tariff_result->fetch_assoc();
        $tariff_rate = $tariff_row['additional_charge_rate'];

        echo "<tr>";
        echo "<td>" . $row['bill_id'] . "</td>";
        echo "<td>" . $row['previous_reading_value'] . "</td>";
        echo "<td>" . $row['current_reading_value'] . "</td>";
        echo "<td>" . $row['units'] . "</td>";
        echo "<td>" . $tariff_rate. "</td>";
        echo "<td>" . $row['total_amount'] . "</td>";
        echo "<td>" . $row['payment_status'] . "</td>";    
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No bills found for this user.";
}
?>

</body>
</html>
