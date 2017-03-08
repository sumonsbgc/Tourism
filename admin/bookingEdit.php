<?php
include_once "../vendor/autoload.php";
use App\Model\Booking\Booking;
$booking = new Booking();
$bookingEdit = $booking->prepare($_GET)->selectById();
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
					<form action="bookingUpdate.php" method="post" enctype="multipart/form-data">
						<div class="col-lg-8">
		                  <label for="title">Name</label>
		                  <input type="hidden" name="id" value="<?php echo $bookingEdit->id; ?>">
		                  <input value="<?php echo $bookingEdit->name; ?>" type="text" name="name" class="form-control" id="name">
		                </div>
		                <div class="col-lg-8">
		                  <label for="title">Email</label>
		                  <input value="<?php echo $bookingEdit->email; ?>" type="text" name="email" class="form-control" id="email">
		                </div>
		                <div class="col-lg-8">
		                  	<label for="title">Gender</label>
							<div class="radio">
								<label>
									<input type="radio" value="Male" name="gender" <?php if($bookingEdit->gender=="Male"){ echo "checked"; } ?>> Male
								</label>
								<label>
									<input type="radio" value="Female" name="gender" <?php if($bookingEdit->gender=="Female"){ echo "checked"; } ?>> Female
								</label>
							</div>
						</div>

		                <div class="col-lg-8">
		                  <label for="title">Phone</label>
		                  <input value="<?php echo $bookingEdit->phone; ?>" type="text" name="phone" class="form-control" id="phone">
		                </div>
		                <div class="col-lg-8">
		                  <label for="title">Address</label>
	                  <textarea placeholder="Postal Address" name="address" class="form-control"><?php echo $bookingEdit->address; ?></textarea>
		                </div>
		                <div class="col-lg-8">
		                  <label for="title">Country</label>
		                  <input value="<?php echo $bookingEdit->country; ?>" type="text" name="country" class="form-control" id="country">
		                </div>
		                <div class="col-lg-8">
		                  	<label for="title">Tour Package</label>
							<select class="form-control selectpicker" name="tour_package">
								<option value=" ">Please select your Package</option>
								<option <?php if ($bookingEdit->tour_package == "Alabama") {
									echo "selected";
								}?>>Alabama</option>
								<option <?php if ($bookingEdit->tour_package == "Alaska") {
									echo "selected";
								}?>>Alaska</option>
								<option <?php if ($bookingEdit->tour_package == "Arizona") {
									echo "selected";
								}?>>Arizona</option>
								<option <?php if ($bookingEdit->tour_package == "Arkansas") {
									echo "selected";
								}?>>Arkansas</option>
								<option <?php if ($bookingEdit->tour_package == "California") {
									echo "selected";
								}?>>California</option>
							</select>
		                </div>
		                <div class="col-lg-8">
		                  <label for="title">Person No</label>
		                  <input value="<?php echo $bookingEdit->person_no; ?>" type="text" name="person_no" class="form-control" id="person_no">
		                </div>
		                <div class="col-lg-8">
		                  	<label for="title">Payment Method</label>
			                <select class="form-control selectpicker" name="payment_method">
								<option>Please select your Payment Method</option>
								<option <?php if ($bookingEdit->payment_method == "Bkash") {
									echo "selected";
								}?>>Bkash</option>
								<option <?php if ($bookingEdit->payment_method == "Mobile Banking") {
									echo "selected";
								}?>>Mobile Banking</option>
								<option <?php if ($bookingEdit->payment_method == "On Cash") {
									echo "selected";
								}?>>On Cash</option>
							</select>
		                </div>
		                <div class="col-lg-8">
		                  <label for="title">Account Number</label>
		                  <input value="<?php echo $bookingEdit->acc_number; ?>" type="text" name="acc_number" class="form-control" id="acc_number">
		                </div>
		                <div class="col-lg-8">
		                  <label for="title">password</label>
		                  <input value="<?php echo $bookingEdit->password; ?>" type="password" name="password" class="form-control" id="password">
		                </div>
		                <div class="col-lg-8">
		                  <label for="title"></label>
		                  <br>
		                  <input type="submit" value="Update" name="update" class="btn btn-info" id="update">
		                </div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
<?php include_once"footer.php"; ?>	