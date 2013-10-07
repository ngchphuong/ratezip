<?php
/**
 * Header
 *
 * Setup the header for our theme
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:700' rel='stylesheet' type='text/css'>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url');?>/mortgage.css "/>
<link rel="stylesheet" href="<?php bloginfo('template_url');?>/sreach.css "/>

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width" />

<title><?php wp_title(); ?></title>

<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<nav class="top-bar">
		<ul class="title-area">
			<li class="name"></li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'left', 'container' => '', 'fallback_cb' => 'foundation_page_menu', 'walker' => new foundation_navigation() ) ); ?>
		</section>
	</nav>
	<?php $header =  get_header_textcolor();
	if ( $header !== "blank" ) : ?>
	<header class="site-header" <?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) : ?> style="background:url('<?php echo esc_url( $header_image ); ?>');" <?php endif; ?>>
		<div class="row header">
			<div class="large-2 columns logo">
				<h2 style="margin-top:0.33em; margin-bottom: 0px;"><a style="color:#<?php header_textcolor(); ?>;" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo bloginfo('template_directory')?>/img/logo.png" alt="logo" /></a></h2>
			</div>
			<div class="main-menu large-8 columns lt_menu_top">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'left', 'container' => '', 'fallback_cb' => 'foundation_page_menu', 'walker' => new foundation_navigation() ) ); ?>
			</div>
			<div class="large-2 columns icon lt_icon_header">
				<ul>
					<li><a href="" id="icon-1">Face</a></li>
					<li><a href="" id="icon-2">Google</a></li>
					<li><a href="" id="icon-3">twitter</a></li>
					<li><a href="" id="icon-4">RSS</a></li>
				</ul>
			</div>
		</div>
	</header>
	<?php endif; ?>
	<!-- Begin Page -->
