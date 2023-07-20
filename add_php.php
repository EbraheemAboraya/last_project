<?php
include "connect_sql.php";
include "config.php";
header("Cache-Control: no-cache, no-store", true);
 session_start();
if (!isset($_SESSION['user_id'])) {

    header('Location:' .URL. 'login.php');
}




if (isset($_GET['building_id']) && $_GET['building_id'] !== '') {
    $buildingId = $_GET['building_id'];
}

if (isset($_GET['building_Name']) && $_GET['building_Name'] !== '') {
    $building_Name = $_GET['building_Name'];
}

if (isset($_GET['status']) && $_GET['status'] !== '') {
    $status = $_GET['status'];
}

if (isset($_GET['floor']) && $_GET['floor'] !== '') {
    $floor = $_GET['floor'];
}

if (isset($_GET['apartment_number']) && $_GET['apartment_number'] !== '') {
    $apartmentNumber = $_GET['apartment_number'];
}

if (isset($_GET['location']) && $_GET['location'] !== '') {
    $location = $_GET['location'];
}

if (isset($_GET['address']) && $_GET['address'] !== '') {
    $address = $_GET['address'];
}

if (isset($_GET['city']) && $_GET['city'] !== '') {
    $city = $_GET['city'];
}

if (isset($_GET['bool']) && $_GET['bool'] !== '') {
    $bool = $_GET['bool'];
}









if($bool == "3"){
    $img = "images/defaul-building.png";
    $sql = "INSERT INTO tbl_219_buildings (building_id, building_Name, status, location, address, floor, apartment_number, city,image) 
    VALUES ('$buildingId', '$building_Name', '$status', '$location', '$address', '$floor', '$apartmentNumber', '$city','$img')";
    $result = mysqli_query($con, $sql);
    header('Location:' .URL. 'index.php');

}


else if ($bool == "2") {
    $sql = "UPDATE tbl_219_buildings SET status = '$status', floor = '$floor', apartment_number = '$apartmentNumber' WHERE building_id = '$buildingId'";
    $result = mysqli_query($con, $sql);
   
    header('Location:' .URL. 'object.php?building_id=$buildingId');

} 

else {

    echo $buildingId;
    $sql = "delete from tbl_219_buildings where building_id = '$buildingId'";
    
    $result = mysqli_query($con, $sql);
    header('Location' .URL . 'index.php');
}

$con->close();
?>
