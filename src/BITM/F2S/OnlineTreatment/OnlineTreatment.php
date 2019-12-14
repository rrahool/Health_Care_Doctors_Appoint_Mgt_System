<?php
namespace App\OnlineTreatment;

use App\Utility\Utility;
use PDO;
use App\Model\Database;

class OnlineTreatment extends Database
{
    public $id;
    public $name;
    public $email;
    public $doctors_id;
    public $password;
    public $type;
    public $status;
    public $address;
    public $message_no;
    public $reply_no;
    public $image;
    public $availableTime;
    public $country = "";
    public $userEmail;
    public $sms;
    public $reply;
    public $diseaseName;
    public $user_id;
    public $join_date;
    public $join_time;
    public $mobile;



    public function setData($data)
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('name', $data)) {
            $this->name = ucfirst($data['name']);
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('doctors_id', $data)) {
            $this->doctors_id = $data['doctors_id'];
        }
        if (array_key_exists('diseaseName', $data)) {
            $this->diseaseName = $data['diseaseName'];
        }
        if (array_key_exists('sms', $data)) {
            $this->sms = $data['sms'];
        }
        if (array_key_exists('reply', $data)) {
            $this->reply = $data['reply'];
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
        if (array_key_exists('image', $data)) {
            $this->image = $data['image'];
        }
        if (array_key_exists('availableTime', $data)) {
            $this->availableTime = $data['availableTime'];
        }
        if (array_key_exists('country', $data)) {
            $this->country = $data['country'];
        }
        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        }
        if (array_key_exists('message_no', $data)) {
            $this->message_no = $data['message_no'];
        }
        if (array_key_exists('reply_no', $data)) {
            $this->reply_no = $data['reply_no'];
        }
        if (array_key_exists('userEmail', $data)) {
            $this->userEmail = $data['userEmail'];
        }
        return $this;
    }





    public function getAllTypeCardiology()
    {
        $allDoctors=array();
        $query="SELECT * FROM `doctors_info` WHERE `type`='Cardiology'";
        $sth = $this->conn->query($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $allData =  $sth->fetchAll();

        return $allData;
    }
    public function getAllTypePediatric()
    {
        $allDoctors=array();
        $query="SELECT * FROM `doctors_info` WHERE `type`='Pediatric'";
        $sth = $this->conn->query($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $allData =  $sth->fetchAll();

        return $allData;
    }

    public function smsStore(){
        $message_date=date("Y-m-d H:i:s");
        date_default_timezone_set("Asia/Dhaka");
        $message_time=date("g:i a");
        $query="INSERT INTO `patient_msg` (`patient_id`, `doctor_id`, `diseaseName`, `sms`, `message_date`, `message_time`) VALUES 
        ('".$this->user_id."', 
        '".$this->doctors_id."', '".$this->diseaseName."', '".$this->sms."', '".$message_date."', '".$message_time."');";

        if($this->conn->query($query)){
            return true;
        }else return false;
    }
    
    public function getUserMessageToDoctor()
    {
        $allSms = array();
        $query = "SELECT * FROM patient_msg INNER JOIN patient_info on patient_msg.patient_id=patient_info.patient_id AND 
        `doctors_id`='".$this->doctors_id."' ORDER BY patient_msg.message_no DESC";
        //var_dump($query);die();
        $sth = $this->conn->query($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $allData =  $sth->fetchAll();

        return $allData;
    }

    public function getSingleUserMessage(){
            $query="SELECT patient_msg.message_no, patient_msg.patient_id, patient_msg.doctors_id, patient_msg.diseaseName, patient_msg
                    .sms, patient_msg.message_date, patient_msg.message_time, patient_info.name, patient_info.email, doctors_info.doctor_name 
                    FROM `user_message` INNER JOIN users,doctors 
                    WHERE patient_msg.patient_id=patient_info.user_id AND patient_msg.doctors_id=doctors_info.doctors_id AND 
                    message_no='".$this->message_no."'";

        $sth = $this->conn->query($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $allData =  $sth->fetchAll();

        return $allData;
    }
    

    public function setMessageAsRead(){
        $randTime=time();
        $query="UPDATE `patient_msg` SET `read_unread_status` = '".$randTime."' WHERE `patient_msg`.`message_no` 
        ='".$this->message_no."'";
        $sth = $this->conn->prepare($query);

    }

    public function getUnreadMessageOfADoctor(){
        $unreadMessage=array();
            $query="SELECT patient_msg.read_unread_status FROM patient_msg WHERE doctors_id='".$this->doctors_id."' AND 
            read_unread_status is NULL";
        //var_dump($query);die();
        $sth = $this->conn->query($query);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $singleData =  $sth->fetchAll();

        return $singleData;
    }


    public function replyStore(){
        $reply_date=date("Y-m-d H:i:s");
        date_default_timezone_set("Asia/Dhaka");
        $reply_time=date("g:i a");
        $query="INSERT INTO `doctors_reply` (`doctors_id`, `patient_id`, `diseaseName`, `reply`, `reply_date`, `reply_time`) VALUES 
        ('".$this->doctors_id."', 
                '".$this->user_id."', '".$this->diseaseName."', '".$this->reply."', '".$reply_date."', '".$reply_time."');";
        //var_dump($query);die();
        $sth = $this->conn->prepare($query);
    }

    public function getUnreadReplyOfAUser(){
        $unreadMessage=array();
        $query="SELECT doctors_reply.read_unread_status FROM doctors_reply WHERE patient_id='".$this->user_id."' AND 
            read_unread_status is NULL";
        //var_dump($query);die();
        $sth = $this->conn->query($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $allData =  $sth->fetchAll();

        return $allData;
    }

    public function getDoctorReplyToUser()
    {
        $allReply = array();
        $query = "SELECT * FROM `doctors_reply` INNER JOIN doctors_info on doctors_reply.doctors_id=doctors_info.doctors_id AND
         patient_id='".$this->user_id."' ORDER BY doctors_reply.reply_no DESC";
        //var_dump($query);die();
        $sth = $this->conn->query($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $allData =  $sth->fetchAll();

        return $allData;
    }

    public function getSingleDoctorReply(){
        $query="SELECT doctors_reply.reply_no, doctors_reply.doctors_id, doctors_reply.patient_id, doctors_reply
        .diseaseName, doctors_reply.reply, doctors_reply.reply_date, doctors_reply.reply_time, patient_info.first_name, doctors_info
        .doctor_name FROM `doctors_reply` INNER JOIN patient_info,doctors_info WHERE doctors_reply.user_id=patient_info.user_id AND 
        doctors_reply.doctors_id=doctors_info.doctors_id AND reply_no='".$this->reply_no."'";
        //var_dump($query);die();
        $sth = $this->conn->query($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $allData =  $sth->fetchAll();

        return $allData;
    }


    public function setReplyAsRead(){
        $randTime=time();
        $query="UPDATE `doctors_reply` SET `read_unread_status` = '".$randTime."' WHERE `doctors_reply`.`reply_no` 
        ='".$this->reply_no."'";
        //var_dump($query);die();
        $sth = $this->conn->prepare($query);

    }





}
