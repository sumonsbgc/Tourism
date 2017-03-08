<?php
include_once ('../vendor/autoload.php');
use App\Model\Contact\Contact;
$contact = new Contact();

if( (isset($_POST['name'])) && (!empty($_POST['name'])) ){
    $contact = new Contact();
    $contact->prepare($_POST)->store();
}else{
    echo "Sorry!! The Field is empty!";
}