<?php
    $con = mysqli_connect("localhost","root","","crud");
    if($con == false){
        die("Connectiin Error" . mysqli_connect_error());
    }
?>