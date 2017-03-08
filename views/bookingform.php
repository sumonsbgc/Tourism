<?php
include_once"../vendor/autoload.php";
use App\Model\Booking\Booking;
$booking = new Booking();
$booking->prepare($_POST)->store();
?>