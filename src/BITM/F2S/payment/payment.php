<?php
/**
 * Created by PhpStorm.
 * User: Trainer 402
 * Date: 5/29/2017
 * Time: 12:12 PM
 */

namespace App\Payment;

use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;

class Payment extends Database
{
    public $pay_id;
    public $bill_id;
    public $discount;
    public $net_amount;
    public $paid_amount;
    public $due_amount;

    public function setData($postArray){

        if(array_key_exists("pay_id",$postArray))
        {
            $this->pay_id = $postArray['pay_id'];
        }
        if(array_key_exists("bill_id",$postArray))
        {
            $this->bill_id = $postArray['bill_id'];
        }

        if(array_key_exists("discount",$postArray))
        {
            $this->discount = $postArray['discount'];
        }

        if(array_key_exists("net_amount",$postArray))
        {
            $this->net_amount = $postArray['net_amount'];
        }
        if(array_key_exists("paid_amount",$postArray))
        {
            $this->paid_amount = $postArray['paid_amount'];
        }
        if(array_key_exists("due_amount",$postArray))
        {
            $this->due_amount = $postArray['due_amount'];
        }
    }// end of setData()


    public function store(){

        $sqlQuery = "INSERT INTO `Payment` (`bill_id`, `discount`, `net_amount`, `paid_amount`, `due_amount`,`date`) VALUES (?,?,?,?,?,CURRENT_DATE )";
        $dataArray = array($this->bill_id, $this->discount,$this->net_amount, $this->paid_amount,$this->due_amount);

        $STH = $this->conn->prepare($sqlQuery);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Data has been inserted successfully.");
        }
        else {
            Message::message("Failure :( Data has not been inserted due to an error.");

        }

    }// end of store()


    public function index(){

        $sqlQuery = "Select * from Payment where is_trashed='No'";

        $STH =$this->conn->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData =$STH->fetchAll();
        return $allData;
    }


    public function view(){

        $sqlQuery = "Select * from Payment where pay_id=".$this->pay_id;

        $STH =$this->conn->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData =$STH->fetch();
        return $singleData;
    }




    public function update(){
        $dataArray = array($this->bill_id, $this->discount,$this->net_amount, $this->paid_amount,$this->due_amount);
        $sqlQuery = "UPDATE `Payment` SET `bill_id` = ?,`discount` = ?,`net_amount` = ?,`paid_amount` = ?,`due_amount` = ? WHERE `pay_id` = $this->pay_id;";

       // Utility::dd($sqlQuery);




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

        $sqlQuery = "UPDATE `Payment` SET is_trashed=NOW() WHERE `pay_id` = $this->pay_id;";

        $result=  $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success :) Data has been trashed successfully.");
        }
        else {
            Message::message("Failure :( Trashed is not possible due to an error.");

        }

    }

    public function trashed(){

        $sqlQuery = "Select * from Payment where is_trashed <> 'No'";

        $STH =$this->conn->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData =$STH->fetchAll();
        return $allData;
    }


    public function recover(){

        $sqlQuery = "UPDATE `Payment` SET is_trashed='No' WHERE `pay_id` = $this->pay_id;";

        $result=  $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success :) Data has been trashed successfully.");
        }
        else {
            Message::message("Failure :( Trashed is not possible due to an error.");

        }

    }





    public function delete(){

        $sqlQuery = "DELETE from `Payment`  WHERE `pay_id` = $this->pay_id;";

        $result=  $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success :) Data has been deleted successfully.");
        }
        else {
            Message::message("Failure :( Delete operation is not possible due to an error.");

        }

    }

}// end of BookTitle Class