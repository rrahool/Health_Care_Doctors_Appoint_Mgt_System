<?php

namespace App\Doctor;


use App\Model\Database;
use App\Message\Message;
use PDO;
class Doctor extends Database
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $type;
    public $status;
    public $address;
    public $image;
    public $availableTime;
    public $join_date;
    public $join_time;
    public $mobile;


    public function setData($data)

    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }

        if (array_key_exists('name', $data)) {
            $this->name = $data['name'];
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }

        if (array_key_exists('password', $data)) {
            $this->password = $data['password'];
        }
        if (array_key_exists('mobile', $data)) {
            $this->mobile = $data['mobile'];
        }
        if (array_key_exists('type', $data)) {
            $this->type = $data['type'];
        }
        if (array_key_exists('status', $data)) {
            $this->status = $data['status'];
        }
        if (array_key_exists('address', $data)) {
            $this->address = $data['address'];
        }
        if (array_key_exists('profile_pic', $data)) {
            $this->image = $data['profile_pic'];
        }
        if (array_key_exists('availableTime', $data)) {
            $this->availableTime = $data['availableTime'];
        }




    }


    public function storeDoctor()
    {
        $join_date = date("Y-m-d H:i:s");
        date_default_timezone_set("Asia/Dhaka");
        $join_time = date("g:i a");
        //if Auth-> register is successful, then call this function to register user in the database
        //$passHash = ($this->password);
        $query = "INSERT INTO `doctors_info` ( `doctor_name`, `email`, `password`, `type`, `status`, `mobile`, `address`, `available_time`,`image`, 
`join_date`, `join_time`)
        VALUES ( '" . $this->name . "', '" . $this->email . "', '" . $this->password . "', '" . $this->type . "', '"
            . $this->status . "', '" . $this->mobile . "', 
        '" . $this->address . "', '" . $this->availableTime . "','" . $this->image . "','" . $join_date . "', 
        '" . $join_time . "')";
        //var_dump($query);die();
        if ($this->conn->query($query))
            return true;
                else return false;

    }

    public function doctorLogin(){
        $sqlQuery="SELECT * FROM `doctors_info` WHERE `email` ='".$this->email."'";

        $sth = $this->conn->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result =  $sth->fetch();
        return $result;
    }




    public function view(){

        $sqlQuery = "select * from doctors_info WHERE id=".$this->id;
        $sth = $this->conn->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $singleData =  $sth->fetch();

        return $singleData;
    }

    public function update(){


        $email= $this->email;
        $firstname =$this->name;
        $password= $this->password;
        $phone= $this->mobile;
        $address= $this->address;
        $type= $this->type;
        $status= $this->status;
        $join= $this->join_date && $this->join_time;


        $dataArray = array($firstname,$email,$password,$type,$status,$phone,$address,$join);

        $sqlQuery ="UPDATE `doctors_info` SET `doctor_name` = ?, `email` = ?, `password` = ?, `type` = ?, `status` = ?, `mobile` = ?, `address` = ?, `join_time` = ? WHERE `doctors_info`.`id` =". $this->id;

        $sth = $this->conn->prepare($sqlQuery);

        $result = $sth->execute($dataArray);

        if ($result){

            Message::message("Success!Data has been updated successfully!");

        }
        else{

            Message::message("Error!Data has not been updated..");
        }
    }

    public function allDoctors(){


        $sqlQuery ="SELECT * FROM `doctors_info`";

        $sth = $this->conn->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $allDoctors = $sth->fetchAll();

        return $allDoctors;

    }


    public function trash(){

        $sqlQuery = "UPDATE doctors_info SET is_trashed=NOW() WHERE id = $this->id;";

        $result=  $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success :) Data has been trashed successfully.");
        }
        else {
            Message::message("Failure :( Trashed is not possible due to an error.");

        }

    }

    public function trashed(){

        $sqlQuery ="select * from doctors_info WHERE is_trashed <> 'no' ";

        $sth = $this->conn->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $allData =$sth->fetchAll();
        return $allData;

    }


    public function recover(){

        $sqlQuery ="UPDATE doctors_info SET is_trashed='no' WHERE id=$this->id";

        $result =$this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success :) Data has been recovered successfully.");
        }
        else {
            Message::message("Failure :( Recovered is not possible due to an error.");

        }
    }

    public function delete(){

        $sqlQuery ="DELETE  from doctors_info WHERE id=$this->id";

        $result =$this->conn->exec($sqlQuery);

        if($result){
            Message::message("Success :) Data has been deleted successfully.");
        }
        else {
            Message::message("Failure :( Delete operation is not possible due to an error.");

        }
    }
    public function doctorInfo()
    {
        $query = "SELECT * FROM `patient_info` WHERE `email`='" . $this->email . "'";
        if ($result = $this->conn->query($query)) {
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            return $row;
        }
        return false;

    }



}