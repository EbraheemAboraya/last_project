<?php
include "connect_sql.php";
include "config.php";
header("Cache-Control: no-cache, no-store", true);
session_start();
if (isset($_SESSION['user_id'])) {
   header('Location:' .URL. 'login.php');   session_destroy();
}
if (isset($_POST['submit'])) {
   $user_gmail = $_POST['user_gmail'];
   $password = $_POST['password'];

   if (!empty($user_gmail) && !empty($password)) {
       $query1 = "SELECT * FROM tbl_219_users WHERE user_gmail = '$user_gmail' AND passward = '$password'";
       $result1 = mysqli_query($con, $query1);
     
       if ($result1) {
           if (mysqli_num_rows($result1) > 0) {
               $user_data = mysqli_fetch_assoc($result1);

               $_SESSION['user_id'] = $user_data['user_id'];
               $user_role = $user_data['row']; 

               if ($user_role == 1) {
                   header('Location:' .URL. 'index.php');

                   die();
               } elseif ($user_role == 2) {
                  header('Location:' .URL. 'index-user.php');
                   die();
               } else {
                   $message = "Invalid Role";
               }
           } else {
               $message = "Oops! Email or Password is incorrect.";
           }
       } else {
           $message = "Query Execution Error: " . mysqli_error($con);
       }
   } else {
      $message = "Please enter valid information!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body class="loginbody">
   <div class="content">
      <div class="text">
         Login
      </div>
      <form action="login.php" method="post">
         <div class="field">
            <input required="" type="text" class="input" name="user_gmail">
            <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"></path></g></svg></span>
            <label class="label">User Name</label>
         </div>
         <div class="field">
            <input required="" type="password" class="input" name="password">
            <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M336 192h-16v-64C320 57.406 262.594 0 192 0S64 57.406 64 128v64H48c-26.453 0-48 21.523-48 48v224c0 26.477 21.547 48 48 48h288c26.453 0 48-21.523 48-48V240c0-26.477-21.547-48-48-48zm-229.332-64c0-47.063 38.27-85.332 85.332-85.332s85.332 38.27 85.332 85.332v64H106.668zm0 0"></path></g></svg></span>
            <label class="label">Password</label>
         </div>
         <div class="forgot-pass">
            <a href="#">Forgot Password?</a>
         </div>
         <button name="submit" type="submit" class="button">Sign in</button>

         <div class="error-message"><?php if (isset($message)) { echo $message; } ?></div>   

         <div class="sign-up">
            <p>Not a member? <a href="signup.php">Sign up</a></p>
         </div>
      </form>
   </div>
</body>
</html>