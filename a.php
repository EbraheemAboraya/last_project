<?php 
include "connect_sql.php";
include "config.php";
header("Cache-Control: no-cache, no-store", true);
 session_start();
if (!isset($_SESSION['user_id'])) {

  header('Location:' .URL. 'login.php');
}



$apartment_id = $_GET['id'];
$buildingId = $_GET['buildingId'];
//////////////////user//////////////
$sql = "SELECT  user_name,user_phone,user_gmail FROM tbl_219_users where apartment_id =$apartment_id ";
$result = mysqli_query($con, $sql);
if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  // Now you can access the user details as an array:
  if ($row['user_name'] !== null) {
    $user_name = $row['user_name'];
  }
  if ($row['user_phone'] !== null) {
    $user_phone = $row['user_name'];
  }if ($row['user_gmail'] !== null) {
    $user_gmail = $row['user_name'];
  }

}

//////////////////////devic//////////////

$device = "SELECT  name FROM tbl_219_devices where apartment_id =$apartment_id ";
$result2 = mysqli_query($con, $device);


//////////////////report//////////////

$report = "SELECT  Report FROM tbl_219_apartment where apartment_id =$apartment_id ";

$result3 = mysqli_query($con, $report);

?>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<title>object-building</title>
<script src="js/object_java.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

<div id="lightboxApartment" class="lightbox-apartment" >
  <div class="lightbox-content1">
    <div class="light">





       <section>
        <h5 class="d-flex justify-content-around">Owner Details</h5>
            <?php
              echo '<div class="fs-3">';
          if ($result && mysqli_num_rows($result) > 0) {

                if($row['user_name'] !== null){
                  echo '<div > Name :   ' . $user_name . '</div>';   
                }
                if($row['user_phone'] !== null ){

                  echo '<div> Phone  :  ' . $user_phone . '</div>';   
                }
                if($row['user_gmail'] !== null ){

                  echo '<div>  Email :  ' . $user_gmail . '</div>';    
                }             
              }   
               echo'</div>'
            ?>
       </section>

        <section>
        <h5 class="d-flex justify-content-around">Devices</h5>
        <?php
                echo '<div class="device1">';
          while ($deviceRow = mysqli_fetch_assoc($result2)) {
                $deviceName = $deviceRow['name'];
                echo '<div style="display: flex; justify-content: center; align-items: center;">' . $deviceName . '</div>';

              }
                echo'</div>';


                

            ?>
        
      
        </section>
        <section>
          <h5 class="d-flex justify-content-around">Description Reports</h5>
         <?php
            echo '<div class="report">';
            while ($Reports_row = mysqli_fetch_assoc($result3)) {
               $Reports = $Reports_row['Report'];
               echo '<div style="display: flex; justify-content: center; align-items: center;">' . $Reports  . '</div>';
              }
          
          ?>    
         </section>


         <!-- justify-content: center; align-items: center; -->
        <section>
          <h5 class="d-flex justify-content-around">Syetemes</h5>
          <div class="system">
            <?php

echo '<div style="display: flex; justify-content: center; align-items: center;">Electric</div>';
echo '<div style="display: flex; justify-content: center; align-items: center;">Security</div>';
echo '<div style="display: flex; justify-content: center; align-items: center;">Water</div>';
echo '<div style="display: flex; justify-content: center; align-items: center;">Heating</div>';

            ?>
          </div>
          
          
          </section>




      </div>
      
              <div class="d-flex justify-content-around">
                 <button id="closeLightboxApartment" class="btn btn-info" >Close     
                  <button type="submit" id="submit" class="btn btn-primary"> Update </button> 
                </button>
              </div>
      </div>
</div>






<script>
    window.onload = function() {

        document.getElementById('lightboxApartment').style.display = 'flex';
    }


  document.getElementById('closeLightboxApartment').addEventListener('click', function() {

  window.location.href = "object.php?building_id=" + <?php echo $buildingId; ?>;


});
</script>
<script>
document.getElementById("submit").addEventListener("click", function() {
  window.location.href = "update_light.php?id=" + <?php echo $apartment_id; ?>;
});
</script>









</body>
</html>