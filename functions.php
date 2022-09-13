<?php
// Disable use XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Disable X-Pingback to header
add_filter( 'wp_headers', 'disable_x_pingback' );
function disable_x_pingback( $headers ) {
   unset( $headers['X-Pingback'] );
return $headers;
}
/*=============================== Custom Logo ============================*/
function custom_logo($wp_customize) {
    $wp_customize->add_section( 'upload_custom_logo', array(
        'title'          => 'Custom Logo',
        'description'    => 'Display a custom logo',
        'priority'       => 20,
    ) );
     $wp_customize->add_setting( 'custom_logo', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_logo', array(
        'label'   => 'Custom Logo section',
        'section' => 'upload_custom_logo',
        'settings'   => 'custom_logo',
    ) ) );
}
add_action('customize_register','custom_logo');

/*====================Custom Banner=========*/
function custom_banner($wp_customize) {
  $wp_customize->add_section('banner_image', array(
        'title'          => 'Banner Image',
        'description'    => 'Display a Bannre Image',
        'priority'       => 300,
    ) );
  $wp_customize->add_setting( 'banner_image', array(
        'default'        => '',
    ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_banner', array(
        'label'   => 'Banner Image section',
        'section' => 'banner_image',
        'settings'   => 'banner_image',
    ) ) );
}
add_action('customize_register','custom_banner');

function category_custom_banner($wp_customize) {
  $wp_customize->add_section('category_banner_image', array(
        'title'          => 'Category Banner Image',
        'description'    => 'Display a Banner Image',
        'priority'       => 400,
    ) );
  $wp_customize->add_setting( 'category_banner_image', array(
        'default'        => '',
    ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'category_custom_banner', array(
        'label'   => 'Category Banner Image section',
        'section' => 'category_banner_image',
        'settings'   => 'category_banner_image',
    ) ) );

	$wp_customize->add_setting('title_setting', array(
		'default'        => 'Category',
		));
	$wp_customize->add_control('title_setting', array(
 		'label'   => 'Title Here',
 	 	'section' => 'category_banner_image',
 		'type'    => 'text',
	));
}
add_action('customize_register','category_custom_banner');


function archive_custom_banner($wp_customize) {
  $wp_customize->add_section('archive_banner_image', array(
        'title'          => 'Archive Banner Image',
        'description'    => 'Display a Banner Image',
        'priority'       => 400,
    ) );
  $wp_customize->add_setting( 'archive_banner_image', array(
        'default'        => '',
    ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'archive_custom_banner', array(
        'label'   => 'Archive Banner Image section',
        'section' => 'archive_banner_image',
        'settings'   => 'archive_banner_image',
    ) ) );

	$wp_customize->add_setting('archive_title_setting', array(
		'default'        => 'Archive',
		));
	$wp_customize->add_control('archive_title_setting', array(
 		'label'   => 'Title Here',
 	 	'section' => 'archive_banner_image',
 		'type'    => 'text',
	));
}
add_action('customize_register','archive_custom_banner');

/*====================Theme Support Register=========*/
add_theme_support( 'post-thumbnails' );
/* ================== Register Menu ==================== */
function register_my_menus() {
  register_nav_menus(
    array(
      'new-menu' => __( 'New Menu' ),
      'another-menu' => __( 'Another Menu' ),
	'solution-menu'=> __('Solution Menu'),
    )
  );
}
add_action( 'init', 'register_my_menus' );
/*===================== Add Active Class =================*/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
/*====================Our Portfolio====================================*/
function portfolio() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
			'name' => __( 'Portfolio' ),
			'singular_name' => __( 'portfolio' )
			),
			'public' => true,
			'supports' => array('thumbnail','text','title','editor',)
		)
	);
	
register_taxonomy("project-type", array("portfolio"), array("hierarchical"  =>  true, "labels" => array("My Category",'add_new_item'=>"Add New Field"), "singular_label" => "My Category",   "rewrite" => array('slug'=>"cat",'with_front'=>false)));

}
add_action( 'init', 'portfolio' );
/*==================== FAQ ====================================*/
function faq() {
	register_post_type( 'faq',
		array(
			'labels' => array(
			'name' => __( 'Faq' ),
			'singular_name' => __( 'faq' )
			),
			'public' => true,
			'supports' => array('thumbnail','text','title','editor',)
		)
	);
}
add_action( 'init', 'faq' );


/*==================== FAQ ====================================*/
function slider() {
	register_post_type( 'slider',
		array(
			'labels' => array(
			'name' => __( 'Slider' ),
			'singular_name' => __( 'slider' )
			),
			'public' => true,
			'supports' => array('thumbnail','text','title','editor',)
		)
	);
}
add_action( 'init', 'slider' );

/*===============================Read More========================================*/
function register_excerpt() {
	return '';
}
add_filter('excerpt_more','register_excerpt');
/*=============================== Read More Limit Fixed ============================*/
function limit_set() {
	return 25;
}
add_filter('excerpt_length','limit_set');
/*=============================== Mobile Apps Custom Image ============================*/
function custom_background_changer($wp_customize) {
    $wp_customize->add_section( 'upload_custom_image', array(
        'title'          => 'Custom Background',
        'description'    => 'Display a custom background?',
        'priority'       => 200,
    ) );
    $wp_customize->add_setting( 'custom_image', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_background', array(
        'label'   => 'Custom Background Section Two',
        'section' => 'upload_custom_image',
        'settings'   => 'custom_image',
    ) ) );
     $wp_customize->add_setting( 'parallax_text_setting', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'parallax_text',
      array(
        'label'=>__('Parallax Text '),
        'section'=> 'upload_custom_image',
        'settings' =>'parallax_text_setting',
        'type' =>'textarea' )));
}
add_action('customize_register','custom_background_changer');
/*============================Footer Section ======================================*/
function footer_customize( $wp_customize ) {
   $wp_customize->add_panel( 'text_blocks' , array(
    'title'       => __( 'Footer Blocks'),
    'priority'    => 500,
    'theme_supports' => '',
    'description' => __('Add Footer description'),
	) );
   $wp_customize->add_section( 'custom_footer_text',array(
   	'title' => __('Change Footer Text'),
   	'panel' =>'text_blocks',
   	'priority' =>10,
   'label'=>__('Footer Text '),
   	) );
   $wp_customize->add_setting( 'footer_text_block',array(
   	'default'=> __( 'default text' ),
    'sanitize_callback'  => 'sanitize_text'));
   $wp_customize->add_control( new WP_Customize_Control(
  	$wp_customize,
   	'customize_footer_text',
   	array(
   	'label'=>__('Footer Text ', 'test'),
   	'section'=> 'custom_footer_text',
   	'settings' =>'footer_text_block',
   	'type' =>'textarea')));
   //Sanitize Text
   function sanitize_text($textarea)
   {
   	return wp_filter_post_kses($textarea);
   }
}
add_action( 'customize_register', 'footer_customize' );
if (function_exists('register_sidebar')) {
register_sidebar(array(
'name' => 'Footer Social Links ',
'id'   => 'footer-social-links',
'description'   => 'Footer Social Links',
'before_widget' => '<div id="one" class="two">',
'after_widget' => '</div>',
'before_title' => '<h2 style="display:none;">',
'after_title'   => '</h2>'
));
register_sidebar(array(
  'name' => 'Careers Sidebar',
  'id'   => 'careere-sidebar',
  ));

register_sidebar(array(
  'name' => 'Blog Sidebar',
  'id'   => 'blog-sidebar',
  ));

}
class Designmodo_Social_Profile extends WP_Widget { 
	function __construct() {
    parent::__construct(
            'Designmodo_Social_Profile',
            __('Social Networks Profiles', 'translation_domain'), // Name
            array('description' => __('Links to Author social media profile', 'translation_domain'),)
    );
}
public function form($instance) {
        isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['google']) ? $google = $instance['google'] : null;
        isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
        ?>
       <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
        </p>
 
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? strip_tags($new_instance['linkedin']) : ''; 
        return $instance;
    }
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $linkedin = $instance['linkedin'];
  		  // social profile link 
        $facebook_profile = '<a class="facebook" href="' . $facebook . '"><i class="fa fa-facebook"></i></a>';
        $google_profile = '<a class="google" href="' . $google . '"><i class="fa fa-google-plus"></i></a>';
        $linkedin_profile = '<a class="linkedin" href="' . $linkedin . '"><i class="fa fa-linkedin"></i></a>';
        $twitter_profile = '<a class="twitter" href="' . $twitter . '"><i class="fa fa-twitter"></i></a>';
      echo $args['before_widget'];
      if (!empty($title)) { 
echo $args['before_title'] . $title . $args['after_title'];
}
       echo '<div class="social-icons">';
        echo (!empty($facebook) ) ? $facebook_profile : null;
        echo (!empty($twitter) ) ? $twitter_profile : null;
        echo (!empty($google) ) ? $google_profile : null;
        echo (!empty($linkedin) ) ? $linkedin_profile : null;
        echo '</div>';
        echo $args['after_widget'];
}
}
// register Designmodo_Social_Profile widget
function register_designmodo_social_profile() {
register_widget('Designmodo_Social_Profile');
 }
add_action('widgets_init', 'register_designmodo_social_profile');
/*============================ Create Meta Box For Text Slider =============================*/
function prfx_custom_meta() {
    add_meta_box( 'prfx_meta', __( 'Meta Box Title', 'prfx-textdomain' ), 'prfx_meta_callback', 'page' );
}
add_action( 'add_meta_boxes', 'prfx_custom_meta' );
function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>
     <p>
        Text One
        <input type="text" name="meta-text" id="meta-text" value="<?php if ( isset ( $prfx_stored_meta['meta-text'] ) ) echo $prfx_stored_meta['meta-text'][0]; ?>" />
        <br>

        Text Two        
        <input type="text" name="meta-text1" id="meta-text1" value="<?php if ( isset ( $prfx_stored_meta['meta-text'] ) ) echo $prfx_stored_meta['meta-text1'][0]; ?>" />
       <br>
        Text Three
        <input type="text" name="meta-text2" id="meta-text2" value="<?php if ( isset ( $prfx_stored_meta['meta-text'] ) ) echo $prfx_stored_meta['meta-text2'][0]; ?>" />
    </p>
    <?php
}

function prfx_meta_save( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if( isset( $_POST[ 'meta-text' ] ) ) {
        update_post_meta( $post_id, 'meta-text', sanitize_text_field( $_POST[ 'meta-text' ] ) );
    }

    if( isset( $_POST[ 'meta-text1' ] ) ) {
        update_post_meta( $post_id, 'meta-text1', sanitize_text_field( $_POST[ 'meta-text1' ] ) );
    }
      if( isset( $_POST[ 'meta-text2' ] ) ) {
        update_post_meta( $post_id, 'meta-text2', sanitize_text_field( $_POST[ 'meta-text2' ] ) );
    }
}
add_action( 'save_post', 'prfx_meta_save' );
/*============================ Create Meta Box For Text Slider =============================*/

function qt_custom_breadcrumbs() {
   $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} 
add_filter('show_admin_bar', '__return_false');

function left_side() {
    add_meta_box( 'prfx_meta1','Left Side Text','left_callback', 'slider' );
}
add_action( 'add_meta_boxes', 'left_side' );
function left_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'left_nonce' );
    $left_side_text = get_post_meta( $post->ID );
    ?>
<table style="width:100%"><tr><th>Line One</th><td>
        <input type="text" name="meta-text" id="meta-text" value="<?php if ( isset ( $left_side_text['meta-text'] ) ) echo $left_side_text['meta-text'][0]; ?>" style="width:100%" /></td></tr>

<tr><th>Line Two</th><td>        
        <input type="text" name="meta-text1" id="meta-text1" value="<?php if ( isset ( $left_side_text['meta-text'] ) ) echo $left_side_text['meta-text1'][0]; ?>" style="width:100%" /></td></tr>
<tr><th>Line Three</th><td> <input type="text" name="meta-text2" id="meta-text2" value="<?php if ( isset ( $left_side_text['meta-text'] ) ) echo $left_side_text['meta-text2'][0]; ?>" style="width:100%" /></td></tr></table>
    <?php
}

function prfx_meta_save1( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'left_nonce' ] ) && wp_verify_nonce( $_POST[ 'left_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if( isset( $_POST[ 'meta-text' ] ) ) {
        update_post_meta( $post_id, 'meta-text', $_POST[ 'meta-text' ] );
    }

    if( isset( $_POST[ 'meta-text1' ] ) ) {
        update_post_meta( $post_id, 'meta-text1', $_POST[ 'meta-text1' ] );
    }
      if( isset( $_POST[ 'meta-text2' ] ) ) {
        update_post_meta( $post_id, 'meta-text2', $_POST[ 'meta-text2' ] );
    }
}
add_action( 'save_post', 'prfx_meta_save1' );




function right_side() {
    add_meta_box( 'prfx_meta2','Right Side Text','right_callback', 'slider' );
}
add_action( 'add_meta_boxes', 'right_side' );
function right_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'right_nonce' );
    $right_side_text = get_post_meta( $post->ID );
    ?>
<table style="width:100%"><tr><th>Line One</th><td>
        <input type="text" name="right-text" id="right-text" value="<?php if ( isset ( $right_side_text['right-text'] ) ) echo $right_side_text['right-text'][0]; ?>" style="width:100%" /></td></tr>

<tr><th>Line Two</th><td>        
        <input type="text" name="right-text1" id="right-text1" value="<?php if ( isset ( $right_side_text['right-text'] ) ) echo $right_side_text['right-text1'][0]; ?>" style="width:100%" /></td></tr>
<tr><th>Line Three</th><td> <input type="text" name="right-text2" id="right-text2" value="<?php if ( isset ( $right_side_text['right-text'] ) ) echo $right_side_text['right-text2'][0]; ?>" style="width:100%" /></td></tr></table>
    <?php
}

function prfx_meta_save2( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'right_nonce' ] ) && wp_verify_nonce( $_POST[ 'right_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if( isset( $_POST[ 'right-text' ] ) ) {
        update_post_meta( $post_id, 'right-text', $_POST['right-text']);
    }

    if( isset( $_POST[ 'right-text1' ] ) ) {
        update_post_meta( $post_id, 'right-text1', $_POST['right-text1']);
    }
      if( isset( $_POST[ 'right-text2' ] ) ) {
        update_post_meta( $post_id, 'right-text2', $_POST['right-text2']);
    }
}
add_action( 'save_post', 'prfx_meta_save2' );

function center_side() {
    add_meta_box( 'prfx_meta3','center Side Text','center_callback', 'slider' );
}
add_action( 'add_meta_boxes', 'center_side' );
function center_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'center_nonce' );
    $center_side_text = get_post_meta( $post->ID );
    ?>
<table style="width:100%"><tr><th>Line One</th><td>
        <input type="text" name="center-text" id="center-text" value="<?php if ( isset ( $center_side_text['center-text'] ) ) echo $center_side_text['center-text'][0]; ?>" style="width:100%" /></td></tr>

<tr><th>Line Two</th><td>        
        <input type="text" name="center-text1" id="center-text1" value="<?php if ( isset ( $center_side_text['center-text'] ) ) echo $center_side_text['center-text1'][0]; ?>" style="width:100%" /></td></tr>
<tr><th>Line Three</th><td> <input type="text" name="center-text2" id="center-text2" value="<?php if ( isset ( $center_side_text['center-text'] ) ) echo $center_side_text['center-text2'][0]; ?>" style="width:100%" /></td></tr></table>
    <?php
}

function prfx_meta_save3( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'center_nonce' ] ) && wp_verify_nonce( $_POST[ 'center_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if( isset( $_POST[ 'center-text' ] ) ) {
        update_post_meta( $post_id, 'center-text', $_POST[ 'center-text' ] );
    }

    if( isset( $_POST[ 'center-text1' ] ) ) {
        update_post_meta( $post_id, 'center-text1', $_POST[ 'center-text1' ] );
    }
      if( isset( $_POST[ 'center-text2' ] ) ) {
        update_post_meta( $post_id, 'center-text2', $_POST[ 'center-text2' ] );
    }
}
add_action( 'save_post', 'prfx_meta_save3' );

function home_textarea() {
    add_meta_box('prfx_meta4','First Slide Content','home_callback', 'slider' );
}
add_action( 'add_meta_boxes', 'home_textarea' );
function home_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'home_nonce' );
    $home_side_text = get_post_meta( $post->ID );
    ?>
<table style="width:100%"><tr><th>Home Content</th><td>
<textarea rows="20" name="home-text" id="home-text" value="<?php if ( isset ( $home_side_text['home-text'] ) ) echo nl2br( esc_html($home_side_text['home-text'][0])); ?>" style="width:100%" /><?php if ( isset ( $home_side_text['home-text'] ) ) echo nl2br( esc_html($home_side_text['home-text'][0])); ?></textarea></td></tr>
</table>
    <?php
}
function prfx_meta_save4( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'home_nonce' ] ) && wp_verify_nonce( $_POST[ 'home_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
         return;
    }
    if( isset( $_POST['home-text'] ) ) {
        update_post_meta( $post_id, 'home-text', $_POST[ 'home-text' ] );   }}
add_action( 'save_post', 'prfx_meta_save4' );

function add_comment_fields($fields) {
	$fields['age'] = '<h5 id="captcha" style="margin-right:10px; font-weight:bold;"></h5>'.
        '<input type="text" name="captcha" class="captcha" maxlength="4" placeholder="Enter captcha code" />';
   	return $fields;
}
add_filter('comment_form_default_fields','add_comment_fields');

add_action('admin_init', 'my_remove_menu_elements', 102);
function my_remove_menu_elements()
{
	//remove_submenu_page( 'themes.php', 'theme-editor.php' );
	//remove_submenu_page( 'plugins.php','plugin-editor.php' );
	//remove_submenu_page( 'index.php','update-core.php' );
	remove_menu_page( 'tools.php');
}

function hide_update_notice() {
   remove_action( 'admin_notices', 'update_nag', 3 );
}
add_action( 'admin_notices', 'hide_update_notice', 1 );

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(http://appsinasnap.com/wp-content/uploads/2017/06/logo.png) !important;
		height:100px; 
		width:320px;
		background-size: 320px 100px;
		background-repeat: no-repeat;
		margin-bottom:0px !important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
?>