<?php include_once('header.php');?>
		<!---start-content---->
		<div class="content">
			<div class="wrap">
			<!---start-contact---->
			<div class="section group alignCenter">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Contact Us</h3>
					    <form method="post" action="contactFrom.php">
					    	<div>
						    	<span><label for="name">NAME</label></span>
						    	<span><input name="name" type="text" class="textbox" id="name"></span>
						    </div>
						    <div>
						    	<span><label for="email">E-MAIL</label></span>
						    	<span><input name="email" type="text" class="textbox" id="email"></span>
						    </div>
						    <div>
						     	<span> <label for="phone"> MOBILE </label></span>
						    	<span><input name="phone_no" type="text" class="textbox" id="phone"></span>
						    </div>
						    <div>
						    	<span><label for="subject">SUBJECT</label></span>
						    	<span><textarea name="subject" id="subject"></textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" class="mybutton" value="Submit"></span>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			</div>
			<!---End-contact---->
			<div class="clear"> </div>
		</div>
		<!---End-content---->
		<div class="clear"> </div>

<?php include_once "footer.php"; ?>