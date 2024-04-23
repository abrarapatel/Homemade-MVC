<?php
// $conn = mysqli_connect('localhost', 'root', '', 'dbname');

// if (!$conn) {
//     echo "<script>alert('Connection Failed, please try again !');</script>";
// }

Class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "assistant_db";

    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}