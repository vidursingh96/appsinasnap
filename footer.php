<footer>
<div class="footer-distributed">
<div class="footer_text" style="padding-right:15px; padding-left:15px">
<?php echo wpautop( get_theme_mod('footer_text_block')); ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-social-links')); ?>
</div>
</div>

<div class="col-lg-12 " style="background-color:#181827; padding: 0px;">
<div class="footer_menu"><?php wp_nav_menu( array( 'theme_location' => 'another-menu') ); ?>
</div></div>
</footer>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/index.js"></script>
<script type="text/javascript">$(window).on('load',function(){ $(".loader").fadeOut(); });
	// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

$(document).ready(function(){
$(".menu-item-has-children").off("click").on("click", function() {
$(".sub-menu").fadeToggle(0);
});
});
</script>