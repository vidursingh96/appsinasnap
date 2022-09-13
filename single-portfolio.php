<?php
get_header(); ?>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
	<div class="container">
			<?php
				while ( have_posts() ) : the_post(); ?>
				<div class="col-sm-4 ">
				<?php
                $terms = get_the_terms( $post->ID, 'project-type' );
                                     
                if ( $terms && ! is_wp_error( $terms ) ) : 
                    $links = array();
 
                    foreach ( $terms as $term ) 
                    {
                        $links[] = $term->name;
                    }
                    $links = str_replace(' ', '-', $links); 
                    $tax = join( " ", $links );     
                else :  
                    $tax = '';  
                endif;
                ?>

		<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" style="margin-bottom:20px;">
		</div>
		<div class="col-sm-8">
		<h4 style="color:#337ab7"><?php the_title(); ?></h4>
		<div style="color:#337ab7"><?php echo $tax; ?></div>
		<?php the_content(); ?>
		</div>

	<div class="clear"></div>
	<div class="clear"></div>
	<?php endwhile; ?>
	</div>
</div>

<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<?php
get_footer();
?>