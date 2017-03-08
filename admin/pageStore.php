<?php
include_once "../vendor/autoload.php";
use App\Model\Page\Page;
$page = new Page();
/*echo "<pre>";
var_dump($page);
var_dump($_POST);
var_dump($_FILES);
echo "</pre>";*/
$image_name = time().$_FILES['img_name']['name'];
$temporaryLocation = $_FILES['img_name']['tmp_name'];
move_uploaded_file($temporaryLocation,'../Resources/images/'.$image_name);
$_POST['img_name'] = $image_name;
$page->prepare($_POST)->store();
?>