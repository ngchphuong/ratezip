<?php if  ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) :?>
<div class="large-12 small-12 columns sreach">
	<div class="row sreach-content">
		<div class="large-11 small-12 columns sreach-content-left">
			<div class="large-4 small-12 columns sreach-content-left-product">
				<div class="large-3 small-12 columns sreach-content-left-product-label">
					<label>Product: </label>
				</div>
				<div class="large-9 small-12 columns sreach-content-left-product-dropdow">
					<form class="custom product">
			            <div class="custom dropdown large product" data-id="">
			            	<a class="current" href="#">This is another option</a>
			            	<a class="selector" href="#"></a>
			            	<ul>
			            		<li class="disabled">This is a dropdown</li>
			            		<li class="selected">This is another option</li>
			            		<li class="">This is another option too</li>
			            		<li class="">Look, a third option</li>
			            	</ul>
			            </div>
			        </form>
				</div>
			</div>
			<div class="large-4 small-12 columns sreach-content-left-city">
				<div class="large-3 small-12 columns sreach-content-left-city-label">
					<label>City, State or ZIP: </label>
				</div>
				<div class="large-9 small-12 columns sreach-content-left-city-dropdow">
					<form class="custom product">
			            <div class="custom dropdown large product" data-id="">
			            	<a class="current" href="#">This is another option</a>
			            	<a class="selector" href="#"></a>
			            	<ul>
			            		<li class="disabled">This is a dropdown</li>
			            		<li class="selected">This is another option</li>
			            		<li class="">This is another option too</li>
			            		<li class="">Look, a third option</li>
			            	</ul>
			            </div>
			        </form>
				</div>
			</div>
			<div class="large-4 small-12 columns sreach-content-left-points">
				<div class="large-3 small-12 columns sreach-content-left-points-label">
					<label>Points: </label>	
				</div>
				<div class="large-9 small-12 columns sreach-content-left-points-dropdow">
					<form class="custom product">
			            <div class="custom dropdown large product" data-id="">
			            	<a class="current" href="#">This is another option</a>
			            	<a class="selector" href="#"></a>
			            	<ul>
			            		<li class="disabled">This is a dropdown</li>
			            		<li class="selected">This is another option</li>
			            		<li class="">This is another option too</li>
			            		<li class="">Look, a third option</li>
			            	</ul>
			            </div>
			        </form>
				</div>
			</div>
		</div>
		<div class="large-1 small-12 columns sreach-content-right">
			<a href="#" class="button postfix">SEARCH</a>
		</div>
	</div>
</div>
<?php endif;?>