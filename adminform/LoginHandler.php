<?php
require_once 'DbConnection.php';

class LoginHandler {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DbConnection("localhost", "root", "ceymox123", "Student");
    }

    public function validateLogin($adminusername, $adminpassword) {
        $conn = $this->dbConnection->getConnection();

        $sql = "SELECT * FROM adminusers WHERE username=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $adminusername, $adminpassword);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $stmt->close();
            $row = $result->fetch_assoc();
            $isadmin = $row['isadmin'];
            $this->dbConnection->closeConnection();
            return $isadmin == 1;
        } else {
            $stmt->close();
            $this->dbConnection->closeConnection();
            return false;
        }
    }
}
?>
