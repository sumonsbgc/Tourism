<?php include_once('header.php');
include_once "../vendor/autoload.php";
use App\Model\Post\Post;
$post = new Post();

$content = $post->selectAll();
?>
			<!---End-header---->
		<!--start-image-slider---->
		<div class="image-slider">
			<!-- Slideshow 1 -->
			<ul class="rslides" id="slider1">
				<?php foreach($content as $slider){?>
			  	<li><img src="../Resources/images/<?php echo $slider->img_post;?>" alt=""></li>
				<?php } ?>
			</ul>
			 <!-- Slideshow 2 -->
		</div>
			<!--End-image-slider---->
		<!---End-wrap---->
		<div class="clear"> </div>
		<!---start-content---->
		<div class="content">
			    <div class="content_top">
			    	<div class="wrap">
						<h1><a href="#">WELCOME.</a></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, </p>
						<span><a class="learnmore" href="#">LEARN MORE</a></span>
					</div>
			    </div>

			<div class="content-grids">
				<div class="wrap">

				<?php foreach($content as $service){?>
				<div class="grid">
					<a href="#"><img src="../Resources/images/<?php echo $service->img_post; ?>" title="image-name" /></a>
					<h3><?php echo strtoupper($service->title); ?></h3>
						<p><?php echo $service->content; ?></p>
					<a class="button" href="single.php?id=<?php echo $service->post_id; ?>">More</a>
				 </div>
				<?php }?>
				<div class="clear"> </div>
			</div>
		 </div>

			<div class="specials">
				<div class="wrap">
					<div class="specials-heading">
						<h3>Traveling Specials</h3>
					</div>
					<div class="specials-grids">
						<?php foreach($content as $special){?>
						<div id="grid" class="special-grid">
							<img src="../Resources/images/<?php echo $special->img_post; ?>" title="image-name" />
							<a href="#"><?php echo $special->title; ?></a>
							<p><?php echo $special->content; ?></p>
						</div>
						<?php }?>
						<div class="clear"> </div>
					</div>
			    </div>
			</div>	
			<div class="testmonials">
				<div class="wrap">
					<div class="testmonial-grid">
						<h3>TESTIMONIALS :</h3>
						<p>&#34; Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat luctus eros ac placerat. Quisque erat metus, facilisis non felis eu, aliquam hendrrit quam. Donec ut lectus vel dolor adipiscing tincidunt. Ut auctor diam at est iaculis, vitae interdum magna sagittis.&#34;</p>
						<a href="#"> - Lorem ipsum</a>
					</div>
				</div>
			</div>
		</div>
		<!---End-content---->
		<div class="clear"> </div>

<?php include_once "footer.php"; ?>