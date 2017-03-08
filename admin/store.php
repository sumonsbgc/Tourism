<?php
include_once "../vendor/autoload.php";
use App\Model\Package\Package;
$package = new Package();
echo "<pre>";
var_dump($_FILES);

$image_name = time().$_FILES['img_name']['name'];
$temporaryLocation = $_FILES['img_name']['tmp_name'];
move_uploaded_file($temporaryLocation,'../Resources/images/'.$image_name);
$_POST['img_name'] = $image_name;
$package->prepare($_POST)->store();
