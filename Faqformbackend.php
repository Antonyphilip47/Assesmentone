<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form values

    $question = $_POST["question"];
    $answer = $_POST["answer"];


    $servername = "localhost";
    $username = "root";
    $password = "ceymox123";
    $dbname = "Student";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        
    $insertSql = "INSERT INTO faq (question, answer) VALUES (?, ?)";
    $insertStmt = $conn->prepare($insertSql);

    $insertStmt->bind_param("ss", $question, $answer);

    if ($insertStmt->execute()) {
        // echo "New record inserted successfully.";
        echo "test";
    } else {
        echo "Error: " . $insertStmt->error;
    }

    $insertStmt->close();
    

    $conn->close();
}
?>
