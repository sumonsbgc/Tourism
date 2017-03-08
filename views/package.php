<?php include_once('header.php');
include_once "../vendor/autoload.php";
use App\Model\Package\Package;
$pack = new Package();
$packages = $pack->selectAll();
?>
	<!---End-header---->
	<div class="content">
		<!---start-services---->
		<div class="services">
			<div class="wrap">
				<div class="section group group">
					<!-- Page Content -->
					<div class="container">
						<!-- Page Heading -->
						<div class="row">
							<div class="col-lg-12">
								<h3 class="page-header">
									Our Packages Per Person
								</h3>
							</div>
						</div>
						<!-- /.row -->
						<!-- Project One -->
						<?php foreach($packages as $package){ ?>
						<div class="row">
							<div class="col-md-7">
								<a href="#">
									<img class="img-responsive" src="../Resources/images/<?php echo $package->img_name; ?>" alt="">
								</a>
							</div>
							<div class="col-md-5">
								<h3><a href="booking.php?id=<?php echo $package->package_id; ?>"><?php echo $package->title; ?></a></h3>
								<h4><?php echo $package->tour_location; ?></h4>
								<p><span>Tour Place : </span><?php echo $package->tour_place; ?></p>
								<p><span>Hotel Name : </span><?php echo $package->hotel_name; ?></p>
								<p><span>Duration : </span><?php echo $package->tour_place; ?></p>
								<p><span>Vehicle : </span><?php echo $package->vehicle; ?></p>
								<p><span>Tour Cost : </span><?php echo $package->package_cost; ?></p>
							</div>
						</div>
						<!-- /.row -->
						<hr>
						<?php } ?>
						<!-- Pagination -->
						<div class="row text-center">
							<div class="col-lg-12">
								<ul class="pagination">
									<li>
										<a href="#">&laquo;</a>
									</li>
									<li class="active">
										<a href="#">1</a>
									</li>
									<li>
										<a href="#">2</a>
									</li>
									<li>
										<a href="#">3</a>
									</li>
									<li>
										<a href="#">4</a>
									</li>
									<li>
										<a href="#">5</a>
									</li>
									<li>
										<a href="#">&raquo;</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container -->
				</div>
			</div>
		</div>
	</div>
<?php include_once "footer.php"; ?>