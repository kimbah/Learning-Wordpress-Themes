<?php

function custom_scripts() {
wp_enqueue_style( 'bootstrap-style' , 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
wp_enqueue_script( 'custom-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array( 'jquery' ), false, true );
wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/style.css' ); // get_stylesheet_uri();
wp_enqueue_script('main.js', get_template_directory_uri() . '/js/main.js', NULL, 1.0, true);
wp_localize_script('main.js', 'magicalData', array(
    'nonce' => wp_create_nonce('wp_rest'),
    'siteURL' => get_site_url()
));
}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );

// Get Top Ancestor
function get_top_ancestor_id() {
    global $post;
    if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    return $post->ID;
}

// Does page have children? 
function has_children() {
    global $post;
    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
}

// Customise excerpt word count length
function custom_excerpt_length() {
    return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');


// Activating Widgets

function ourWidgetsInit() {
	
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 1',
		'id' => 'footer1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 2',
		'id' => 'footer2',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 3',
		'id' => 'footer3',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 4',
		'id' => 'footer4',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
}
add_action('widgets_init', 'ourWidgetsInit');

// Theme setup

function UCCMSTeamProject_setup() {
    // Navigation Menus
    register_nav_menus(array(
        'primary' => __( 'Primary Menu' ), 
        'footer'  => __( 'Footer Menu' )
    ));

    // Add Featured Image Support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('banner-image', 920, 210, array('left', 'top'));

    // Add post format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('after_setup_theme', 'UCCMSTeamProject_setup');

// Customize Appearance Options

function UCCMSTeamProject_customize_register( $wp_customize ) {

	$wp_customize->add_setting('uccms_link_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('uccms_btn_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('uccms_btn_hover_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));

	$wp_customize->add_section('uccms_standard_colors', array(
		'title' => __('Standard Colors', 'UCCMSTeamProject'),
		'priority' => 30,
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uccms_link_color_control', array(
		'label' => __('Link Color', 'UCCMSTeamProject'),
		'section' => 'uccms_standard_colors',
		'settings' => 'uccms_link_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uccms_btn_color_control', array(
		'label' => __('Button Color', 'UCCMSTeamProject'),
		'section' => 'uccms_standard_colors',
		'settings' => 'uccms_btn_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uccms_btn_hover_color_control', array(
		'label' => __('Button Hover Color', 'UCCMSTeamProject'),
		'section' => 'uccms_standard_colors',
		'settings' => 'uccms_btn_hover_color',
	) ) );

}

add_action('customize_register', 'UCCMSTeamProject_customize_register');

// Output Customize CSS

function UCCMSTeamProject_customize_css() { ?>

	<style type="text/css">

		a:link,
		a:visited {
			color: <?php echo get_theme_mod('uccms_link_color'); ?>;
		}

		.site-header nav ul li.current-menu-item a:link,
		.site-header nav ul li.current-menu-item a:visited,
		.site-header nav ul li.current-page-ancestor a:link,
		.site-header nav ul li.current-page-ancestor a:visited {
			background-color: <?php echo get_theme_mod('uccms_link_color'); ?>;
		}

		.btn-a,
		.btn-a:link,
		.btn-a:visited,
		div.hd-search #searchsubmit {
			background-color: <?php echo get_theme_mod('uccms_btn_color'); ?>;
		}

		.btn-a:hover,
		div.hd-search #searchsubmit:hover {
			background-color: <?php echo get_theme_mod('uccms_btn_hover_color'); ?>;
		}

	</style>

<?php }

add_action('wp_head', 'UCCMSTeamProject_customize_css');

// Add Footer callout section to admin appearance customize screen

function uccms_footer_callout($wp_customize) {
	$wp_customize->add_section('uccms-footer-callout-section', array(
		'title' => 'Footer Callout'
	));

	$wp_customize->add_setting('uccms-footer-callout-display', array(
		'default' => 'No'  
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'uccms-footer-callout-display-control', array(
			'label' => 'Display this section?',
			'section' => 'uccms-footer-callout-section',
			'settings' => 'uccms-footer-callout-display',
			'type' => 'select',
			'choices' => array('No' => 'No', 'Yes' => 'Yes')
		)));

	$wp_customize->add_setting('uccms-footer-callout-headline', array(
		'default' => 'Example Headline Text!'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'uccms-footer-callout-headline-control', array(
			'label' => 'Headline',
			'section' => 'uccms-footer-callout-section',
			'settings' => 'uccms-footer-callout-headline'
		)));

	$wp_customize->add_setting('uccms-footer-callout-text', array(
		'default' => 'Example paragraph text.'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'uccms-footer-callout-text-control', array(
			'label' => 'Text',
			'section' => 'uccms-footer-callout-section',
			'settings' => 'uccms-footer-callout-text',
			'type' => 'textarea'
		)));

	$wp_customize->add_setting('uccms-footer-callout-link');

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'uccms-footer-callout-link-control', array(
			'label' => 'Link',
			'section' => 'uccms-footer-callout-section',
			'settings' => 'uccms-footer-callout-link',
			'type' => 'dropdown-pages'
		)));

	$wp_customize->add_setting('uccms-footer-callout-image');

	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'uccms-footer-callout-image-control', array(
			'label' => 'Image',
			'section' => 'uccms-footer-callout-section',
			'settings' => 'uccms-footer-callout-image',
			'width' => 750,
			'height' => 500
		)));
}

add_action('customize_register', 'uccms_footer_callout');
