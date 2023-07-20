<?php
  // db connection
   include "connect_sql.php";


  // get the search keyword
  $searchKeyword = $_POST['search'];

  // sql query
  $sql1 = "SELECT * FROM tbl_219_buildings WHERE building_Name LIKE '%$searchKeyword%'";
  $result1 = mysqli_query($con, $sql1);

  if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
      echo '<div class="building-box" >';
      echo '<img class="img-off" src="' . $row["image"] . '" alt="Building Image"><br>';
      echo '<p>Name building: ' . $row["building_Name"] . '<br>' . 'Location: ' . $row["location"] . '<br>' . 'Status: ' . $row["status"] . '<br>' . '<a href="object.php?building_id=' . $row["building_id"] . '">View Building</a></p>';
      echo '</div>';
    }
  } else {
    echo "No information found.";
  }
  mysqli_close($con);
?>