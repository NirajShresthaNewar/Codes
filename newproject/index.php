<?php 
require_once("connection/config.php");
require_once("connection/session.php");
// if ($count===0) {
//     $err_login="There were some problem";
// }
if(isset($_SESSION['logged']))
{
    if ($_SESSION['logged'] == true)
    {
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
        header("Location:index.php");
      }  
}

if(isset($_POST['login_submit'])) {
    if(!(isset($_POST['email']))) {
        if(!(isset($_POST['pass']))) {
            location('index.php');    
        }
    }
}


if(isset($_SESSION['logged']))
{
    if ($_SESSION['logged'] == false)
    {
		header("Location:login.php");
	}
}
?>


