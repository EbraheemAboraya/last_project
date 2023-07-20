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
    <title>first_project</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/java.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
        <li><a class="menu__item menu__item--bottom" href="#">Log Out</a></li>
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
<a class="dropdown-item" href="index.php"><i class="bi bi-box-arrow-in-right"></i>Log out</a>

</div>
</div>

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
          
          <h2 class ="form_h2"> Add Building</h2>
          
          
          <form action="add_php.php" method="get">     
              <span> Building Number :- </span>
              <input  type="text"  class="form-control   form-control-lg"   name="building_id" placeholder="building_id" >
              
              
                
                <span> Building Name :- </span>
                <input   type="text"  class="form-control  form-control-lg"   name="building_Name" placeholder="Building Name">
                                
                                
                
                <span> Address Of Building :- </span>
                <input   type="text"  class="form-control  form-control-lg"   name="address" placeholder="Street Adress">
                            
                
                <span>Location:-</span>
                <input   type="text"  class="form-control  form-control-lg"   name="location" placeholder="Country">


                
                <div>
                            <span>Floor</span>  
                        <div >

                            <input type="number" name="floor" id="floor_" class="w-5 p-1" value="0" min="0" max="67">
                        </div>             
                </div>
                            
                                

                <span> City:- </span>
                <input   type="text"  class="form-control  form-control-lg"   name="city" placeholder="City">

 
                <span> status:- </span>
                <input type="text"  class="form-control  form-control-lg"   name="status" placeholder="building status">

        <input type="hidden" name="bool" value="3">
            

<button type="submit" id="addButton" class="custom-button">Add</button>

<div id="lightbox" class="custom-lightbox">
  <div class="custom-lightbox-content">
    <h2>Successful!</h2>
    <p>Your action was successful.</p>
    <button id="closeButton" class="custom-close-button">Close</button>
  </div>
</div>
                            
        
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
document.getElementById("addButton").addEventListener("click", function() {
  document.getElementById("lightbox").style.display = "block";
});

document.getElementById("closeButton").addEventListener("click", function() {
  document.getElementById("lightbox").style.display = "none";
});




</script>


</body>

</html>