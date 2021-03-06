<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SoftStak_Blogger_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/style.css'; ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

	<?php wp_head(); ?>
	<style>
		#menu-primary-menu li{
			padding-right: 20px;
		}
	</style>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<div class="navigation-wrap bg-light start-header start-style">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<nav class="navbar navbar-expand-md navbar-light">

							<a class="navbar-brand" href="<?php echo site_url(); ?>">All Offer</a>

							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<?php
							wp_nav_menu(array(
								'theme_location' => 'header_main_menu',
								'depth' => 2,
								'container' => 'div',
								'container_class' => 'navbar-collapse collapse',
								'container_id' => 'navbarSupportedContent',
								'menu_class' => 'navbar-nav ml-auto py-4 py-md-0',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'walker' => new WP_Bootstrap_Navwalker(),
							));
							?>

							<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
								<!-- <ul class="navbar-nav ml-auto py-4 py-md-0">
											<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
												<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#">Action</a>
													<a class="dropdown-item" href="#">Another action</a>
													<a class="dropdown-item" href="#">Something else here</a>
													<a class="dropdown-item" href="#">Another action</a>
												</div>
											</li>
											<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
												<a class="nav-link" href="#">Portfolio</a>
											</li>
											<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
												<a class="nav-link" href="#">Agency</a>
											</li>
											<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
												<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#">Action</a>
													<a class="dropdown-item" href="#">Another action</a>
													<a class="dropdown-item" href="#">Something else here</a>
													<a class="dropdown-item" href="#">Another action</a>
												</div>
											</li>
											<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
												<a class="nav-link" href="#">Journal</a>
											</li>
											<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
												<a class="nav-link" href="#">Contact</a>
											</li>
										</ul> -->
							<!-- </div> -->

						</nav>
					</div>
				</div>
			</div>
		</div>