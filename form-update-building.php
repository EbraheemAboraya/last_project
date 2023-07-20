<?php 
include "connect_sql.php";
include "config.php";
header("Cache-Control: no-cache, no-store", true);
 session_start();
if (!isset($_SESSION['user_id'])) {

 header("Location: login.php");
}


$buildingId = $_GET['building_id'];
$sql = "SELECT  apartment_number,status,floor,building_Name,location,address,city FROM tbl_219_buildings where building_id =$buildingId ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>update-building</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/java.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <title>form-update-building</title>
    </head>

    <body>
  
<header class="d-flex justify-content-between">
    <div class="hamburger-menu" >
        <input id="menu__toggle" type="checkbox">
        <label class="menu__btn" for="menu__toggle">
        <span></span>
        </label>

        <ul class="menu__box">
            <li><a class="menu__item" href="index.php?id=1&name=List_building">List Building</a></li>
            <li><a class="menu__item" href="form.php?id=2&name=form_building">Form</a></li>
            <li><a class="menu__item" href="object.php?id=3&name=object_building">Object Building</a></li>
            <li><a class="menu__item" href="apartment.php?id=4&name=object_Apartment">Object Apartment</a></li>
            <li><a class="menu__item" href="#">Reports</a></li>
        </ul>
    </div>


    <a href="index.php" id="logo"></a>

    <ul class="d-flex">
        <li ><a href="index.php">Home</a></li>
        <li><a href="add-apartment.php">apartment</a></li>
        <li><a href="#">List</a></li>
        <li><a href="#">Devices</a></li>
        <li><a href="#">Reports</a></li>
    </ul>

    <section class="d-flex">
    <a href="#" id="persona_1" class="d-flex align-content-end flex-wrap"><i class="bi bi-caret-down-fill"></i></a>
    <span id="green-dot"></span>

    </section>
</header>



<main class="d-flex" >

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" >
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active" aria-current="page">Add Building</li>
        </ol>
      </nav>
      
    <section id="form-index">

        <h1 class ="form_h1">Update Building</h1>   


       
        <form action="add_php.php" method="get">   

        
    
        <?php
            echo '<span> Building Name:- </span>';
            echo '<input   type="text"  class="form-control   form-control-lg"   name="Building Name" placeholder="'. $row['building_Name'] .'" id="Building_Name" disabled>';
            echo '<input type="hidden" name="building_id" value="' . $buildingId . '">';

            echo '<span> Status:- </span>';
            echo '<input  type="text"  class="form-control   form-control-lg"   name="status" placeholder="'. $row['status'] .'" id="status">';

            echo '<span> Location:- </span>';
            echo '<input  type="text"  class="form-control   form-control-lg"   name="location" placeholder="'. $row['location'] .'"  disabled>';

            echo '<span> Floors Number:- </span>';
            echo '<input  type="text"  class="form-control   form-control-lg"   name="floor" placeholder="'. $row['floor'] .'" >';

            echo '<span> Address:- </span>';
            echo '<input  type="text"  class="form-control   form-control-lg"   name="address" placeholder="'. $row['address'] .'"  disabled>';

            echo '<span> Apartment Number:- </span>';
            echo '<input  type="text"  class="form-control   form-control-lg"   name="apartment_number" placeholder="'. $row['apartment_number'] .'">';

            echo '<span> City:- </span>';
            echo '<input  type="text"  class="form-control   form-control-lg"   name="city" placeholder="'. $row['city'] .'"disabled>';
                    
        ?> 
        <input type="hidden" name="bool" value="2">

        <button type="submit" id="submit" class="btn btn-primary"> Update </button>
                
        </form>

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
document.getElementById("submit").addEventListener("click", function() {
    window.location.href="add_php.php";
});


</script>
</body>
</html>