<?php 
include "connect_sql.php";
include "config.php";
header("Cache-Control: no-cache, no-store", true);
 session_start();
if (!isset($_SESSION['user_id'])) {

  header('Location:' .URL. 'login.php');
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
<title>first_project</title>
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


        <a href="#" id="logo"></a>

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


<main class="d-flex flex-column"  >
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Buildings list</li>
        </ol>
    </nav>


    <div id="main-content-box" >
        <h1>Buildings</h1>
                                 
        <div class="serach_az_add"  >
            <input  id="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <div class="size_button"><a href="form-add-building.php" id="a_addBuilding">  <i class="bi bi-plus-circle"> </i> <span>Add builiding</span>  </a> </div>  
        </div>

        <div id="buildings-boxes">

            <?php
            
                if (mysqli_num_rows($result) > 0) {
            
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="building-box" >';
                            echo '<img class="img-off" src="' . $row["image"] . '" alt="Building Image"><br>';
                            echo '<p>Name building: ' . $row["building_Name"] . '<br>' . 'Location: ' . $row["location"] . '<br>' . 'Status: ' . $row["status"] . '<br>' . '<a href="object.php?building_id=' . $row["building_id"] . '">View Building</a></p>';
                            echo '</div>';
                        }
                } 
                else {
                    echo "No information found.";
                }
            
                mysqli_close($con);
            ?>

        </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#search').on('input', function(){
    var searchKeyword = $(this).val();
    $.ajax({
      url: 'search.php',
      type: 'POST',
      data: { search: searchKeyword },
      success: function(data) {
        $('#buildings-boxes').html(data);
      }
    });
  });
});
</script>




</body>

</html>
