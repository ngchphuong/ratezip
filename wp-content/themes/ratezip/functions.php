<?php

/**
 * Functions
 *
 * Core functionality and initial theme setup
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

/**
 * Initiate Foundation, for WordPress
 */

if ( ! function_exists( 'foundation_setup' ) ) :

function foundation_setup() {

	// Content Width
	if ( ! isset( $content_width ) ) $content_width = 900;

	// Language Translations
	load_theme_textdomain( 'foundation', get_template_directory() . '/languages' );

	// Custom Editor Style Support
	add_editor_style();

	// Support for Featured Images
	add_theme_support( 'post-thumbnails' ); 

	// Automatic Feed Links & Post Formats
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// Custom Background
	add_theme_support( 'custom-background', array(
		'default-color' => 'fff',
	) );

	// Custom Header
	add_theme_support( 'custom-header', array(
		'default-text-color' => '#000',
		'header-text'   => true,
		'height'		=> '200',
		'uploads'       => true,
	) );

}

add_action( 'after_setup_theme', 'foundation_setup' );

endif;

/**
 * Enqueue Scripts and Styles for Front-End
 */

if ( ! function_exists( 'foundation_assets' ) ) :

function foundation_assets() {

	if (!is_admin()) {

		/** 
		 * Deregister jQuery in favour of ZeptoJS
		 * jQuery will be used as a fallback if ZeptoJS is not compatible
		 * @see foundation_compatibility & http://foundation.zurb.com/docs/javascript.html
		 */
		wp_deregister_script('jquery');

		// Load JavaScripts
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', null, '4.0', true );

		wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/vendor/custom.modernizr.js', null, '2.1.0');
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );

		// Load Stylesheets
		wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.css' );
		wp_enqueue_style( 'foundation', get_template_directory_uri().'/css/foundation.min.css' );
		wp_enqueue_style( 'app', get_stylesheet_uri(), array('foundation') );

		// Load Google Fonts API
		wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300' );
	
	}

}

add_action( 'wp_enqueue_scripts', 'foundation_assets' );

endif;

/**
 * Initialise Foundation JS
 * @see: http://foundation.zurb.com/docs/javascript.html
 */

if ( ! function_exists( 'foundation_js_init' ) ) :

function foundation_js_init () {
    echo '<script>$(document).foundation();</script>';
}

add_action('wp_footer', 'foundation_js_init', 50);

endif;

/**
 * ZeptoJS and jQuery Fallback
 * @see: http://foundation.zurb.com/docs/javascript.html
 */

if ( ! function_exists( 'foundation_comptability' ) ) :

function foundation_comptability () {

echo "<script>";
echo "document.write('<script src=' +";
echo "('__proto__' in {} ? '" . get_template_directory_uri() . "/js/vendor/zepto" . "' : '" . get_template_directory_uri() . "/js/vendor/jquery" . "') +";
echo "'.js><\/script>')";
echo "</script>";

}

add_action('wp_footer', 'foundation_comptability', 10);

endif;

/**
 * Register Navigation Menus
 */

if ( ! function_exists( 'foundation_menus' ) ) :

// Register wp_nav_menus
function foundation_menus() {

	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu', 'foundation' ),
			'slide-menu' => __( 'Slide Menu', 'foundation' ),
			'footer-menu' => __( 'Footer Menu', 'foundation' )
		)
	);
	
}

add_action( 'init', 'foundation_menus' );

endif;

if ( ! function_exists( 'foundation_page_menu' ) ) :

function foundation_page_menu() {

	$args = array(
	'sort_column' => 'menu_order, post_title',
	'menu_class'  => 'large-12 columns',
	'include'     => '',
	'exclude'     => '',
	'echo'        => true,
	'show_home'   => false,
	'link_before' => '',
	'link_after'  => ''
	);

	wp_page_menu($args);

}

endif;

/**
 * Navigation Menu Adjustments
 */
class foundation_Widget extends WP_Widget {
	//creat my widget
	function foundation_Widget() {
		$widget_ops = array( 'classname' => 'map', 'description' => __('A widget that displays the map google ', 'map') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'map-widget' );
		$this->WP_Widget( 'map-widget', __('Map Google', 'map'), $widget_ops, $control_ops );
	}
	// create widget
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;

		//Display the name 
		if ( $name )
			printf( '<iframe width="460px" height="265px" scrolling="no"  frameborder="0" src="' . __('%1$s. &amp;iwloc=0004ca69ad7dbbff1069f&amp;output=embed" marginwidth="0" marginheight="0"', 'map').'></iframe>', $name );
		if ( $show_info )
			printf( $name );
		echo $after_widget;
	}
// function on update widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['show_info'] = $new_instance['show_info'];

		return $instance;
	}
	// create on form widget 
	function form( $instance ) {
		$defaults = array( 'name' => __('Map', 'example'), 'name' => __('Bilal Shaheen', 'map'), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Map Link', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
		</p>
<?php	
	}
}
// display widgets 
add_action( 'widgets_init', 'foundation_Widget' );

function foundation_widget() {
	register_widget( 'foundation_Widget' );
}

// Add class to navigation sub-menu
class foundation_navigation extends Walker_Nav_Menu {

function start_lvl(&$output, $depth) {
	$indent = str_repeat("\t", $depth);
	$output .= "\n$indent<ul class=\"dropdown\">\n";
}

function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
	$id_field = $this->db_fields['id'];
	if ( !empty( $children_elements[ $element->$id_field ] ) ) {
		$element->classes[] = 'has-dropdown';
	}
		Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}

/**
 * Create pagination
 */

if ( ! function_exists( 'foundation_pagination' ) ) :

function foundation_pagination() {

global $wp_query;

$big = 999999999;

$links = paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'prev_next' => true,
	'prev_text' => '&laquo;',
	'next_text' => '&raquo;',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'type' => 'list'
)
);

$pagination = str_replace('page-numbers','pagination',$links);

echo $pagination;

}

endif;

/**
 * Register Sidebars
 */

if ( ! function_exists( 'foundation_widgets' ) ) :

function foundation_widgets() {

	// Sidebar Right
	register_sidebar( array(
			'id' => 'foundation_sidebar_right',
			'name' => __( 'Sidebar Right', 'foundation' ),
			'description' => __( 'This sidebar is located on the right-hand side of each page.', 'foundation' ),
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );
	// Sidebar  Column One
	register_sidebar( array(
			'id' => 'foundation_sidebar_left',
			'name' => __( 'Sidebar Left', 'foundation' ),
			'description' => __( 'This sidebar is located in column one of your theme .', 'foundation' ),
			'before_widget' => '<div class="small-12 large-12 columns page-right">',
			'after_widget' => '</div>',
			
		) );
	// Sidebar Conterd Column One
		register_sidebar( array(
			'id' => 'foundation_sidebar_title_slide',
			'name' => __( 'Sidebar Title Slide', 'foundation' ),
			'description' => __( 'This sidebar is located in column Title Slide of your theme .', 'foundation' ),
			'before_widget' => '<div class="small-9 small-centered columns">',
			'after_widget' => '</div>',
			
		) );
	// Sidebar  Column Two
	register_sidebar( array(
			'id' => 'foundation_sidebar_two',
			'name' => __( 'Sidebar Two', 'foundation' ),
			'description' => __( 'This sidebar is located in column two of your theme .', 'foundation' ),
			'before_widget' => '<div class="large-12 columns">',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
			'after_widget' => '</div>',
		) );
	// Sidebar Contend Column Two
	register_sidebar( array(
			'id' => 'foundation_sidebar_contend_two',
			'name' => __( 'Sidebar Contend Two', 'foundation' ),
			'description' => __( 'This sidebar is located in column Contned two of your theme .', 'foundation' ),
			'before_widget' => '<ul>',
			'after_widget' => '</ul>',
		) );
	// Sidebar Column Three
	register_sidebar( array(
			'id' => 'foundation_sidebar_three',
			'name' => __( 'Sidebar Three', 'foundation' ),
			'description' => __( 'This sidebar is located in column three of your theme .', 'foundation' ),
			'before_widget' => '<div class="large-12 columns">',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
			'after_widget' => '</div>',
		) );
	}

add_action( 'widgets_init', 'foundation_widgets' );

endif;

/**
 * Custom Avatar Classes
 */

if ( ! function_exists( 'foundation_avatar_css' ) ) :

function foundation_avatar_css($class) {
	$class = str_replace("class='avatar", "class='author_gravatar left ", $class) ;
	return $class;
}

add_filter('get_avatar','foundation_avatar_css');

endif;

/**
 * Custom Post Excerpt
 */

/** 
 * Comments Template
 */

if ( ! function_exists( 'foundation_comment' ) ) :

function foundation_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'foundation' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'foundation' ), '<span>', '</span>' ); ?></p>
	<?php
		break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header>
				<?php
					echo "<span class='th alignleft' style='margin-right:1rem;'>";
					echo get_avatar( $comment, 44 );
					echo "</span>";
					printf( '%2$s %1$s',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span class="label">' . __( 'Post Author', 'foundation' ) . '</span>' : ''
					);
					printf( '<br><a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						sprintf( __( '%1$s at %2$s', 'foundation' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p><?php _e( 'Your comment is awaiting moderation.', 'foundation' ); ?></p>
			<?php endif; ?>

			<section>
				<?php comment_text(); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'foundation' ), 'after' => ' &darr; <br><br>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

			</div>
		</article>
	<?php
		break;
	endswitch;
}
endif;

/**
 * Remove Class from Sticky Post
 */

if ( ! function_exists( 'foundation_remove_sticky' ) ) :

function foundation_remove_sticky($classes) {
  $classes = array_diff($classes, array("sticky"));
  return $classes;
}

add_filter('post_class','foundation_remove_sticky');

endif;

/**
 * Custom Foundation Title Tag
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 */

function foundation_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'foundation' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'foundation_title', 10, 2 );

/**
 * Retrieve Shortcodes
 * @see: http://fwp.drewsymo.com/shortcodes/
 */

$foundation_shortcodes = trailingslashit( get_template_directory() ) . 'inc/shortcodes.php';

if (file_exists($foundation_shortcodes)) {
	require( $foundation_shortcodes );
}

function codex_custom_init() {
	// create Best Post 
  $labels = array(
    'name' => 'Best Post ',
    'singular_name' => 'Best Post',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Best Post',
    'edit_item' => 'Edit Best Post',
    'new_item' => 'New Best Post',
    'all_items' => 'All Best Post',
    'view_item' => 'View Best Post',
    'search_items' => 'Search Best Post',
    'not_found' =>  'No Best Post found',
    'not_found_in_trash' => 'No Best Post found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Best Post'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'best_post' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 
  register_post_type( 'best_top', $args );
  	// create Slide Post
	$labels = array(
	    'name' => 'Slide Post',
	    'singular_name' => 'Slide Post',
	    'add_new' => 'Add New',
	    'add_new_item' => 'Add New Slide Post',
	    'edit_item' => 'Edit Slide Post',
	    'new_item' => 'New Slide Post',
	    'all_items' => 'All Slide Post',
	    'view_item' => 'View Slide Post',
	    'search_items' => 'Search Slide Post',
	    'not_found' =>  'No Slide Post found',
	    'not_found_in_trash' => 'No Slide Post found in Trash', 
	    'parent_item_colon' => '',
	    'menu_name' => 'Slide Post'
	  );
	  $args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true, 
	    'show_in_menu' => true, 
	    'query_var' => true,
	    'rewrite' => array( 'slug' => 'slide_post' ),
	    'capability_type' => 'post',
	    'has_archive' => true, 
	    'hierarchical' => false,
	    'menu_position' => null,
	    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	  ); 
  register_post_type( 'slide_post', $args );

}
add_action( 'init', 'codex_custom_init' );

function foundation_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'foundation_excerpt_length',999 );
function foundation_continue_reading_link() {
	return ' <a class="readmore" href="'. get_permalink() . '">Continue Reading</a>';
}

function foundation_auto_excerpt_more( $more ) {
	return ' &hellip;' . foundation_continue_reading_link();
}
add_filter( 'excerpt_more', 'foundation_auto_excerpt_more' );

function foundation_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= foundation_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'foundation_custom_excerpt_more' );



// add shortcode


?>