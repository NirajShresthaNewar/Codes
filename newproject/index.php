<?php 
require_once("connection/config.php");
include "connection/session.php";


if(isset($_SESSION['logged']))
{echo "INSIDE1";
    if ($_SESSION['logged'] == true)
    {echo "INSIDE";
        if ($_SESSION['account']=="admin") {
                header("Location:users/admin/index.php");
            }
        elseif ($_SESSION['account']=="user") {
                header("Location:users/user/index.php");
            }
			elseif ($_SESSION['account']=="user") {
                header("Location:users/reader/index.php");
            }
    }  
    else {
        //header("Location:index.php");
		header("Location:login.php");
      }  
}




?>




