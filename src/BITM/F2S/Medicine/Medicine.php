<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 7/4/2017
 * Time: 12:46 PM
 */

namespace App\Medicine;

use PDO;
use App\Utility\Utility;
use App\Message\Message;
use App\Model\Database;


class Medicine extends Database
{
    public $id;
    public $medicineName;
    public $price;
    public $category;

    public function setData($postArray){
        if (array_key_exists("id", $postArray)) {
            $this->id = $postArray['id'];
        }
        if(array_key_exists("medicineName",$postArray))
        {
            $this->medicineName = $postArray['medicineName'];

        }
        if (array_key_exists("price", $postArray)) {
            $this->price = $postArray['price'];
        }
        if (array_key_exists("category", $postArray)) {
            $this->category = $postArray['category'];
        }
    }// end of setData()


    public function store()
    {
        $medicineName =$this->medicineName;
        $price =$this->price;
        $category =$this->category;

        $sqlQuery = "INSERT INTO `medicine` ( `medicine_name`, `price`, `category`) VALUES ( ?, ?, ?);";

        $dataArray = array($medicineName,$price,$category);

        $STH = $this->conn->prepare($sqlQuery);
        $result = $STH->execute($dataArray);

        if ($result) {
            Message::message("Success! Data has been inserted Successfully!");
        } else {
            Message::message("Error! Data has not been inserted.");

        }


    }// end of store()


    public function index(){
        $sqlQuery = "SELECT * FROM `medicine` WHERE is_trashed='No' ";
        $STH = $this->conn->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }//end of index methode

    public function view(){

        $sqlQuery = "Select * from medicine where id=".$this->id;

        $STH = $this->conn->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();
        return $singleData;
    }


    public function update()
    {
        $medicineName =$this->medicineName;
        $price =$this->price;
        $category =$this->category;

        $sqlQuery = "UPDATE `medicine` SET `medicine_name` = ?, `price` = ?, `category` = ? WHERE `medicine`.`id` = $this->id;";

        $dataArray = array($medicineName,$price,$category);

        $STH = $this->conn->prepare($sqlQuery);
        $result = $STH->execute($dataArray);



        if ($result) {
            Message::message("Success! Data has been updated Successfully!");
        } else {
            Message::message("Error! Data has not been updated.");

        }


    }// end of store()

    public function trash()
    {

        $sqlQuery = "UPDATE `medicine` SET is_trashed=NOW() WHERE `id` = $this->id;";

        $result = $this->conn->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been trashed Successfully!");
        } else {
            Message::message("Error! Data has not been trashed.");

        }
    }// end of trash()


    public function trashed()
    {

        $sqlQuery = "SELECT * FROM `medicine` WHERE is_trashed <> 'No' ";
        $STH = $this->conn->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();
        return $allData;
    }// end of trashed()

    public function recover()
    {

        $sqlQuery = "UPDATE `medicine` SET is_trashed='NO' WHERE `id` = $this->id;";

        $result = $this->conn->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been trashed Successfully!");
        } else {
            Message::message("Error! Data has not been trashed.");

        }
    }// end of recover()

    public function delete()
    {

        $sqlQuery = "DELETE from `medicine` WHERE `id` = $this->id;";

        $result = $this->conn->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been deleted Successfully!");
        } else {
            Message::message("Error! Data has not been deleted.");

        }
    }// end of delete()

    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['medicineName']) && isset($requestArray['category']) )  $sql = "SELECT * FROM `medicine` WHERE `is_trashed` ='No' AND (`medicine_name` LIKE '%".$requestArray['search']."%' OR `category` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['medicineName']) && !isset($requestArray['category']) ) $sql = "SELECT * FROM `medicine` WHERE `is_trashed` ='No' AND `medicine_name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['medicineName']) && isset($requestArray['category']) )  $sql = "SELECT * FROM `medicine` WHERE `is_trashed` ='No' AND `category` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();

        return $someData;

    }// end of search()

    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->medicine_name);
        }


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->medicine_name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->category);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->category);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords



    public function indexPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);

        if($start<0) $start = 0;


        $sql = "SELECT * from medicine  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->conn->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of paginator



}// end of Medicine Class