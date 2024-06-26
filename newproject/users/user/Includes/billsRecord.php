<?php
require_once('../../../connection/config.php');
require_once('../../../connection/session.php');

$user_id = $_SESSION['uid'];

// Fetch paid bills
$sql = "SELECT b.bill_id, b.tariff_id,b.charge_id, m.previous_reading_value, m.current_reading_date, m.current_reading_value, b.units, b.total_amount, b.payment_status, b.due_date, b.charge_id
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
    <link rel="stylesheet" href="../../../assets/style.css"> <!-- Link to your external CSS file -->
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Link to your external CSS file -->
</head>
<body>
    
<?php 
include "../userHeader.php";
include "../sidebar.php";
?>   

<div class="container">
    <div class="title">
        <h1>Paid Bills</h1>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Bill ID</th>
                <th>Previous Reading</th>
                <th>Current Reading</th>
                <th>Units</th>
                <th>Additional Charge(%)</th>
                <th>Charged Amount</th>
                <th>Due Date</th>
                <th>Total Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                    // Fetching tariff details for the user's bill
                    $tariff_id = $row['tariff_id'];
                    $tariff_sql = "SELECT * FROM tariff WHERE tariff_id = $tariff_id";
                    $tariff_result = $con->query($tariff_sql);
                    $tariff_row = $tariff_result->fetch_assoc();
                    $unit_price = $tariff_row['unit_price'];
                    $base_fee = $tariff_row['base_fee'];
                    
                    // Fetch additional charge details
                    $additional_charge_percent = 0;
                    $additional_charge = 0;
                    $charge_id = $row['charge_id'];
                    if ($charge_id !== null) {
                        $charge_sql = "SELECT * FROM additional_charge WHERE charge_id = $charge_id";
                        $charge_result = $con->query($charge_sql);
                        if ($charge_result && $charge_result->num_rows > 0) {
                            $charge_row = $charge_result->fetch_assoc();
                            $additional_charge_percent = $charge_row['charge_percent'];
                            $additional_charge = ($row['total_amount'] * $additional_charge_percent) / 100;
                        }
                    }

                    ?>
                    
                    <tr>
                        <td><?= $row['bill_id'] ?></td>
                        <td><?= $row['previous_reading_value'] ?></td>
                        <td><?= $row['current_reading_value'] ?></td>
                        <td><?= $row['units'] ?></td>
                        <td><?= $additional_charge_percent ? $additional_charge_percent . '%' : 'No Additional Charge' ?></td>
                        <td><?= $additional_charge ? 'Rs ' . $additional_charge : 'No Additional Charge' ?></td>
                        <td><?= $row['due_date'] ?></td>
                        <td><?= 'Rs ' . $row['total_amount'] ?></td>
                         <td><?= $row['payment_status'] ?></td>
                    </tr>
                
                <?php }
            } else { ?>
                <tr>
                    <td colspan="9">No paid bills found for this user.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>
