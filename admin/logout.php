<?php
session_start();
include_once ('../vendor/autoload.php');

//use App\Model\User\User;
use App\Model\Message\Message;
use App\Model\Utility\Utility;

use App\Model\User\Auth;
$auth= new Auth();
$status=$auth->logout();

if($status){
    Message::message("You are successfully logged-out");
    Utility::redirect('loginPage.php');
}

?>