<?php
include_once "../vendor/autoload.php";
use App\Model\Package\Package;
$package = new Package();
$allPackage = $package->selectAll();

include_once "header.php";
?>
<div class="right_col" role="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Package Name</th>
                                    <th>Tour Place</th>
                                    <th>Tour Location</th>
                                    <th>Hotel Name</th>
                                    <th>Duration</th>
                                    <th>Vehicle</th>
                                    <th>Package Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sl=0; foreach($allPackage as $package){ $sl++;?>
                                <tr>
                                    <td><?php echo $sl;?></td>
                                    <td><?php echo $package->title; ?></td>
                                    <td><?php echo $package->tour_place; ?></td>
                                    <td><?php echo $package->tour_location; ?></td>
                                    <td><?php echo $package->hotel_name; ?></td>
                                    <td><?php echo $package->duration; ?></td>
                                    <td><?php echo $package->vehicle; ?></td>
                                    <td><?php echo $package->package_cost; ?></td>
                                    <td>
                                        <a class="btn btn-info" href="editPackage.php?id=<?php echo $package->package_id; ?>">Edit</a>
                                        <a class="btn btn-warning" href="deletePackage.php?id=<?php echo $package->package_id; ?>">Delete</a>
                                        <a class="btn btn-default" href="trashPackage.php?id=<?php echo $package->package_id; ?>">Trash</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once"footer.php"; ?>