<?php 
    $connect = mysqli_connect("localhost","root","","ajax_jsp_jdbc","3308");
    if(!$connect){
        die("Could not connect" . mysqli_connect_error());
    }
?>