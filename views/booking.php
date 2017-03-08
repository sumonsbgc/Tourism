<?php
include_once('header.php');
include_once "../vendor/autoload.php";
use App\Model\Package\Package;
$pack = new Package();
$packages = $pack->selectAll();
?>
		<!---End-wrap---->
		<div class="clear"> </div>
		<!---start-content---->
		<div class="content">
			<div class="bookingFormArea">
				<div class="container">
					<form class="well form-horizontal" action="bookingform.php" method="post"  id="contact_form">
						<fieldset>
							<!-- Form Name -->
							<legend>Booking Form!</legend>
							<div class="form-group">
								<label class="col-md-4 control-label" >Your Name</label>
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input name="name" placeholder="Last Name" class="form-control"  type="text">
									</div>
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label">E-Mail</label>
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										<input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
									</div>
								</div>
							</div>

							<!-- radio checks -->
							<div class="form-group">
								<label class="col-md-4 control-label">Select Gender</label>
								<div class="col-md-4">
									<div class="radio">
										<label>
											<input type="radio" name="gender" value="Male" /> Male
										</label>
										<label>
											<input type="radio" name="gender" value="Female" /> Female
										</label>
									</div>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label">Phone #</label>
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
										<input name="phone" placeholder="(+880)1515-121212" class="form-control" type="text">
									</div>
								</div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label">Address</label>
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										<textarea class="form-control" name="address" placeholder="Postal Address"></textarea>
									</div>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label">Country</label>
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										<input name="country" placeholder="country" class="form-control"  type="text">
									</div>
								</div>
							</div>

							<!-- Tour Packages -->
							<div class="form-group">
								<label class="col-md-4 control-label">Tour Packages</label>
								<div class="col-md-4 selectContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
										<select name="tour_package" class="form-control selectpicker" >
											<option value="">Please select your Package</option>
											<?php foreach($packages as $list){?>
												<option
													<?php
														if(array_key_exists('id',$_GET)) {
														  $id = $_GET['id'];
															if( $list->id == $id ){
																echo 'selected';
															}
														}
													?>>
													<?php echo $list->title; ?>
												</option>
											<?php }?>
										</select>
									</div>
								</div>
							</div>

							<!-- Number of Person -->
							<div class="form-group">
								<label for="person_no" class="col-md-4 control-label">Number of person</label>
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
										<input name="person_no" id="person_no" class="form-control" type="number">
									</div>
								</div>
							</div>

							<!-- Payment Method -->
							<div class="form-group">
								<label class="col-md-4 control-label">Payment Method</label>
								<div class="col-md-4 selectContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
										<select name="payment_method" class="form-control selectpicker" >
										<option value="">Please select your Payment Method</option>
											<option>Bkash</option>
											<option>Mobile Banking</option>
											<option >On Cash</option>
										</select>
									</div>
								</div>
							</div>

							<!-- Account Number -->
							<div class="form-group">
								<label class="col-md-4 control-label">Account Number</label>
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
										<input name="acc_number" placeholder="(+880)1555-121212" class="form-control" type="text">
									</div>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label">Password</label>
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
										<input name="password" class="form-control" placeholder="Password" type="password">
									</div>
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label">Re-Type Password</label>
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
										<input name="re_password" placeholder="Re-type Password" class="form-control" type="password">
									</div>
								</div>
							</div>
							<!-- Success message -->
				
							<!-- Button -->
							<div class="form-group">
								<label class="col-md-4 control-label"></label>
								<div class="col-md-4">
									<button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div><!-- /.container -->
			</div>
			<div class="clear"> </div>
		</div>
		<!---End-content---->
		<div class="clear"> </div>

<?php include_once "footer.php"; ?>