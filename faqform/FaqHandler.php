<?php
require_once 'DbConnection.php';

class FaqHandler {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DbConnection("localhost", "root", "ceymox123", "Student");
    }

    public function faqinsert($question, $answer){
        $conn = $this->dbConnection->getConnection();

        $insertSql = "INSERT INTO faq (question, answer) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSql);
    
        $insertStmt->bind_param("ss", $question, $answer);

        if ($insertStmt->execute()) {
            $insertStmt->close();
            $this->dbConnection->closeConnection();

            // echo "New record inserted successfully.";
            return true;
            // echo "test";
        } else {
            $insertStmt->close();
            $this->dbConnection->closeConnection();

            return false;
            // echo "Error: " . $insertStmt->error;
        }
    

    }
}
?>
