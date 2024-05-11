<?php
// Start a session
session_start();

// Check if a session is active
if (!empty($_SESSION)) {
    echo "Session is active.<br>";
    echo "Session Variables:<br>";
    foreach ($_SESSION as $key => $value) {
        echo "$key: $value<br>";
    }
} else {
    echo "No session is currently active.";
}
?>
