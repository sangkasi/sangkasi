<?php
/**
 * Electronic Supermarket functions and definitions
 *
 * @package Electronic Supermarket
 * @subpackage electronic_supermarket
 */

function electronic_supermarket_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'electronic-supermarket-featured-image', 2000, 1200, true );
	add_image_size( 'electronic-supermarket-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'electronic-supermarket' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', electronic_supermarket_fonts_url() ) );
}
add_action( 'after_setup_theme', 'electronic_supermarket_setup' );

/**
 * Register custom fonts.
 */
function electronic_supermarket_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$electronic_supermarket_query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($electronic_supermarket_query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/**
 * Register widget area.
 */
function electronic_supermarket_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'electronic-supermarket' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'electronic-supermarket' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'electronic-supermarket' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'electronic-supermarket' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'electronic-supermarket' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'electronic-supermarket' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'electronic-supermarket' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'electronic-supermarket' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'electronic-supermarket' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'electronic-supermarket' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'electronic-supermarket' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'electronic-supermarket' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'electronic-supermarket' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'electronic-supermarket' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'electronic_supermarket_widgets_init' );


//post tag
function custom_tags_filter($tag_list) {
    // Replace the comma (,) with an empty string
    $tag_list = str_replace(', ', '', $tag_list);

    return $tag_list;
}
add_filter('the_tags', 'custom_tags_filter');

function custom_output_tags() {
    $tags = get_the_tags();

    if ($tags) {
        $tags_output = '<div class="post_tag">Tags: ';

        $first_tag = reset($tags);

        foreach ($tags as $tag) {
            $tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="mr-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $first_tag) {
                $tags_output .= ' ';
            }
        }

        $tags_output .= '</div>';

        echo $tags_output;
    }
}
/**
 * Enqueue scripts and styles.
 */
function electronic_supermarket_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'electronic-supermarket-fonts', electronic_supermarket_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'electronic-supermarket-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'electronic-supermarket-style',$electronic_supermarket_tp_theme_css );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'electronic-supermarket-style',$electronic_supermarket_tp_theme_css );
	
	// Theme block stylesheet.
	wp_enqueue_style( 'electronic-supermarket-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'electronic-supermarket-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );
	
	wp_enqueue_script( 'electronic-supermarket-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/electronic-supermarket-custom.js', array('jquery'), true);

	wp_enqueue_script( 'electronic-supermarket-focus-nav', esc_url( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'electronic_supermarket_scripts' );

//Admin Enqueue for Admin
function electronic_supermarket_admin_enqueue_scripts(){
	wp_enqueue_style('electronic-supermarket-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
	wp_enqueue_script( 'electronic-supermarket-custom-scripts', get_template_directory_uri(). '/assets/js/electronic-supermarket-custom.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'electronic_supermarket_admin_enqueue_scripts' );

/*radio button sanitization*/
function electronic_supermarket_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Sanitize Sortable control.
function electronic_supermarket_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

function electronic_supermarket_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function electronic_supermarket_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'electronic_supermarket_loop_columns');
if (!function_exists('electronic_supermarket_loop_columns')) {
	function electronic_supermarket_loop_columns() {
		$columns = get_theme_mod( 'electronic_supermarket_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'electronic_supermarket_per_page', 20 );
function electronic_supermarket_per_page( $cols ) {
  	$cols = get_theme_mod( 'electronic_supermarket_product_per_page', 9 );
	return $cols;
}

function electronic_supermarket_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function electronic_supermarket_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function electronic_supermarket_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function electronic_supermarket_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template','electronic_supermarket_front_page_template' );

define('ELECTRONIC_SUPERMARKET_CREDIT',__('https://www.themespride.com/themes/free-electronic-wordpress-theme/','electronic-supermarket') );
if ( ! function_exists( 'electronic_supermarket_credit' ) ) {
	function electronic_supermarket_credit(){
		echo "<a href=".esc_url(ELECTRONIC_SUPERMARKET_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('electronic_supermarket_footer_text',__('Electronic Supermarket WordPress Theme','electronic-supermarket')))."</a>";
	}
}



function electronic_supermarket_activation_notice() { ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="electronic-supermarket-getting-started-notice clearfix">
            <div class="electronic-supermarket-theme-notice-content">
                <h2 class="electronic-supermarket-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'electronic-supermarket' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'electronic-supermarket')) ?></p>

                <a class="electronic-supermarket-btn-get-started button button-primary button-hero electronic-supermarket-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=electronic-supermarket-about' )); ?>" ><?php esc_html_e( 'Get started', 'electronic-supermarket' ) ?></a><span class="electronic-supermarket-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }
add_action( 'admin_notices', 'electronic_supermarket_activation_notice' );

/**
 * Logo Custamization.
 */

function electronic_supermarket_logo_width(){

	$electronic_supermarket_logo_width   = get_theme_mod( 'electronic_supermarket_logo_width', 150 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $electronic_supermarket_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'electronic_supermarket_logo_width' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * About Theme Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );
/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
/**
 * Load Toggle file
 */
require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );

/**
 * load sortable file
 */
require get_parent_theme_file_path( '/inc/controls/sortable-control.php' );

/**
 * TGM Recommendation
 */
require get_parent_theme_file_path( '/inc/TGM/tgm.php' );
