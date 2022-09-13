<?php 
get_header();
?>	

<div class="careerebanner" style=" background-image: url(<?php echo get_theme_mod('category_banner_image'); ?>">

	<div class="container" style="bottom:0px;">
		<div class="row">
			<div class="col-sm-12" >
				<h1 style="color:white;text-align:left;  text-transform: uppercase;">
					<?php echo get_theme_mod('title_setting'); ?>
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
<div class="container">
	<div class="row">
	<div class=" col-sm-8">
	<?php while(have_posts()): the_post(); ?>
	
		<h4 style="text-align: left; transform: scale(1, 1) !important;"><b><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></b></h4>
		
		<?php the_category(); ?>	
		<br>
		<div class="clear"></div>
		<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive">
		<div class="clear"></div>		
		<?php the_excerpt(); ?>
	<br>
		<a href="<?php echo get_the_permalink(); ?>" style="color:white; font-weight:bold;padding:7px;padding-left:15px; padding-right:15px; background-color:#e74d3c; border-radius:05px;">More</a>
<div class="clear"></div>  
	<hr>
	<div class="clear"></div>
	<?php	endwhile; wp_reset_query(); ?>
</div>
	<div class="col-sm-4">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blog-sidebar'));
	?>
	</div>
</div>
</div>
<style type="text/css">
	
	.page-numbers{
		color:white;
		background-color: #e74d3c;
		width:auto;
		margin:0px;
		padding:10px;
		border-radius: 05px;
			}
</style>
		<center><?php
				$big = 999999999; // need an unlikely integer
					echo paginate_links( array(
			    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			    'format' => '?paged=%#%',
			    'current' => max( 1, get_query_var('paged') ),
			    'total' => $loop->max_num_pages
				) );
			?></center>



<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<?php get_footer(); ?>
