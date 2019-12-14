<?php
namespace App\User;
use App\Message\Message;
use App\Model\Database;
use App\Utility\Utility;

use PDO;


class User extends Database {
    // public $table="users";
    public $firstName="";
    public $lastName="";
    public $email="";
    public $phone="";
    public $address="";
    public $password="";
    public $id;
    public $user_id;
    public $userEmail ;

    public function __construct(){
        parent::__construct();
    }

    public function setData($data=array()){
        if(array_key_exists('first_name',$data)){
            $this->firstName=$data['first_name'];
        }
        if(array_key_exists('last_name',$data)){
            $this->lastName=$data['last_name'];
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
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        }
        if (array_key_exists('userEmail', $data)) {
            $this->userEmail = $data['userEmail'];
        }


        return $this;
    }

    public function store() {


        $dataArray= array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':email'=>$this->email,':password'=>$this->password,
            ':phone'=>$this->phone,':address'=>$this->address);


        $query="INSERT INTO `hospital_management_system`.`patient_info` (`first_name`, `last_name`, `email`, `password`, `phone`, `address`) 
VALUES (:firstName, :lastName, :email, :password,:phone, :address)";

        $STH=$this->conn->prepare($query);

        $result = $STH->execute($dataArray);

        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully.
                </div>");
         return  Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function change_password(){
        $query="UPDATE `hospital_management_system`.`patient_info` SET `password`=:password  WHERE `patient_info`.`email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':password'=>$this->password,':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }

    }

    public function view(){
        $query=" SELECT * FROM patient_info WHERE email = '$this->email' ";
        // Utility::dd($query);
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();

    }// end of view()


    public function validTokenUpdate(){
        $query="UPDATE `hospital_management_system`.`patient_info` SET  `email_verified`='".'Yes'."' WHERE `patient_info`.`email` ='$this->email'";
        $result=$this->conn->prepare($query);
        $result->execute();

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
         return Utility::redirect('../../../../view/BITM/F2S/User/userSignUp.php');
    }

    public function update(){

        $query="UPDATE `hospital_management_system`.`patient_info` SET `first_name`=:firstName, `last_name` =:lastName ,  `email` =:email, `phone` = :phone,
 `address` = :address  WHERE `patient_info`.`email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':first_name'=>$this->firstName,':last_name'=>$this->lastName,':email'=>$this->email,':phone'=>$this->phone,
            ':address'=>$this->address,':email_token'=>$this->email_token));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }

    public function allUsers(){


        $sqlQuery ="SELECT * FROM `patient_info`";

        $sth = $this->conn->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $allUsers = $sth->fetchAll();

        return $allUsers;

    }



 public function allDoctors(){


        $sqlQuery ="SELECT * FROM `doctors_info`";

        $sth = $this->conn->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $allDoctors = $sth->fetchAll();

        return $allDoctors;

    }

    public function allMedicines(){


        $sqlQuery ="SELECT * FROM `medicine`";

        $sth = $this->conn->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $allMedicine = $sth->fetchAll();

        return $allMedicine;

    }

    public function allAppointments(){


        $sqlQuery ="SELECT * FROM `appointment`";

        $sth = $this->conn->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $allAppointment = $sth->fetchAll();

        return $allAppointment;

    }
    public function allBills(){


        $sqlQuery ="SELECT * FROM `bill_info`";

        $sth = $this->conn->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $allBill = $sth->fetchAll();

        return $allBill;

    }
    public function allPayments(){


        $sqlQuery ="SELECT * FROM `Payment`";

        $sth = $this->conn->query($sqlQuery);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $allPayment = $sth->fetchAll();

        return $allPayment;

    }
    public function getUserId()
    {
        $query = "SELECT `id` FROM `patient_info` WHERE `email`='".$this->email."'";
        //var_dump($query);die();
        if ($result = $this->conn->query($query)) {
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            return $row;
        }
        return false;
    }


    public function userInfo()
    {
        $query = "SELECT * FROM `patient_info` WHERE `email`='" . $this->userEmail . "'";

        $result = $this->conn->query($query) ;

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row;


    }



}

