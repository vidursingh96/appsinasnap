<?php /*Template Name: Solution */ ?>
<?php get_header(); ?>

<div class="careerebanner" style=" background-image: url(<?php  echo get_the_post_thumbnail_url(); ?>">

	<div class="container" style="bottom:0px;">
		<div class="row">
			<div class="col-sm-12" >
				<h1 style="color:white;text-align:left;  text-transform: uppercase;">
					<?php the_title();?>
				</h1>
			</div>
		</div>	
	</div>
</div>
	
	<div class="container">
		<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
	</div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="container">
<div class="row">
<div class="col-sm-4">
	<?php wp_nav_menu( array( 'theme_location' => 'solution-menu' ) ); ?>
</div>
<div class="col-sm-8">
	
<?php 
		if (have_posts()) :	
 	  	while (have_posts()) :
      		the_post();			   		
        	the_content();
   		endwhile;
		endif;
	?>
</div>
</div>
</div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>

<?php get_footer(); ?>