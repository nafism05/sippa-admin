<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	
	<link rel="shortcut icon" href="images/favicon.png">
	<title><?=$title?></title>

	<!-- Bootstrap Core CSS -->
	<link href="<?=base_url('assets/');?>template_polo/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url('assets/');?>template_polo/vendor/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link href="<?=base_url('assets/');?>template_polo/vendor/animateit/animate.min.css" rel="stylesheet">

	<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css">
	<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

	<!-- Vendor css -->
	<link href="<?=base_url('assets/');?>template_polo/vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
	<link href="<?=base_url('assets/');?>template_polo/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Template base -->
	<link href="<?=base_url('assets/');?>template_polo/css/theme-base.css" rel="stylesheet">

	<!-- Template elements -->
	<link href="<?=base_url('assets/');?>template_polo/css/theme-elements.css" rel="stylesheet">	
	
<!-- Responsive classes -->
	<link href="<?=base_url('assets/');?>template_polo/css/responsive.css" rel="stylesheet">

<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->	


	<!-- Template color -->
	<link href="<?=base_url('assets/');?>template_polo/css/color-variations/red-dark.css" rel="stylesheet" type="text/css" media="screen" title="blue">

	<!-- LOAD GOOGLE FONTS -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />

	<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,800,700,600" rel="stylesheet" type="text/css" />

	<!-- CSS CUSTOM STYLE -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>template_polo/css/custom.css" />

    <!--VENDOR SCRIPT-->
    <script src="<?=base_url('assets/');?>template_polo/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="<?=base_url('assets/');?>template_polo/vendor/plugins-compressed.js"></script>

</head>

<body class="no-page-loader">
	

	<!-- WRAPPER -->
	<div class="wrapper">

		<!-- TOPBAR -->
		<div id="topbar" class="">
			<div class="container">


				<div class="topbar-dropdown">
					<div class="title">English <i class="fa fa-caret-down"></i></div>
					<div class="dropdown-list">
						<a class="list-entry" href="#">French</a>
						<a class="list-entry" href="#">Spanish</a>
					</div>
				</div>
				<div class="topbar-dropdown">
					<div class="title"><i class="fa fa-user"></i><a href="#">Login</a></div>


					<div class="topbar-form">
						<form>
							<div class="form-group">
								<label class="sr-only">Username or Email</label>
								<input type="text" placeholder="Username or Email" class="form-control">

							</div>
							<div class="form-group">
								<label class="sr-only">Password</label>
								<input type="password" placeholder="Password" class="form-control">
							</div>
							<div class="form-inline form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox">
										<small> Remember me</small> </label>
								</div>
								<button type="button" class="btn btn-primary btn-block">Login</button>
							</div>
						</form>
					</div>
				</div>

				<div class="topbar-dropdown">
					<div class="title"><i class="fa fa-sun-o"></i>Melburne 15°</div>
				</div>

				<div class="hidden-xs">
					<div class="social-icons social-icons-colored-hover">
						<ul>
							<li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li class="social-pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
							<li class="social-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li class="social-youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
							<li class="social-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
		<!-- END: TOPBAR -->

		<!-- HEADER -->
		<header id="header" class="header-mini header-fullwidth">
			<div id="header-wrap">
				<div class="container">

					<!--LOGO-->
					<div id="logo">
						<a href="<?=site_url();?>" class="logo" data-dark-logo="images/logo-dark.png">
							<img src="images/logo.png" alt="ZETnet">
						</a>
					</div>
					<!--END: LOGO-->

					<!--MOBILE MENU -->
					<div class="nav-main-menu-responsive">
						<button class="lines-button x" type="button" data-toggle="collapse" data-target=".main-menu-collapse">
							<span class="lines"></span>
						</button>
					</div>
					<!--END: MOBILE MENU -->

					<!--SHOPPING CART -->
					<!-- <div id="shopping-cart">
						<span class="shopping-cart-items">8</span>
						<a href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
					</div> -->
					<!--END: SHOPPING CART -->

					<!--TOP SEARCH -->
					<div id="top-search"> <a id="top-search-trigger"><i class="fa fa-search"></i><i class="fa fa-close"></i></a>
						<form action="search-results-page.html" method="get">
							<input type="text" name="q" class="form-control" value="" placeholder="Start typing & press  &quot;Enter&quot;">
						</form>
					</div>
					<!--END: TOP SEARCH -->

					<!--NAVIGATION-->
					<div class="navbar-collapse collapse main-menu-collapse navigation-wrap">
						<div class="container">
							<nav id="mainMenu" class="main-menu mega-menu">
								<ul class="main-menu nav nav-pills">
									<li><a href="<?=site_url();?>"><i class="fa fa-home"></i></a>
									</li>
									<li><a href="<?=site_url($kategori_page);?>news">zetNews</a></li>
									<li><a href="<?=site_url($kategori_page);?>sport">zetSport</a></li>
									<li><a href="<?=site_url($kategori_page);?>health">zetHealth</a></li>
									<li><a href="<?=site_url($indeks_berita_page);?>">Indeks</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<!--END: NAVIGATION-->
				</div>
			</div>
		</header>
		<!-- END: HEADER -->

		<?php $this->load->view($include); ?>

		<!-- FOOTER -->
		<footer class="background-dark text-grey" id="footer">
			<div class="footer-content">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="footer-logo float-left">
								<img alt="" src="images/logo-sm-dark.png">
							</div>
							<p style="margin-top: 12px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla luctus. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.
							</p>

						</div>
					</div>
					<div class="seperator seperator-dark seperator-simple"></div>
					<div class="row">


						<div class="col-md-4">
							<div class="widget clearfix widget-contact-us" style="background-image: url('images/world-map.png'); background-position: 50% 55px; background-repeat: no-repeat">
								<h4 class="widget-title">Contact us</h4>
								<ul class="list-large list-icons">
									<li><i class="fa fa-map-marker"></i>
										<strong>Address:</strong> 795 Folsom Ave, Suite 600
										<br>San Francisco, CA 94107</li>
									<li><i class="fa fa-phone"></i><strong>Phone:</strong> (123) 456-7890 </li>
									<li><i class="fa fa-envelope"></i><strong>Email:</strong> <a href="mailto:first.last@example.com">first.last@example.com</a>
									</li>
									<li><i class="fa fa-clock-o"></i>Monday - Friday: <strong>08:00 - 22:00</strong>
										<br>Saturday, Sunday: <strong>Closed</strong>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="widget clearfix widget-tweeter">
								<h4 class="widget-title">Recent Tweets</h4>
								<ul class="list-tweets list-medium">
									<li>I just closed a deal in 14 minutes on EchoSign eSignature solution <a href="https://t.co/LNw6ludJ3S">https://t.co/LNw6ludJ3S</a>
										<span class="list-tweets-date">10 days ago</span>
									</li>
									<li>
										I love Dropbox because Simple it is the best for saving all important files that worth! <a href="https://t.co/EQvlz88Xht ">https://t.co/EQvlz88Xht </a>
										<span class="list-tweets-date">10 days ago</span>
									</li>



								</ul>

							</div>
						</div>

						<div class="col-md-4">

							<div class="widget clearfix widget-newsletter">
                                <form id="widget-subscribe-form" action="include/subscribe-form.php" role="form" method="post" class="form-inline">
                                    <h4 class="widget-title">Newsletter</h4>
                                    <small>Stay informed on our latest news!</small>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                        <input type="email" aria-required="true" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                                        <span class="input-group-btn">
											<button type="submit" id="widget-subscribe-submit-button" class="btn btn-primary">Subscribe</button>
										</span>
                                    </div>
                                </form>
                                <script type="text/javascript">
                                    jQuery("#widget-subscribe-form").validate({
                                        submitHandler: function(form) {
                                            jQuery(form).ajaxSubmit({
                                                dataType: 'json',
                                                success: function(text) {
                                                    if (text.response == 'success') {
                                                        $.notify({
                                                            message: "You have successfully subscribed to our mailing list."
                                                        }, {
                                                            type: 'success'
                                                        });
                                                        $(form)[0].reset();

                                                    } else {
                                                        $.notify({
                                                            message: text.message
                                                        }, {
                                                            type: 'warning'
                                                        });
                                                    }
                                                }
                                            });
                                        }
                                    });
                                  </script>
                            </div>

						</div>



					</div>


				</div>
			</div>
			<div class="copyright-content">
				<div class="container">
					<div class="row">
						<div class="copyright-text col-md-6"> &copy; 2015 POLO - Best HTML5 Template Ever. All Rights Reserved. <a target="_blank" href="http://www.inspiro-media.com">INSPIRO</a>
						</div>
						<div class="col-md-6">
							<div class="social-icons">
								<ul>
									<li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li class="social-pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
									<li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
									<li class="social-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li class="social-youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
									<li class="social-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- END: FOOTER -->

	</div>
	<!-- END: WRAPPER -->

	<!-- GO TOP BUTTON -->
	<a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>

	<!-- bootstrap datepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="<?=base_url('assets/');?>template_polo/js/theme-functions.js"></script>

	<!-- Custom js file -->
	<script src="<?=base_url('assets/');?>template_polo/js/custom.js"></script>

<script type="text/javascript">
$(function() {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
});
</script>

</body>

</html>
