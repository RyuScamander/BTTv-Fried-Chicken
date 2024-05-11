
<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
   $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $district = mysqli_real_escape_string($conn, $_POST['district']);
   $city = mysqli_real_escape_string($conn, $_POST['city']);
   $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   

   if($user_type === "admin"){
      $user_typevalue = 1;
   }else {
      $user_typevalue = 0;
   }

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO users(first_name, last_name, email, password, user_type, address, phone_number, district, city) VALUES('$fname','$lname','$email','$pass','$user_typevalue', '$address', '$phone_number', '$district', '$city')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style2.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>admin register</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="first_name" required placeholder="enter your first name">
      <input type="text" name="last_name" required placeholder="enter your last name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="number" name="phone_number" required placeholder="enter your contact number">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>
<script>
   function updateDistricts() {
       var city = document.getElementById("city").value;
       var districtSelect = document.getElementById("district");
       var districts = {
           'HoChiMinh': ['Quan 1','Quan2', 'Quan 3', 'Quan 4', 'Quan 5', 'Quan 6', 'Quan 7', 'Quan 8', 'Quan 10', 'Quan 11', 'Quan 12', 'Quan Tan Binh', 'Quan Binh Tan', 'Quan Binh Thanh', 'Quan Tan Phu', 'Quan Go Vap', 'Quan Phu Nhuan'],
           'Hanoi': ['Ba Dinh', 'Cau Giay', 'Dong Da', 'Hai Ba Trung', 'Hoan Kiem', 'Thanh Xuan', 'Hoang Mai', 'Long Bien', 'Ha Dong', 'Tay Ho', 'Nam Tu Liem', 'Bac Tu Liem'],
           'Danang': ['Lien Chieu', 'Hai Chau', 'Ngu Hanh Son', 'Son Tra', 'Cam Le', 'Thanh Khe']
       };

       districtSelect.innerHTML = ''; // Clear existing options first

       if(city && districts[city]) {
           districts[city].forEach(function(district) {
               var newOption = document.createElement("option");
               newOption.value = district;
               newOption.innerHTML = district;
               districtSelect.appendChild(newOption);
           });
       } else {
           var defaultOption = document.createElement("option");
           defaultOption.value = "";
           defaultOption.innerHTML = "Choose your District";
           districtSelect.appendChild(defaultOption);
       }
   }
   </script>