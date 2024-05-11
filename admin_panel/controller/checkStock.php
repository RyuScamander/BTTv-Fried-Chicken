<?php
include_once "../config/dbconnect.php";

$p_id = $_POST['record'];
$query = "SELECT stock FROM product WHERE product_id='$p_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $stock = $row['stock'];
    if ($stock > 0) {
        echo "in_stock";
    } else {
        echo "out_of_stock";
    }
} else {
    echo "error";
}
?>
