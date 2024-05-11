<?php
include_once "../config/dbconnect.php";
require "../config/function.php";

function getOrderStatusDBValue($status) {
    if ($status == 'Pending') {
        return 0;
    } elseif ($status == 'Delivered') {
        return 1;
    }
    return null;
}

// Validate input parameters
$order_date = isset($_GET['order_date']) ? validate($_GET['order_date']) : '';
$order_status = isset($_GET['order_status']) ? validate($_GET['order_status']) : '';
$order_status_db = getOrderStatusDBValue($order_status);

if ($order_date !== '' && !is_null($order_status_db)) {
    // Filter by date and status
    $sql = "SELECT * FROM orders WHERE order_date='$order_date' AND order_status='$order_status_db' ORDER BY order_id";
} elseif ($order_date !== '') {
    // Filter by date only
    $sql = "SELECT * FROM orders WHERE order_date='$order_date' ORDER BY order_id";
} elseif (!is_null($order_status_db)) {
    // Filter by status only
    $sql = "SELECT * FROM orders WHERE order_status='$order_status_db' ORDER BY order_id";
} else {
    // No filters applied
    $sql = "SELECT * FROM orders ORDER BY order_id";
}

$data = mysqli_query($conn, $sql);

if ($data && mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
        echo '<tr>
                <td>' . $row["order_id"] . '</td>
                <td>' . $row["delivered_to"] . '</td>
                <td>' . $row["phone_no"] . '</td>
                <td>' . $row["order_date"] . '</td>
                <td>' . $row["pay_method"] . '</td>
                <td>' . ($row["order_status"] == 0 ? "Pending" : "Delivered") . '</td>
              </tr>';
    }
} else {
    echo '<tr><td colspan="6">No orders found</td></tr>';
}
?>
