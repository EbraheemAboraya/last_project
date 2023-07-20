<?php 
include "connect_sql.php";
include "config.php";
header("Cache-Control: no-cache, no-store", true);
 session_start();
if (!isset($_SESSION['user_id'])) {

  header('Location:' .URL. 'login.php');}


$buildingId = $_GET['building_id'];
$sql = "SELECT  building_Name,apartment_number,status,city,address,reprots FROM tbl_219_buildings where building_id =$buildingId ";
$result = mysqli_query($con, $sql);


$sql2 = "SELECT  apartment_id FROM tbl_219_apartment where building_id =$buildingId ";
$result2 = mysqli_query($con, $sql2);


if (!$result || !$result2) {
  die('Error: ' . mysqli_error($con));
}



// Fetch apartment IDs from the second query (tbl_219_apartment)
$apartmentIds = array();
while ($row = mysqli_fetch_assoc($result2)) {
  $apartmentIds[] = $row['apartment_id'];
}





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

  <header class="d-flex justify-content-between">

  <div class="hamburger-menu" >
      <input id="menu__toggle" type="checkbox">
      <label class="menu__btn" for="menu__toggle"><span></span> </label>

      <ul class="menu__box">
          
          <li><a class="menu__item" href="index.php">Home</a></li>
          <li><a class="menu__item" href="form-add-building.php">Add Building </a></li>
          <li><a class="menu__item" href="add-apartment.php">Add Apartment</a></li>
          <li><a class="menu__item menu__item--bottom" href="#">Settings</a></li>
          <li><a class="menu__item menu__item--bottom" href="logout.php">Log Out</a></li>
  </ul>
  </div>


  <a href="index.php" id="logo"></a>

  <ul class="d-flex">
      <li ><a href="index.php">Home</a></li>
      <li><a href="add-apartment.php">Add Apartment</a></li>
      <li><a href="form-add-building.php">Add Building</a></li>
  </ul>


  <section class="d-flex" >
  <div class="dropdown">
  <a href="#" id="persona_1" class="d-flex  flex-wrap" data-bs-toggle="dropdown" data-bs-target="#settingsDropdown">
  <span id="green-dot"></span>
  <i class="bi bi-caret-down-fill"></i>
  </a>

  <div class="dropdown-menu" aria-labelledby="persona_1" id="settingsDropdown">
  <a class="dropdown-item" href="#"><i class="bi bi-gear"></i>Settings</a>
  <a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-in-right"></i>Log out</a>

  </div>
  </div>

  </section>


  </header>


<main  class="d-flex flex-column">
     
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Building</li>
      </ol>
  </nav>

 <section class="d-flex" >

    <!-- /////////////apartment-box///////////////// -->


    
    
    <?php
    $row = mysqli_fetch_assoc($result);
    $apartmentNumber = $row['apartment_number'];
    $building_name = $row['building_Name'];
    
    echo '<h2 class="name_building">' . $building_name . '</h2>';

  
     echo '<div id="All-Apartment-box">';
         for ($i = $apartmentNumber; $i >=1 ; $i--)  {
             echo '<div class="apartment-box">Apartment ' . $i;
             echo '<div class="view_box"> <a href="#?id=' .  $apartmentIds[$i-1] . '" onclick="viewApartment(' .  $apartmentIds[$i-1] . ')">View</a> </div>';
             echo '</div>'; 
         } 
     echo '</div>'; 
?> 




<input  id="search-obj" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">



<!-- ///////////////////////status+report+update+delete////////////////// -->
<?php

 echo '<div id="status">';
        $status = $row['status'];
        echo '<div class="title">Status</div>';
        echo '<div class="details"> <p>' . $status . '</p></div>';
        $city=$row['city'];
        echo '<div class="title">City</div>';
        echo '<div class="details"> <p>' .  $city . '</p></div>';
        $address=$row['address'];
        echo '<div class="title"> Address</div>';
        echo '<div class="details"> <p>' .   $address . '</p></div>';


        echo '<h5>Reports</h5>';
        echo '<div id="Reports">';
        $sql4 = "SELECT  reprots FROM tbl_219_buildings ";
        if ($result4 = mysqli_query($con, $sql4)) {
          $counter = 0; 
          
          if (mysqli_num_rows($result4) > 0) {
              while ($row = mysqli_fetch_assoc($result4)) {
                  echo '<div class="house"></div>
                      <span>' . $row["reprots"] . '</span>';
                  echo '<div class="line_"></div>';
                  
                  $counter++; // Increment the counter
                  
                  if ($counter == 5) {
                      break; 
                  }
              }
          }
      }
        echo '</div>';


   echo '

    <section id="curd-box" class="d-flex align-items-start" >
    <!-- delete -->
    <div class="text-center" class="btn btn-primary">
      <button type="button" id="deleteButton" class="btn btn-danger">
        Delete
      </button>
    </div>

    <div id="lightbox" class="lightbox">
      <div class="lightbox-content">
        <h2>Are you sure?</h2>
        <button id="confirmDelete" class="btn btn-danger">Delete</button>
        <button id="cancelDelete" class="btn btn-secondary">Cancel</button>
      </div>
    </div>
    
    <!--   update  -->


    <script src="script.js"></script>
    <div class="text-center">
      <button type="button" id="updateButton" class="btn btn-primary">
        Update
      </button>
    </div>
  </section>

    ';
    echo '</div>';
                    
?>



</section>

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














<script>


document.getElementById("deleteButton").addEventListener("click", function() {
  document.getElementById("lightbox").style.display = "flex";
});

document.getElementById("confirmDelete").addEventListener("click", function() {
  // Perform the delete operation
  document.getElementById("lightbox").style.display = "none";
});

document.getElementById("cancelDelete").addEventListener("click", function() {
  document.getElementById("lightbox").style.display = "none";
});




 var buildingId = "<?php echo $buildingId; ?>";


  document.getElementById("confirmDelete").addEventListener("click", function() {
    window.location.href= "add_php.php?building_id=" + buildingId;
  });



  document.getElementById("updateButton").addEventListener("click", function() {
    window.location.href = "form-update-building.php?building_id=" + buildingId;
  });



</script>








<script>
function viewApartment(apartmentId) {

  var clickedApartmentId = apartmentId; 
  var url = "a.php?id=" + encodeURIComponent(apartmentId) + "&buildingId=" + encodeURIComponent(buildingId);
  window.location.href = url;
}

document.getElementById('closeLightboxApartment').addEventListener('click', function() {
  // Hide the lightbox:
  document.getElementById('lightboxApartment').style.display = 'none';
});
</script>















</body>

</html>