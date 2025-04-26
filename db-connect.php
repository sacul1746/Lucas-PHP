<?php
    //connecting to database
    $conn= mysqli_connect('localhost', 'Lucas', 'icode1234', 'OOS_Database');

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>
