<?php
include_once "../vendor/autoload.php";
use App\Model\Package\Package;
$package = new Package();

$package->prepare($_GET)->delete();