<?php
namespace App\Model\Utility;

class Utility
{
    public static function d($data){
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }

    public static function dd($data){
        echo "<pre>";
        var_dump($data);
        echo "<pre>";
        die();
    }

    public static function redirect($val){
        header("Location:$val");
    }

    public static function site_url(){
        $siteAddress = "http://localhost/Tourism/views/index.php";
        return $siteAddress;
    }
}