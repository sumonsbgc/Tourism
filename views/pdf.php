<?php
include_once '../vendor/autoload.php';
include_once '../vendor/mpdf/mpdf/mpdf.php';
use App\Model\Booking\Booking;
$book = new Booking();
$bd = $book->prepare($_GET)->selectById();
$listInfo = "<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\">";
$listInfo .= "<thead>
<tr>
    <th>Name</th>
    <th>Address</th>
    <th>Country</th>
    <th>Tour Package</th>
    <th>Person No</th>
    <th>Payment Method</th>
    <th>Account Number</th>
</tr>
</thead>";

$listInfo.="<tbody><tr>";
    $listInfo.= "<td>".$bd->name."</td>";
    $listInfo.= "<td>".$bd->address."</td>";
    $listInfo.= "<td>".$bd->country."</td>";
    $listInfo.= "<td>".$bd->tour_package."</td>";
    $listInfo.= "<td>".$bd->person_no."</td>";
    $listInfo.= "<td>".$bd->payment_method."</td>";
    $listInfo.= "<td>".$bd->acc_number."</td>";
$listInfo.="</tr></tbody></table>";

$html = <<<body
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Detail List</title>
    <!-- Bootstrap -->
    <link href="../../../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h2>Hello Mr/Mrs $bd->name. Here Is Your Booking Information</h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                $listInfo
            </div>
        </div>
    </div>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../resources/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
body;
$mpdf = new mPDF();
// Write some HTML code:
$mpdf->WriteHTML($html);
// Output a PDF file directly to the browser
$mpdf->Output('booking.pdf','D');