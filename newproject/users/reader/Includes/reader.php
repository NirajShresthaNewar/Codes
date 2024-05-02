<?php
    require_once('../../../connection/config.php'); 
    //require_once('../../../connection/session.php'); 
    include "../readerHeader.php";
    include "../sidebar.php";

    //if ($logged==false) {
    //     header("Location:../../index.php");
    //}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meter Reading Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="/newproject/users/reader/assets/css/style.css"></link>
</head>
<body>
    <h2>Enter Meter Reading</h2>
    <form action="search.php" method="POST">
        <label for="userId" >User ID:</label>
        <input type="text" id="userId" name="userId" required>
        <input type="submit" value="Search">
    </form>

    <script type="text/javascript" src="../assets/js/script.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
