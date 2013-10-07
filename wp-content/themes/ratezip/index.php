<?php
/**
 * Index
 *
 * Standard loop for the front-page
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

get_header(); ?>
<?php get_sidebar('slide')?>
<div class="row index">
    <!-- Main Content -->
    <div class="large-12 columns index" role="main" style="padding:0;">
		    	<div class="row contend">
		    		<div class="large-12 small-12">
				    	<?php  
				    		query_posts( array(
						   		'post_type'=>'best_top',
						   	 ));
				    		if(have_posts()) while ( have_posts() ) : the_post();?>
					    	<div class="small-12 large-4 columns">
					 			<h3><?php the_title();?></h3>
					 			<div class="large-12 small-12 columns">
					 				<?php the_content();?>
					 			</div>
						 	</div>
					 	<?php endwhile;
				 			wp_reset_query();
				 		?>
				 	</div>
	 			</div>
				<div class="row contend">
				<div class="large-5 small-12 columns">
						
						<div class="row">
							<div class="large-12 small-12 columns contend">
							<h2>Featured article</h2>
							<?php 
								query_posts( 'cat=4' );
								if ( have_posts() ) while ( have_posts() ) : the_post();
							?>
							
								<?php the_post_thumbnail('featured');?>
								<div class="large-12 small-12 contend-title">
									<h2><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h2>
								</div>
								
								<p><?php echo get_the_date()?> by <a href="<?php the_author_link();?>"><?php the_author()?></a> | <a href="<?php comments_link(); ?> ">Leave a Comment</a></p>
								<a href="#" class="small button mortgage-rates">Mortgage Rates</a>
								<a href="#" class="small button mortgage-rates">Real Estate</a>
								<?php the_excerpt(); ?>
							
							<?php endwhile;
								wp_reset_query();

							?>
						</div>
					</div>
				</div>
				<div class="large-7 small-12 columns">
						<div class="large-12 small-12 columns form">
							<h2>From The Blog</h2>
						</div>
						<div class="large-12 small-12 columns">
							<?php 
								query_posts( 'cat=6') ;  
								if( have_posts() ) while ( have_posts() ) : the_post();
							?>
							<div class="large-5 small-12 columns from-blog">
								<div class="large-12 small-12 columns">
									<?php the_post_thumbnail('featured');?>
								</div>
								<div class="large-12 small-12 columns from-blog-content">
									<div class="large-2 small-2 columns">
										<?php 	$day 	= 	get_the_date('F');
												$day2	= 	substr($day,0,3);
										?>
										<p class="date"><?php echo $day2;?><span><?php echo get_the_date('j');?></span></p>
									</div>
									<div class="large-10 small-10 columns">
										<h2><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h2>
									</div>
									<div class="large-12 small-12">
										<a href="#" class="small button mortgage-rates">Mortgage Rates</a>
										<?php 
											$at	= get_the_ID();
											if($at!='62'){ ?>
												<a href="#" class="small button mortgage-rates">Real Estate</a>
										<?php
											}
										?>
									</div>
								</div>
								<div class="large-12 small-12 columns">
									<?php the_excerpt(); ?>
								</div>
							</div>
						<?php endwhile;
								wp_reset_query();
						?>
						</div>
				</div>
	    	</div>
	    	<div class="row index-national">
	    		<div class="small-12 large-12 columns index-national">
		    		<h2>Top National Banks and Insurance Companies</h2>
		    	</div>
		    	<div class="small-12 large-12 columns index-national2">
		    		<div class="small-12 large-12 columns">
		    			<div class="small-12 large-6 columns">
		    				<div class="small-4 large-4 columns usa">
		    					<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/usa-logo-1.png"></a>
		    				</div>
		    				<div class="small-4 large-4 columns mass">
		    					<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/mass-logo.png"></a>
		    				</div>
		    				<div class="small-4 large-4 columns fargo">
		    					<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/fargo-logo.png"></a>
		    				</div>
		    			</div>
		    			<div class="small-12 large-6 columns metlife">
		    				<div class="small-4 large-4 columns metlife">
		    					<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/metlife-logo.png"></a>
		    				</div>
		    				<div class="small-4 large-4 columns anthem">
		    					<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/anthem-logo.png"></a>
		    				</div>
		    				<div class="small-4 large-4 columns life-logo">
		    					<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/life-logo.png"></a>
		    				</div>
		    			</div>
		    		</div>
		    		<div class="small-12 large-12 columns">
	    				<div class="small-12 large-7 columns">
	    					<div class="small-4 large-4 columns aetna">
	    						<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/aetna-logo.png"></a>
	    					</div>
	    					<div class="small-4 large-4 columns chaso">
	    						<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/chaso-logo.png"></a>
	    					</div>
	    					<div class="small-4 large-4 columns ever">
	    						<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/ever-logo.png"></a>
	    					</div>
	    				</div>
	    				<div class="small-12 large-5 columns">
	    					<div class="small-6 large-6 columns discover">
	    						<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/discover-logo.png"></a>
	    					</div>
	    					<div class="small-6 large-6 columns loan">
	    						<a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/img/loan-logo.png"></a>
	    					</div>
	    				</div>
		    		</div>
		    	</div>
		    </div>
	    </div>
	</div>
</div>
    <!-- End Main Content -->

<?php get_footer(); ?>


