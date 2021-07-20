<?php

/**

 * Twenty Twenty functions and definitions

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty 1.0

 */



/**

 * Table of Contents:

 * Theme Support

 * Required Files

 * Register Styles

 * Register Scripts

 * Register Menus

 * Custom Logo

 * WP Body Open

 * Register Sidebars

 * Enqueue Block Editor Assets

 * Enqueue Classic Editor Styles

 * Block Editor Settings

 */



/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which

 * runs before the init hook. The init hook is too late for some features, such

 * as indicating support for post thumbnails.

 */

function twentytwenty_theme_support() {



	// Add default posts and comments RSS feed links to head.

	add_theme_support( 'automatic-feed-links' );



	// Custom background color.

	add_theme_support(

		'custom-background',

		array(

			'default-color' => 'f5efe0',

		)

	);



	// Set content-width.

	global $content_width;

	if ( ! isset( $content_width ) ) {

		$content_width = 580;

	}



	/*

	 * Enable support for Post Thumbnails on posts and pages.

	 *

	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/

	 */

	add_theme_support( 'post-thumbnails' );



	// Set post thumbnail size.

	set_post_thumbnail_size( 1200, 9999 );



	// Add custom image size used in Cover Template.

	add_image_size( 'twentytwenty-fullscreen', 1980, 9999 );



	// Custom logo.

	$logo_width  = 120;

	$logo_height = 90;



	// If the retina setting is active, double the recommended width and height.

	if ( get_theme_mod( 'retina_logo', false ) ) {

		$logo_width  = floor( $logo_width * 2 );

		$logo_height = floor( $logo_height * 2 );

	}



	add_theme_support(

		'custom-logo',

		array(

			'height'      => $logo_height,

			'width'       => $logo_width,

			'flex-height' => true,

			'flex-width'  => true,

		)

	);



	/*

	 * Let WordPress manage the document title.

	 * By adding theme support, we declare that this theme does not use a

	 * hard-coded <title> tag in the document head, and expect WordPress to

	 * provide it for us.

	 */

	add_theme_support( 'title-tag' );



	/*

	 * Switch default core markup for search form, comment form, and comments

	 * to output valid HTML5.

	 */

	add_theme_support(

		'html5',

		array(

			'search-form',

			'comment-form',

			'comment-list',

			'gallery',

			'caption',

			'script',

			'style',

			'navigation-widgets',

		)

	);



	/*

	 * Make theme available for translation.

	 * Translations can be filed in the /languages/ directory.

	 * If you're building a theme based on Twenty Twenty, use a find and replace

	 * to change 'twentytwenty' to the name of your theme in all the template files.

	 */

	load_theme_textdomain( 'twentytwenty' );



	// Add support for full and wide align images.

	add_theme_support( 'align-wide' );



	// Add support for responsive embeds.

	add_theme_support( 'responsive-embeds' );



	/*

	 * Adds starter content to highlight the theme on fresh sites.

	 * This is done conditionally to avoid loading the starter content on every

	 * page load, as it is a one-off operation only needed once in the customizer.

	 */

	if ( is_customize_preview() ) {

		require get_template_directory() . '/inc/starter-content.php';

		add_theme_support( 'starter-content', twentytwenty_get_starter_content() );

	}



	// Add theme support for selective refresh for widgets.

	add_theme_support( 'customize-selective-refresh-widgets' );



	/*

	 * Adds `async` and `defer` support for scripts registered or enqueued

	 * by the theme.

	 */

	$loader = new TwentyTwenty_Script_Loader();

	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );



}



add_action( 'after_setup_theme', 'twentytwenty_theme_support' );



/**

 * REQUIRED FILES

 * Include required files.

 */

require get_template_directory() . '/inc/template-tags.php';



// Handle SVG icons.

require get_template_directory() . '/classes/class-twentytwenty-svg-icons.php';

require get_template_directory() . '/inc/svg-icons.php';



// Handle Customizer settings.

require get_template_directory() . '/classes/class-twentytwenty-customize.php';



// Require Separator Control class.

require get_template_directory() . '/classes/class-twentytwenty-separator-control.php';



// Custom comment walker.

require get_template_directory() . '/classes/class-twentytwenty-walker-comment.php';



// Custom page walker.

require get_template_directory() . '/classes/class-twentytwenty-walker-page.php';



// Custom script loader class.

require get_template_directory() . '/classes/class-twentytwenty-script-loader.php';



// Non-latin language handling.

require get_template_directory() . '/classes/class-twentytwenty-non-latin-languages.php';



// Custom CSS.

require get_template_directory() . '/inc/custom-css.php';



// Block Patterns.

require get_template_directory() . '/inc/block-patterns.php';



/**

 * Register and Enqueue Styles.

 */

function twentytwenty_register_styles() {



	$theme_version = wp_get_theme()->get( 'Version' );



	

	wp_style_add_data( 'twentytwenty-style', 'rtl', 'replace' );



	// Add output of Customizer settings as inline style.

	wp_add_inline_style( 'twentytwenty-style', twentytwenty_get_customizer_css( 'front-end' ) );



	// Add print CSS.

	/*wp_enqueue_style( 'twentytwenty-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );*/

	wp_enqueue_style( 'twentytwenty-boostrapcss', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	
	/*wp_enqueue_style( 'twentytwenty-navigation', get_template_directory_uri() . '/assets/css/navigation.css');*/

	wp_enqueue_style( 'twentytwenty-custom', get_template_directory_uri() . '/assets/css/jquery.mCustomScrollbar.min.css');

	wp_enqueue_style( 'twentytwenty-navigation', get_template_directory_uri() . '/assets/css/new_navigation.css');

	wp_enqueue_style( 'twentytwenty-font', get_template_directory_uri() . '/assets/css/fontawesome.css');

	

	wp_enqueue_style( 'twentytwenty-fancyboxcss', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css');
	
	wp_enqueue_style( 'twentytwenty-slickcss', get_template_directory_uri() . '/assets/css/slick.css');

	wp_enqueue_style( 'twentytwenty-style', get_stylesheet_uri(), array(), $theme_version );

	wp_enqueue_style( 'twentytwenty-fontgoogle', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

	wp_enqueue_style( 'twentytwenty-fontgooglenew', 'https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;700&display=swap');



}



add_action( 'wp_enqueue_scripts', 'twentytwenty_register_styles' );



/**

 * Register and Enqueue Scripts.

 */

function twentytwenty_register_scripts() {



	$theme_version = wp_get_theme()->get( 'Version' );



	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}



	/*wp_enqueue_script( 'twentytwenty-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );*/

	wp_script_add_data( 'twentytwenty-js', 'async', true );


	wp_enqueue_script( 'twentytwenty-general', get_template_directory_uri() . '/assets/js/general.js', array(), $theme_version, true );
	

	wp_enqueue_script( 'twentytwenty-navigation-new', get_template_directory_uri() . '/assets/js/new_navigation.js', array(), $theme_version, true );

	wp_enqueue_script( 'twentytwenty-mCustomScrollbar', get_template_directory_uri() . '/assets/js/jquery.mCustomScrollbar.js', array(), $theme_version, true );

	wp_enqueue_script( 'twentytwenty-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array(), $theme_version, false );

	wp_enqueue_script( 'twentytwenty-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), $theme_version, false );
	
	wp_enqueue_script( 'twentytwenty-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), $theme_version, false );
	
	wp_enqueue_script( 'twentytwenty-slick', get_template_directory_uri() . '/assets/js/slick.js', array(), $theme_version, false );

	wp_enqueue_script( 'twentytwenty-newjquery-slick', get_template_directory_uri() . '/assets/js/slick.js', array(), $theme_version, true );


	wp_enqueue_script( 'gmap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA-w1yIFUC5apNzpwsAGIxmhPQ2enVHfTE&libraries=places', array(), $theme_version, true );

	wp_enqueue_script( 'captcha', 'https://www.google.com/recaptcha/api.js', array(), $theme_version, false );

	


}



add_action( 'wp_enqueue_scripts', 'twentytwenty_register_scripts' );



/**

 * Fix skip link focus in IE11.

 *

 * This does not enqueue the script because it is tiny and because it is only for IE11,

 * thus it does not warrant having an entire dedicated blocking script being loaded.

 *

 * @link https://git.io/vWdr2

 */

function twentytwenty_skip_link_focus_fix() {

	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.

	?>

	<script>

		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);

	</script>

	<?php

}

add_action( 'wp_print_footer_scripts', 'twentytwenty_skip_link_focus_fix' );



/** Enqueue non-latin language styles

 *

 * @since Twenty Twenty 1.0

 *

 * @return void

 */

function twentytwenty_non_latin_languages() {

	$custom_css = TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'front-end' );



	if ( $custom_css ) {

		wp_add_inline_style( 'twentytwenty-style', $custom_css );

	}

}



add_action( 'wp_enqueue_scripts', 'twentytwenty_non_latin_languages' );



/**

 * Register navigation menus uses wp_nav_menu in five places.

 */

function twentytwenty_menus() {



	$locations = array(

		'primary'  => __( 'Desktop Horizontal Menu', 'twentytwenty' ),

		'expanded' => __( 'Desktop Expanded Menu', 'twentytwenty' ),

		'mobile'   => __( 'Mobile Menu', 'twentytwenty' ),

		'footer'   => __( 'Footer Menu', 'twentytwenty' ),

		'social'   => __( 'Social Menu', 'twentytwenty' ),

	);



	register_nav_menus( $locations );

}



add_action( 'init', 'twentytwenty_menus' );



/**

 * Get the information about the logo.

 *

 * @param string $html The HTML output from get_custom_logo (core function).

 * @return string

 */

function twentytwenty_get_custom_logo( $html ) {



	$logo_id = get_theme_mod( 'custom_logo' );



	if ( ! $logo_id ) {

		return $html;

	}



	$logo = wp_get_attachment_image_src( $logo_id, 'full' );



	if ( $logo ) {

		// For clarity.

		$logo_width  = esc_attr( $logo[1] );

		$logo_height = esc_attr( $logo[2] );



		// If the retina logo setting is active, reduce the width/height by half.

		if ( get_theme_mod( 'retina_logo', false ) ) {

			$logo_width  = floor( $logo_width / 2 );

			$logo_height = floor( $logo_height / 2 );



			$search = array(

				'/width=\"\d+\"/iU',

				'/height=\"\d+\"/iU',

			);



			$replace = array(

				"width=\"{$logo_width}\"",

				"height=\"{$logo_height}\"",

			);



			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.

			if ( strpos( $html, ' style=' ) === false ) {

				$search[]  = '/(src=)/';

				$replace[] = "style=\"height: {$logo_height}px;\" src=";

			} else {

				$search[]  = '/(style="[^"]*)/';

				$replace[] = "$1 height: {$logo_height}px;";

			}



			$html = preg_replace( $search, $replace, $html );



		}

	}



	return $html;



}



add_filter( 'get_custom_logo', 'twentytwenty_get_custom_logo' );



if ( ! function_exists( 'wp_body_open' ) ) {



	/**

	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.

	 */

	function wp_body_open() {

		do_action( 'wp_body_open' );

	}

}



/**

 * Include a skip to content link at the top of the page so that users can bypass the menu.

 */

/*function twentytwenty_skip_link() {

	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'twentytwenty' ) . '</a>';

}*/



add_action( 'wp_body_open', 'twentytwenty_skip_link', 5 );



/**

 * Register widget areas.

 *

 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

 */


function twentytwenty_sidebar_registration() {



	// Arguments used in all register_sidebar() calls.

	$shared_args = array(

		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',

		'after_title'   => '</h2>',

		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',

		'after_widget'  => '</div></div>',

	);



	// Footer #1.

	register_sidebar(

		array_merge(

			$shared_args,

			array(

				'name'        => __( 'Footer #1', 'twentytwenty' ),

				'id'          => 'footer-1',

				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty' ),

			)

		)

	);



	// Footer #2.

	register_sidebar(
		array_merge(
			$shared_args,
			array(

				'name'        => __( 'Footer #2', 'twentytwenty' ),

				'id'          => 'footer-2',

				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
			)
		)
	);
	// Footer #3.

	register_sidebar(
		array_merge(
			$shared_args,
			array(

				'name'        => __( 'Footer #3', 'twentytwenty' ),

				'id'          => 'footer-3',

				'description' => __( 'Widgets in this area will be displayed in the third column in the footer.', 'twentytwenty' ),
			)
		)
	);
	// Footer #4.

	register_sidebar(
		array_merge(
			$shared_args,
			array(

				'name'        => __( 'Footer #4', 'twentytwenty' ),

				'id'          => 'footer-4',

				'description' => __( 'Widgets in this area will be displayed in the fourth column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #5.

	register_sidebar(
		array_merge(
			$shared_args,
			array(

				'name'        => __( 'Footer #5', 'twentytwenty' ),

				'id'          => 'footer-5',

				'description' => __( 'Widgets in this area will be displayed in the fifth column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #6.

	register_sidebar(
		array_merge(
			$shared_args,
			array(

				'name'        => __( 'Footer #6', 'twentytwenty' ),

				'id'          => 'footer-6',

				'description' => __( 'Widgets in this area will be displayed in the sixth column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #7.

	register_sidebar(
		array_merge(
			$shared_args,
			array(

				'name'        => __( 'Footer #7', 'twentytwenty' ),

				'id'          => 'footer-7',

				'description' => __( 'Widgets in this area will be displayed in the seventh column in the footer.', 'twentytwenty' ),
			)
		)
	);
}



add_action( 'widgets_init', 'twentytwenty_sidebar_registration' );


function get_breadcrumb() {
	echo '<i class="fas fa-home" style="padding-right: 10px; margin-top: 4px;"></i><a href="'.home_url().'" rel="nofollow">Home</a>';
	if (is_category() || is_single()) {
        //echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        //the_category(' &bull; ');
		if (is_single()) {
			echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
			the_title();
		}
	} elseif (is_page()) {
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
		echo the_title();
	} elseif (is_search()) {
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}

/**

 * Enqueue supplemental block editor styles.

 */

function twentytwenty_block_editor_styles() {



	// Enqueue the editor styles.

	wp_enqueue_style( 'twentytwenty-block-editor-styles', get_theme_file_uri( '/assets/css/editor-style-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );

	wp_style_add_data( 'twentytwenty-block-editor-styles', 'rtl', 'replace' );



	// Add inline style from the Customizer.

	wp_add_inline_style( 'twentytwenty-block-editor-styles', twentytwenty_get_customizer_css( 'block-editor' ) );



	// Add inline style for non-latin fonts.

	wp_add_inline_style( 'twentytwenty-block-editor-styles', TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'block-editor' ) );



	// Enqueue the editor script.

	wp_enqueue_script( 'twentytwenty-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );

}



add_action( 'enqueue_block_editor_assets', 'twentytwenty_block_editor_styles', 1, 1 );



/**

 * Enqueue classic editor styles.

 */

function twentytwenty_classic_editor_styles() {



	$classic_editor_styles = array(

		'/assets/css/editor-style-classic.css',

	);



	add_editor_style( $classic_editor_styles );



}



add_action( 'init', 'twentytwenty_classic_editor_styles' );



/**

 * Output Customizer settings in the classic editor.

 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.

 *

 * @param array $mce_init TinyMCE styles.

 * @return array TinyMCE styles.

 */

function twentytwenty_add_classic_editor_customizer_styles( $mce_init ) {



	$styles = twentytwenty_get_customizer_css( 'classic-editor' );



	if ( ! isset( $mce_init['content_style'] ) ) {

		$mce_init['content_style'] = $styles . ' ';

	} else {

		$mce_init['content_style'] .= ' ' . $styles . ' ';

	}



	return $mce_init;



}



add_filter( 'tiny_mce_before_init', 'twentytwenty_add_classic_editor_customizer_styles' );



/**

 * Output non-latin font styles in the classic editor.

 * Adds styles to the head of the TinyMCE iframe. Kudos to @Otto42 for the original solution.

 *

 * @param array $mce_init TinyMCE styles.

 * @return array TinyMCE styles.

 */

function twentytwenty_add_classic_editor_non_latin_styles( $mce_init ) {



	$styles = TwentyTwenty_Non_Latin_Languages::get_non_latin_css( 'classic-editor' );



	// Return if there are no styles to add.

	if ( ! $styles ) {

		return $mce_init;

	}



	if ( ! isset( $mce_init['content_style'] ) ) {

		$mce_init['content_style'] = $styles . ' ';

	} else {

		$mce_init['content_style'] .= ' ' . $styles . ' ';

	}



	return $mce_init;



}



add_filter( 'tiny_mce_before_init', 'twentytwenty_add_classic_editor_non_latin_styles' );



/**

 * Block Editor Settings.

 * Add custom colors and font sizes to the block editor.

 */

function twentytwenty_block_editor_settings() {



	// Block Editor Palette.

	$editor_color_palette = array(

		array(

			'name'  => __( 'Accent Color', 'twentytwenty' ),

			'slug'  => 'accent',

			'color' => twentytwenty_get_color_for_area( 'content', 'accent' ),

		),

		array(

			'name'  => _x( 'Primary', 'color', 'twentytwenty' ),

			'slug'  => 'primary',

			'color' => twentytwenty_get_color_for_area( 'content', 'text' ),

		),

		array(

			'name'  => _x( 'Secondary', 'color', 'twentytwenty' ),

			'slug'  => 'secondary',

			'color' => twentytwenty_get_color_for_area( 'content', 'secondary' ),

		),

		array(

			'name'  => __( 'Subtle Background', 'twentytwenty' ),

			'slug'  => 'subtle-background',

			'color' => twentytwenty_get_color_for_area( 'content', 'borders' ),

		),

	);



	// Add the background option.

	$background_color = get_theme_mod( 'background_color' );

	if ( ! $background_color ) {

		$background_color_arr = get_theme_support( 'custom-background' );

		$background_color     = $background_color_arr[0]['default-color'];

	}

	$editor_color_palette[] = array(

		'name'  => __( 'Background Color', 'twentytwenty' ),

		'slug'  => 'background',

		'color' => '#' . $background_color,

	);



	// If we have accent colors, add them to the block editor palette.

	if ( $editor_color_palette ) {

		add_theme_support( 'editor-color-palette', $editor_color_palette );

	}



	// Block Editor Font Sizes.

	add_theme_support(

		'editor-font-sizes',

		array(

			array(

				'name'      => _x( 'Small', 'Name of the small font size in the block editor', 'twentytwenty' ),

				'shortName' => _x( 'S', 'Short name of the small font size in the block editor.', 'twentytwenty' ),

				'size'      => 18,

				'slug'      => 'small',

			),

			array(

				'name'      => _x( 'Regular', 'Name of the regular font size in the block editor', 'twentytwenty' ),

				'shortName' => _x( 'M', 'Short name of the regular font size in the block editor.', 'twentytwenty' ),

				'size'      => 21,

				'slug'      => 'normal',

			),

			array(

				'name'      => _x( 'Large', 'Name of the large font size in the block editor', 'twentytwenty' ),

				'shortName' => _x( 'L', 'Short name of the large font size in the block editor.', 'twentytwenty' ),

				'size'      => 26.25,

				'slug'      => 'large',

			),

			array(

				'name'      => _x( 'Larger', 'Name of the larger font size in the block editor', 'twentytwenty' ),

				'shortName' => _x( 'XL', 'Short name of the larger font size in the block editor.', 'twentytwenty' ),

				'size'      => 32,

				'slug'      => 'larger',

			),

		)

	);



	add_theme_support( 'editor-styles' );



	// If we have a dark background color then add support for dark editor style.

	// We can determine if the background color is dark by checking if the text-color is white.

	if ( '#ffffff' === strtolower( twentytwenty_get_color_for_area( 'content', 'text' ) ) ) {

		add_theme_support( 'dark-editor-style' );

	}



}



add_action( 'after_setup_theme', 'twentytwenty_block_editor_settings' );



/**

 * Overwrite default more tag with styling and screen reader markup.

 *

 * @param string $html The default output HTML for the more tag.

 * @return string

 */

function twentytwenty_read_more_tag( $html ) {

	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );

}



add_filter( 'the_content_more_link', 'twentytwenty_read_more_tag' );



/**

 * Enqueues scripts for customizer controls & settings.

 *

 * @since Twenty Twenty 1.0

 *

 * @return void

 */

function twentytwenty_customize_controls_enqueue_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );



	// Add main customizer js file.

	wp_enqueue_script( 'twentytwenty-customize', get_template_directory_uri() . '/assets/js/customize.js', array( 'jquery' ), $theme_version, false );



	// Add script for color calculations.

	wp_enqueue_script( 'twentytwenty-color-calculations', get_template_directory_uri() . '/assets/js/color-calculations.js', array( 'wp-color-picker' ), $theme_version, false );



	// Add script for controls.

	wp_enqueue_script( 'twentytwenty-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'twentytwenty-color-calculations', 'customize-controls', 'underscore', 'jquery' ), $theme_version, false );

	wp_localize_script( 'twentytwenty-customize-controls', 'twentyTwentyBgColors', twentytwenty_get_customizer_color_vars() );

	
}



add_action( 'customize_controls_enqueue_scripts', 'twentytwenty_customize_controls_enqueue_scripts' );



/**

 * Enqueue scripts for the customizer preview.

 *

 * @since Twenty Twenty 1.0

 *

 * @return void

 */

function twentytwenty_customize_preview_init() {

	$theme_version = wp_get_theme()->get( 'Version' );



	wp_enqueue_script( 'twentytwenty-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview', 'customize-selective-refresh', 'jquery' ), $theme_version, true );

	wp_localize_script( 'twentytwenty-customize-preview', 'twentyTwentyBgColors', twentytwenty_get_customizer_color_vars() );

	wp_localize_script( 'twentytwenty-customize-preview', 'twentyTwentyPreviewEls', twentytwenty_get_elements_array() );



	wp_add_inline_script(

		'twentytwenty-customize-preview',

		sprintf(

			'wp.customize.selectiveRefresh.partialConstructor[ %1$s ].prototype.attrs = %2$s;',

			wp_json_encode( 'cover_opacity' ),

			wp_json_encode( twentytwenty_customize_opacity_range() )

		)

	);

}



add_action( 'customize_preview_init', 'twentytwenty_customize_preview_init' );



/**

 * Get accessible color for an area.

 *

 * @since Twenty Twenty 1.0

 *

 * @param string $area The area we want to get the colors for.

 * @param string $context Can be 'text' or 'accent'.

 * @return string Returns a HEX color.

 */

function twentytwenty_get_color_for_area( $area = 'content', $context = 'text' ) {



	// Get the value from the theme-mod.

	$settings = get_theme_mod(

		'accent_accessible_colors',

		array(

			'content'       => array(

				'text'      => '#000000',

				'accent'    => '#cd2653',

				'secondary' => '#6d6d6d',

				'borders'   => '#dcd7ca',

			),

			'header-footer' => array(

				'text'      => '#000000',

				'accent'    => '#cd2653',

				'secondary' => '#6d6d6d',

				'borders'   => '#dcd7ca',

			),

		)

	);



	// If we have a value return it.

	if ( isset( $settings[ $area ] ) && isset( $settings[ $area ][ $context ] ) ) {

		return $settings[ $area ][ $context ];

	}



	// Return false if the option doesn't exist.

	return false;

}



/**

 * Returns an array of variables for the customizer preview.

 *

 * @since Twenty Twenty 1.0

 *

 * @return array

 */

function twentytwenty_get_customizer_color_vars() {

	$colors = array(

		'content'       => array(

			'setting' => 'background_color',

		),

		'header-footer' => array(

			'setting' => 'header_footer_background_color',

		),

	);

	return $colors;

}



/**

 * Get an array of elements.

 *

 * @since Twenty Twenty 1.0

 *

 * @return array

 */

function twentytwenty_get_elements_array() {



	// The array is formatted like this:

	// [key-in-saved-setting][sub-key-in-setting][css-property] = [elements].

	$elements = array(

		'content'       => array(

			'accent'     => array(

				'color'            => array( '.color-accent', '.color-accent-hover:hover', '.color-accent-hover:focus', ':root .has-accent-color', '.has-drop-cap:not(:focus):first-letter', '.wp-block-button.is-style-outline', 'a' ),

				'border-color'     => array( 'blockquote', '.border-color-accent', '.border-color-accent-hover:hover', '.border-color-accent-hover:focus' ),

				'background-color' => array( 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file .wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.bg-accent', '.bg-accent-hover:hover', '.bg-accent-hover:focus', ':root .has-accent-background-color', '.comment-reply-link' ),

				'fill'             => array( '.fill-children-accent', '.fill-children-accent *' ),

			),

			'background' => array(

				'color'            => array( ':root .has-background-color', 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file__button', 'input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.wp-block-button', '.comment-reply-link', '.has-background.has-primary-background-color:not(.has-text-color)', '.has-background.has-primary-background-color *:not(.has-text-color)', '.has-background.has-accent-background-color:not(.has-text-color)', '.has-background.has-accent-background-color *:not(.has-text-color)' ),

				'background-color' => array( ':root .has-background-background-color' ),

			),

			'text'       => array(

				'color'            => array( 'body', '.entry-title a', ':root .has-primary-color' ),

				'background-color' => array( ':root .has-primary-background-color' ),

			),

			'secondary'  => array(

				'color'            => array( 'cite', 'figcaption', '.wp-caption-text', '.post-meta', '.entry-content .wp-block-archives li', '.entry-content .wp-block-categories li', '.entry-content .wp-block-latest-posts li', '.wp-block-latest-comments__comment-date', '.wp-block-latest-posts__post-date', '.wp-block-embed figcaption', '.wp-block-image figcaption', '.wp-block-pullquote cite', '.comment-metadata', '.comment-respond .comment-notes', '.comment-respond .logged-in-as', '.pagination .dots', '.entry-content hr:not(.has-background)', 'hr.styled-separator', ':root .has-secondary-color' ),

				'background-color' => array( ':root .has-secondary-background-color' ),

			),

			'borders'    => array(

				'border-color'        => array( 'pre', 'fieldset', 'input', 'textarea', 'table', 'table *', 'hr' ),

				'background-color'    => array( 'caption', 'code', 'code', 'kbd', 'samp', '.wp-block-table.is-style-stripes tbody tr:nth-child(odd)', ':root .has-subtle-background-background-color' ),

				'border-bottom-color' => array( '.wp-block-table.is-style-stripes' ),

				'border-top-color'    => array( '.wp-block-latest-posts.is-grid li' ),

				'color'               => array( ':root .has-subtle-background-color' ),

			),

		),

		'header-footer' => array(

			'accent'     => array(

				'color'            => array( 'body:not(.overlay-header) .primary-menu > li > a', 'body:not(.overlay-header) .primary-menu > li > .icon', '.modal-menu a', '.footer-menu a, .footer-widgets a', '#site-footer .wp-block-button.is-style-outline', '.wp-block-pullquote:before', '.singular:not(.overlay-header) .entry-header a', '.archive-header a', '.header-footer-group .color-accent', '.header-footer-group .color-accent-hover:hover' ),

				'background-color' => array( '.social-icons a', '#site-footer button:not(.toggle)', '#site-footer .button', '#site-footer .faux-button', '#site-footer .wp-block-button__link', '#site-footer .wp-block-file__button', '#site-footer input[type="button"]', '#site-footer input[type="reset"]', '#site-footer input[type="submit"]' ),

			),

			'background' => array(

				'color'            => array( '.social-icons a', 'body:not(.overlay-header) .primary-menu ul', '.header-footer-group button', '.header-footer-group .button', '.header-footer-group .faux-button', '.header-footer-group .wp-block-button:not(.is-style-outline) .wp-block-button__link', '.header-footer-group .wp-block-file__button', '.header-footer-group input[type="button"]', '.header-footer-group input[type="reset"]', '.header-footer-group input[type="submit"]' ),

				'background-color' => array( '#site-header', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal', '.menu-modal-inner', '.search-modal-inner', '.archive-header', '.singular .entry-header', '.singular .featured-media:before', '.wp-block-pullquote:before' ),

			),

			'text'       => array(

				'color'               => array( '.header-footer-group', 'body:not(.overlay-header) #site-header .toggle', '.menu-modal .toggle' ),

				'background-color'    => array( 'body:not(.overlay-header) .primary-menu ul' ),

				'border-bottom-color' => array( 'body:not(.overlay-header) .primary-menu > li > ul:after' ),

				'border-left-color'   => array( 'body:not(.overlay-header) .primary-menu ul ul:after' ),

			),

			'secondary'  => array(

				'color' => array( '.site-description', 'body:not(.overlay-header) .toggle-inner .toggle-text', '.widget .post-date', '.widget .rss-date', '.widget_archive li', '.widget_categories li', '.widget cite', '.widget_pages li', '.widget_meta li', '.widget_nav_menu li', '.powered-by-wordpress', '.to-the-top', '.singular .entry-header .post-meta', '.singular:not(.overlay-header) .entry-header .post-meta a' ),

			),

			'borders'    => array(

				'border-color'     => array( '.header-footer-group pre', '.header-footer-group fieldset', '.header-footer-group input', '.header-footer-group textarea', '.header-footer-group table', '.header-footer-group table *', '.footer-nav-widgets-wrapper', '#site-footer', '.menu-modal nav *', '.footer-widgets-outer-wrapper', '.footer-top' ),

				'background-color' => array( '.header-footer-group table caption', 'body:not(.overlay-header) .header-inner .toggle-wrapper::before' ),

			),

		),

	);



	/**

	* Filters Twenty Twenty theme elements

	*

	* @since Twenty Twenty 1.0

	*

	* @param array Array of elements

	*/

	return apply_filters( 'twentytwenty_get_elements_array', $elements );

}




// Our custom post type function for testimonail
function testimonail() {

	register_post_type( 'testimonial',
    // CPT Options
		array(
			'labels' => array(
				'name' => __( 'Testimonial' ),
				'singular_name' => __( 'Testimonial' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'testimonials'),
			'show_in_rest' => true,

		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'testimonail' );

// Our custom post type function for home page slider
function slider() {

	register_post_type( 'slider',
    // CPT Options
		array(
			'labels' => array(
				'name' => __( 'Slider' ),
				'singular_name' => __( 'Slider' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'sliders'),
			'show_in_rest' => true,

		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'slider' );


// Our custom post type function for home page slider
function catalogue() {

	register_post_type( 'catalogue',
    // CPT Options
		array(
			'labels' => array(
				'name' => __( 'Catalogue' ),
				'singular_name' => __( 'Catalogue' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'catalogues'),
			'show_in_rest' => true,

		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'catalogue' );

add_theme_support('woocommerce');


add_action('wp_ajax_mark_message_as_read', 'mark_message_as_read');

// register the ajax action for unauthenticated users
add_action('wp_ajax_nopriv_mark_message_as_read', 'mark_message_as_read');

// handle the ajax request
function mark_message_as_read() {
	$text = $_REQUEST['text'];



    //$variation_id = '12312';
	$variable_product = wc_get_product($text);
//$regular_price = $variable_product->get_regular_price();
//$sale_price = $variable_product->get_sale_price();
	$price = $variable_product->get_price_html();
	$sku = $variable_product->get_sku();
	$resu_arr = array("price"=>$price,"sku"=>$sku);
	echo  json_encode($resu_arr);
	exit();   
}
add_action('woocommerce_add_to_cart_redirect', 'resolve_dupes_add_to_cart_redirect');

function resolve_dupes_add_to_cart_redirect($url = false) {

     // If another plugin beats us to the punch, let them have their way with the URL
	if(!empty($url)) { return $url; }

     // Redirect back to the original page, without the 'add-to-cart' parameter.
     // We add the `get_bloginfo` part so it saves a redirect on https:// sites.
	return get_bloginfo('wpurl').add_query_arg(array(), remove_query_arg('add-to-cart'));

}
function wc_add_to_cart_custom_redirect() { 
    // Here the redirection
	return (wp_get_referer() );
}
add_filter( 'woocommerce_add_to_cart_redirect', 'wc_add_to_cart_custom_redirect' );

/*add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
	?>
	<style>
		.quantity input::-webkit-outer-spin-button,
		.quantity input::-webkit-inner-spin-button {
			display: none;
			margin: 0;
		}
		.quantity input.qty {
			appearance: textfield;
			-webkit-appearance: none;
			-moz-appearance: textfield;
		}
	</style>
	<?php
}


add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
	?>
	<script type='text/javascript'>
		jQuery( function( $ ) {
			if ( ! String.prototype.getDecimals ) {
				String.prototype.getDecimals = function() {
					var num = this,
					match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
					if ( ! match ) {
						return 0;
					}
					return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
				}
			}
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
        	var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
        	currentVal  = parseFloat( $qty.val() ),
        	max         = parseFloat( $qty.attr( 'max' ) ),
        	min         = parseFloat( $qty.attr( 'min' ) ),
        	step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
            	if ( max && ( currentVal >= max ) ) {
            		$qty.val( max );
            	} else {
            		$qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
            	}
            } else {
            	if ( min && ( currentVal <= min ) ) {
            		$qty.val( min );
            	} else if ( currentVal > 0 ) {
            		$qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
            	}
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
</script>
<?php
}*/

// custom menu

function wpb_custom_new_menu() {
	register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );


function add_additional_class_on_li($classes, $item, $args) {
	if(isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menuclass($ulclass) {
	return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl(&$output, $depth=0,$args = NULL) {
		$indent = str_repeat("\t", $depth);
      //$output .= "\n$indent<ul class=\"sub-menu\">\n";

      // Change sub-menu to dropdown menu
		$output .= "\n$indent<ul class=\"main-menu petmenubx scrollable-menu\">\n";


	}

	function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    // Most of this code is copied from original Walker_Nav_Menu
		global $wp_query, $wpdb;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$has_children = $wpdb->get_var("SELECT COUNT(meta_id)
			FROM wp_postmeta
			WHERE meta_key='_menu_item_menu_item_parent'
			AND meta_value='".$item->ID."'");

		$output .= $indent . '<li' . $id . $value . $class_names .'>';


		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


    // Check if menu item is in main menu
		if ( $depth == 0 && $has_children > 0  ) {
			//echo "if";
        // These lines adds your custom class and attribute
			$attributes .= ' class="menusubbx"';
			$attributes .= ' data-toggle="dropdown"';
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

    // Add the caret if menu level is 0
		if ( $depth == 0 && $has_children > 0  ) {
			$item_output .= ' <b class="caret"></b>';
		}

		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

}
function my_custom_my_account_menu_items( $items ) {

	$user_id =  get_current_user_id();
	//echo "<pre>";
	//print_r($user_id);

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	
	$customer_role = $customer->role;
	//echo $customer_role;

	if(!in_array($customer_role,$whole_array))
	{
		$items = array(
			'dashboard'         => __( 'Dashboard', 'woocommerce' ),
			'orders'            => __( 'Orders', 'woocommerce' ),
	        //'downloads'       => __( 'Downloads', 'woocommerce' ),
			'edit-address'    => __( 'Addresses', 'woocommerce' ),
	        //'payment-methods' => __( 'Payment Methods', 'woocommerce' ),
			'edit-account'      => __( 'Account details', 'woocommerce' ),
	        //'pet-animal'      => 'Pet Animals',
			'pets'    => __( 'Pets', 'woocommerce' ),
			'customer-logout'   => __( 'Logout', 'woocommerce' ),
		);
	}
	else
	{
		$items = array(
			'dashboard'         => __( 'Dashboard', 'woocommerce' ),
			'../wholesale-ordering/'    => __( 'Quick Order', 'woocommerce' ),
			'orders'            => __( 'Orders', 'woocommerce' ),
	        //'downloads'       => __( 'Downloads', 'woocommerce' ),
			'edit-address'    => __( 'Addresses', 'woocommerce' ),
	        //'payment-methods' => __( 'Payment Methods', 'woocommerce' ),
			'edit-account'      => __( 'Account details', 'woocommerce' ),
	        //'pet-animal'      => 'Pet Animals',
			
			'customer-logout'   => __( 'Logout', 'woocommerce' ),
		);
	}

	return $items;
}

add_filter( 'woocommerce_account_menu_items', 'my_custom_my_account_menu_items' );


//function for regestering the list view in my account page same as view order (view-pets)

$user_id =  get_current_user_id();
	//echo "<pre>";
	//print_r($user_id);

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	
	$customer_role = $customer->role;

	if(!in_array($customer_role,$whole_array))
	{



function my_custom_endpoints() {
	add_rewrite_endpoint( 'view-pets', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'my_custom_endpoints' );

function my_custom_query_vars( $vars ) {
	$vars[] = 'view-pets';
	return $vars;
}

add_filter( 'query_vars', 'my_custom_query_vars', 0 );

function view_pets_endpoint_content() {
	include get_template_directory().'/woocommerce/myaccount/view-pets.php'; 
}

add_action( 'woocommerce_account_view-pets_endpoint', 'view_pets_endpoint_content' );


function my_add_custom_endpoints() {
	add_rewrite_endpoint( 'add-pets', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'my_add_custom_endpoints' );

function my_add_custom_query_vars( $vars ) {
	$vars[] = 'add-pets';
	return $vars;
}

add_filter( 'query_vars', 'my_add_custom_query_vars', 0 );

function add_pets_endpoint_content() {
	include get_template_directory().'/woocommerce/myaccount/add-pets.php'; 
}

add_action( 'woocommerce_account_add-pets_endpoint', 'add_pets_endpoint_content' );


//functions for regester a new tab in my account page

function new_pets_endpoint() {
	add_rewrite_endpoint( 'pets', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'new_pets_endpoint' );


// ------------------
// 2. Add new query var

function new_pets_query_vars( $vars ) {
	$vars[] = 'pets';
	return $vars;
}

add_filter( 'query_vars', 'new_pets_query_vars', 0 );


// ------------------
// 3. Insert the new endpoint into the My Account menu

function new_pets_link_my_account( $items ) {
	$items['pets'] = 'Pets';
	return $items;
}

add_filter( 'woocommerce_account_menu_items', 'new_pets_link_my_account' );

// ------------------
// 4. Add content to the new endpoint

function new_pets_content() {

	global $wpdb;

	$user_id =  get_current_user_id();

//echo $user_id;
	
	/*$result = $wpdb->get_results("SELECT max(id) as id,max(pet_animal_name) as pet_animal_name,max(species) as species,max(breed) as breed FROM har_save_pet_order_data WHERE user_id = '$user_id' AND flag = 0 GROUP BY pet_animal_name ORDER BY id DESC");*/

	

	$result = $wpdb->get_results("SELECT t.* 
from har_save_pet_order_data t
join(
   SELECT 
      max(id) as id
   from har_save_pet_order_data
   group by pet_animal_name
) x on x.id = t.id WHERE user_id = '$user_id' AND flag = 0 ");

		
	
	?>
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="dashboardtable">
			<a href="/HAR/my-account/add-pets" class="orderbacklistbtn petbtndash">Add Pets</a>
			<h5>Pets</h5>
			<hr>
			<div class="dashboardtable_cnt">

				<?php

				if(!empty($result))
				{

					?>

				<div class="table-responsive">

					<table class="table table-bordered">
						<thead>
							<tr>
								<th >Pet Name</th>
								<th >Species</th>
								<th >Breed</th>
								<th >Age</th>
							</tr>
						</thead>
						<tbody>
							<?php
							
								//$result = array();
								//echo "<pre>";
								//print_r($result);
							foreach ($result as $k => $va){

								
								//echo "<pre>";
								//print_r($va);
								if($va->pet_animal_name!='')
								{

									
								
								?>		
								<tr>
									<td ><a href="/HAR/my-account/view-pets/<?php echo $va->id;?>" class="pettag"><?php echo $va->pet_animal_name; ?></a></td>
									<td >
										<?php
										if($va->species=='')
										{
											echo '-';
										}
										else
										{ 
											echo $va->species;
									    }

										 ?>
										 	
									</td>
									<td >
										<?php 
										if($va->breed=='')
										{
											echo '-';
										}
										else
										{ 
										echo $va->breed; 
										}
										?>
											
										</td>
									<td >
										<?php 
										if($va->age<=0)
										{
											echo '-';
										}
										else
										{
										echo $va->age;
										} 
										?>
											
									</td>
									
								</tr>

								<?php	
								}	
								
							}
							?>
							
							

						</tbody>	
					</table>
				</div>
				<?php
				}
				else
				{
				?>
				<p class="noorderdash">You have not any pet details</p>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php



}


add_action( 'woocommerce_account_pets_endpoint', 'new_pets_content' );
// Note: add_action must follow 'woocommerce_account_{your-endpoint-slug}_endpoint' format

} //end of whoelsale condition of checking the role //whoelsale user will not see the pets tab

else
{

	function new_pets_endpoint() {
	add_rewrite_endpoint( 'quick-order', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'new_pets_endpoint' );


// ------------------
// 2. Add new query var

function new_pets_query_vars( $vars ) {
	$vars[] = 'quick-order';
	return $vars;
}

add_filter( 'query_vars', 'new_pets_query_vars', 0 );


// ------------------
// 3. Insert the new endpoint into the My Account menu

function new_pets_link_my_account( $items ) {
	$items['../wholesale-ordering/'] = 'Quick Order Form';
	return $items;
}

add_filter( 'woocommerce_account_menu_items', 'new_pets_link_my_account' );


} //end of else condition

function rc_woocommerce_recently_viewed_products( $atts, $content = null ) {
    // Get shortcode parameters
	extract(shortcode_atts(array(
		"per_page" => '5'
	), $atts));
    // Get WooCommerce Global
	global $woocommerce , $product;
    // Get recently viewed product cookies data
	$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
	$viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
    // If no data, quit
	if ( empty( $viewed_products ) )
		return __( 'You have not viewed any product yet!', 'rc_wc_rvp' );
    // Create the object
	ob_start();
    // Get products per page
	if( !isset( $per_page ) ? $number = 4 : $number = $per_page )
    // Create query arguments array
		$query_args = array(
			'posts_per_page' => 4,
			'no_found_rows'  => 1,
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'post__in'       => $viewed_products,
			'orderby'        => 'rand',
			'meta_query' => array(
          'order_clause' => array(
            'key' => '_custom_product_text_field_yes_no',
            'value' => ''
		)));
    // Add meta_query to query args
	$query_args['meta_query'] = array();
    // Check products stock status
	$query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
    // Create a new query
	$r = new WP_Query($query_args);

    // ----
	if (empty($r)) {
		return __( 'You have not viewed any product yet!', 'rc_wc_rvp' );

	}?>
	<?php while ( $r->have_posts() ) : $r->the_post(); 
		$url= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

		$asd =  get_the_ID();
		$product = wc_get_product($asd);

		$check_product = get_post_meta( $asd, '_custom_product_text_field_yes_no', true );

					//echo $check_product;

					if($check_product!='no' || $check_product!='No' || $check_product!='NO' || $check_product!='nO')
					{

		?>

		<!-- //put your theme html loop hare -->
		<div class="col-lg-3 col-md-3 col-sm-6">
			<div class="remediesboxcol">
				<a class="remediesimg" href="<?php echo get_post_permalink(); ?>" title="Show details for Watches">
					<img alt="Picture of Watches" src="<?php echo $url;?>" title="Show details for Watches" />
				</a>
				<div class="remediescntbx">

					<span class="star_reviewtxt">
						 <?php $average  =  $product->get_average_rating();
                      
                      if($average!=0)
                      {
                        echo wc_get_rating_html( $product->get_average_rating() );
                      }
                      else
                      {
                        ?>
                        <div class="star-rating">
                        </div>
                        <?php 
                      }
                   ?> 
				    <!-- <i class="fas fa-star"></i>
				    <i class="fas fa-star"></i>
				    <i class="fas fa-star"></i>
				    <i class="fas fa-star"></i>
				    <i class="fas fa-star"></i> -->
				</span>
				<?php
				$contenttitle = mb_strimwidth(get_the_title(), 0, 60, '...');
				?>
				<a class="product-name" href="<?php echo get_post_permalink(); ?>"><?php echo $contenttitle;?></a>
				<span class="pricetxt"><!-- $ --><?php echo $product->get_price_html();?> <!-- AUD --></span>


				<?php
				if( $product->is_type('variable'))
				{
					?>
					<a href="<?php the_permalink() ?>" class="btn-main">View Product</a> 
					<?php
				}
				else
				{
					?>
					<!-- <a href="<?php echo wc_get_cart_url();?>?add-to-cart=<?php echo $product->id?>" class="btn-main">Add To Cart</a>  -->
					<!-- <a href="<?php the_permalink() ?>" class="btn-main">View Product</a> --> 
					<a href="<?php echo wc_get_cart_url();?>?add-to-cart=<?php echo $product->id?>" class="btn-main">Add To Cart</a>
					<?php
				}
				?>
			</div>        
		</div>
	</div>  
	<!-- end html loop  -->
<?php } endwhile; ?>



<?php wp_reset_postdata();

    // ----
    // Get clean object
$content .= ob_get_clean();
    // Return whole content
return $content;
exit();
}
// Register the shortcode for the pet-animal to show in my account
add_shortcode("woocommerce_recently_viewed_products", "rc_woocommerce_recently_viewed_products");


add_action('product_cat_add_form_fields', 'wh_taxonomy_add_new_meta_field', 10, 1);
add_action('product_cat_edit_form_fields', 'wh_taxonomy_edit_meta_field', 10, 1);
//Product Cat Create page
function wh_taxonomy_add_new_meta_field() {
    ?>   
    <div class="form-field">
        <label for="wh_meta_title"><?php _e('Animals', 'wh'); ?></label>
        <input type="text" name="wh_meta_title" id="wh_meta_title">
        <p class="description"><?php _e('Show this category under animals write yes', 'wh'); ?></p>
    </div>
    <?php
}

//Product Cat Edit page
function wh_taxonomy_edit_meta_field($term) {

    //getting term ID
    $term_id = $term->term_id;

    // retrieve the existing value(s) for this meta field.
    $wh_meta_title = get_term_meta($term_id, 'animals', true);
 
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="wh_meta_title"><?php _e('Animals', 'wh'); ?></label></th>
        <td>
            <input type="text" name="wh_meta_title" id="wh_meta_title" value="<?php echo esc_attr($wh_meta_title) ? esc_attr($wh_meta_title) : ''; ?>">
            <p class="description"><?php _e('Show this category under animals write yes', 'wh'); ?></p>
        </td>
    </tr>
    <?php
}


add_action('edited_product_cat', 'wh_save_taxonomy_custom_meta', 10, 1);
add_action('create_product_cat', 'wh_save_taxonomy_custom_meta', 10, 1);

// Save extra taxonomy fields callback function.
function wh_save_taxonomy_custom_meta($term_id) {

    $wh_meta_title = filter_input(INPUT_POST, 'wh_meta_title');
    

    update_term_meta($term_id, 'animals', $wh_meta_title);
}

//functions for getting the attachment id on the base of file path  i.e help sheet path
function getAttachmentIDFromFile($filepath)
{
    $file = basename($filepath);
    $query_args = array(
        'post_status' => 'any',
        'post_type'   => 'attachment',
        'fields'      => 'ids',
        'meta_query'  => array(
            array(
                'value'   => $file,
                'compare' => 'LIKE',
            ),
        )
    );

    $query = new WP_Query($query_args);

    if ($query->have_posts()) {
        return $query->posts[0]; //assume the first is correct; or process further if you need
    }
    return 0;
}


//fucntion for sending the attachment on the base of product purchase i.e will send the help sheet attach in product
add_filter( 'woocommerce_email_attachments', 'add_woocommerce_attachments_for_certain_product', 10, 3 );

function add_woocommerce_attachments_for_certain_product ( $attachments, $email_id, $email_order ){
  //$product_id = 116;
  //$attachment_id = 581;

  if( $email_id === 'customer_processing_order' || $email_id === 'new_order' || $email_id === 'customer_invoice' || $email_id === 'customer_completed_order'   ){
    $order = wc_get_order( $email_order );
    $items = $order->get_items();
  
    foreach ( $items as $item ) {

    	
       	$product_id = $item->get_product_id();  
       	$pdf_check =  get_field('help_sheet_pdf',$product_id);
        $attachment_id = getAttachmentIDFromFile($pdf_check);
        $attachments[] = get_attached_file( $attachment_id );		
    }	 
	
  }
  return $attachments;
}

function wc_track_product_view_always() {
    if ( ! is_singular( 'product' ) /* xnagyg: remove this condition to run: || ! is_active_widget( false, false, 'woocommerce_recently_viewed_products', true )*/ ) {
        return;
    }

    global $post;

    if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) ) { // @codingStandardsIgnoreLine.
        $viewed_products = array();
    } else {
        $viewed_products = wp_parse_id_list( (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) ); // @codingStandardsIgnoreLine.
    }

    // Unset if already in viewed products list.
    $keys = array_flip( $viewed_products );

    if ( isset( $keys[ $post->ID ] ) ) {
        unset( $viewed_products[ $keys[ $post->ID ] ] );
    }

    $viewed_products[] = $post->ID;

    if ( count( $viewed_products ) > 15 ) {
        array_shift( $viewed_products );
    }

    // Store for session only.
    wc_setcookie( 'woocommerce_recently_viewed', implode( '|', $viewed_products ) );
}

remove_action('template_redirect', 'wc_track_product_view', 20);
add_action( 'template_redirect', 'wc_track_product_view_always', 20 );

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);


function ts_hide_shipping_for_order_total( $rates ) {

  $free = array();

  $order_total = WC()->cart->get_subtotal();

  $user_id =  get_current_user_id();

  	$customer_shipping_country = WC()->customer->get_shipping_country();


     	//print_r($customer_shipping_country);
  	



		if( empty($customer_shipping_country) ){
		    $package = WC()->billing->get_packages()[0];
		    if( ! isset($package['destination']['country']) ) return $passed;
		    $customer_shipping_country = $package['destination']['country'];
		   // print_r($customer_shipping_country);
		}

  
	

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	//echo "<pre>";
	//print_r($customer);

	
	$customer_role = $customer->role;

	//echo $customer_role;

	/*if(!in_array($customer_role,$whole_array))
	{
			if( $order_total > 100 ) {
			    foreach ( $rates as $rate_id => $rate ) {

			    	

			      if ( 'free_shipping' === $rate->get_method_id() ) {
			      	unset( $rates[ $rate_id ] );
			      
			      }
			    }
			  }
	}*/
	if($customer_shipping_country!="AU"&&$order_total > 100)
	{
		//echo "if";
			if( $customer_shipping_country!="AU"&&$order_total > 100 ) {
			    foreach ( $rates as $rate_id => $rate ) {

			    	//echo "<pre>";
			    	//print_r($rate);

			      if ( 'free_shipping' === $rate->get_method_id() ) {
			      	unset( $rates[ $rate_id ] );
			      
			      }
			    }
			  }
	}
	else if ($customer_shipping_country=="AU"&&$order_total > 100)
	{
		foreach ( $rates as $rate_id => $rate ) {

			    	//echo "<pre>";
			    	//print_r($rate);

			      if ( 'starshipit' === $rate->get_method_id() ) {
			      	unset( $rates[ $rate_id ] );
			      
			      }
			    }
	}

  
  
  return $rates; 
}
add_filter( 'woocommerce_package_rates', 'ts_hide_shipping_for_order_total', 100 );

add_action('woocommerce_cart_calculate_fees' , 'add_user_discounts');
/**
 * Add custom fee if more than three article
 * @param WC_Cart $cart
 */
function add_user_discounts( WC_Cart $cart ){
    //any of your rules
    // Calculate the amount to reduce

    $user_id =  get_current_user_id();


     $order_total = WC()->cart->get_subtotal();


  	$customer_shipping_country = WC()->customer->get_shipping_country();


     	//print_r($customer_shipping_country);



		if( empty($customer_shipping_country) ){
		    $package = WC()->billing->get_packages()[0];
		    if( ! isset($package['destination']['country']) ) return $passed;
		    $customer_shipping_country = $package['destination']['country'];
		    //print_r($customer_shipping_country);
		}

  
	

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	//echo "<pre>";
	//print_r($customer);

	
	$customer_role = $customer->role;

	/*if(!in_array($customer_role,$whole_array))
	{
			
	}
	else
	{*/
		//echo "if";
			if( $customer_shipping_country!="AU"&&$order_total > 100 ) {
				global $woocommerce;
				$shipping_total_cart =  $woocommerce->cart->shipping_total;
				$discount = $shipping_total_cart * 0.5;
    			$cart->add_fee( 'Shipping discount 50%', -$discount);

			  }
			  else if($customer_shipping_country=="AU"&&$order_total > 100)
			  {
			  	global $woocommerce;
				$fees = WC()->cart->get_fees();
				    foreach ($fees as $key => $fee) {
				        if($fees[$key]->name === __( "Shipping discount 50%")) {
				            unset($fees[$key]);
				        }
				    }
				    WC()->cart->fees_api()->set_fees($fees);
			  }

	//}

    
}


/*add_filter( 'woocommerce_cart_needs_shipping', 'filter_cart_needs_shipping' );
function filter_cart_needs_shipping( $needs_shipping ) {
    if ( is_cart() ) {
        $needs_shipping = false;
    }
    return $needs_shipping;
}*/

/*add_action('woocommerce_before_checkout_form', function() {
    global $woocommerce;
    $coupon_code = 'International_Coup_Discount'; // Replace with your code
    
    // Add additional logic if necessary
    
    if ( ! $woocommerce->cart->add_discount( sanitize_text_field( $coupon_code )) ) :
        $woocommerce->show_messages();
    endif;

});*/

/*add_action('woocommerce_before_cart','QuadLayers_apply_coupon_cart_values');*/



/*add_action('woocommerce_before_checkout_form', 'QuadLayers_apply_coupon_cart_values');

function QuadLayers_apply_coupon_cart_values(){

	$user_id =  get_current_user_id();
	//echo "<pre>";
	//print_r($user_id);

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	
	$customer_role = $customer->role;
	//echo $customer_role;

	
      

     	$customer_shipping_country = WC()->customer->get_billing_country();


     	//print_r($customer_shipping_country);



		if( empty($customer_shipping_country) ){
		    $package = WC()->billing->get_packages()[0];
		    if( ! isset($package['destination']['country']) ) return $passed;
		    $customer_shipping_country = $package['destination']['country'];
		    //print_r($customer_shipping_country);
		}
       // previously created coupon
		//$customer_shipping_country = $_REQUEST['selct_count'];
	
		//echo $selct_count;

       $coupon_code = 'International_Coup_Discount';           
       // get coupon
       $current_coupon = WC()->cart->get_coupons();
       // get Cart subtotal
       $cart_ST = WC()->cart->subtotal; 

            
 		if(!in_array($customer_role,$whole_array))
	{
       // coupon has not been applied before && conditional is true
       if(empty($current_coupon)&&$customer_shipping_country!="AU"&&$cart_ST>100):
           // Apply coupon
           WC()->cart->apply_coupon( $coupon_code );
           wc_print_notices();            
       // coupon has been applied && conditional is false
       elseif(!empty($current_coupon)&&$customer_shipping_country=='AU'):
           WC()->cart->remove_coupons(sanitize_text_field($coupon_code));
           wc_print_notices();       
           WC()->cart->calculate_totals();
           //echo '<div class="woocommerce_message">Coupon was removed</div>';
        elseif(!empty($current_coupon)&&$customer_shipping_country!='AU'&&$cart_ST<100):
           WC()->cart->remove_coupons(sanitize_text_field($coupon_code));
           wc_print_notices();       
           WC()->cart->calculate_totals();
           //echo '<div class="woocommerce_message">Coupon was removed</div>';
       // Conditional is FALSE && no coupon is applied
       else:// Do nothing 
           //echo '<div class="woocommerce_message"> Unknown error</div>';
       endif;
     }

}*/



function script_load_more($args = array()) {
    //initial posts load
    ?>
    <section class="inner_page allremediespage">
    <div class="container">
    <div class="allremedies_titletxt">
    <h2><?php woocommerce_page_title();?></h2>
    </div>
        <div class="remediestwocolsec">
        	<div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12">
                   <div id="ajax-content">
                   	 
                   	<?php
            ajax_script_load_more($args);
            ?>
        </div>
<?php
        echo '<a href="#" id="loadMore" class="btn-main loadmorenew d-none"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" >Load More</a>';

}
add_shortcode('ajax_posts', 'script_load_more');

function ajax_script_load_more($args) {
	
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num =6;
    //page number
    $paged = $_POST['page'] + 1;
    //args
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged,
         'meta_query' => array(
       		'order_clause' => array(
            'key' => '_custom_product_text_field_yes_no',
            'value' => ''
)));
    
    //query
    $query = new WP_Query($args);
    //check
    if ($query->have_posts()):
        //loop articales
        while ($query->have_posts()): $query->the_post();
            //include articles template
            include 'ajax-content.php';
        endwhile;
    else:
        echo 0;
    endif;
    //reset post data
    wp_reset_postdata();
   
    //check ajax call
    if($ajax) die();
}

add_action('wp_ajax_nopriv_ajax_script_load_more', 'ajax_script_load_more');
add_action('wp_ajax_ajax_script_load_more', 'ajax_script_load_more');

function get_parent_grouped_id( $children_id ){
    global $wpdb;
   $sql = "SELECT product_id FROM har_woocommerce_bundled_items WHERE bundle_id = '$children_id'";
   $results = $wpdb->get_results($sql) or die(mysql_error());
   /*echo "<pre>";
   print_r($results);*/
   return $results;

	
}

function has_bought_items($parent_id) {
	//echo "if";
	//echo $parent_id;
    $bought = false;
    //$check_array = array();

    // Set HERE ine the array your specific target product IDs
    $prod_arr = array($parent_id); //116 //773

    // Get all customer orders
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => 'shop_order', // WC orders post type
        'post_status' => 'wc-completed' // Only orders with status "completed"
    ) );
    foreach ( $customer_orders as $customer_order ) {
        // Updated compatibility with WooCommerce 3+
        $order_id = method_exists( $order, 'get_id' ) ? $order->get_id() : $order->id;
        $order = wc_get_order( $customer_order );

        // Iterating through each current customer products bought in the order
        foreach ($order->get_items() as $item) {
            // WC 3+ compatibility
            if ( version_compare( WC_VERSION, '3.0', '<' ) ) 
                $product_id = $item['product_id'];
            else
                $product_id = $item->get_product_id();
            //echo $product_id;

            //$check_array[] = $product_id;

            // Your condition related to your 2 specific products Ids
            if ( in_array( $product_id, $prod_arr ) ) 
                $bought = true;
        }
    }
    //print_r($check_array);
    // return "true" if one the specifics products have been bought before by customer
    return $bought;
}

/*// Applying conditionally a discount for a specific user role
add_action( 'woocommerce_cart_calculate_fees', 'discount_based_on_user_role', 20, 1 );
function discount_based_on_user_role( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return; // Exit

    // Only for 'company' user role
    if ( ! current_user_can('company') )
        return; // Exit

    // HERE define the percentage discount
    $percentage = 10;

    $discount = $cart->get_subtotal() * $percentage / 100; // Calculation

    // Applying discount
    $cart->add_fee( sprintf( __("Discount (%s)", "woocommerce"), $percentage . '%'), -$discount, true );
}*/
//for not showing the message on the cart page
add_filter( 'wc_add_to_cart_message_html', '__return_false' );

add_action( 'woocommerce_proceed_to_checkout', 'insert_empty_cart_button' );

 function insert_empty_cart_button() {
?>
<a class="btn-main whitebtn" href="<?php echo esc_url( get_page_link( 6 ) ); ?>">
    <?php esc_html_e( 'Continue shopping', 'woocommerce' ); ?>
</a>
<?php
 		}
?>
<?php
add_action( 'woocommerce_before_cart_table', 'wpdesk_cart_free_shipping_text' );
/**
 * Add "free shipping" text to WooCommerce cart page
 *
 */
function wpdesk_cart_free_shipping_text() {
	?>
	<div class="cart_topbutton">
		 <button type="submit" class="btn-main whitebtn update_cart_btn button" name="update_cart" id="enable_btn" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button> 

		<?php
		$user_id =  get_current_user_id();
	//echo "<pre>";
	//print_r($user_id);

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	
	$customer_role = $customer->role;
	if(!in_array($customer_role,$whole_array))
	{

		?>
		
<a class="btn-main" href="<?php echo esc_url( get_page_link( 8 ) ); ?>">
    <?php esc_html_e( 'PROCEED TO CHECKOUT', 'woocommerce' ); ?>
</a>
<?php
}
else
{

	?>
	<div id="check_cart_2" style="display: inline-block;"></div>
	<div class="cartinfonote" style="display: none">
            <strong>NOTE:</strong> A minimum order subtotal of $200.00 is required to activate wholesale pricing in the cart.
        </div>
	<script type="text/javascript">
			$(document).ready(function(){
			var check_text = $('.wc-proceed-to-checkout').children('h4').html();
			//alert(check_text);
			if(check_text!="Please adjust your cart to meet all of the wholesale requirements in order to proceed.")
			{
				$('#check_cart_2').html('<a class="btn-main" href="<?php echo esc_url( get_page_link( 8 ) ); ?>"><?php esc_html_e( 'PROCEED TO CHECKOUT', 'woocommerce' ); ?></a> ');

			}
			else
			{
				$('.cartinfonote').show();
			}
		});
		</script>
		<?php
}
?>
</div>
<?php
}

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' » ',
            'wrap_before' => '<ol class="breadcrumb" id="crumbs" itemprop="breadcrumb">',
            'wrap_after'  => '</ol>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( ' Home ', 'breadcrumb', 'woocommerce' ),
        );
}
/*add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' » ';
	return $defaults;
}*/

add_action( 'woocommerce_before_cart', 'the_dramatist_page_breadcrumbs_cart');


// Breadcrumbs
function the_dramatist_page_breadcrumbs_cart() {
    // Settings
  ?>
  <section class="breadcrumb_sec">
  	<div class="container">
<ol class="breadcrumb" id="crumbs"><?php get_breadcrumb(); ?></ol>
</div>
</section>
          
        <?php
}

add_action( 'woocommerce_before_checkout_form', 'the_dramatist_page_breadcrumbs_checkout' , 100 , 1);


// Breadcrumbs
function the_dramatist_page_breadcrumbs_checkout() {
    // Settings
  ?>
 <!--  <section class="breadcrumb_sec">
  <div class="container">
<ol class="breadcrumb" id="crumbs"><?php get_breadcrumb(); ?></ol>
</div>
</section> -->
<!-- <section class="breadcrumb_sec">
    <div class="container">
        <ol class="breadcrumb" id="crumbs">
          <li><a href="https://steamlinedesign.com/HAR/"><i class="fas fa-home"></i>Home</a> </li>
          <li><a href="https://steamlinedesign.com/HAR/cart/">Cart</a></li>
          <li class="active">Checkout</li>
          
        </ol>
    </div>
</section> -->

          
        <?php
}

/*add_action( 'wp_footer', 'coupon_removed_script' );
function coupon_removed_script() {
    if( is_cart() || ( is_checkout() && ! is_wc_endpoint_url() ) ):
    ?>
        <script type="text/javascript">
        jQuery(function($){
            $('a.woocommerce-remove-coupon').on( 'click', function(){
                console.log('click remove coupon');
                alert('click remove coupon');
                e.preventDefault();
                return false;
            });
        })
        </script>
    <?php
    endif;
}*/

//add back to store button in empty cart
/*add_action('woocommerce_cart_is_empty', 'manual_back_to_store_cart_empty');
function manual_back_to_store_cart_empty() { ?>
<a class="btn-main wc-backward" href="/HAR/shop"><?php _e( 'Return to shop', 'woocommerce' ) ?></a>
<?php
}*/

/*add_filter('woocommerce_login_redirect', 'wc_login_redirect');
function wc_login_redirect( $redirect_to ) {
     $redirect_to = get_home_url();
     return $redirect_to;
}*/

add_filter( 'woocommerce_registration_redirect', 'custom_redirection_after_registration', 10, 1 );
function custom_redirection_after_registration( $redirection_url ){

$url  = home_url($_SERVER['REQUEST_URI']);


	$parts = parse_url($url);
parse_str($parts['query'], $query);
$check_url =  $query['checkout'];


if($check_url==true)
{
	$redirection_url = wc_get_checkout_url();
}
else
{
    // Change the redirection Url
    $redirection_url = get_home_url(); // Home page

   // $redirection_url = "https://steamlinedesign.com/HAR/my-account/edit-address/billing/";
}

    return $redirection_url; // Always return something
}


/*add_filter( 'gform_field_validation_1_15', 'custom_validation', 10, 4 );
function custom_validation( $result, $value, $form, $field ) {
 
    if ( $result['is_valid'] && intval( $value )  ) {
        $result['is_valid'] = false;
        $result['message'] = 'Please enter a number only';
    }
    return $result;
}*/



add_action('woocommerce_after_order_notes', 'customise_checkout_field');

function customise_checkout_field($checkout)

{
	$user_id =  get_current_user_id();
	//echo "<pre>";
	//print_r($user_id);

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	
	$customer_role = $customer->role;
	//echo $customer_role;

	if(!in_array($customer_role,$whole_array))
	{

	?>
	<h5 class="billmaintitle"><span class="billtitlenumber">2</span>Pet Details</h5>

	
<?php

	echo '<div id="customise_checkout_field">';

			woocommerce_form_field('pet_yes_no', array(

				'label'       => __('Would you like to include your pets details?', 'woocommerce'),

			    'placeholder' => _x('', '', 'woocommerce'),

			    'required'    => false,

			    'type' => 'radio',

			    'class' => array( 'pets-detail-radio' ),

			    'options' => array(

			        'yes' => 'Yes',

			        'no' => 'No'

			    ),

			) , $checkout->get_value('pet_yes_no'));

			echo '</div>';

			?>
			<div class="radioclickopenformbx" id="dvPinNo" style="display: none">

				<?php

				global $wpdb;

	$user_id =  get_current_user_id();

//echo $user_id;
	
	$result = $wpdb->get_results("SELECT max(id) as id,pet_animal_name,species,breed,age FROM har_save_pet_order_data WHERE user_id = '$user_id' AND flag = 0 AND pet_animal_name != '' GROUP BY pet_animal_name ORDER BY id DESC");

		/*echo "<pre>";
		print_r($result);*/
				if(!empty($result))
				{
	?>
				<div id="customise_checkout_field" class="petselectbxcheckut">
				<div class="select_box">
              <span class="select_arrow"></span>
                        <select class="form-control" id="selectpets" name="selectpets">
                          <option value="">Select Pets</option>
                          <?php

						foreach ($result as $k => $va){

                    if($va->pet_animal_name!='')
								{
                  
  ?>
  <option value="<?php echo $va->id;?>"><?php echo $va->pet_animal_name;?></option>
  <?php
  							}
  						}
                          ?>
                       </select>
                      </div><!--select_box-->
                      </div><!--customise_checkout_field-->
                      <?php
                  	
                 }
                  ?>
				<?php

	 echo '<div id="customise_checkout_field">';

                woocommerce_form_field('your_pet_or_animal_name', array(

                    'label'       => __('Your Pet Or Animals Name', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => true,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'text'

                ) , $checkout->get_value('your_pet_or_animal_name'));

                echo '</div>';

                 echo '<div id="customise_checkout_field">';

                woocommerce_form_field('Species', array(

                    'label'       => __('Species', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => false,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'text'

                ) , $checkout->get_value('Species'));

                echo '</div>';


                 echo '<div id="customise_checkout_field">';

                woocommerce_form_field('Breed', array(

                    'label'       => __('Breed', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => false,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'text'

                ) , $checkout->get_value('Breed'));

                echo '</div>';

                 echo '<div id="customise_checkout_field">';

                woocommerce_form_field('age', array(

                    'label'       => __('Age (if known)', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => false,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'number'

                ) , $checkout->get_value('age'));

                echo '</div>';

                echo '<div id="customise_checkout_field">';

                woocommerce_form_field('diet_currently_being_fed', array(

                    'label'       => __('Diet currently being fed', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => false,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'textarea'

                ) , $checkout->get_value('diet_currently_being_fed'));

                echo '</div>';

                  echo '<div id="customise_checkout_field">';

                woocommerce_form_field('what_veg_drugs_are_currently_being_used', array(

                    'label'       => __('What Vet Drugs are currently being used? ', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => false,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'textarea'

                ) , $checkout->get_value('what_veg_drugs_are_currently_being_used'));

                echo '</div>';

                 echo '<div id="customise_checkout_field">';

                woocommerce_form_field('vet_diagnosis', array(

                    'label'       => __('Vet Diagnosis (if known)', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => false,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'textarea'

                ) , $checkout->get_value('vet_diagnosis'));

                echo '</div>';

                echo '<div id="customise_checkout_field">';

                woocommerce_form_field('do_use_chemical_drugs', array(

                    'label'       => __('Do you use "chemical insecticide drugs" (heart worm, flea, worming etc), if so what ones?', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => false,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'textarea'

                ) , $checkout->get_value('do_use_chemical_drugs'));

                echo '</div>';

                  echo '<div id="customise_checkout_field">';

                woocommerce_form_field('which_of_our_hampl_remedies', array(

                    'label'       => __('Which of our HAMPL remedies have you been using recently?', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => false,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'textarea'

                ) , $checkout->get_value('which_of_our_hampl_remedies'));

                echo '</div>';

                echo '<div id="customise_checkout_field">';

                woocommerce_form_field('if_still_vaccinating', array(

                    'label'       => __('If still vaccinating, how often does your pet get a injection?', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => false,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'text'

                ) , $checkout->get_value('if_still_vaccinating'));

                echo '</div>';

                  echo '<div id="customise_checkout_field">';

                woocommerce_form_field('describe_all_symptonms', array(

                    'label'       => __('Describe ALL SYMPTOMS currently showing with your pet (IMPORTANT).', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => true,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'textarea'

                ) , $checkout->get_value('describe_all_symptonms'));

                echo '</div>';

                echo '<div id="customise_checkout_field">';

                woocommerce_form_field('check_val', array(

                    'label'       => __('check_val', 'woocommerce'),

                   /* 'placeholder' => _x('', 'Your Pet Or Animals Name', 'woocommerce'),*/

                    'required'    => false,

                    'class'     => array('woocommerce-input-wrapper'),

                    'clear'       => false,

                    'type'        => 'hidden'

                ) , $checkout->get_value('check_val'));

                echo '</div>';

                ?>
                 </div>
               <?php
         }
}

add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );



function my_custom_checkout_field_update_order_meta( $order_id ) 
{

    

        /* pet animal */

       if ( ! empty( $_POST['your_pet_or_animal_name'] ) ) {

            update_post_meta( $order_id, 'your_pet_or_animal_name', sanitize_text_field( $_POST['your_pet_or_animal_name'] ) );

        }

        if ( ! empty( $_POST['Species'] ) ) {

            update_post_meta( $order_id, 'Species', sanitize_text_field( $_POST['Species'] ) );

        }

        if ( ! empty( $_POST['Breed'] ) ) {

            update_post_meta( $order_id, 'Breed', sanitize_text_field( $_POST['Breed'] ) );

        }

         if ( ! empty( $_POST['age'] ) ) {

            update_post_meta( $order_id, 'age', sanitize_text_field( $_POST['age'] ) );

        }

         if ( ! empty( $_POST['diet_currently_being_fed'] ) ) {

            update_post_meta( $order_id, 'diet_currently_being_fed', sanitize_text_field( $_POST['diet_currently_being_fed'] ) );

        }

         if ( ! empty( $_POST['what_veg_drugs_are_currently_being_used'] ) ) {

            update_post_meta( $order_id, 'what_veg_drugs_are_currently_being_used', sanitize_text_field( $_POST['what_veg_drugs_are_currently_being_used'] ) );

        }

        if ( ! empty( $_POST['vet_diagnosis'] ) ) {

            update_post_meta( $order_id, 'vet_diagnosis', sanitize_text_field( $_POST['vet_diagnosis'] ) );

        }

         if ( ! empty( $_POST['do_use_chemical_drugs'] ) ) {

            update_post_meta( $order_id, 'do_use_chemical_drugs', sanitize_text_field( $_POST['do_use_chemical_drugs'] ) );

        }

         if ( ! empty( $_POST['which_of_our_hampl_remedies'] ) ) {

            update_post_meta( $order_id, 'which_of_our_hampl_remedies', sanitize_text_field( $_POST['which_of_our_hampl_remedies'] ) );

        }

         if ( ! empty( $_POST['if_still_vaccinating'] ) ) {

            update_post_meta( $order_id, 'if_still_vaccinating', sanitize_text_field( $_POST['if_still_vaccinating'] ) );

        }

         if ( ! empty( $_POST['describe_all_symptonms'] ) ) {

            update_post_meta( $order_id, 'describe_all_symptonms', sanitize_text_field( $_POST['describe_all_symptonms'] ) );

        }
}


add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );



function my_custom_checkout_field_display_admin_order_meta($order){


	 $your_pet_or_animal_name = get_post_meta( $order->get_id(), 'your_pet_or_animal_name', true );


	  if ( $your_pet_or_animal_name != '' ) {

	  	echo '<p><strong>'.__('Your Pet Or Animals Name').':</strong> <br/>' . get_post_meta( $order->get_id(), 'your_pet_or_animal_name', true ) . '</p>';

	  	echo '<p><strong>'.__('Species').':</strong> <br/>' . get_post_meta( $order->get_id(), 'Species', true ) . '</p>';

	  	echo '<p><strong>'.__('Breed').':</strong> <br/>' . get_post_meta( $order->get_id(), 'Breed', true ) . '</p>';

	  	echo '<p><strong>'.__('Age (if known)').':</strong> <br/>' . get_post_meta( $order->get_id(), 'age', true ) . '</p>';

	    echo '<p><strong>'.__('Diet currently being fed').':</strong> <br/>' . get_post_meta( $order->get_id(), 'diet_currently_being_fed', true ) . '</p>';

	    echo '<p><strong>'.__('What Vet Drugs are currently being used?').':</strong> <br/>' . get_post_meta( $order->get_id(), 'what_veg_drugs_are_currently_being_used', true ) . '</p>';

	    echo '<p><strong>'.__('Vet Diagnosis (if known)').':</strong> <br/>' . get_post_meta( $order->get_id(), 'vet_diagnosis', true ) . '</p>';

	    echo '<p><strong>'.__('Do you use "chemical insecticide drugs" (heart worm, flea, worming etc), if so what ones?').':</strong> <br/>' . get_post_meta( $order->get_id(), 'do_use_chemical_drugs', true ) . '</p>';

	    echo '<p><strong>'.__('Which of our HAMPL remedies have you been using recently?').':</strong> <br/>' . get_post_meta( $order->get_id(), 'which_of_our_hampl_remedies', true ) . '</p>';

	    echo '<p><strong>'.__('If still vaccinating, how often does your pet get a injection?').':</strong> <br/>' . get_post_meta( $order->get_id(), 'if_still_vaccinating', true ) . '</p>';

	    echo '<p><strong>'.__('Describe ALL SYMPTOMS currently showing with your pet (IMPORTANT).').':</strong> <br/>' . get_post_meta( $order->get_id(), 'describe_all_symptonms', true ) . '</p>';
	  }

}
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {


if($_POST['check_val'] == 1){


			if($_POST['your_pet_or_animal_name'] == '')
			{
				wc_add_notice( __( 'Please enter your pet or animal name' ), 'error' );
			}

			if($_POST['describe_all_symptonms'] == '')
			{

           		wc_add_notice( __( 'Please describe all symptons' ), 'error' );

        	}
        	if($_POST['age']!='')
        	{
        		$age = $_POST['age'];

        		if($age<=0)
        		{
        			wc_add_notice( __( 'Age Should not be 0 or in minus' ), 'error' );
        		}
        	}

        	if($_POST['your_pet_or_animal_name'] != '' && $_POST['selectpets']=='')
			{
				global $wpdb;
				$pet_animal_name_post = $_POST['your_pet_or_animal_name'];
				$customer_id =  get_current_user_id();
				$result_select = $wpdb->get_results("SELECT pet_animal_name FROM har_save_pet_order_data WHERE user_id = '$customer_id' AND flag = 0");
  				//print_r($result_select);

		  		$post_pet_name_lower = strtolower($pet_animal_name_post);
		  		
		  		foreach ($result_select as $key => $valuepet) {

		  			$pet_animal_lower[] = strtolower($valuepet->pet_animal_name);
		  			
		  		}
		  		
		  		if(in_array($post_pet_name_lower, $pet_animal_lower))
		  		{
		  				wc_add_notice( __( 'Already Pets Name Exits' ), 'error' );
						
		  		}
				
			}



            

        }

}
add_filter( 'woocommerce_my_account_my_orders_query', 'fix_wp_get_orders_pag_issue', 10, 1 );
function fix_wp_get_orders_pag_issue( $args ) {
if (isset($args['page'])) {
$args['posts_per_page'] = 5;

}
return $args;
};

/*add_filter( 'woocommerce_endpoint_orders_title', 'change_my_account_orders_title', 10, 2 );
function change_my_account_orders_title( $title, $endpoint ) {
    $title = __( "Recent Orders", "woocommerce" );

    return $title;
}*/
function wpb_woo_endpoint_title( $title, $id ) {
    if ( is_wc_endpoint_url( 'downloads' ) && in_the_loop() ) { // add your endpoint urls
        $title = "Download MP3s"; // change your entry-title
    }
    elseif ( is_wc_endpoint_url( 'orders' ) && in_the_loop() ) {
        $title = "Recent Orders";
    }
    /*elseif ( is_wc_endpoint_url( 'edit-account' ) && in_the_loop() ) {
        $title = "Change My Details";
    }*/
    return $title;
}
add_filter( 'the_title', 'wpb_woo_endpoint_title', 10, 2 );


add_filter('password_reset_expiration', function( $expiration ) {
return 600; // expiration time in seconds
});

function filter_woocommerce_account_orders_columns( $columns ) {
    // DEBUG: remove afterwards
   
    
    $columns['order-number'] = __( 'Number', 'woocommerce' );

    return $columns;
}
add_filter( 'woocommerce_account_orders_columns', 'filter_woocommerce_account_orders_columns', 10, 1 );

// Our custom post type function for offer  banner
function OfferBanner() {

	register_post_type( 'offer banner',
    // CPT Options
		array(
			'labels' => array(
				'name' => __( 'Offer Banner' ),
				'singular_name' => __( 'Offer Banner' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'offerbanners'),
			'show_in_rest' => true,

		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'OfferBanner' );


//bannerimage dynamic 
function offer_banner_dynamic() { 

	$offer_text = get_field('text',978);

	echo $offer_text;


}

// Register shortcode
add_shortcode('global_offer_banner', 'offer_banner_dynamic');

add_shortcode( 'wc_reg_form_bbloomer', 'bbloomer_separate_registration_form' );
    
function bbloomer_separate_registration_form() {
	global $woocommerce;
   if ( is_admin() ) return;
   if ( is_user_logged_in() ) return;
   ob_start();
 
   // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
   // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
 
   do_action( 'woocommerce_before_customer_login_form' );
 
   ?>
     <div class="resister_topsec">
            	<p>Important Notice</p>
            	<p>It is important to provide Contact & Address information in English.</p>
    			<a href="../required-information-for-orders/" class="readmorebtn">>> READ MORE <<</a>
            </div><!--resister_topsec-->
            <div class="row justify-content-center">
    <div class="col-lg-7 col-md-8 col-sm-12">
      <form method="post" class="woocommerce-form woocommerce-form-register register registerform contact-form" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-group">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-group">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-group">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
					<div id="result"></div>
					
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<div class="regiserbtnbx">

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" id="check_register" disabled="disabled" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit btn-main disabled curserpointer-show" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>
			<p class="woocommerce-LostPassword lost_password registerlospass">
								<a href="<?php echo get_permalink(9); ?>"><?php esc_html_e( 'Returning Customer? Login', 'woocommerce' ); ?></a>
							</p>
							
			</div>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>
	</div>
</div>
 
   <?php
     
   return ob_get_clean();
}

add_action('woocommerce_product_options_inventory_product_data', 'woocommerce_product_custom_fields');

function woocommerce_product_custom_fields()
{
    global $woocommerce, $post;
    echo '<div class="product_custom_field">';
    // Custom Product Text Field
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_product_text_field_yes_no',
            'placeholder' => 'Yes If you want to show in product list',
            'label' => __('Show To Product List', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
    echo '</div>';

}
// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');
function woocommerce_product_custom_fields_save($post_id)
{
    // Custom Product Text Field
    $woocommerce_custom_product_text_field = $_POST['_custom_product_text_field_yes_no'];
    
    update_post_meta($post_id, '_custom_product_text_field_yes_no', esc_attr($woocommerce_custom_product_text_field));

}

add_action( 'wp_footer', 'hide_and_show_form_in_checkout' );
function hide_and_show_form_in_checkout() {
   // if( is_cart() || ( is_checkout() && ! is_wc_endpoint_url() ) ):
    ?>
        
<script type="text/javascript">
   jQuery(function($) {
  $('#pet_yes_no_yes').on( "click", function() {
  	
    $('#dvPinNo').show();
    $('#check_val').val(1);
      
});
});
</script>

<script type="text/javascript">
  jQuery(function($){
  $('#pet_yes_no_no').on( "click", function() {
  		
    $('#dvPinNo').hide();
    //empty the value 
    $('#your_pet_or_animal_name').val('');
    $('#Species').val('');
    $('#Breed').val('');
    $('#age').val('');
    $('#diet_currently_being_fed').val('');
    $('#what_veg_drugs_are_currently_being_used').val('');
    $('#vet_diagnosis').val('');
    $('#do_use_chemical_drugs').val('');
    $('#which_of_our_hampl_remedies').val('');
    $('#if_still_vaccinating').val('');
    $('#describe_all_symptonms').val('');
    $('#check_val').val(0);
    $('#selectpets').val('');
    $('#your_pet_or_animal_name').prop('readonly', false);
      
});
});
</script>
<?php
}
//
add_action('woocommerce_order_status_changed','order_complete_save');
/*add_action('woocommerce_order_status_processing','order_complete_save');
add_action( 'woocommerce_order_status_completed', 'order_complete_save' );*/
function order_complete_save($order_id) {
    global $wpdb;
    
    // Getting the order (object type)
    $order = wc_get_order( $order_id );
    /*print_r($order_id);
    echo "<pre>";
    print_r($order);*/

    // Getting order items
    /*$items = $order->get_items(); 
    $total_items_qty = 0;*/

    /*// Iterating through each item (here we do it on first only)
    foreach ( $items as $item ) {
        $total_items_qty += $item["qty"];
    }*/

    // Here are the correct way to get some values:
    $customer_id           = $order->customer_user;
    $billing_email         = $order->billing_email;
    $complete_billing_name = $order->billing_first_name . ' ' . $order->billing_last_name;

    // Getting the user data (if needed)
    $user_data             = get_userdata( $customer_id );
    $customer_login_name   = $user_data->user_login;
    $customer_login_email  = $user_data->user_email;

    $pet_animal_name = get_post_meta( $order->get_id(), 'your_pet_or_animal_name', true );

   	$species =  get_post_meta( $order->get_id(), 'Species', true );

   	$breed =  get_post_meta( $order->get_id(), 'Breed', true );

   	$age =  get_post_meta( $order->get_id(), 'age', true );

   	$diet_currently_being_fed =  get_post_meta( $order->get_id(), 'diet_currently_being_fed', true );

   	$what_veg_drugs_are_currently_being_used =  get_post_meta( $order->get_id(), 'what_veg_drugs_are_currently_being_used', true );

   	$vet_diagnosis =  get_post_meta( $order->get_id(), 'vet_diagnosis', true );

   	$do_use_chemical_drugs =  get_post_meta( $order->get_id(), 'do_use_chemical_drugs', true );

   	$which_of_our_hampl_remedies =  get_post_meta( $order->get_id(), 'which_of_our_hampl_remedies', true );

   	$if_still_vaccinating =  get_post_meta( $order->get_id(), 'if_still_vaccinating', true );

   	$describe_all_symptonms =  get_post_meta( $order->get_id(), 'describe_all_symptonms', true );


    // "$wpdb->prefix" will prepend your table prefix
    $table_name =  "har_save_pet_order_data";

    // This array is not correct (as explained above)
    $data = array( 
        'username'          => $customer_login_name,
        'order_id'          => $order_id,
        'user_id' 			=> $customer_id,
        'pet_animal_name'   => $pet_animal_name,
        'species'   => $species,
        'breed'   => $breed,
        'age'   => $age,
        'diet_currently_being_fed'   => $diet_currently_being_fed,
        'what_veg_drugs_are_currently_being_used'   => $what_veg_drugs_are_currently_being_used,
        'vet_diagnosis'   => $vet_diagnosis,
        'do_use_chemical_drugs'   => $do_use_chemical_drugs,
        'which_of_our_hampl_remedies'   => $which_of_our_hampl_remedies,
        'if_still_vaccinating'   => $if_still_vaccinating,
        'describe_all_symptonms'   => $describe_all_symptonms,
    );

    $wpdb->insert( $table_name, $data );

}

add_action( 'wp_footer' , 'select_pet_checkout' );
function select_pet_checkout(){
	?>
	<script type="text/javascript">
 $(document).ready(function(){

  $("#selectpets").change(function(){

    var select_change = $("#selectpets" ).val();
    //alert(select_change);

    if(select_change!="")
    {
        
        $.ajax({
                type: "POST",
                url: "/HAR/wp-admin/admin-ajax.php",
                dataType:"json",
                data: { 
                    action: 'pets_autopopulate',
                    select_text: select_change,
                },
                cache: false,
                success: function(data){                    
                    if(data.price==''){
                       //jQuery('#ajax_result').hide();  
                       //alert('blank');                      
                    }
                    else{
                      //alert(data.price);
                       $('#your_pet_or_animal_name').val(data.pet_animal);
                       $('#Species').val(data.speices);  
                       $('#Breed').val(data.breed);
                       $('#age').val(data.age);
                       $('#diet_currently_being_fed').val(data.diet_currently);  
                       $('#what_veg_drugs_are_currently_being_used').val(data.vet_drugs);
                       $('#vet_diagnosis').val(data.vet_diag);
                       $('#do_use_chemical_drugs').val(data.chemiacl_drugs);  
                       $('#which_of_our_hampl_remedies').val(data.hampl_remedies);                           
                       $('#if_still_vaccinating').val(data.still_vcc_injection);
                       $('#describe_all_symptonms').val(data.symtons); 

                        $('#your_pet_or_animal_name').prop('readonly', true); 
                       
                    }
                }
        });
      }
      else
      {
                       $('#your_pet_or_animal_name').val('');
                       $('#Species').val('');  
                       $('#Breed').val('');
                       $('#age').val('');
                       $('#diet_currently_being_fed').val('');  
                       $('#what_veg_drugs_are_currently_being_used').val('');
                       $('#vet_diagnosis').val('');
                       $('#do_use_chemical_drugs').val('');  
                       $('#which_of_our_hampl_remedies').val('');                           
                       $('#if_still_vaccinating').val('');
                       $('#describe_all_symptonms').val('');

                        $('#your_pet_or_animal_name').prop('readonly', false);
                        $('#selectpets').val('');
      }
});
 });


</script>
<?php
}

add_action('wp_ajax_pets_autopopulate', 'pets_autopopulate');

// register the ajax action for unauthenticated users
add_action('wp_ajax_nopriv_pets_autopopulate', 'pets_autopopulate');

// handle the ajax request
function pets_autopopulate() {

	global $wpdb;

	$select_text = $_REQUEST['select_text'];

	$result = $wpdb->get_results("SELECT * FROM har_save_pet_order_data WHERE id = '$select_text'");
    //echo "<pre>";
    //print_r($entries);
	foreach ($result as $k => $v) {

		/*echo "<pre>";
		print_r($v);*/

		$pet_animal = $v->pet_animal_name;
		$speices = $v->species;
		$breed = $v->breed;
		$age = $v->age;
		$diet_currently = $v->diet_currently_being_fed;
		$vet_drugs = $v->what_veg_drugs_are_currently_being_used;
		$vet_diag = $v->vet_diagnosis;
		$chemiacl_drugs = $v->do_use_chemical_drugs;
		$hampl_remedies = $v->which_of_our_hampl_remedies;
		$still_vcc_injection = $v->if_still_vaccinating;
		$symtons = $v->describe_all_symptonms;
		$resu_arr = array("pet_animal"=>$pet_animal,"speices"=>$speices,"breed"=>$breed,"age"=>$age,"diet_currently"=>$diet_currently,"vet_drugs"=>$vet_drugs,"vet_diag"=>$vet_diag,"chemiacl_drugs"=>$chemiacl_drugs,"hampl_remedies"=>$hampl_remedies,"still_vcc_injection"=>$still_vcc_injection,"symtons"=>$symtons);
		echo  json_encode($resu_arr);
		exit();

	}


}

add_action( 'wp_footer' , 'billing_address_autopopulate' );
function billing_address_autopopulate(){
	?>
<script type="text/javascript">

	/*$(window).load(function(){ 

		var counrty = $('#billing_country').val();
			initAutocompletecheckout(country);

});*/

$("#billing_country").change(function(){


var country = $('#billing_country').val();

/*$('#billing_address_1').val('');
$('#billing_address_2').val('');
$('#billing_city').val('');
$('#billing_postcode').val('');
$('#billing_state').val('');*/

initAutocompletecheckout(country);


});


	function init() {
var country = $('#billing_country').val();

initAutocompletecheckout(country);

var country_s = $('#shipping_country').val();

initAutocompletecheckoutship(country_s);

var wholesale_register = $('#wwlc_country').val();

initAutoWholesaleAddress(wholesale_register);

}
$(document).ready(function() {
	
google.maps.event.addDomListener(window, 'load', init);
});

function initAutocompletecheckout(country) {
	var componentForm = {
        route: 'long_name',
        street_number: 'short_name',
        sublocality_level_1: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'short_name',
        postal_code: 'short_name'
    };
	var gfoptions = {
		componentRestrictions: {country: country}
	};
	if($('#billing_address_1').length > 0) {	
		var input2 = document.getElementById('billing_address_1');
		var autocomplete2 = new google.maps.places.Autocomplete(input2,gfoptions);
		google.maps.event.addListener(autocomplete2, 'place_changed', function() {
			var place = autocomplete2.getPlace();
			var address1 = '';
			jQuery('#billing_address_2').val(place.name);
			for(var i = 0; i < place.address_components.length; i++) {
				var addressType = place.address_components[i].types[0];
				if (componentForm[addressType]) {
					var val = place.address_components[i][componentForm[addressType]];    
					if (addressType == 'street_number') {
						address1 = val;
					}
					if (addressType == 'route') {
						address1 = address1 + ' ' + val;
					}
					jQuery('#billing_address_1').val(address1);
					//address line 2
					if (addressType == 'sublocality_level_1') {
						jQuery('#billing_address_2').val(val);
					}
					if(address1 == ''){
						jQuery('#billing_address_1').val(place.name);
						jQuery('#billing_address_2').val("");
					} 
					else{
						jQuery('#billing_address_2').val(place.name);
					}
					//city
					if (addressType == 'locality') {
						jQuery('#billing_city').val(val);
					}
					//postal code
					if (addressType == 'postal_code') {
						jQuery('#billing_postcode').val(val);
					}
					//country
					if (addressType == 'country') {
						jQuery('#billing_country').val(val).trigger("change");
					}
					 //state
					if (addressType == 'administrative_area_level_1') {
						jQuery('#billing_state').val(val);
					}
				}
			}
		});	
	}
}

</script>

<?php
}


add_action( 'wp_footer' , 'shipping_address_autopopulate' );
function shipping_address_autopopulate(){
	?>
<script type="text/javascript">

	/*$(window).load(function(){ 

		var counrty = $('#billing_country').val();
			initAutocompletecheckout(country);

});*/

$("#shipping_country").change(function(){


var country = $('#shipping_country').val();

/*$('#billing_address_1').val('');
$('#billing_address_2').val('');
$('#billing_city').val('');
$('#billing_postcode').val('');
$('#billing_state').val('');*/

initAutocompletecheckoutship(country);


});


function initAutocompletecheckoutship(country) {
	var componentForm = {
        route: 'long_name',
        street_number: 'short_name',
        sublocality_level_1: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'short_name',
        postal_code: 'short_name'
    };
	var gfoptions = {
		componentRestrictions: {country: country}
	};
	if($('#shipping_address_1').length > 0) {	
		var input2 = document.getElementById('shipping_address_1');
		var autocomplete2 = new google.maps.places.Autocomplete(input2,gfoptions);
		google.maps.event.addListener(autocomplete2, 'place_changed', function() {
			var place = autocomplete2.getPlace();
			var address1 = '';
			jQuery('#shipping_address_2').val(place.name);
			for(var i = 0; i < place.address_components.length; i++) {
				var addressType = place.address_components[i].types[0];
				if (componentForm[addressType]) {
					var val = place.address_components[i][componentForm[addressType]];    
					if (addressType == 'street_number') {
						address1 = val;
					}
					if (addressType == 'route') {
						address1 = address1 + ' ' + val;
					}
					jQuery('#shipping_address_1').val(address1);
					//address line 2
					if (addressType == 'sublocality_level_1') {
						jQuery('#shipping_address_2').val(val);
					}
					if(address1 == ''){
						jQuery('#shipping_address_1').val(place.name);
						jQuery('#shipping_address_2').val("");
					} 
					else{
						jQuery('#shipping_address_2').val(place.name);
					}
					//city
					if (addressType == 'locality') {
						jQuery('#shipping_city').val(val);
					}
					//postal code
					if (addressType == 'postal_code') {
						jQuery('#shipping_postcode').val(val);
					}
					//country
					if (addressType == 'country') {
						jQuery('#shipping_country').val(val).trigger("change");
					}
					 //state
					if (addressType == 'administrative_area_level_1') {
						jQuery('#shipping_state').val(val);
					}
				}
			}
		});	
	}
}

</script>

<?php
}

add_action( 'wp_footer' , 'wholesale_register_autocomplete_address' );
function wholesale_register_autocomplete_address(){
	?>
<script type="text/javascript">

	/*$(window).load(function(){ 

		var counrty = $('#billing_country').val();
			initAutocompletecheckout(country);

});*/

$("#wwlc_country").change(function(){


var country = $('#wwlc_country').val();

/*$('#billing_address_1').val('');
$('#billing_address_2').val('');
$('#billing_city').val('');
$('#billing_postcode').val('');
$('#billing_state').val('');*/

initAutoWholesaleAddress(country);


});


function initAutoWholesaleAddress(country) {
	var componentForm = {
        route: 'long_name',
        street_number: 'short_name',
        sublocality_level_1: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'short_name',
        postal_code: 'short_name'
    };
	var gfoptions = {
		componentRestrictions: {country: country}
	};
	if($('#wwlc_address').length > 0) {	
		var input2 = document.getElementById('wwlc_address');
		var autocomplete2 = new google.maps.places.Autocomplete(input2,gfoptions);
		google.maps.event.addListener(autocomplete2, 'place_changed', function() {
			var place = autocomplete2.getPlace();
			var address1 = '';
			jQuery('#wwlc_address_2').val(place.name);
			for(var i = 0; i < place.address_components.length; i++) {
				var addressType = place.address_components[i].types[0];
				if (componentForm[addressType]) {
					var val = place.address_components[i][componentForm[addressType]];    
					if (addressType == 'street_number') {
						address1 = val;
					}
					if (addressType == 'route') {
						address1 = address1 + ' ' + val;
					}
					jQuery('#wwlc_address').val(address1);
					//address line 2
					if (addressType == 'sublocality_level_1') {
						jQuery('#wwlc_address_2').val(val);
					}
					if(address1 == ''){
						jQuery('#wwlc_address').val(place.name);
						jQuery('#wwlc_address_2').val("");
					} 
					else{
						jQuery('#wwlc_address_2').val(place.name);
					}
					//city
					if (addressType == 'locality') {
						jQuery('#wwlc_city').val(val);
					}
					//postal code
					if (addressType == 'postal_code') {
						jQuery('#wwlc_postcode').val(val);
					}
					//country
					if (addressType == 'country') {
						jQuery('#wwlc_country').val(val).trigger("change");
					}
					 //state
					if (addressType == 'administrative_area_level_1') {
						//alert(val);
						jQuery('#wwlc_state').val(val);
						jQuery('#select2-wwlc_state-container').text(val);
						jQuery('#select2-wwlc_state-container').prop('title',val);
					}
				}
			}
		});	
	}
}

</script>

<?php
}

add_action( 'wp_footer' , 'url_change' );
function url_change(){

	$user_id =  get_current_user_id();
	//echo "<pre>";
	//print_r($user_id);

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	
	$customer_role = $customer->role;
	if(in_array($customer_role,$whole_array))
	{
	?>
<script type="text/javascript">
$(document).ready(function() {
		
		//alert($('#menu-item-203').children('a').attr('href'));

	$('#menu-item-203').children('a').attr('href','https://steamlinedesign.com/HAR/wholesale-ordering/');

});
</script>
<?php
}
elseif ($user_id=='') {

	?>
	<script type="text/javascript">
$(document).ready(function() {
		
		//alert($('#menu-item-203').children('a').attr('href'));

	$('#menu-item-203').show();
	
});
</script>
<?php	
}
elseif(!in_array($customer_role,$whole_array)){
	?>
	<script type="text/javascript">
$(document).ready(function() {
		
		//alert($('#menu-item-203').children('a').attr('href'));

	$('#menu-item-203').hide();
});
</script>
<?php
}
}

function nada_woocommerce_edit_registration_form() {
            ?>
            <p id="recaptcha" class="g-recaptcha woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-group" data-sitekey="6LfZmiAbAAAAACE9m_nFepbr3KmGW9L62QzLlkek"></p>
            <?php
        }
        add_action( 'woocommerce_register_form', 'nada_woocommerce_edit_registration_form', 15 );

    /**
     * Validate Woocommerce Registration form fields
     */

    function nada_validate_extra_register_fields( $errors, $username, $email ) {
        if ( empty( $_POST['g-recaptcha-response'] ) ) {
                $errors->add( 'captcha-error', wp_kses_post( ' Captcha is missing.', 'nada' ) );
        }
        return $errors;
    }
    add_filter( 'woocommerce_registration_errors', 'nada_validate_extra_register_fields', 10, 3 );



add_action( 'wp_footer' , 'change_label_whoelsale_login' );
function change_label_whoelsale_login(){
	?>
<script type="text/javascript">

	$(document).ready(function() {

		 //alert($('.login-username').children('label').text());

		 $('.login-username').children('label').html('<label for="user_login">Email <span style="color:red">*</span></label>');
	});

</script>
<?php
}

/*add_action( 'wp_footer' , 'change_label_customer_phone' );
function change_label_customer_phone(){
	?>
<script type="text/javascript">

	$(document).ready(function() {

		 //alert($('#billing_phone_field').children('label').text());

		 $('#billing_phone_field').children('label').html('Mobile Number&nbsp;<abbr class="required" title="required">*</abbr><span class="error" style="display:none">Mobile Number is a required field.</span');
	});

</script>
<?php
}*/

add_action('wp_ajax_add_pets_ajax', 'add_pets_ajax');

// register the ajax action for unauthenticated users
add_action('wp_ajax_nopriv_add_pets_ajax', 'add_pets_ajax');

// handle the ajax request
function add_pets_ajax() {

	global $wpdb;

			$table_name = "har_save_pet_order_data";

			$customer_id = $_REQUEST['customer_id'];
			$customer_login_email = $_REQUEST['customer_login_email'];
			$customer_login_name = $_REQUEST['customer_login_name'];
			$pet_animal_name = $_POST['pet_animal_name'];
  			$species = $_REQUEST['species'];
  			$breed = $_REQUEST['breed'];
  			$age = $_REQUEST['age'];
  			$diet_cuurently_being = $_REQUEST['diet_cuurently_being'];
  			$vet_drugs = $_REQUEST['vet_drugs'];
  			$vet_diagnosis = $_REQUEST['vet_diagnosis'];
  			$chemical_drugs = $_REQUEST['chemical_drugs'];
  			$hampl_remedies = $_REQUEST['hampl_remedies'];
  			$pet_injection = $_REQUEST['pet_injection'];
  			$symptoms = $_REQUEST['symptoms'];

  			$data = array(
        'username'          => $customer_login_name,
        'user_id' 			=> $customer_id,
        'pet_animal_name'   => $pet_animal_name,
        'species'   => $species,
        'breed'   => $breed,
        'age'   => $age,
        'diet_currently_being_fed'   => $diet_cuurently_being,
        'what_veg_drugs_are_currently_being_used'   => $vet_drugs,
        'vet_diagnosis'   => $vet_diagnosis,
        'do_use_chemical_drugs'   => $chemical_drugs,
        'which_of_our_hampl_remedies'   => $hampl_remedies,
        'if_still_vaccinating'   => $pet_injection,
        'describe_all_symptonms'   => $symptoms,
    );

  		$result_select = $wpdb->get_results("SELECT pet_animal_name FROM har_save_pet_order_data WHERE user_id = '$customer_id' AND flag = 0");
  		//print_r($result_select);

  		$post_pet_name_lower = strtolower($pet_animal_name);
  		
  		foreach ($result_select as $key => $valuepet) {

  			$pet_animal_lower[] = strtolower($valuepet->pet_animal_name);
  			
  		}
  		
  		if(in_array($post_pet_name_lower, $pet_animal_lower))
  		{
  				$resu_arr = array("msg"=>'duplicate');
            	echo  json_encode($resu_arr);
				exit();
  		}

  		

  	$result_insert = $wpdb->insert( $table_name, $data );

  	if(is_wp_error($result_insert)) 
			{
            	$resu_arr = array("msg"=>'error');
            	echo  json_encode($resu_arr);
				exit();   
        	} 
        	else 
        	{
            	//success, so redirect
            	$resu_arr = array("msg"=>'success');
            	echo  json_encode($resu_arr);
				exit();
            	
            	
        	}
	
	
	
}

add_filter( 'woocommerce_form_field' , 'remove_optional_custom_field_label', 10, 4 );
function remove_optional_custom_field_label( $field, $key, $args, $value ) {
    if( 'receive_newsletter' === $key  ) {
        $optional = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'woocommerce' ) . ')</span>';
        $field = str_replace( $optional, '', $field );
    }
    return $field;
}

add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false');

add_action( 'woocommerce_register_form', 'add_account_newsletter_checkbox_field' );
function add_account_newsletter_checkbox_field() {
    woocommerce_form_field( 'receive_newsletter', array(
        'type'  => 'checkbox',
        'class' => array('form-row-wide form-group'),
        'label' => __( 'Subscribe to our newsletter?', 'woocommerce' ),
        'clear' => true,
    ), get_user_meta(get_current_user_id(), 'receive_newsletter', true ) );

}


// Save registration checkbox field value
add_action( 'woocommerce_created_customer', 'save_account_registration_field' );
function save_account_registration_field( $customer_id ) {
    $value = isset( $_POST['receive_newsletter'] ) ? '1' : '0';
    update_user_meta( $customer_id, 'receive_newsletter', $value );

}

add_action( 'wp_footer' , 'empty_couppon_code' );
function empty_couppon_code(){
	?>
<script type="text/javascript">

	$(document).ready(function() {

		//$('#enable_btn').prop("disabled", true);
		$('#enable_btn').removeAttr("disabled");


});
</script>
<?php
}
add_action( 'wp_footer' , 'password_check' );
function password_check()
{
	?>
<script type="text/javascript">
$(document).ready(function() { 
$('#reg_password').keyup(function(){ 
$('#result').html(checkStrength($('#reg_password').val()));
 });
  function checkStrength(password){ //initial strength 
var strength = 0 //if the password length is less than 6, return message.
 if (password.length < 6) 
 	{ 
 		$('#result').removeClass(); 
 		$('#result').addClass('short');
 		  return 'Short: Your password is too short. - Please enter a stronger password. <br> Hint: The password should be at least twelve characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & ).';
 	} 
 if (password.length > 7) 
 	strength += 1; 
  if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
   strength += 1  ;
  if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))
   strength += 1; 
  if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) 
  	strength += 1; 
  if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) 
  	strength += 1;  
  if (strength < 2 ) 
  	{ 
  		$('#result').removeClass();
  		 $('#result').addClass('weak');
  		 
  		  return 'Weak: Your password is weak. - Please enter a stronger password. <br> Hint: The password should be at least twelve characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & ).';
  } 
  		  else if (strength == 2 ) 
  		  	{ 
  		  		$('#result').removeClass();
  		  		 $('#result').addClass('good');
  		  		 $('#check_register').removeClass('disabled');
  		  		 $('#check_register').removeClass('curserpointer-show');
  		  		 $('#check_register').prop("disabled", false);
  		  		  return 'Good: Your password is good. - Please enter a stronger password. <br> Hint: The password should be at least twelve characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & ).';
  		  		   } 
  		  		   else 
  		  		   	{ 
  		  		   		$('#result').removeClass();
  		  		   		 $('#result').addClass('strong');
  		  		   		 $('#check_register').removeClass('disabled');
  		  		   		  $('#check_register').removeClass('curserpointer-show');
  		  		   		 $('#check_register').prop("disabled", false);
  		  		   		  return 'Strong: Your password is strong.';
  		  		   		} 
  	} 
 });
</script>
<?php
}

function enhanced_product_search( $keyword ) {
    global $wpdb;

    // Manually build SQL query and get results (this query will return only IDs)
    $search_results = $wpdb->get_results("SELECT posts.ID AS product_id,
       posts.post_title AS product_title
FROM har_posts AS posts WHERE posts.post_type = 'product' AND posts.post_status = 'publish' AND (posts.post_title LIKE '%{$keyword}%'  OR posts.post_content LIKE '%{$keyword}%' OR posts.post_name LIKE '%{$keyword}%' )");

/*echo "SELECT posts.ID AS product_id,
       posts.post_title AS product_title
FROM har_posts AS posts WHERE posts.post_type = 'product' AND posts.post_status = 'publish' AND (posts.post_title LIKE '%{$keyword}%'  OR posts.post_content LIKE '%{$keyword}%'  OR posts.post_name LIKE '%{$keyword}%')";
*/
    $products = [];

    // Loop over search results to get products from their IDs
    foreach ( $search_results as $result ) {
    	//echo "<pre>";
    	//print_r($result);
        $products[] =  $result->product_id;
    }

    return $products;
}

// Add plus and minus button
add_filter( 'wwof_filter_product_item_quantity', function($quantity_field){
    $quantity_field = str_replace('<div class="quantity">', '<div class="quantity buttons_added"><button type="button" class="minus altera decrescimo">-</button>', $quantity_field);
    $quantity_field = str_replace('</div>', '<button type="button" class="plus altera acrescimo">+</button></div>', $quantity_field);
    return $quantity_field;
}, 99, 2 );
/* Allow to increate quantity by pressing plus and minus button
 * 
 * Based on WooCommerce Quantity Increment plugin
 * (https://github.com/woocommerce/WooCommerce-Quantity-Increment)
 */
add_action( 'wp_footer', function() {
    global $post;
    if( isset( $post->post_content ) && has_shortcode( $post->post_content , 'wwof_product_listing' ) ) { ?>
        <script type="text/javascript">
        (function($) {
             
            $(document).ready(function(){
                 
                function wwof_refresh_quantity_increments(){
                    $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );
                }
                $( document ).on( 'updated_wc_div', function() {
                    wwof_refresh_quantity_increments();
                } );
                $( document ).on( 'click', '.plus, .minus', function() {
                     
                    // Get values
                    var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                        currentVal  = parseFloat( $qty.val() ),
                        max         = parseFloat( $qty.attr( 'max' ) ),
                        min         = parseFloat( $qty.attr( 'min' ) ),
                        step        = $qty.attr( 'step' );
                    // Format values
                    if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
                    if ( max === '' || max === 'NaN' ) max = '';
                    if ( min === '' || min === 'NaN' ) min = 0;
                    if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;
                    // Change the value
                    if ( $( this ).is( '.plus' ) ) {
                        if ( max && ( currentVal >= max ) ) {
                            $qty.val( max );
                        } else {
                            $qty.val( currentVal + parseFloat( step ) );
                        }
                    } else {
                        if ( min && ( currentVal <= min ) ) {
                            $qty.val( min );
                        } else if ( currentVal > 0 ) {
                            $qty.val( currentVal - parseFloat( step ) );
                        }
                    }
                    // Trigger change event
                    $qty.trigger( 'change' );
                });
                wwof_refresh_quantity_increments();
            });
        })(jQuery);
        </script> <?php
    }
} );

add_action( 'wp_footer' , 'add_class_wholesale' );
function add_class_wholesale()
{
	?>
<script type="text/javascript">
	$(document).ready(function() { 

	var param = $(location).attr('pathname');
	var arr = param.split('/');
	var asd = arr[2];
	if(asd=='wholesale-ordering')
	{
		$('#menu-item-203').addClass('current-menu-item');
	}

});
</script>
<?php
}


/*add_action('woocommerce_before_checkout_billing_form','change_address_link');
 function change_address_link()
 {
 	?>
 	
 	<a href="https://steamlinedesign.com/HAR/my-account/edit-address/billing/" class="edit_checkout">Change Address</a>
 	
 	<?php 
 }*/

 add_action( 'wp_footer' , 'change_display_name_value_wholesale' );
function change_display_name_value_wholesale()
{
	$user_id =  get_current_user_id();
	//echo "<pre>";
	//print_r($user_id);

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	
	$customer_role = $customer->role;
	//echo $customer_role;

	if(in_array($customer_role,$whole_array))
	{
	?>
<script type="text/javascript">
	$(document).ready(function() { 

	var param = $(location).attr('pathname');
	var arr = param.split('/');
	var edit_account_value = arr[3];
	//alert(edit_account_value);
	if(edit_account_value=='edit-account')
	{
		$('#account_display_name').val('');
		var first_name_reg = $('#account_first_name').val();
		var last_name_reg = $('#account_last_name').val();
		$('#account_display_name').val(first_name_reg+' '+last_name_reg);
	}

});
</script>
<?php
}
}

add_filter( 'rest_user_query' , 'custom_rest_user_query' );
function custom_rest_user_query( $prepared_args, $request = null ) {
  unset($prepared_args['has_published_posts']);
  return $prepared_args;
}

add_action( 'wp_footer' , 'search_box_header_product' );
function search_box_header_product()
{
	?>
<script type="text/javascript">

function fill(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search').val(Value);
   //Hiding "display" div in "search.php" file.
   $('#display').hide();
}
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
  // $("#search").keyup(function() {
  	 $("#button_search").click(function(){
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
       }
       //If name is not empty.
       else {

		       	if(name.length>= 3)
		       	{
		           //AJAX is called.
		           $.ajax({
		               //AJAX type is "Post".
		               type: "POST",
		               //Data will be sent to "ajax.php".
		               url: "/HAR/wp-admin/admin-ajax.php",
		               //Data, that will be sent to "ajax.php".
		               data: {
		               		action: 'search_product_custom',
		                   //Assigning value of "name" into "search" variable.
		                   search: name
		               },
		               cache: false,
		               //If result found, this funtion will be called.
		               success: function(html) {
		                   //Assigning result to "display" div in "search.php" file.
		                   $("#display").html(html).show();
		               }
		           });
		        }
       }
   });
});

	</script>
<?php
}

add_action('wp_ajax_search_product_custom', 'search_product_custom');

// register the ajax action for unauthenticated users
add_action('wp_ajax_nopriv_search_product_custom', 'search_product_custom');

// handle the ajax request
function search_product_custom() {

	if (isset($_POST['search'])) {

			$product_search = $_POST['search'];

		 $selec_arr = enhanced_product_search($product_search);

		 $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }

		 if(count($selec_arr))
         {
            		//echo "<pre>";
            	//print_r($selec_arr);
            foreach ($selec_arr as $key => $value) 
            {
                $product_id = $value;
              	//echo $product_id;
              	$product = wc_get_product( $product_id );

              	$check_product = get_post_meta( $product_id, '_custom_product_text_field_yes_no', true );

                  //echo $check_product;

		              if($check_product!='no' || $check_product!='No' || $check_product!='NO' || $check_product!='nO')
		              {
		            
		              	?>

		              	  <ul>
					         <li>
					            <a href="<?php echo get_permalink( $value ); ?>" class="remediesimg">
					              <?php
					                
					              ?>

					                <img src='<?php echo wp_get_attachment_url($product->image_id);?>' alt=""> 
					              </a>
					                

					                   <!-- <i class="fas fa-star"></i>
					                    <i class="fas fa-star"></i>
					                    <i class="fas fa-star"></i>
					                    <i class="fas fa-star"></i>
					                    <i class="fas fa-star"></i> -->
					                
					                <div class="htullistcnt">
						                <h5><a href="<?php echo $product->get_permalink(); ?>"><?php echo $product->get_title();?></a></h5>
						                <span class="pricetxt"><!-- $ --><?php echo $product->get_price_html();?> <!-- AUD --></span>
						            </div>
		                	</li>   
		                </ul>
		        <?php

		             }

            }

         }
         else
         {
            ?>
            <div class="noseachresult">
              <strong><span>Sorry, no results!</span> <br> Your search for <?php echo $product_search;?> did not match any results. Please modify your search terms and try again.</strong>
            </div>
            <?php

         }
          
	}
	 wp_reset_postdata();
   
    //check ajax call
    if($ajax) die();



}

/*add_action('woocommerce_checkout_fields','customization_readonly_billing_fields',10,1);
function customization_readonly_billing_fields($checkout_fields){
    //$current_user = wp_get_current_user();;
    //$user_id = $current_user->ID;
    foreach ( $checkout_fields['billing'] as $key => $field ){

    	
    	 //if($key == 'billing_address_1' || $key == 'billing_address_2'){ 
            
                $checkout_fields['billing'][$key]['custom_attributes'] = array('readonly'=>'readonly');
           
        //}
    }
    return $checkout_fields;
}*/




/*
add_filter( 'rest_prepare_user', function( $response, $user, $request ) {

	
		//echo "<pre>";
		//print_r($user);

    $response->data[ 'first_name' ] = get_user_meta( $user->ID, 'first_name', true );
    $response->data[ 'last_name' ] = get_user_meta( $user->ID, 'last_name', true );
    $response->data[ 'billing_country' ] = get_user_meta( $user->ID, 'billing_country', true );
    $response->data[ 'billing_country' ] = get_user_meta( $user->ID, 'billing_country', true );

    return $response;

}, 10, 3 );*/

/*add_action( 'wp_footer' , 'checkout_petanimal_readonly' );
function checkout_petanimal_readonly()
{
	?>
<script type="text/javascript">
   jQuery(function($) {
  $('#pet_yes_no_yes').on( "click", function() {
  	
    
    var value_this = $(this).val();
    
    if(value_this=='yes')
    {
		    $("#selectpets").change(function(){
		    var pet_select = $("#selectpets" ).val();
		    $('#your_pet_or_animal_name').prop('readonly', true);
			});
      }
});
});
</script>
<?php
}*/

//to display msg on the field in checkout page

/*add_filter( 'woocommerce_form_field', 'bbloomer_checkout_fields_in_label_error', 10, 4 );
 
function bbloomer_checkout_fields_in_label_error( $field, $key, $args, $value ) {
   if ( strpos( $field, '</label>' ) !== false && $args['required'] ) {
      $error = '<span class="error" style="display:none">';
      $error .= sprintf( __( '%s is a required field.', 'woocommerce' ), $args['label'] );
      $error .= '</span>';
      $field = substr_replace( $field, $error, strpos( $field, '</label>' ), 0);
   }
   return $field;
}*/
/*add_filter( 'woocommerce_min_password_strength', 'reduce_min_strength_password_requirement' );
function reduce_min_strength_password_requirement( $strength ) {
    // 3 => Strong (default) | 2 => Medium | 1 => Weak | 0 => Very Weak (anything).
    return 3; 
}

# change the wording of the password hint.
add_filter( 'password_hint', 'indic_password_hint' );
function indic_password_hint ( $hint ) {
    $hint = 'Hint: To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & ).';
    return $hint;
}*/

/*add_action( 'user_register', 'myplugin_registration_save', 10, 1 );
function myplugin_registration_save()
{
           
    if ( isset( $_POST['password'] ) )
        echo $_POST['first_name'];
}*/

/*add_action( 'woocommerce_register_form', 'wcvendors_notify_password_myaccount' );
function wcvendors_notify_password_myaccount() {
echo '<strong>Important</strong> — This site respects your security. We require all new members to use a strong password. <strong>you need a stronger password</strong>.<br><br>';
}*/

/*add_filter( 'authenticate', 'my_admin_check', 100, 1 );

function my_admin_check( $user ) {

		$url  = home_url($_SERVER['REQUEST_URI']);

		//echo $url;


	$parts = parse_url($url);
parse_str($parts['query'], $query);
$check_url =  $query['wholesale'];

//echo $check_url;
    // Make sure this is a real login attempt, without errors
    if ( !is_wp_error($user) ) {
        $user_role = $user->roles[0];
        echo $user_role;
        // add or remove the roles you want to allow/disallow (can be a custom role or regular WordPress roles)
        if ( !in_array( $user_role, array( 'wholesale_customer' ) ) ){
            return new WP_Error( 'login_failed', __( "Only staff can use this login.", "mysite_domain" ) );
        } else {
            // allow the login
            return $user;   
        }
    } else {
        // We're just loading the login page, not running a login.
        return $user;       
    }
} */

/*function trade_customers_only($login, $user) {

	$page_url_get = $_SERVER['REQUEST_URI'];
		//echo $page_url_get;
		if (strpos($page_url_get, 'wholesale') !== false) 
		{
			echo "if";
		}
		else
		{
			echo "else";
		}

	
    if( $user->roles && !in_array('administrator',$user->roles)) {
        $logout_url = wp_login_url().'?mode=tradeonly';
        wp_destroy_current_session();
        wp_logout();
        wp_redirect( $logout_url, 302 );
        exit();
    }
}
 add_action('wp_login', 'trade_customers_only',10,2);

// CUSTOM LOGIN MESSAGES
function my_login_message() {

    if( $_GET['mode'] == 'tradeonly' ){
        $message = '<p class="message"><b>You must be a Trade Customer to access this site.</b></p>';
        return $message;
    }

}
 add_filter('login_message', 'my_login_message');*/