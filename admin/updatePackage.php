<?php
include_once "../vendor/autoload.php";
use App\Model\Package\Package;
$package =  new Package();

//var_dump($_POST);
//var_dump($_FILES);

$singleView = $package->prepare($_POST)->selectById();

$img_name = time().$_FILES['img_name']['name'];
$tmpLocation = $_FILES['img_name']['tmp_name'];
unlink('../Resources/images/'.$singleView->img_name);
move_uploaded_file($tmpLocation,'../Resources/images/'.$img_name);
$_POST['img_name']=$img_name;
$package->prepare($_POST)->update();
