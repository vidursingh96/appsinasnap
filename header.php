<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php the_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="https://appsinasnap.com/wp-content/uploads/2017/07/favicon.png" />

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		<script>
         var app_url = "https://yourapp.appsinasnap.com/m/239naples/?appcode=239naples";
    
         if (app_url.includes('?')) {
             app_url = app_url + "&goBack=true" ;
         }
         
         var ba_is_mobile_browser = (navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|vodafone|o2|pocket|kindle|mobile|pda|psp|treo)/i)||navigator.userAgent.match(/iPod/i)||navigator.userAgent.match(/operamini/i)||navigator.userAgent.match(/blackberry/i)||navigator.userAgent.match(/(palmos|palm|hiptop|avantgo|plucker|xiino|blazer|elaine)/i)||navigator.userAgent.match(/(windowsce; ppc;|windows ce; smartphone;|windows ce;iemobile)/i)||navigator.userAgent.match(/android/i))&&!navigator.userAgent.match(/iPad/i);
         
         var queryParams = getQueryParams(document.location.search); 
         if(queryParams && (queryParams.setDesktopCookie == 1)) {
             //if there's a query param to set cookie set it (since we can't set them on another domain for this domain)
             setCookie("viewmode","desktop");    
         }
    
         var ba_desktop_cookie = getCookie("viewmode");
         var ba_is_mobile = ba_is_mobile_browser && (ba_desktop_cookie != "desktop");
         
         function redirectToApp() {
            window.location = app_url;
         }
    
         function getQueryParams(qs) {
             qs = qs.split("+").join(" ");
    
             var params = {}, tokens,
                 re = /[?&]?([^=]+)=([^&]*)/g;
    
             while (tokens = re.exec(qs)) {
                 params[decodeURIComponent(tokens[1])]
                 = decodeURIComponent(tokens[2]);
             }
    
             return params;
         }
    
         function getCookie(name)    {
             var re = new RegExp(name + "=([^;]+)");
             var value = re.exec(document.cookie);
             return (value != null) ? unescape(value[1]) : null;
         }
    
         function setCookie(key,value) {
             document.cookie = key+"="+value;
         }
    
         if (ba_is_mobile) {
             var viewmodeCookie = getCookie("viewmode");
             if(viewmodeCookie == null) {
                 //if it's mobile and there's no cookie set, redirect to mobile site
                 redirectToApp();    
             }   
         }
    
         //create the html elements on the page
         var ba_view_elem = document.createElement("SPAN");
         var ba_view_text = document.createTextNode("View in ");
         ba_view_elem.appendChild(ba_view_text);
    
         var ba_mobile_elem = document.createElement("A");
         ba_mobile_elem.setAttribute("onclick", "redirectToApp()");
         ba_mobile_elem.setAttribute("href", "javascript:;");
         var ba_mobile_text = document.createTextNode("Mobile");
         ba_mobile_elem.appendChild(ba_mobile_text);
         ba_view_elem.appendChild(ba_mobile_elem);
    
         var ba_view_text = document.createTextNode(" | ");
         ba_view_elem.appendChild(ba_view_text);
    
         var ba_desktop_elem = document.createElement("B");
    
         var ba_desktop_text = document.createTextNode("Desktop");
         ba_desktop_elem.appendChild(ba_desktop_text);
    
         ba_view_elem.appendChild(ba_desktop_elem);
    
         var ba_curTag = document.currentScript
         var ba_parent_elem = ba_curTag.parentNode;
         ba_parent_elem.insertBefore(ba_view_elem, ba_curTag);
        </script>
	</head>
	<body>
		<a href="javascript:" id="return-to-top">
			<i class="icon-chevron-up"></i>
		</a>
		<div class="loader"></div>
		<nav><div class="navbar fixed-top" style="box-shadow:0px 2px 10px 0px rgba(153, 154, 153, 0.51); margin-bottom:02px; position:fixed; width:100%; z-index:999; border-radius:0; ">	 <div class="container">
				<div class="row">
					<div class="toggle_wrapper" onclick="myFunction(this)">
						<div class="bar1"></div>
						<div class="bar2"></div>
						<div class="bar3"></div>
					</div>
				<div class="col-sm-3 logo">
					<a href="<?php echo get_home_url(); ?>">
						<img src="<?php echo get_theme_mod('custom_logo'); ?>" style="height:63px;" alt="">
					</a>
				</div>
				<div class="col-sm-6 menu-width"><?php wp_nav_menu( array( 'theme_location' => 'new-menu' ) );?>
				</div>
				<div class="col-sm-3">
					<div class="touch_wrapper">
						<a href="http://appsinasnap.com/?page_id=142" class="touch_btn">Get In Touch</a>
					</div>
				</div>
			</div>
		</div>
	</div></nav>
	<div class="clear"></div>
	<div class="clear"></div>
	<div class="clear"></div>
	<div class="clear"></div>
