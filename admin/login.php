<?php
session_start();
include_once ('../vendor/autoload.php');
use App\Model\User\User;
use App\Model\Message\Message;
use App\Model\Utility\Utility;
use App\Model\User\Auth;

$auth= new Auth();
$status=$auth->prepare($_POST)->is_registered();

if($status){
    $_SESSION['email']= $_POST['email'];
    Utility::redirect('index.php');
}else{
    Message::message("<div class=\"alert alert-danger\">
  <strong>Taken!</strong> Please submit correct email or password</div>");
    Utility::redirect('loginPage.php');
}



