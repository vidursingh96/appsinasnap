<?php get_header();?>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
<?php if(function_exists('bavota_breadcrumbs')) bavota_breadcrumbs(); ?>
    </div>
  </div>
</div>
<div  class="container">
	<div class="row">
	<div class="col-sm-12">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         <?php 
         		the_post_thumbnail();

         		echo '<h1>'.get_the_title().'</h1>';
         		the_content(); 
         ?>
  	<?php endwhile; endif; ?>
  	</div>
  	</div>
</div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<?php get_footer(); ?>