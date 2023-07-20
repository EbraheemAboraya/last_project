<?php
    $host = "148.66.138.145";
    $username = "dbusrShnkr23";
    $password = "studDBpwWeb2!";
    $dbname = "dbShnkr23stud2";

    $con = mysqli_connect($host, $username, $password, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT  building_Name,building_id,location,status,image FROM tbl_219_buildings";
    $result = mysqli_query($con, $sql);
    ?>