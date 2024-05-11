<?php
include_once "../config/dbconnect.php";

// Sanitize input to prevent SQL injection
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
$user_address = mysqli_real_escape_string($conn, $_POST['user_address']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
$city = mysqli_real_escape_string($conn, $_POST['city']);


// Update the user record
$updateCustomer = mysqli_query($conn,"UPDATE users SET 
    first_name='$first_name', 
    last_name='$last_name', 
    email='$email',
    contact_no='$contact_no',
    user_address='$user_address',
    district='$district',
    city='$city'
    WHERE user_id='$user_id'");

if($updateCustomer) {
    echo "true";
} else {
    echo "false"; // or you can echo mysqli_error($conn); to debug
}
?>
