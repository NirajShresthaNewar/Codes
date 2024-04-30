
<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body >
    
      <?php 
    require_once('../../connection/config.php'); 
    require_once('../../connection/session.php'); 
  
	 include "./adminHeader.php";
     include "./sidebar.php";

    if ($logged==false) {
         header("Location:../../index.php");
    }
?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                   <a href="./Includes/billsViewAdmin.php"><i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                       <h4 style="color:white;">Bills view</h4>
                       
                     </a> 
                       
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
            <a href="./Includes/complaintView.php"><i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                <h4 style="color:white;">complain view</h4>
                </a>        
                    
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
            <a href="Includes/addReader.php">

                <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                <h4 style="color:white;">Add Meter Reader</h4>
                </a>     
                </div>
            </div>
         
        </div>
        
    </div>
       
            
       


       
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>