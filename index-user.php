<?php 
 include "connect_sql.php";
 include "config.php";
 header("Cache-Control: no-cache, no-store", true);
  session_start();
 if (!isset($_SESSION['user_id'])) {

  header('Location:' .URL. 'login.php');
}
 $userId=$_SESSION['user_id'];


$sql1 = "SELECT apartment_id,user_name FROM tbl_219_users where user_id =$userId ";
$result1 = mysqli_query($con, $sql1);


$row = mysqli_fetch_assoc($result1);
// Access the apartment_id value from the fetched row
$apartment_id = $row['apartment_id'];

$sql2 = "SELECT name FROM tbl_219_devices where apartment_id =$apartment_id";
$result2 = mysqli_query($con, $sql2);
?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<title>User_page</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
<header class="d-flex justify-content-between">

<div class="hamburger-menu" >
    <input id="menu__toggle" type="checkbox">
    <label class="menu__btn" for="menu__toggle"><span></span> </label>

    <ul class="menu__box">
        
        <li><a class="menu__item" href="index-user.php?user_id=<?php echo $userId ?>">Home</a></li>
        <li><a class="menu__item" href="update_user.php?user_id=<?php echo $userId ?>">Update User </a></li>
        <li><a class="menu__item" href="add-user.php?user_id=<?php echo $userId ?>">Add User</a></li>
        <li><a class="menu__item menu__item--bottom" href="#">Settings</a></li>
        <li><a class="menu__item menu__item--bottom" href="logout.php">Log Out</a></li>
</ul>
</div>


<a href="index-user.php" id="logo"></a>

<ul class="d-flex">
    <li ><a href="index-user.php?user_id=<?php echo $userId ?>">Home</a></li>
    <li><a href="update_user.php?user_id=<?php echo $userId ?>">Update User</a></li>
    <li><a href="add-user.php?user_id=<?php echo $userId ?>">Add User</a></li>
</ul>


<section class="d-flex" >
<div class="dropdown">
<a href="#" id="user" class="d-flex  flex-wrap" data-bs-toggle="dropdown" data-bs-target="#settingsDropdown">
<span id="green-dot"></span>
<i class="bi bi-caret-down-fill"></i>
</a>

<div class="dropdown-menu" aria-labelledby="user" id="settingsDropdown">
<a class="dropdown-item" href="#"><i class="bi bi-gear"></i>Settings</a>
<a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-in-right"></i>Log out</a>

</div>
</div>

</section>


</header>



<main>
      <div class="part_1">
        <section><?php echo '<h1> Welcome ' . $row['user_name']  . '</h1>'; ?></section>
        <img src="images/camera-photo.png" alt="camera photo" class="camera">
      </div>

      <section class="line"></section>

      <div class="big_system">
        <div class="electric">
          <h4>Devices</h4>
            <?php 
            while ($deviceRow = mysqli_fetch_assoc($result2)) {
              $deviceName = $deviceRow['name'];

              // Check device name and display accordingly
              if ($deviceName === "Television") {
                echo '<section class="d-flex">';
                echo '<span class="material-symbols-outlined">desktop_windows</span>';
                echo "<h5>$deviceName</h5>";
                echo '</section>';
              } elseif ($deviceName === "Refrigerator") {
                echo '<section class="d-flex">';
                echo '<span class="material-symbols-outlined">kitchen</span>';
                echo "<h5>$deviceName</h5>";
                echo '</section>';
              } elseif ($deviceName === "Microwave Oven") {
                echo '<section class="d-flex">';
                echo '<span class="material-symbols-outlined">oven_gen</span>';
                echo "<h5>$deviceName</h5>";
                echo '</section>';
              } elseif ($deviceName === "Camera") {
                echo '<section class="d-flex">';
                echo '<span class="material-symbols-outlined">camera_video</span>';
                echo "<h5>$deviceName</h5>";
                echo '</section>';
              } elseif ($deviceName === "Window and Door Sensors") {
                echo '<section class="d-flex">';
                echo '<span class="material-symbols-outlined">sensors</span>';
                echo "<h5>$deviceName</h5>";
                echo '</section>';
              } elseif ($deviceName === "MBlender") {
                echo '<section class="d-flex">';
                echo '<i class="bi bi-laptop"></i>';
                echo "<h5>$deviceName</h5>";
                echo '</section>';
              }
              
            }
            ?>

          </div>
        </div>

        
      <section class="line"></section>

      <div id="reportBox" class="report-box">
    <h2 class="report-title">Monthly Report</h2>
    <table>
      <tr>
        <th>Date</th>
        <th>Report</th>
        <th>Admin Response</th>
      </tr>
      <tr>
        <td>2023-07-19</td>
        <td>This is report content 1.</td>
        <td>Admin response 1.</td>
      </tr>
      <tr>
        <td>2023-07-18</td>
        <td>This is report content 2.</td>
        <td></td>
      </tr>
      <!-- add more rows as needed -->
    </table>
  </div>
    </main>




<footer> 
    <span id="line"></span>
     <div>
        <p>About</p>
        <p>Need help</p>
        <p>Terms of use</p>
        <p>Privacy</p>
    </div>
</footer>

</body>

</html>


