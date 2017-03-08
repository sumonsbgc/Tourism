<?php
include_once('header.php');
include_once "../vendor/autoload.php";
use App\Model\Booking\Booking;
$booking = new Booking();
$AllInfo = $booking->prepare($_GET)->selectById();
?>
<!---End-wrap---->
<div class="clear"> </div>
<!---start-content---->
    <div class="container">
        <div class="row">
            <div class="page-header">
                <h1>Your All Information</h1>
            </div>
            <div class="jumbotron">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Name </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->name; ?>              
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <h3 class="panel-title">Email </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->email; ?>              
                    </div>
                  </div>
                </div>                    
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Gender </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->gender; ?>              
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <h3 class="panel-title">Phone Number </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->phone; ?>              
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Address </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->address; ?>              
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <h3 class="panel-title">Country </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->country; ?>              
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Tour Package </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->tour_package; ?>              
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <h3 class="panel-title">Person Number </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->person_no; ?>              
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Payment Method </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->payment_method; ?>              
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <h3 class="panel-title">Account Number </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->acc_number; ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Total Amount </h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $AllInfo->person_no*3000;?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <h3>If you want to download, you can download as pdf</h3>
                <a class="btn btn-info" href="pdf.php?id=<?php echo $AllInfo->id; ?>">Download</a>
                </div>
            </div>
        </div>
    </div>
<!---End-content---->
<div class="clear"> </div>
<?php include_once "footer.php"; ?>