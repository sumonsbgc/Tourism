<?php
include_once "../vendor/autoload.php";
use App\Model\Post\Post;
$post = new Post();
echo "<pre>";
var_dump($post);
var_dump($_POST);
var_dump($_FILES);
echo "</pre>";
//die();
$image_name = time().$_FILES['img_post']['name'];
$temporaryLocation = $_FILES['img_post']['tmp_name'];
move_uploaded_file($temporaryLocation,'../Resources/images/'.$image_name);
$_POST['img_post'] = $image_name;
$post->prepare($_POST)->store();

?>