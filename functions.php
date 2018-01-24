<?php
/**
 * Sample for Simple Customizer.
 */

/**
 * Enqueue scripts and styles.
 */
function customizer_demo_scripts() {
	wp_enqueue_style( 'customizer-demo-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' );
	wp_enqueue_style( 'customizer-demo-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'customizer_demo_scripts' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customizer_demo_customize_preview_js() {
	wp_enqueue_script( 'customizer-demo-customize-preview', get_template_directory_uri() . '/customize-preview.js', array( 'customize-preview' ), false, true );
}

add_action( 'customize_preview_init', 'customizer_demo_customize_preview_js' );


/**
 * Customizer Setting for Jumbotron.
 *
 * @param WP_Customize_Manager $wp_customize
 */
function customizer_demo_jumbotron_customize_register( WP_Customize_Manager $wp_customize ) {

	/**
	 * Register customizer section.
	 */
	$wp_customize->add_section( 'jumbotron', array(
		'title'    => 'jumbotron',
		'priority' => 130,
	) );


	/**
	 * Title.
	 */
	$wp_customize->add_setting( 'jumbotron_title', array(
		'default'           => 'Hello World!',
		'sanitize_callback' => 'esc_html',
	) );

	/* Need after register setting. */
	$wp_customize->add_control( 'jumbotron_title', array(
		'section' => 'jumbotron',
		'label'   => 'Jumbotron Title',
	) );

	/**
	 * lead.
	 */
	$wp_customize->add_setting( 'jumbotron_lead', array(
		'default'           => 'It uses utility classes for typography and spacing to space content out within the larger container.',
		'sanitize_callback' => 'esc_html',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'jumbotron_lead', array(
		'section'     => 'jumbotron',
		'label'       => 'Jumbotron Description',
		'description' => 'Support Selective Refresh',
	) );

	/**
	 * Support Selective Refresh.
	 */
	$wp_customize->selective_refresh->add_partial( 'jumbotron_lead', array(
		'selector'        => '.jumbotron .lead',
		'render_callback' => function () {
			return get_theme_mod( 'jumbotron_lead' );
		},
	) );
}

add_action( 'customize_register', 'customizer_demo_jumbotron_customize_register' );


/**
 * Support Selective Refresh for blogname.
 *
 * @param WP_Customize_Manager $wp_customize
 */
function fesdemo_customize_register( WP_Customize_Manager $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.navbar-brand',
		'render_callback' => 'bloginfo',
	) );
}

add_action( 'customize_register', 'fesdemo_customize_register' );


function customizer_demo_navbar_customize_register( WP_Customize_Manager $wp_customize ) {

	/**
	 * Theme options.
	 */
	$wp_customize->add_section( 'navbar', array(
		'title' => 'Navbar',
	) );

	$wp_customize->add_setting( 'navbar_bg', array(
		'default'           => 'bg-primary',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'navbar_bg', array(
		'label'   => 'Navbar Background',
		'section' => 'navbar',
		'type'    => 'radio',
		'choices' => array(
			'bg-primary' => 'bg-primary',
			'bg-dark'    => 'bg-dark',
		),
	) );

}

add_action( 'customize_register', 'customizer_demo_navbar_customize_register' );


function customizer_demo_sample_customize_register( WP_Customize_Manager $wp_customize ) {

	$wp_customize->add_section( 'sample', array(
		'title' => 'Sample',
	) );

	$wp_customize->add_setting( 'sample_text', array(
		'sanitize_callback' => 'esc_html',
		'default'           => 'Hello!',
	) );

	$wp_customize->add_control( 'sample_text', array(
		'label'   => 'Text',
		'section' => 'sample',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'sample_checkbox', array(
		'sanitize_callback' => 'esc_html',
		'default'           => false,
	) );

	$wp_customize->add_control( 'sample_checkbox', array(
		'label'   => 'Checkbox',
		'section' => 'sample',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'sample_radio', array(
		'sanitize_callback' => 'esc_html',
		'default'           => 'option2',
	) );

	$wp_customize->add_control( 'sample_radio', array(
		'label'   => 'Radio',
		'section' => 'sample',
		'type'    => 'radio',
		'choices' => array(
			'option1' => 'Option 1',
			'option2' => 'Option 2',
		),
	) );

	$wp_customize->add_setting( 'sample_select', array(
		'sanitize_callback' => 'esc_html',
		'default'           => 'option1',
	) );

	$wp_customize->add_control( 'sample_select', array(
		'label'   => 'Select',
		'section' => 'sample',
		'type'    => 'select',
		'choices' => array(
			'option1' => 'Option 1',
			'option2' => 'Option 2',
		),
	) );

	$wp_customize->add_setting( 'sample_textarea', array(
		'sanitize_callback' => 'esc_html',
		'default'           => 'Hello!',
	) );

	$wp_customize->add_control( 'sample_textarea', array(
		'label'   => 'Text',
		'section' => 'sample',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'sample_page', array(
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'sample_page', array(
		'label'   => 'Text',
		'section' => 'sample',
		'type'    => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'sample_date', array(
		'sanitize_callback' => 'esc_html',
		'default'           => '2018-01-31',
	) );

	$wp_customize->add_control( 'sample_date', array(
		'label'   => 'Date',
		'section' => 'sample',
		'type'    => 'date',
	) );


}

add_action( 'customize_register', 'customizer_demo_sample_customize_register' );

function customizer_demo_advanced_sample_customize_register( WP_Customize_Manager $wp_customize ) {

	$wp_customize->add_section( 'advanced_sample', array(
		'title' => 'Advanced',
	) );

	$wp_customize->add_setting( 'advanced_sample_color', array(
		'sanitize_callback' => 'esc_html',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advanced_sample_color', array(
		'label'   => 'Color',
		'section' => 'advanced_sample',
	)));

	$wp_customize->add_setting( 'advanced_sample_media', array(
		'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'advanced_sample_media', array(
		'label'   => 'Media',
		'section' => 'advanced_sample',
	)));

}
add_action( 'customize_register', 'customizer_demo_advanced_sample_customize_register' );