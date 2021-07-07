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
									<img src="../images/logo.png" alt="Company logo" />
								</a>
							</div>
                            <!--End Logo -->
							<div class="clear-toggle"></div>
							<div id="main-menu" class="collapse scroll navbar-right">
								<ul class="nav">
                                
									<li class="active"> <a href="../index.php">Home</a> </li>
									
									<li> <a href="#about">About</a> </li>
                                    
                                    <li> <a href="#works"> Our Work</a> </li>
                                    
                                    <li> <a href="#documents">Documents</a> </li>
                                   
								    <li> <a href="#team">Our Team</a> </li>

								    <li> <a href="#clients">Testimonials</a> </li>

								    <li> <a href="#companies">Companies</a> </li>
                                     
									<li> <a href="#contact">Contact</a> </li>
										
								</ul>
							</div><!-- end main-menu -->
						</div>
					</div>
				</div>
			</header>
    <!--End Navigation-->

    <!-- Starting about -->
	<section id="about" class="about">
		<?php include 'sections/message.php';?>
	</section>
<!-- about Ends Here -->

<!-- Starting works -->
	<section id="works" class="works">
		<?php include 'sections/work.php';?>
	</section>
<!-- works Ends Here -->


<!-- Starting Documents -->
	<section id="documents" class="documents">
		<?php include 'sections/documents.php';?>
	</section>
<!-- team Ends Here -->


<!-- Starting team -->
	<section id="team" class="team">
		<?php include 'sections/team.php';?>
	</section>
<!-- team Ends Here -->

<!-- Starting clients -->
	<section id="clients" class="clients">
		<?php include 'sections/clients.php';?>
	</section>
<!-- clients Ends Here -->

<!-- Starting works -->
	<section id="companies" class="companies">
		<?php include 'sections/companies.php';?>
	</section>
<!-- works Ends Here -->

<!-- Starting contacts -->
	<section id="contact" class="contact">
		<?php include 'sections/contact.php';?>
	</section>
<!-- contacts Ends Here -->
