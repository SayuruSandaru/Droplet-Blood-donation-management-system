<?php
class DbConnector
{
    private $dbName = "blood_donation";
    private $dbUser = "root";
    private $dbHost = "localhost";
    private $dbPwd = "";

    public function getConnection()
    {
        $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;

        try {
            $con = new PDO($dsn, $this->dbUser, $this->dbPwd);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $ex) {
            die("Failed to connect to the database: " . $ex->getMessage());
        }
    }
}
