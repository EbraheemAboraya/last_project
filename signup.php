<?php
include "connect_sql.php";
include "config.php";
header("Cache-Control: no-cache, no-store", true);
 session_start();
if (!isset($_SESSION['user_id'])) {

    header('Location:' .URL. 'login.php');}




if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['user_name'];
    $password = $_POST['password'];
    $user_gmail = $_POST['user_gmail'];
    $user_phone = $_POST['user_phone'];
    $apartment_id=$_POST['apartment_number'];

    if (!empty($username) && !empty($password)) {
        $sql1 = "INSERT INTO tbl_219_users (user_name, user_gmail, user_phone, passward,apartment_id)
        VALUES ('$username', '$user_gmail', '$user_phone', '$password', '$apartment_id')";
        $result = mysqli_query($con, $sql1);
        header('Location:' .URL. 'login.php');
        
        die;
    } else {
        echo "Please Enter Some Valid Information!";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="loginbody">
    <div class="content">
        <div class="text">
            Sign Up
        </div>
        <form action="signup.php" method="post">
            <div class="field">
                <input required="" type="text" class="input" name="user_name">
                <label class="label">Full Name</label>
            </div>
            <div class="field">
                <input required="" type="tel" class="input" name="user_phone">
                <label class="label">Phone</label>
            </div>
            <div class="field">
                <input required="" type="email" class="input" name="user_gmail">
                <label class="label">Email</label>
            </div>
            <div class="field">
                <input required="" type="text" class="input" name="apartment_number">
                <label class="label">Apartment Number</label>
            </div>
            <div class="field">
                <input required="" type="text" class="input" name="building_name">
                <label class="label">Building Name</label>
            </div>
            <div class="field">
                <input required="" type="password" class="input" name="password">
                <label class="label">Password</label>
            </div>
            <button class="button" type="submit">Sign Up</button>
            <div class="sign-up">
                Already a member?
                <a href="#">Login now</a>
            </div>
        </form>
    </div>
</body>
</html>