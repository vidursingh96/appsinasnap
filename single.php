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
	<div class="row">
	<div class="col-sm-8 ">
			<?php
				while ( have_posts() ) : the_post(); ?>
				<h4 style="color:#337ab7"><?php the_title(); ?></h4>
				<div style="color:#337ab7" class="post-categories">
				<?php
					foreach((get_the_category()) as $category) { 
    					echo '<u>'.$category->cat_name . '</u> '; 
					} 
				?>
				</div>
<br>	
				<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive">

				<p> <?php the_content(); ?> </p>

			
			<?php
				endwhile;
				?>
	<?php comments_template( '', true ); ?>
	</div>
	<div class="col-sm-4">				
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blog-sidebar'));?>
	</div>
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
<script type="text/javascript">
    function captchaCode() {
  var Numb1, Numb2, Numb3, Numb4, Code;     
  Numb1 = (Math.ceil(Math.random() * 10)-1).toString();
  Numb2 = (Math.ceil(Math.random() * 10)-1).toString();
  Numb3 = (Math.ceil(Math.random() * 10)-1).toString();
  Numb4 = (Math.ceil(Math.random() * 10)-1).toString();
  
  Code = Numb1 + Numb2 + Numb3 + Numb4;
  $("#captcha span").remove();
  $("#captcha input").remove();
  $("#captcha").append("<span id='code'>" + Code + "</span><input type='button' onclick='captchaCode();'>");
}
$(function() {
  captchaCode();
  
  $('#commentform').submit(function(){
    var captchaVal = $("#code").text();
    var captchaCode = $(".captcha").val();
    if (captchaVal == captchaCode) {
      return true;
    }
    else {
     	alert('Please Enter the correct captcha value ');
	return false;
    }
     return true;
  });       
});
</script>