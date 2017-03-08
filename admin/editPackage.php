<?php
include_once "../vendor/autoload.php";
use App\Model\Package\Package;
$package = new Package();
$editPackage = $package->prepare($_GET)->selectById();
//var_dump($editPackage);
include_once"header.php";
?>
<div class="right_col" role="main">
    <div id="container">
         <div class="row">
            <div class="col-lg-12">
                <div class="heading">
                    <h2>Update Package</h2>
                </div>   
                <div class="formArea">
                    <form action="updatePackage.php" method="post" enctype="multipart/form-data">
                        <div class="col-lg-8">
                            <label for="package">Package Name</label>
                            <input type="text" id="package" name="title" value="<?php echo $editPackage->title; ?>" class="form-control">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $editPackage->id; ?>">
                        <div class="col-lg-8">
                            <label for="img_name">Package Thumbnail</label>
                            <input id="img_name" type="file" name="img_name" class="form-control">
                            <div class="img-responsive">
                                <img src="../Resources/images/<?php echo $editPackage->img_name; ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <label for="place">Tour Place</label>
                            <input id="place" value="<?php echo $editPackage->tour_place; ?>" type="text" name="tour_place" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label for="location">Tour Location</label>
                            <input id="location" value="<?php echo $editPackage->tour_location; ?>" type="text" name="tour_location" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label for="hotel">Hotel Name</label>
                            <input id="hotel" value="<?php echo $editPackage->hotel_name; ?>" type="text" name="hotel_name" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label for="duration">Duration</label>
                            <input id="duration" value="<?php echo $editPackage->duration; ?>" type="text" name="duration" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label for="vehicle">Vehicle</label>
                            <input id="vehicle" value="<?php echo $editPackage->vehicle; ?>" type="text" name="vehicle" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label for="cost">Package Cost</label>
                            <input value="<?php echo $editPackage->package_cost; ?>" name="package_cost" type="text" class="form-control" id="cost">
                        </div>
                        <div class="col-lg-8">
                            <input name="submit" type="submit" value="Save" class="btn btn-info btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once"footer.php"; ?>