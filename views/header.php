<?php
include_once "../vendor/autoload.php";
$page = new \App\Model\Page\Page();
$pageName = $page->selectAll();
?>
<!DOCTYPE HTML>
<head>
    <title>Tourism</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <link href="../Resources/css/style.css" rel="stylesheet" type="text/css"  media="all" />
    <link href="../Resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"  media="all" />
    <link href="../Resources/css/main.css" rel="stylesheet" type="text/css"  media="all" />
    <link rel="stylesheet" href="../Resources/css/responsiveslides.css">
    <script src="../Resources/js/jquery.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 1
            $("#slider1").responsiveSlides({
                maxwidth: 2500,
                speed: 600
            });
            $('div.specials-grids>div:nth-child(3)').addClass('spe-grid');
            $('div.content-grids>div.wrap>div:nth-child(3)').addClass('last-grid');
        });
    </script>
</head>
<body>
<!---start-header---->
<div class="header">
    <div class="wrap">
        <div class="logo">
            <a href="index.php"><img src="../Resources/images/logo.png" title="logo" /></a>
        </div>
        <div class="top-nav">
            <ul>
                <?php foreach($pageName as $menu ) { ?>
                <li class="">
                    <?php $var = str_replace(array("Home"," ","Us","s"),array("index","","",""),$menu->title); ?>
                    <a href="<?php echo strtolower($var); ?>.php">
                        <?php echo strtoupper($menu->title); ?>
                    </a>
                </li>
                <?php }?>
            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>