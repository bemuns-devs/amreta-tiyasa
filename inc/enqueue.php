<?php

/**
 * Enqueue scripts and styles.
 */
function wp_bemuns_scripts() {
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style('theme', get_template_directory_uri() . '/css/theme.css');

	/**
	 * Google Font
	 */
	wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;0,800;1,300;1,400;1,500;1,700;1,800&display=swap');

	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'jquery-3.6.0', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array(), null, false);
	
	if (is_front_page()) {
		wp_enqueue_script( 'particle', get_template_directory_uri() . '/js/particles.min.js', array(), null, true);
		
		wp_enqueue_script( 'images-loaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), null, false);

		wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array(), null, false);

		wp_enqueue_script( 'front-page', get_template_directory_uri().'/js/front-page.js', array(),
		_S_VERSION, true);
	} else {
		wp_enqueue_script( 'pages', get_template_directory_uri().'/js/pages.js', array(),
		_S_VERSION, true);
	}

	wp_enqueue_script( 'theme', get_template_directory_uri().'/js/theme.js', array(), _S_VERSION, true);

	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), _S_VERSION, true);

	/**
	* Font Awesome Icon
	*/
	wp_enqueue_script( 'font-awesome', get_template_directory_uri() . '/js/font-awesome.min.js',
	array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_bemuns_scripts' );