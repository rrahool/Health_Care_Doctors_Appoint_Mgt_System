<?php
namespace App\Admin;

use App\Utility\Utility;
use PDO;
use App\Model\Database;

class Admin extends Database
{

    public $password;
    public $username;

    public function setData($data){

        if(array_key_exists('username',$data)){
            $this->username=$data['username'];
        }

        if(array_key_exists('password',$data)){
            $this->password=$data['password'];
        }

    }


    public function adminLogin(){
        $sqlQuery="SELECT * FROM `admin` WHERE `username` ='".$this->username."'";

        $sth = $this->conn->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result =  $sth->fetch();
        return $result;
    }
}