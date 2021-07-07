<!--Start Navigation-->
		<header id="header">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
								<span class="sr-only">Toggle navigation</span>
								<span class="fa fa-bars"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                            <!--Start Logo -->
							<div class="logo-nav">
								<a href="index.html">
									<img src="images/log.png" style="width: 150px; height: 50px;" alt="Company logo" />
								</a>
							</div>
                            <!--End Logo -->
							<div class="clear-toggle"></div>
							<div id="main-menu" class="collapse scroll navbar-right">
								<ul class="nav">
                                
									<li class="active"> <a href="#home">Home</a> </li>
									
									<li> <a href="#about">About</a> </li>
                                    
                                    <li> <a href="#works">Our Work</a> </li>
                                    
                                     <li> <a href="#companies">Companies</a> </li>
                                   
								    <li> <a href="#team">Our Team</a> </li>
                                     
									<li> <a href="#contact">Contact</a> </li>
										
								</ul>
							</div><!-- end main-menu -->
						</div>
					</div>
				</div>
			</header>
    <!--End Navigation-->

<!-- Starting Sliders -->
	<section id="home" class="home">
		<?php include 'sections/slider.php';?>
	</section>
<!-- Sliders Ends Here -->

<!-- About Starts Here -->
	<section id="about" class="about">
		<?php include 'sections/message.php';?>
	</section>
<!-- About Ends Here -->

<!-- Our Work Starts Here -->
	<section id="works" class="work">
		<?php include 'sections/employment_destinations.php';?>
		<?php include 'sections/facts.php';?>
	</section>
<!-- Our Work Ends Here -->

<!-- Companies Starts Here -->
	<section id="companies" class="companies">
		<?php include 'sections/companies.php';?>
	</section>
<!-- Companies Ends Here -->

<!-- Contact Starts Here -->
	<section id="team" class="team">
		<?php include 'sections/team.php';?>
	</section>
<!-- Contact Ends Here -->


<!-- Contact Starts Here -->
	<section id="contact" class="contact">
		<?php include 'sections/contact.php';?>
	</section>
<!-- Contact Ends Here -->



