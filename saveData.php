<?php
    header('Access-Control-Allow-Origin: *');
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $databaseName = "scandiwebaddproduct";
    $conn= new mysqli($serverName, $userName, $password, $databaseName,8111) 
    or die( "Connection Failed:" .mysqli_error());

    $trp = mysqli_query($conn, "SELECT * from products");
    $rows = array();
    while($r = mysqli_fetch_assoc($trp)) {
        $rows[] = $r;
    }
    print json_encode($rows);
?>