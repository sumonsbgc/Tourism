<?php
include_once "../vendor/autoload.php";
use App\Model\Booking\Booking;
$booking = new Booking();
$update = $booking->prepare($_POST)->update();