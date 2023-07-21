<?php

include "connect_sql.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $apartmentId = $_GET['apartment_id'];
    $apartmentFloor = $_GET['apartment_floor'];
    $devices = $_GET['devices'];
    $bool = $_GET['bool'];
    
    $sql = "UPDATE tbl_219_apartment SET apartment_floor = '$apartmentFloor', devices = '$devices' WHERE apartment_id = '$apartmentId'";
    $result = mysqli_query($con, $sql);
    header('Location: index.php');
    
}
?>