<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userId = $_POST["userId"];
    $prevReading = $_POST["prevReading"];
    $prevDate = $_POST["prevDate"];
    $currReading = $_POST["currReading"];
    $currentDate = date("Y-m-d"); // Get current date

    // Update meter reading in database
    $query = "INSERT INTO meter_reading (user_id, previous_reading_value, previous_reading_date, current_reading_value, current_reading_date) VALUES (?, ?, ?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->bind_param('idsss', $userId, $prevReading, $prevDate, $currReading, $currentDate);
    $statement->execute();

    // Fetch the tariff rate based on the tariff ID associated with the user
    $query = "SELECT additional_charge_rate	 FROM tariff WHERE tariff_id = 1";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tariffRate = $row['additional_charge_rate'];
        $unit=$currReading - $prevReading;
        $billAmount =  $unit * $tariffRate;
    } 

    //fetching reading id
    $query ="select max(reading_id) as latestReadingId from meter_reading";
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $reading_id=$row['latestReadingId'];
    } 
    else{
        echo "reading meter id failed";
    }


    // Update bill details in database
    
    $query = "INSERT INTO bill (reading_id,user_id,tariff_id,units,total_amount) VALUES ($reading_id,$userId,1,$unit,$billAmount)";
    $statement = $conn->prepare($query);
    
   if($statement->execute()){
    if(!$statement->affected_row>0){
        echo '<script>';
        echo 'alert("Meter reading and bill updated successfully.!");';
        echo 'window.location.href="reader.php";';
        echo '</script>';

    }


   } 
    
        // User ID not found in database

       
        
    

    echo "Meter reading and bill updated successfully.";
}

// Close connection
$conn->close();
?>