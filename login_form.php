<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
       $row = mysqli_fetch_array($result);

       if ($row['user_type'] == 1) {
           $_SESSION['admin_fname'] = $row['first_name'];
           $_SESSION['admin_lname'] = $row['last_name'];
           $_SESSION['uer_type'] = 1;
           $_SESSION['user_id'] = $row['user_id'];
           header('location: ../index.php');
       } else {
           $_SESSION['user_name'] = $row['first_name'];
           $_SESSION['user_type'] = 0;
           $_SESSION['user_id'] = $row['user_id'];
           $error[] = 'You do not have the permissions to access this page!';
       }
   } else {
       $error[] = 'Incorrect email or password!';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style2.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>