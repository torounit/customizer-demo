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
		'title'    => __( 'jumbotron' ),
		'priority' => 130,
	) );

	/**
	 * Title.
	 */
	$wp_customize->add_setting( 'jumbotron_title', array(
		'default' => 'Hello World!',
		'sanitize_callback' => 'esc_html',
	));

	/* Need after register setting. */
	$wp_customize->add_control( 'jumbotron_title', array(
		'section' => 'jumbotron',
		'label'   => __( 'Jumbotron Title', 'demo' ),
	));

	/**
	 * lead.
	 */
	$wp_customize->add_setting( 'jumbotron_lead', array(
		'default' => 'It uses utility classes for typography and spacing to space content out within the larger container.',
		'sanitize_callback' => 'esc_html',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'jumbotron_lead', array(
		'section' => 'jumbotron',
		'label'   => __( 'Jumbotron Description', 'demo' ),
		'description' => __( 'Support Selective Refresh', 'demo' ),
	));

	/**
	 * Support Selective Refresh.
	 */
	$wp_customize->selective_refresh->add_partial( 'jumbotron_lead', array(
		'selector'        => '.jumbotron .lead',
		'render_callback' => function() {
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
		'title'    => __( 'Navbar', 'customizer-demo' ),
	) );

	$wp_customize->add_setting( 'navbar_bg', array(
		'default'           => 'bg-primary',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'navbar_bg', array(
		'label'       => __( 'Navbar Background', 'customizer-demo' ),
		'section'     => 'navbar',
		'type'        => 'radio',
		'choices'     => array(
			'bg-primary' => __( 'bg-primary', 'customizer-demo' ),
			'bg-dark' => __( 'bg-dark', 'customizer-demo' ),
		),

	) );

}
add_action( 'customize_register', 'customizer_demo_navbar_customize_register' );