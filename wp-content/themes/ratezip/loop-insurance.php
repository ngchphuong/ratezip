<?php if  ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) :?>
<div class="small-12 large-12 columns insurance">
	<div class="row insurance-page">
		<h2>Instant Life Insurance Quote</h2>
		<p>Use our fast and efficient system to find great life insurance rates from companies you'll know and trust:
		<a href="#" class="button postfix">SEARCH</a></p>
	</div>
</div>
<div class="row insurance-page">
	<div class="small-12 large-12 columns content-insurance-page">
		<h2>Alphabetical Company Listing</h2>
		<div class="small-12 large-12 columns content-insurance-page-alphabetical">
			<div class="small-12 large-4 columns alphabetical-aetna">
				<ul>
					<li><a href="#">Aetna Life Insurance</a></li>
					<li><a href="#">American Family Insurance</a></li>
					<li><a href="#">Anthem Blue Cross Life and Health Insurance</a></li>
					<li><a href="#">Assurity Life Insurance Company</a></li>
					<li><a href="#">Federated Life Insurance</a></li>
					<li><a href="#">Gerber Life Insurance</a></li>
					<li><a href="#">GMAC Insurance</a></li>
					<li><a href="#">Guardian Life Insurance</a></li>
					<li><a href="#">Hartford Life Insurance</a></li>
				</ul>
			</div>
			<div class="small-12 large-4 columns alphabetical-lincoln">
				<ul>
					<li><a href="#">Lincoln National Life Insurance</a></li>
					<li><a href="#">Massachusetts Mutual Life Insurance</a></li>
					<li><a href="#">Metropolitan Life Insurance</a></li>
					<li><a href="#">Nationwide Life Insurance</a></li>
					<li><a href="#">New York Life Insurance</a></li>
					<li><a href="#">Northwestern Mutual Life Insurance</a></li>
					<li><a href="#">Pacific Guardian Life Insurance</a></li>
					<li><a href="#">Paul Revere Life Insurance</a></li>
					<li><a href="#">Physicians Mutual Life Insurance</a></li>
				</ul>
			</div>
			<div class="small-12 large-4 columns alphabetical-riverSource">
				<ul>
					<li><a href="#">RiverSource Life Insurance</a></li>
					<li><a href="#">Sentry Life Insurance</a></li>
					<li><a href="#">Standard Life Insurance</a></li>
					<li><a href="#">State Farm Life Insurance</a></li>
					<li><a href="#">Symetra Life Insurance</a></li>
					<li><a href="#">Thrivent Financial Life Insurance</a></li>
					<li><a href="#">USAA Life Insurance Company</a></li>
					<li><a href="#">Western and Southern Life Insurance</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="small-12 large-12 columns content-insurance-page">
		<div class="small-12 large-5 columns content-insurance-page-latest">
			<h2>LATEST INSURANCE RATES NEWS</h2>
			<div class="small-12 large-10 columns content-insurance-page-latest">
				<?php
					query_posts('p=52');
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
				?>
				<div class="small-12 large-12 columns content-insurance-page-latest-images">
					<?php the_post_thumbnail('featured');?>
				</div>
				<div class="small-12 large-12 columns content-insurance-page-latest-header">
					<div class="small-2 large-2 columns content-insurance-page-latest-day">
						<?php 	
								$day 	= 	get_the_date('F');
								$day2	= 	substr($day,0,3);
						?>
						<p class="date"><?php echo $day2;?><span><?php echo get_the_date('j');?></span></p>
					</div>
					<div class="small-10 large-10 columns content-insurance-page-latest-title">
						<h2><?php  the_title()?></h2>
					</div>
				</div>
				<div class="small-12 large-12 columns content-insurance-page-latest-content">
					<?php the_content()?>
				</div>
				<?php
						endwhile;
					else :
				?>
					<h2>No Post</h2>
				<?php		
					endif;
					wp_reset_query();
				?>
			</div>
		</div>
		<div class="small-12 large-7 columns content-insurance-page-more">
			<h2>MORE INSURANCE RATES NEWS</h2>
			<div class="small-12 large-12 columns content-insurance-page-more">
				<?php 
					query_posts('post');
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
				?>
				<div class="small-6 large-6 columns content-insurance-page-more">
					<div class="small-12 large-12 columns content-insurance-page-more-images">
						<?php the_post_thumbnail('featured');?>
					</div>
					<div class="small-12 large-12 columns content-insurance-page-more-header">
						<div class="small-2 large-2 columns content-insurance-page-more-day">
							<?php 	
								$day 	= 	get_the_date('F');
								$day2	= 	substr($day,0,3);
						?>
						<p class="date"><?php echo $day2;?><span><?php echo get_the_date('j');?></span></p>
						</div>
						<div class="small-10 large-10 columns content-insurance-page-morecontent-insurance-page-more-title">
							<h2><?php the_title();?></h2>
						</div>
					</div>
					<div class="small-12 large-12 columns content-insurance-page-more-content">
						<?php the_excerpt();?>
					</div>
				</div>
				<?php
						endwhile;
				?>
				<?php
					else :
					endif;
					wp_reset_query();
				?>
			</div>
		</div>
	</div>
</div>
<?php endif;?>