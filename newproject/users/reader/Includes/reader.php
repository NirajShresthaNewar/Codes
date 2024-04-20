
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meter Reading Form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
       <link rel="stylesheet" href="../assets/css/style.css"></link>
    </head>
    <body>
        <?php
    require_once('../../../connection/config.php'); 
    //require_once('../../../connection/session.php'); 
    include "../readerHeader.php";
    include "../sidebar.php";

    //if ($logged==false) {
    //     header("Location:../../index.php");
    //}
    ?>



>
<h2>Enter Meter Reading</h2>
<form action="search.php" method="POST">
        <label for="userId" >User ID:</label>
        <input type="text" id="userId" name="userId" required>
        <input type="submit" value="Search">
    </form>
    

        <script type="text/javascript" src="../assets/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    </body>
    </html>
    