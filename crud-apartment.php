<?php
include "connect_sql.php";
include "config.php";
header("Cache-Control: no-cache, no-store", true);
 session_start();
if (!isset($_SESSION['user_id'])) {

    header('Location:' .URL. 'login.php');
}

$sql4 = "SELECT apartment_id FROM tbl_219_apartment ORDER BY apartment_id DESC LIMIT 1 ";
$result4 = mysqli_query($con, $sql4);

if ($result4 && mysqli_num_rows($result4) > 0) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result4);
    // Access the apartment_id value from the fetched row

    $apartment_Idd = $row['apartment_id'];
} else {
    // Handle the case when there is no result or no apartment_id found
    $apartment_Idd = 1; // Set the initial value to 1 or any desired starting value

}






// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the form data
    $buildingId = $_GET['building_id'];
    $apartmentFloor = $_GET['apartment_floor'];
    $selectedDevices = $_GET['selected_devices'];

    // Perform any necessary validation or processing of the data

    // Insert the data into the database
    // Use appropriate SQL statements to insert the data into the desired table

    // Example of inserting the apartment data into a table called 'apartments'
    if ($apartment_Idd === 1) {
        // Insert the data into the database with the apartment_id explicitly set to 0
        $sql = "INSERT INTO tbl_219_apartment (apartment_id, building_id, apartment_floor) VALUES ('$apartment_Idd', '$buildingId', '$apartmentFloor')";
    }

    else{
        $sql = "INSERT INTO tbl_219_apartment ( building_id, apartment_floor) VALUES ( '$buildingId', '$apartmentFloor')";
    }
    $result1 = mysqli_query($con, $sql);
    

    $sql2 = "UPDATE tbl_219_buildings SET apartment_number = apartment_number + 1 WHERE building_id = '$buildingId'";
    $result2 = mysqli_query($con, $sql2);
    // Execute the SQL statement using the appropriate database connection
    // Replace 'your_db_connection' with the actual database connection code
    // For example: $conn->query($sql) for MySQLi

    // Insert the selected devices into a separate table if needed
    // Iterate over the selected devices and perform necessary database operations
    foreach ($selectedDevices as $selectedDevice) {
        // Example of inserting selected devices into a table called 'apartment_devices'
        $deviceSql = "INSERT INTO tbl_219_devices (apartment_id,name) VALUES ('$apartment_Idd','$selectedDevice')";
        
        // Execute the device SQL statement using the appropriate database connection
        // Replace 'your_db_connection' with the actual database connection code
        // For example: $conn->query($deviceSql) for MySQLi
        $result3 = mysqli_query($con, $deviceSql);
    }
    header('Location:' .URL. 'index.php');


    // Redirect the user to a success page or perform any other necessary actions
    // For example: header('Location: success.php');
}
?>