<?php include_once"header.php"; ?>
<div class="right_col" role="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">               
                <div class="heading">
                    <h2>Add New Package</h2>
                </div>
                <div class="formArea">
                    <form action="store.php" method="post" enctype="multipart/form-data">
                        <div class="col-lg-8">
                            <label>Package Name</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="col-lg-8">
                            <label>Package Thumbnail</label>
                            <input type="file" name="img_name" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label>Tour Place</label>
                            <input type="text" name="tour_place" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label>Tour Location</label>
                            <input type="text" name="tour_location" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label>Hotel Name</label>
                            <input type="text" name="hotel_name" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label>Duration</label>
                            <input type="text" name="duration" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label>Vehicle</label>
                            <input type="text" name="vehicle" class="form-control">
                        </div>
                        <div class="col-lg-8">
                            <label>Package Cost</label>
                            <input name="package_cost" type="text" class="form-control">
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
