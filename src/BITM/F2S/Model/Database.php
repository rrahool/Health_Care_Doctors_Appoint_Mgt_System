<?php
namespace App\Model;

use PDO,PDOException;
class Database
{

    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=hospital_management_system", "root", "");
            // echo "Database Connection Successful!!!";
        }

        catch (PDOException $error){

            echo $error->getMessage();

        }

    }

}



