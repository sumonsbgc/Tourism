<?php
include_once ('../vendor/autoload.php');
use App\Model\Contact\Contact;
use App\Model\Message\Message;
use App\Model\Utility\Utility;

$contactList= new Contact();
$contactList->prepare($_POST)->trash();

