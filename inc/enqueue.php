<?php

/**
 * Enqueue scripts and styles.
 */
function wp_bemuns_scripts() {
	wp_enqueue_style( 'wp_bemuns-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wp_bemuns-style', 'rtl', 'replace' );

	/**
	 * Google Font
	 */
	wp_enqueue_style('wp_bemuns-gfont-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;0,800;1,300;1,400;1,500;1,700;1,800&display=swap');
	
	/**
	 * Bootstrap & Own CSS
	 */
	wp_enqueue_style('wp_bemuns-bootstrapcss', get_template_directory_uri() . '/css/theme.css');

	/**
	 * Font Awesome Icon
	 */
	wp_enqueue_script( 'wp_bemuns-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js',
	array(), _S_VERSION, false );

	wp_enqueue_script( 'wp_bemuns-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'jquery-3.6.0', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array(), null, false);

	if (is_front_page()) {
		wp_enqueue_script( 'particlejs', get_template_directory_uri() . '/js/particles.min.js', array(), null, true);

		wp_enqueue_script( 'masonry', 'https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js', array(),
		null, true);

		wp_enqueue_script( 'wp_bemuns-front-page', get_template_directory_uri().'/js/front-page.js', array(),
		_S_VERSION, true);
	} else {
		wp_enqueue_script( 'wp_bemuns-pages', get_template_directory_uri().'/js/pages.js', array(),
		_S_VERSION, true);
	}

	wp_enqueue_script( 'wp_bemuns-themejs', get_template_directory_uri().'/js/theme.js', array(), _S_VERSION, true);

	wp_enqueue_script( 'wp_bemuns-bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array(), _S_VERSION, true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_bemuns_scripts' );