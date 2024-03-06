<?php
    $Array=array(

        "Niraj"=>100,
        "raj"=>20.3,
        "hem"=>50
    );
    $ArrSize=count($Array);
    $total=0;
    foreach ($Array as $Name => $Marks) {
        $total+=$Marks;
    }
echo"The Average marks is:" .$total/2;
?>