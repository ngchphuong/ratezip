<?php
/**
 * Footer
 *
 * Displays content shown in the footer section
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

</div>
<!-- End Page -->
<div class="small-12 large-12 columns bank">
	<div class="row bank">
		<div class="small-12 large-4 columns bank">
			<div class="small-12 large-6 columns bank lt_home_menu_footer">
				<div class="small-12 large-12 columns bank">
					<h2>Banks and Mortgage Lenders</h2>
				</div>
				<div class="small-12 large-12 columns bank">
					<ul>
						<li><a href="#">Bank of America</a></li>
						<li><a href="#">Wells Fargo</a></li>
						<li><a href="#">Chase</a></li>
						<li><a href="#">SunTrust</a></li>
						<li><a href="#">QuickenLoans</a></li>
						<li><a href="#">Key Bank</a></li>
						<li><a href="#">National Bank of Kansas City</a></li>
						<li><a href="#">Everbank</a></li>
						<li><a href="#">CitiMortgage</a></li>
						<li><a href="#">MetLife Bank</a></li>
					</ul>
				</div>
			</div>
			<div class="small-12 large-6 columns bank lt_home_menu_footer">
				<div class="small-12 large-12 columns bank">
					<h2>Insurance Companies</h2>
				</div>
				<div class="small-12 large-12 columns bank">
					<ul>
						<li><a href="#">Aetna Life</a></li>
						<li><a href="#">Federated Life</a></li>
						<li><a href="#">Guardian</a></li>
						<li><a href="#">Hartford</a></li>
						<li><a href="#">Lincoln National</a></li>
						<li><a href="#">Mass Mutual</a></li>
						<li><a href="#">MetLife</a></li>
						<li><a href="#">Nationwide</a></li>
						<li><a href="#">Northwestern Mutual</a></li>
						<li><a href="#">State Farm</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="small-12 large-8 columns bank2 lt_home_full_footer">
			<div class="small-12 large-3 columns bank lt_home_menu_footer">
				<div class="small-12 large-12 columns bank">
					<h2>Local Rates</h2>
				</div>
				<div class="small-12 large-12 columns bank">
					<ul>
						<li><a href="#">Alabama Interest Rates</a></li>
						<li><a href="#">Alaska Interest Rates</a></li>
						<li><a href="#">Arizona Interest Rates</a></li>
						<li><a href="#">Arkansas Interest Rates</a></li>
						<li><a href="#">California Interest Rates</a></li>
						<li><a href="#">Colorado Interest Rates</a></li>
						<li><a href="#">Connecticut Interest Rates</a></li>
						<li><a href="#">Delaware Interest Rates</a></li>
						<li><a href="#">District of Columbia Interest Rates</a></li>

					</ul>
				</div>
			</div>		
			<div class="small-12 large-3 columns bank lt_home_menu_footer lt_padding_top">
				<ul>
					<li><a href="#">Montana Interest Rates</a></li>
					<li><a href="#">Nebraska Interest Rates</a></li>
					<li><a href="#">Nevada Interest Rates</a></li>
					<li><a href="#">New Hampshire Interest Rates</a></li>
					<li><a href="#">New Jersey Interest Rates</a></li>
					<li><a href="#">New Mexico Interest Rates</a></li>
					<li><a href="#">New York Interest Rates</a></li>
					<li><a href="#">North Carolina Interest Rates</a></li>
					<li><a href="#">North Dakota Interest Rates</a></li>
					
				</ul>
			</div>
			<div class="small-12 large-3 columns bank lt_home_menu_footer lt_padding_top">
				<ul>
					<li><a href="#">Montana Interest Rates</a></li>
					<li><a href="#">Nebraska Interest Rates</a></li>
					<li><a href="#">Nevada Interest Rates</a></li>
					<li><a href="#">New Hampshire Interest Rates</a></li>
					<li><a href="#">New Jersey Interest Rates</a></li>
					<li><a href="#">New Mexico Interest Rates</a></li>
					<li><a href="#">New York Interest Rates</a></li>
					<li><a href="#">North Carolina Interest Rates</a></li>
					<li><a href="#">North Dakota Interest Rates</a></li>
				</ul>
			</div>
			<div class="small-12 large-3 columns bank lt_home_menu_footer lt_padding_top">
				<ul>
					<li><a href="#">Montana Interest Rates</a></li>
					<li><a href="#">Nebraska Interest Rates</a></li>
					<li><a href="#">Nevada Interest Rates</a></li>
					<li><a href="#">New Hampshire Interest Rates</a></li>
					<li><a href="#">New Jersey Interest Rates</a></li>
					<li><a href="#">New Mexico Interest Rates</a></li>
					<li><a href="#">New York Interest Rates</a></li>
					<li><a href="#">North Carolina Interest Rates</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Footer -->
<footer class="large-12 small-12 columns footer">
	<div class="row footer">
		<div class="large-12 small-12 columns">
			<div class="large-2 small-12 columns logo">
				<h2 style="margin-top: 15px; margin-bottom: 0px;"><a style="color:#<?php header_textcolor(); ?>;" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo bloginfo('template_directory')?>/img/logo.png" alt="logo" /></a></h2>
			</div>
			<div class="large-4 small-12 columns footer lt_copyright_footer">
				<p>Copyright 2007-2013 RateZip.com. All Rights Reserved</p>
			</div>
			<div class="large-6 small-12 columns footer">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu', 'container' => '', 'fallback_cb' => 'foundation_page_menu', 'walker' => new foundation_navigation() ) ); ?>
			</div>
		</div>
</footer>
<!-- End Footer -->

<?php wp_footer(); ?>
</body>
</html>