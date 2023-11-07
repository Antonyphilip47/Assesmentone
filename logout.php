<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Send a response indicating successful logout
echo json_encode(["status" => "success", "message" => "Logout successful"]);
?>
