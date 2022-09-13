<?php 
/* Template Name:WhyUs*/

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
<?php 
if (have_posts()) :	
while (have_posts()) :
the_post();
?>
<div class="container">
<div class="row">
<div class="col-sm-12" >
<div class="whyus">
<?php   		
the_content();
endwhile;
endif;
?>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">	
<div class="col-sm-6">
<h2 style="text-align:left; font-size: 24px;">Why <span> Choose Us</span></h2>
<div class="clear"></div>
  <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">  
          Knowledgeable customer service based in the USA <span class="glyphicon glyphicon-menu-right" style="color:white; font-weight:bold; float:right; "></span>
      </a>
      </h4>
    </div>
 
   <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        We pride ourselves on giving our clients 110%, our average client is with us over nine years.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
        On-time delivery & easy communication<span class="glyphicon glyphicon-menu-right" style="color:white; font-weight:bold; float:right; "></span>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        We are always here for you, phone, email or live chat, answering questions and making suggestions.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
         Our philosophy<span class="glyphicon glyphicon-menu-right" style="color:white; font-weight:bold; float:right; "></span>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        We are old fashioned (funny in a hi-tech world), you are not just a client but members of our extended family. 
      </div>
    </div>
  </div>
    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
 Low cost <span class="glyphicon glyphicon-menu-right" style="color:white; font-weight:bold; float:right; "></span>
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        We try always to give the best value at the lowest cost for the projects we create, but we never sacrifice on quality. 
      </div>
    </div>
  </div>	
</div>
</div>
<div class="col-sm-6">
<h2 style="text-align:left; font-size: 24px;"> Our <span> Skills</span></h2>
<div class="clear"></div>
<div class="progress skill-bar" style="min-height:35px;">
<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="text-align: left; transition-duration: 3s; background-color:#f74f44;">
<h5 style="font-weight:bold; text-align:center;">IOS Development</h5>
</div>
</div>
<div class="progress skill-bar" style="min-height:35px;">
<div class="progress-bar progress-bar-striped active progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="text-align: left; transition-duration: 3s;background-color:#f74f44;">
<h5 style="font-weight:bold; text-align:center;">Android Development</h5>
</div>
</div>

<div class="progress skill-bar" style="min-height:35px;">
<div class="progress-bar progress-bar-striped active progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="text-align: left; transition-duration: 3s; background-color:#f74f44;">
<h5 style="font-weight:bold; text-align:center;">Responsive Web Design</h5>
</div>
</div>
<div class="progress skill-bar" style="min-height:35px;">
<div class="progress-bar progress-bar-striped active progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="text-align: left; transition-duration: 3s; background-color:#f74f44;">
<h5 style="font-weight:bold; text-align:center;">In House Custom Design</h5>
</div>
</div>
</div>
</div>
</div>   

<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<div class="clear"></div>
<?php
get_footer();
?>

<script>
$(window).scrollTop(function () {
$('.progress .progress-bar').css("width",
function() { return $(this).attr("aria-valuenow") + "%"; })
}); 


$(document).ready(function(){

        $(".collapse.in").each(function(){
        	$(this).siblings(".panel-heading").find(".glyphicon").addClass("rotate");
        });
        
  
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).parent().find(".glyphicon").addClass("rotate");
        }).on('hide.bs.collapse', function(){
        	$(this).parent().find(".glyphicon").removeClass("rotate");
        });
    });
</script>