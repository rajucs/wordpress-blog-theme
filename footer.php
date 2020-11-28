<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SoftStak_Blogger_Theme
 */

?>

<footer class="mainfooter" role="contentinfo">
	<div class="footer-middle">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<!--Column1-->
					<div class="footer-pad">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer_menu_one',
							'depth' => 2,
							'container_class' => '',
							'container_id' => 'navbarSupportedContent',
							'menu_class' => 'list-unstyled',
						));
						?>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<!--Column1-->
					<div class="footer-pad">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'footer_menu_two',
							'depth' => 2,
							'container_class' => '',
							'container_id' => 'navbarSupportedContent',
							'menu_class' => 'list-unstyled',
						));
						?>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<!--Column1-->
					<div class="footer-pad">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'footer_menu_three',
							'depth' => 2,
							'container_class' => '',
							'container_id' => 'navbarSupportedContent',
							'menu_class' => 'list-unstyled',
						));
						?>
					</div>
				</div>
				<div class="col-md-3">
					<h4>Follow Us</h4>
					<ul class="social-network social-circle">
						<li><a href="https://www.facebook.com/allofferinfobd" class="icoFacebook" title="Facebook"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#" class="icoLinkedin" title="Twitter"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 copy">
					<p class="text-center">&copy; Copyright <?php echo date('Y'); ?> - <strong><a href="<?php echo site_url(); ?>">alloffer.info</a></strong>. All rights reserved.</p>
				</div>
			</div>


		</div>
	</div>
</footer>
</div><!-- #page -->

<script src="<?php echo get_template_directory_uri() . '/js/jquery-3.5.1.min.js'; ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/popper.min.js	'; ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/bootstrap.min.js'; ?>"></script>

<?php wp_footer(); ?>

</body>

</html>