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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="container">
       
        <div class="titlebillsPaid">

            Paid Bills
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Bill ID</th>
                    <th>Previous Reading</th>
                    <th>Current Reading</th>
                    <th>Units</th>
                    <th>Rate</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
<?php
// Step 3: Display bills in a table
if ($result->num_rows > 0) {
?>
<?php
    while($row = $result->fetch_assoc()) {
        $tariff_id = $row['tariff_id'];
        $tariff_rate_sql = "SELECT additional_charge_rate FROM tariff WHERE tariff_id = $tariff_id";
        $tariff_result = $con->query($tariff_rate_sql);
        $tariff_row = $tariff_result->fetch_assoc();
        $tariff_rate = $tariff_row['additional_charge_rate'];
?>
        <tr>
            <td><?php echo $row['bill_id']; ?></td>
            <td><?php echo $row['previous_reading_value']; ?></td>
            <td><?php echo $row['current_reading_value']; ?></td>
            <td><?php echo $row['units']; ?></td>
            <td><?php echo $tariff_rate; ?></td>
            <td><?php echo $row['total_amount']; ?></td>
            <td><?php echo $row['payment_status']; ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
</div>
<?php
} else {
    echo "No bills found for this user.";
}
?>

</body>
</html>
