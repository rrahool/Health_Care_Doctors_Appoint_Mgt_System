<?php
/**
 * Created by PhpStorm.
 * User: Trainer 402
 * Date: 5/29/2017
 * Time: 12:12 PM
 */

namespace App\bill;

use PDO;
use App\Message\Message;
use App\Model\Database;
use App\Utility\Utility;

class bill extends Database
{
    public $bill_id;
    public $pres_id;
    public $reg_fee;
    public $cabin;
    public $medicine;
    public $doctor;
    public $meal;
    public $other;
    public $total;
    public $service_charge;
    public $vat;
    public $gross_amount;

    public function setData($postArray){


        if(array_key_exists("bill_id",$postArray))
        {
            $this->bill_id = $postArray['bill_id'];
        }
        if(array_key_exists("pres_id",$postArray))
        {
            $this->pres_id = $postArray['pres_id'];
        }
         if(array_key_exists("reg_fee",$postArray))
        {
            $this->reg_fee = $postArray['reg_fee'];
        }


        if(array_key_exists("cabin",$postArray))
        {
            $this->cabin = $postArray['cabin'];
        }

        if(array_key_exists("medicine",$postArray))
        {
            $this->medicine = $postArray['medicine'];
        }
        if(array_key_exists("doctor",$postArray))
        {
            $this->doctor = $postArray['doctor'];
        }
        if(array_key_exists("meal",$postArray))
        {
            $this->meal = $postArray['meal'];
        }
        if(array_key_exists("other",$postArray))
        {
            $this->other = $postArray['other'];
        }
        if(array_key_exists("total",$postArray))
        {
            $this->total = $postArray['total'];
        }
        if(array_key_exists("service_charge",$postArray))
        {
            $this->service_charge = $postArray['service_charge'];
        }
        if(array_key_exists("vat",$postArray))
        {
            $this->vat = $postArray['vat'];
        }
        if(array_key_exists("gross_amount",$postArray))
        {
            $this->gross_amount = $postArray['gross_amount'];
        }

    }// end of setData()


    public function store(){

        $sqlQuery = "INSERT INTO `bill_info` (`pres_id`, `reg_fee`, `cabin`, `medicine`, `doctor`, `meal`, `other`, `total`, `service_charge`, `vat`, `gross_amount`,`date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP)";
        $dataArray = array($this->pres_id, $this->reg_fee,$this->cabin, $this->medicine,$this->doctor,$this->meal, $this->other,$this->total, $this->service_charge,$this->vat,$this->gross_amount);

        $STH = $this->conn->prepare($sqlQuery);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Data has been inserted successfully.");
        }
        else {
            Message::message("Failure :( Data has not been inserted due to an error.");

        }
        Utility::redirect("create.php");

    }// end of store()


    public function index(){

        $sqlQuery = "Select  * FROM bill_info WHERE is_trashed='No'";

        $STH =$this->conn->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData =$STH->fetchAll();
        return $allData;
    }


    public function view(){

        $sqlQuery ="SELECT * FROM `bill_info` WHERE `bill_id`=".$this->bill_id;
        //Utility::dd($sqlQuery);

        $STH = $this->conn->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();
        return $singleData;
    }




    public function update(){

        $dataArray = array($this->pres_id, $this->reg_fee,$this->cabin, $this->medicine,$this->doctor, $this->meal,$this->other, $this->total,$this->service_charge, $this->vat,$this->gross_amount, $this->date);

        $sqlQuery = "UPDATE `bill_info` SET `pres_id` = ?,`reg_fee` = ?,`cabin` = ?,`medicine` = ?,`doctor` = ?,`meal` = ?,`other` = ?,`total` = ?,`service_charge` = ?,`vat` = ?,`gross_amount` = ?,`date` = ? WHERE `bill_id` = $this->bill_id;";

          //Utility::dd($sqlQuery);



        $STH = $this->conn->prepare($sqlQuery);

        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Data has been updated successfully.");
        }
        else {
            Message::message("Failure :( Update is not possible due to an error.");

        }

    }// end of store()


    public function trash(){

        $sqlQuery = "UPDATE `bill_info` SET is_trashed=NOW() WHERE `bill_id` = ".$this->bill_id;

        $result=  $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success :) Data has been trashed successfully.");
        }
        else {
            Message::message("Failure :( Trashed is not possible due to an error.");

        }

    }

    public function trashed(){

        $sqlQuery = "Select * from bill_info where is_trashed <> 'No'";

        $STH =$this->conn->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData =$STH->fetchAll();
        return $allData;
    }


    public function recover(){

        $sqlQuery = "UPDATE `bill_info` SET is_trashed='No' WHERE `bill_id` = $this->bill_id;";

        $result=  $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success :) Data has been recovered successfully.");
        }
        else {
            Message::message("Failure :( Recovered is not possible due to an error.");

        }

    }





    public function delete(){

        $sqlQuery = "DELETE from `bill_info`  WHERE `bill_id` = $this->bill_id";

        $result=  $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success :) Data has been deleted successfully.");
        }
        else {
            Message::message("Failure :( Delete operation is not possible due to an error.");

        }

    }

}// end of BookTitle Class