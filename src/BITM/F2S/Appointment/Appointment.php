<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 7/5/2017
 * Time: 4:58 PM
 */

namespace App\Appointment;

use PDO;
use App\Utility\Utility;
use App\Message\Message;
use App\Model\Database;



class Appointment extends Database
{
    public $id;
    public $patientName;
    public $doctorsName;
    public $patientPhone;
    public $time;

    public function setData($postArray)
    {
        if (array_key_exists("id", $postArray))
        {
            $this->id = $postArray['id'];
        }
        if(array_key_exists("patientName",$postArray))
        {
            $this->patientName = $postArray['patientName'];

        }
        if (array_key_exists("doctorsName", $postArray))
        {
            $this->doctorsName = $postArray['doctorsName'];
        }
        if (array_key_exists("patientPhone", $postArray))
        {
            $this->patientPhone = $postArray['patientPhone'];
        }
        if (array_key_exists("time", $postArray))
        {
            $this->time = $postArray['time'];
        }
    }// end of setData()

    public function store()
    {
        $patientName =$this->patientName;
        $doctorsName =$this->doctorsName;
        $patientPhone =$this->patientPhone;
        $time =$this->time;

        $sqlQuery ="INSERT INTO `appointment` (`patient_name`, `doctors_name`, `patient_phone`, `time`) VALUES (?, ?, ?, ?);";

        $dataArray = array($patientName,$doctorsName,$patientPhone,$time );

        $STH = $this->conn->prepare($sqlQuery);
        $result = $STH->execute($dataArray);



        if ($result) {
            Message::message("Success! Data has been inserted Successfully!");
        } else {
            Message::message("Error! Data has not been inserted.");

        }


    }// end of store()

    public function index(){
        $sqlQuery = "SELECT * FROM `appointment`";
        $STH = $this->conn->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }//end of index methode

    public function view(){

        $sqlQuery = "Select * from appointment where id=" . $this->id;

        $STH = $this->conn->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();
        return $singleData;

    }//end of view methode


    public function update()
    {
        $patientName =$this->patientName;
        $doctorsName =$this->doctorsName;
        $patientPhone =$this->patientPhone;
        $time =$this->time;

        $sqlQuery = "UPDATE `appointment` SET `patient_name` = ?, `doctors_name` = ?, `patient_phone` = ?, `time` = ? WHERE `appointment`.`id` = $this->id;";

        $dataArray = array($patientName,$doctorsName,$patientPhone,$time );

        $STH = $this->conn->prepare($sqlQuery);
        $result = $STH->execute($dataArray);



        if ($result) {
            Message::message("Success! Data has been updated Successfully!");
        } else {
            Message::message("Error! Data has not been updated.");

        }


    }// end of update()

    public function delete()
    {

        $sqlQuery = "DELETE from `appointment` WHERE `id` = $this->id;";

        $result = $this->conn->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been deleted Successfully!");
        } else {
            Message::message("Error! Data has not been deleted.");

        }
    }// end of delete()






}// end of Appointment Class

