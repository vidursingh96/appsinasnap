<?php 
/*Template Name: Contact */
$admin_email = get_option('admin_email');
if(isset($_POST["submit"]))	
{
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->From = "$admin_email";
$mail->FromName = 'AppsinaSnap';
$mail->addAddress("$admin_email", 'AppsinaSnap');
$mail->addReplyTo("$admin_email", 'AppsinaSnap');
$mail->isHTML(true);
$name   	 =$_REQUEST['name1'];
$email  	 =$_REQUEST['email'];
$msg    	 =$_REQUEST['message'];
$message 	 = '<table rules="all" style="border: 1px solid #DDD; width:100%" cellpadding="10">';
$message 	.= '<tr style="background-color: #dddddd;"><th>Name:</th><td> '.strip_tags($name).'</td></tr>';
$message 	.= '<tr ><th>Email:</th><td> '.$email.'</td></tr>';
$message 	.= '<tr><th>Message:</th><td> '.strip_tags($msg).'</td></tr>';
$message 	.= '</table>';
$mail->Subject = 'appsinasnap.com: Contact Query';
$mail->Body    = $message;
$msg1 = $mail->send();
if(!$msg1) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
exit;
}}
get_header(); ?>	
<div class="careerebanner" style=" background-image: url(<?php  echo get_the_post_thumbnail_url();?>">
<div class="container" style="bottom:0px;">
<div class="row">
<div class="col-sm-12" >
<h1 style="color:white;text-align:left;  text-transform: uppercase;">
<?php the_title();?>
</h1></div></div></div></div>
<div class="container">
<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>	
</div>
<div class="clear"></div><div class="clear"></div><div class="clear"></div><div class="clear"></div>

<div class="container">
<p>Please use the form below to contact us</p>
<div class="row">
<div class="clear"></div><div class="clear"></div>
<div class="col-sm-8">
<form name="myForm" onsubmit="return validateForm()" method="post" id="regiration_form">
<input type="text" placeholder="Your Name" id="name" name="name1" style="width:50.4%; padding:10px; height:40px;"  >
<input type="email" placeholder="Email" name="email" style="width:49%;padding:10px;height:40px;">
<textarea placeholder="message" name="message" style="padding:10px;height:200px;width:100%" ></textarea>

<h5 id="captcha" style="margin-right:10px; font-weight:bold;"></h5>
<input type="text" name="captcha" class="captcha" maxlength="4" placeholder="Enter captcha code" />

<input type="submit" name="submit" value="Send" class="submit"></form>
<?php if($msg1) { ?>
<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><strong>Success! </strong>Message Successfully Send </div><?php } ?></div>
<div class="col-sm-4"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('careere-sidebar')); ?></div></div></div><div class="clear"></div><div class="clear"></div><div class="clear"></div><div class="clear"></div>
<?php get_footer();?>
<script>function validateForm() {var x = document.forms["myForm"]["name1"].value;if (x == ""){alert("Name must be filled out");return false;}var x = document.forms["myForm"]["email"].value;var atpos = x.indexOf("@");var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){alert("Not a valid e-mail address");return false;}var x = document.forms["myForm"]["message"].value;if (x == "") {alert("Message must be filled out");return false;}}</script>
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
  
  $('#regiration_form').submit(function(){
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