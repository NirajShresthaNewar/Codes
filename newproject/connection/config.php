<?php
    $host='localhost'; # MySQL Host
    $mysql_user="root";# MySql Username
    $mysql_pwd=""; # MySql Password
   // $dbms="waterbillingsystem"; # Database
    $dbms="wbillingsystem"; # Database

    $con = mysqli_connect($host,$mysql_user,$mysql_pwd,$dbms);
    if (!$con) die('Could not connect: ' . mysql_error());
	if($con){echo "connected";}
    mysqli_select_db($con,$dbms) or die("cannot select DB" . mysql_error());
?>