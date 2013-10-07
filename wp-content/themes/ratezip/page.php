<?php
/**
 * Page
 *
 * Loop container for page content
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

get_header(); ?>
<?php  if ( have_posts() ) :while ( have_posts() ) : the_post();?>
   		<?php if(is_page( '13' )){
   			get_template_part( 'loop', 'insurance' );
   		}elseif(is_page('10')){
   			get_template_part( 'loop', 'mortgage' );
   		}elseif (is_page('15')) {
   			get_template_part( 'loop', 'find' );
   		}elseif (is_page('17')) {
   			get_template_part( 'loop', 'about' );
   		}elseif (is_page('19')) {
   			get_template_part( 'loop', 'blog' );
   		}elseif (is_page('21')) {
   			get_template_part( 'loop', 'contact' );
   		}else{ ?>
    <!-- Main Content -->
    <div class="large-12 columns page" role="main">
    	
	   			<p>error</p>
	   	
    </div>
    <!-- End Main Content -->
	<?php } ?>
	<?php endwhile; ?>
	<?php endif;?>
<?php get_footer(); ?>