<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/7/2017
 * Time: 10:17 PM
 */

namespace App\Message;


class Msg
{




    public static function blue($message){
        echo $tag="<div class='alert alert-info'>".$message."</div>";
    }
    public static function green($message){
        echo   $tag="<div class='alert alert-success '>".$message."</div>";
    }
    public static function yellow($message){
        echo   $tag="<div class='alert alert-warning'>".$message."</div>";
    }
    public static function red($message){
        echo    $tag="<div class='alert alert-danger'>".$message."</div>";

    }


}