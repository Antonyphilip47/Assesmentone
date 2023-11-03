<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values
    $adminusername = $_POST["username"];
    $adminpassword = $_POST["password"];

    $servername = "localhost";
    $username = "root";
    $password = "ceymox123";
    $dbname = "Student";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM adminusers WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $adminusername, $adminpassword);

    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $stmt->close();
        $response = array("status" => "fail", "message" => "Already a user is present");
    } else {
        $stmt->close();
        $insertSql = "INSERT INTO adminusers (username, password) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSql);

        $insertStmt->bind_param("ss", $adminusername, $adminpassword);

        if ($insertStmt->execute()) {
            $insertStmt->close();
            $response = array("status" => "success", "message" => "Admin user created");

        } else {
            $insertStmt->close();
            $response = array("status" => "fail", "message" => "Invalid credentials");
        }
    }

    $conn->close();

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
