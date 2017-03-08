<?php
session_start();
include_once ('../vendor/autoload.php');
use App\Model\User\User;
use App\Model\Message\Message;
use App\Model\Utility\Utility;
use App\Model\User\Auth;
$auth= new Auth();
$status=$auth->prepare($_POST)->is_exist();
if($status){
    Message::message("<div class=\"alert alert-danger\"><strong>Taken!</strong> 
                        Email already taken...</div>");
    Utility::redirect('loginPage.php');
}else{
    $obj= new User();
    $obj->prepare($_POST)->store();
}
