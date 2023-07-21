<?php
include "connect_sql.php";
include "config.php";
header("Cache-Control: no-cache, no-store", true);
 session_start();
if (!isset($_SESSION['user_id'])) {

    header('Location:' .URL. 'login.php');
}

$userId = $_GET['user_id'];

$sql2 = "SELECT apartment_id,user_name,user_gmail,user_phone,passward FROM tbl_219_users where user_id =$userId ";
$result1 = mysqli_query($con, $sql2);


$row2 = mysqli_fetch_assoc($result1);


    $userId = $_GET['user_id'];
    $user_gmail = $_GET['user_gmail'];
    $user_phone = $_GET['user_phone'];
    $password = $_GET['passward'];
    $bool=$_GET['bool'];
    
if ($bool == "2") {
    $sql1 = "UPDATE tbl_219_users SET  user_gmail = '$user_gmail', user_phone = '$user_phone',passward ='$password' where user_id =$userId ";
    $result1 = mysqli_query($con, $sql1);
    header('Location:' .URL. 'index-user.php?user_id=" . urlencode($userId)');

} 
else{

    $user_name = $_GET['user_name'];
    $apartment_id = $_GET['apartment_id'];

    $sql = "INSERT INTO tbl_219_users ( user_name, user_gmail,user_phone,passward,apartment_id)
    VALUES ( '$user_name','$user_gmail','$user_phone','$password','$apartment_id')";
    $result = mysqli_query($cnn, $sql);
}
    header('Location:' .URL. 'index-user.php?user_id=" . urlencode($userId)');
    

?>