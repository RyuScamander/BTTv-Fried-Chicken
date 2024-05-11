<?php

include_once "../config/dbconnect.php";

// Check if action is provided (enable/disable) and user ID is provided
if (isset($_GET['action']) && isset($_GET['user_id'])) {
    $action = $_GET['action'];
    $user_id = $_GET['user_id'];

    if ($action === 'enable') {
        $status = 'active';
    } elseif ($action === 'disable') {
        $status = 'inactive';
    } else {
        die(json_encode(array("success" => false, "message" => "Invalid action.")));
    }

    // Update user status in the database
    $sql = "UPDATE users SET status ='$status' WHERE user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true, "message" => "User status updated successfully."));
    } else {
        echo json_encode(array("success" => false, "message" => "Error updating user status: " . $conn->error));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Action and user ID are required."));
}
?>
