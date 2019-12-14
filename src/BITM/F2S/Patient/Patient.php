<?php
namespace App\Patient;
use PDO;
use App\Message\Message;
use App\Model\Database;

class Patient extends Database
{

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $password;
    public $email_token;

    public function setData($data){

        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('first_name',$data)){
            $this->first_name=$data['first_name'];
        }
        if(array_key_exists('last_name',$data)){
            $this->last_name=$data['last_name'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('phone',$data)){
            $this->phone=$data['phone'];
        }
        if(array_key_exists('address',$data)){
            $this->address=$data['address'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }


        if(array_key_exists('email_token',$data)){
            $this->email_token=$data['email_token'];
        }

    }
    public function allUsers(){


        $sqlQuery ="SELECT * FROM `patient_info`";

        $sth = $this->conn->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $allUsers = $sth->fetchAll();

        return $allUsers;

    }

    public function view(){

        $sqlQuery = "select * from patient_info WHERE id= $this->id";
        $sth = $this->conn->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $singleData =  $sth->fetch();

        return $singleData;
    }
    public function updates(){

        $lastname =$this->last_name;
        $email= $this->email;
        $firstname =$this->first_name;
        $password= $this->password;
        $phone= $this->phone;
        $address= $this->address;


        $dataArray = array($firstname,$lastname,$email,$password,$phone,$address);

        $sqlQuery ="UPDATE `patient_info` SET `first_name` = ?, `last_name` = ?, `email` = ?, `password` = ?, `phone` = ?, `address` = ? WHERE `patient_info`.`id` =".$this->id;

        $sth = $this->conn->prepare($sqlQuery);

        $result = $sth->execute($dataArray);

        if ($result){

            Message::message("Success!Data has been updated successfully!");

        }
        else{

            Message::message("Error!Data has not been updated..");
        }
    }

    public function trash(){

        $sqlQuery = "UPDATE patient_info SET is_trashed=NOW() WHERE id = $this->id;";

        $result=  $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success :) Data has been trashed successfully.");
        }
        else {
            Message::message("Failure :( Trashed is not possible due to an error.");

        }

    }

    public function trashed(){

        $sqlQuery ="select * from patient_info WHERE is_trashed <> 'no' ";

        $sth = $this->conn->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $allUser =$sth->fetchAll();
        return $allUser;

    }


    public function recover(){

        $sqlQuery ="UPDATE patient_info SET is_trashed='no' WHERE id=$this->id";

        $result =$this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success :) Data has been recovered successfully.");
        }
        else {
            Message::message("Failure :( Recovered is not possible due to an error.");

        }
    }

    public function delete(){

        $sqlQuery ="DELETE  from patient_info WHERE id=$this->id";

        $result =$this->conn->exec($sqlQuery);

        if($result){
            Message::message("Success :) Data has been deleted successfully.");
        }
        else {
            Message::message("Failure :( Delete operation is not possible due to an error.");

        }
    }




}