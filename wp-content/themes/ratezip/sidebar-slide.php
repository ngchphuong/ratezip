<?php if  ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) :?>
<div class="large-12 columns silde">
		<?php query_posts( 'p=101&post_type=slide_post')?>
		<?php  if(have_posts()) while ( have_posts() ) : the_post();?>
		<?php the_content( );?>
		<?php endwhile;
				wp_reset_query();
		 ?>
		 <div class="large-12 columns silde-tile">
		 	<div class="row">
				<?php dynamic_sidebar('Sidebar Title Slide'); ?>
			</div>
		</div>
		<div class="row slide">
			<div class="large-10 columns conted-slide">
				<h2>What are you looking for?</h2>
				<?php wp_nav_menu( array( 'theme_location' => 'slide-menu', 'menu_class' => 'left', 'container' => '', 'fallback_cb' => 'foundation_page_menu', 'walker' => new foundation_navigation() ) ); ?>
			</div>
		</div>
	</div>
	
<?php endif;?>