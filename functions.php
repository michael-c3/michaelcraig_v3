<?php 
	
//Admin Customization
require_once( 'library/admin.php' );
	



function tmodern_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',    // background image default
	    'default-color' => '',    // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
    	array(
			'primary' => __( 'Primary Menu' ),
			'sub' => __( 'sub menu' ),
			)
  );
}

/* end theme support */
add_action('init', 'tmodern_theme_support');

function threemodern_styles() {
	
	wp_enqueue_style('normalize-css', get_template_directory_uri().'/css/normalize.css' );
	wp_enqueue_style('animate-css', get_template_directory_uri().'/css/animate.css');
	wp_enqueue_style('style', get_stylesheet_uri() ); //main stylesheet
	
}

add_action('wp_enqueue_scripts', 'threemodern_styles');

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function threemodern_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'threemodern_theme_customizer' );


// Related Posts Function (call using threemodern_related_posts(); )
function threemodern_related_posts() {
	echo '<ul id="bones-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) {
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'bonestheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_postdata();
	echo '</ul>';
}

//Page Slug Body Class

add_filter('body_class','smartestb_pages_bodyclass');

function smartestb_pages_bodyclass($classes) {
    if (is_page()) {
        // get page slug
        global $post;
        $slug = get_post( $post )->post_name;
 
        // add slug to $classes array
        $classes[] = $slug;
        // return the $classes array
        return $classes;
    } else { 
        return $classes;
    }
}

function no_rss_version() { return ''; }

// remove WP version from scripts
function remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}


//call Google font - from twentythirteen
//http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,200italic|Montserrat:400,700

function threemodern_fonts() {
  wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,300italic|Montserrat:400,700');
}

add_action('wp_enqueue_scripts', 'threemodern_fonts');
add_filter('wpcf7_load_js', '_return_false');
add_filter('wpcf7_load_css', '_return_false');
?>