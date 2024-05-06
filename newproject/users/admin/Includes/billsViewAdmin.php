
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bills</title>
    <!-- <link rel="stylesheet" href="../../../assets/style.css"> Link to your external CSS file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/newproject/users/admin/assets/css/style.css"></link>
</head>
<body>

<?php 
         include "../adminHeader.php";
         include "../sidebar.php";
?>  


<div class="container m-11" >

    
    <!-- Filter Form -->
    <h2>Bills</h2>
    <form method="GET" id="filterForm">
        <!-- <label for="user_filter">Filter by User ID or Email:</label>-->
        
                    
                    <input type="text" class="search"  id="user_filter" name="user_filter" placeholder="Id or Email" value="<?php echo isset($_GET['user_filter']) ? $_GET['user_filter'] : ''; ?>">
                    <!--<i class="fa fa-search"></i> -->                   
                    <button class="btn btn-primary" type="submit">Filter</button>
                    <button class="btn btn-danger" type="button" onclick="resetFilter()">Reset</button>
               
    
      
    </form>
</div>




<?php
// Step 1: Connect to the database
require_once('../../../connection/config.php');

// Step 2: Retrieve bills from the database based on filter, if provided
$filter = isset($_GET['user_filter']) ? $_GET['user_filter'] : '';
$sql = "SELECT b.bill_id, b.user_id,b.units,b.tariff_id,b.total_amount, b.payment_status, u.email,r.reading_id,
               r.previous_reading_value, r.previous_reading_date,
               r.current_reading_value, r.current_reading_date
        FROM bill b
        INNER JOIN user u ON b.user_id = u.user_id
        LEFT JOIN meter_reading r ON b.reading_id = r.reading_id";

if (!empty($filter)) {
    // Add filter condition to SQL query
    $sql .= " WHERE b.user_id = '$filter' OR u.email = '$filter'";

    // Modify based on your filter criteria
}

$result = $con->query($sql);

// Step 3: Display bills in a table
if ($result->num_rows > 0) {
   
    ?>
    <div class="container">

        <table class="table" >
            <thead>
                <tr>
                    <th scope="col">Bill ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Previous Reading</th>
                    <th scope="col">Current Reading</th>
                    <th scope="col">Units</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col ">Operations</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()):
                 $tariff_id = $row['tariff_id'];
                 $tariff_rate_sql = "SELECT additional_charge_rate FROM tariff WHERE tariff_id = $tariff_id";
                 $tariff_result = $con->query($tariff_rate_sql);
                 $tariff_row = $tariff_result->fetch_assoc();
                 $tariff_rate = $tariff_row['additional_charge_rate'];
                 ?>
                <tr>
                    <td><?= $row['bill_id'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['previous_reading_value'] ?></td>
                    <td><?= $row['current_reading_value'] ?></td>
                    <td><?= $row['units'] ?></td>
                    <td><?= $tariff_rate ?></td>
                    <td><?= $row['total_amount'] ?></td>
                    <td><?= $row['payment_status'] ?></td>
                    <td class="w-50">
                        <!-- Update button redirect to update page -->
                        <!-- Inside the while loop where bills are displayed  update button is created 
                        and the form is created to send the bill data to billUpdateAdmin.php page -->
                        
                        
                        
                        <form id="dataForm<?= $row['bill_id'] ?>" method="post" action="billUpdateAdmin.php" style="display: none;">
                            <!-- Hidden inputs with data from the current row -->
                            <input type="hidden" name="bill_id" value="<?= $row['bill_id'] ?>">
                            <input type="hidden" name="units" value="<?= $row['units'] ?>">
                            <input type="hidden" name="tariff_rate" value="<?= $tariff_rate ?>">
                            <input type="hidden" name="total_amount" value="<?= $row['total_amount'] ?>">
                            <input type="hidden" name="payment_status" value="<?= $row['payment_status'] ?>">
                            <input type="hidden" name="previous_reading_value" value="<?= $row['previous_reading_value'] ?>">
                            <input type="hidden" name="previous_reading_date" value="<?= $row['previous_reading_date'] ?>">
                            <input type="hidden" name="current_reading_value" value="<?= $row['current_reading_value'] ?>">
                            <input type="hidden" name="current_reading_date" value="<?= $row['current_reading_date'] ?>">
                            <input type="hidden" name="reading_id" value="<?= $row['reading_id'] ?>">
                        </form>
                        <!-- Button to trigger form submission -->
                        <button class="btn btn-primary" type="button" onclick="submitForm('dataForm<?= $row['bill_id'] ?>')">Update</button>
                        
                        
                        <!-- Delete button to delete page -->
                        <button class="btn btn-danger" type="button" onclick="deleteBill(<?= $row['reading_id'] ?>)">Delete</button>
                    </td>
                </tr>
            </div>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php
} else {
    echo '<script>';
    echo 'alert("User id does not exist!");';
    echo 'window.location.href="../index.php";';
    echo '</script>';
    
    
}

// Close the database connection
$con->close();
?>
<script>
    function resetFilter() {
        // Reset the filter input field
        document.getElementById('user_filter').value = '';
        
        // Submit the form to reset the filter
        document.getElementById('filterForm').submit();
        // Check if table has rows, if not, alert and redirect to old form
    }
    function submitForm(formId) {
        document.getElementById(formId).submit();    
}

function deleteBill(readingId) {
        if (confirm('Are you sure you want to delete this bill?')) {
            // Create a hidden form with the bill ID
            var form = document.createElement('form');
            form.method = 'post';
            form.action = 'billDeleteProcess.php'; // PHP script to handle deletion

            // Create a hidden input field for the bill ID
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'reading_id';
            input.value = readingId;

            // Append the input field to the form
            form.appendChild(input);

            // Append the form to the document and submit it
            document.body.appendChild(form);
            form.submit();
        }
    }
    
</script>
<script type="text/javascript" src="../assets/js/script.js"></script>
    


</body>
</html>
