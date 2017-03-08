<?php
include_once "../vendor/autoload.php";
use App\Model\Post\Post;
$post =  new Post();

//var_dump($_POST);
//var_dump($_FILES);

$singleView = $post->prepare($_POST)->selectById();

$img_name = time().$_FILES['img_post']['name'];
$tmpLocation = $_FILES['img_post']['tmp_name'];
unlink('../Resources/images/'.$singleView->img_post);
move_uploaded_file($tmpLocation,'../Resources/images/'.$img_name);
$_POST['img_name']=$img_name;
$post->prepare($_POST)->update();
