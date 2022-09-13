<?php /*Template Name: Faq */?>

<?php 
get_header();
?>	
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
<?php 
				if (have_posts()) :	
 	  			while (have_posts()) :
      			the_post();
?>
<div class="container">
<div class="row">
<div class="col-sm-12 Whyus" >
	<?php   		
        the_content();
   		endwhile;
	endif;
	?>
	</div>
	</div>
</div>



<div class="container">
<div class="row">
<div class="faq-wrapper">
<dl class="faqs">

<?php
	$query = new Wp_Query(array('post_type' => 'faq'));
	query_posts($query);
	while($query->have_posts()) : $query->the_post();
	?>
	<div class="col-sm-12" style="margin-bottom:10px;">

   	<dt><?php the_title(); ?></dt>
   	<dd><?php the_excerpt(); ?></dd>
	</div>
		
	<?php
	endwhile;
	wp_reset_query();
	?>

</div>
</div></div>
</div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<?php get_footer();?>
