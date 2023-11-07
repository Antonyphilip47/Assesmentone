<?php
session_start();
require_once 'LoginHandler.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminusername = $_POST["username"];
    $adminpassword = $_POST["password"];

    $loginHandler = new LoginHandler();

    if ($loginHandler->validateLogin($adminusername, $adminpassword)) {
        $_SESSION['username'] = $adminusername;
        $response = array("status" => "admin", "message" => "admin");
    } else {
        $response = array("status" => "notadmin", "message" => "Not admin");
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
