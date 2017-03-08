<?php
include_once "../vendor/autoload.php";
use App\Model\Page\Page;
$page = new Page();
$singleData = $page->prepare($_GET)->trash();