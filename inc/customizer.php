<?php
/**
 * Wordpress BEMUNS Theme Customizer
 *
 * @package Wordpress_BEMUNS
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wp_bemuns_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'wp_bemuns_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'wp_bemuns_customize_partial_blogdescription',
			)
		);
	}

	// Sanitize File (Gambar)
	function wp_bemuns_sanitize_image( $file, $setting ) {
			
		//allowed file types
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png'
		);
			
		//check file type from file name
		$file_ext = wp_check_filetype( $file, $mimes );
			
		//if file has a valid mime type return it, otherwise return default
		return ( $file_ext['ext'] ? $file : $setting->default );
	}

	// Hero
	$wp_customize -> add_section('section_hero', array(
		'title' => __('Hero', 'wp_bemuns_customizer'),
		'description' => sprintf(__('Edit bagian hero', 'wp_bemuns_customizer')),
		'active_callback'=> 'is_front_page',
		'priority' => 120
	));

	// Hero Judul Section
	$wp_customize -> add_setting('judul_hero', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize -> add_control('judul_hero', array(
		'label' => __('Judul', 'wp_bemuns_customizer'),
		'type' => 'text',
		'section' => 'section_hero',
	));

	// Hero Deskripsi
	$wp_customize -> add_setting('deskripsi_hero', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_html'
	));

	$wp_customize -> add_control('deskripsi_hero', array(
		'label' => __('Deskripsi', 'wp_bemuns_customizer'),
		'type' => 'textarea',
		'section' => 'section_hero',
	));

	// Hero Link Label
	$wp_customize -> add_setting('label_link_hero', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize -> add_control('label_link_hero', array(
		'label' => __('Label Link', 'wp_bemuns_customizer'),
		'type' => 'text',
		'section' => 'section_hero',
	));

	// Hero Link URL
	$wp_customize -> add_setting('url_link_hero', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize -> add_control('url_link_hero', array(
		'label' => __('URL Link', 'wp_bemuns_customizer'),
		'type' => 'url',
		'section' => 'section_hero',
	));

	// Gambar Hero
	$wp_customize -> add_setting('gambar_hero', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'wp_bemuns_sanitize_image'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gambar_hero', array(
		'label' => 'Gambar',
		'section' => 'section_hero',
		'settings' => 'gambar_hero',
		'button_labels' => array(// All These labels are optional
					'select' => 'Unggah Gambar',
					'remove' => 'Hapus Gambar',
					'change' => 'Ganti Gambar',
					)
	)));

	/***
	 * Platform
	 * 
	 */

	// Platform Panel
	$wp_customize->add_panel( 'platform_panel', array(
		'title'          => 'Platform',
		'active_callback'=> 'is_front_page',
	) );
			
	// Platform Sections
	$wp_customize->add_section( 'pengaturan_platform' , array(
		'title'             => 'Pengaturan',
		'panel'             => 'platform_panel',
		'active_callback'   => 'is_front_page',
	) );
			
	for ($i=1; $i <= get_theme_mod('jumlah_platform'); $i++) { 
		$wp_customize->add_section( 'platform_item_'.$i , array(
			'title' => 'Platform Item #'.$i,
			'panel' => 'platform_panel',
			'active_callback' => 'is_front_page',
		) );
	}
			
	// Platform Settings
	$wp_customize->add_setting( 'judul_platform' , array(
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'judul_platform_control', array(
		'label'      => 'Judul',
		'section'    => 'pengaturan_platform',
		'settings'   => 'judul_platform',
		'type'       => 'text',
	) );
			
	$wp_customize->add_setting( 'sub_judul_platform' , array(
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'sub_judul_platform_control', array(
		'label'      => 'Sub Judul',
		'section'    => 'pengaturan_platform',
		'settings'   => 'sub_judul_platform',
		'type'       => 'text',
	) );

	$wp_customize->add_setting( 'teks_background_platform' , array(
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'teks_background_platform_control', array(
		'label'      => 'Teks Background',
		'section'    => 'pengaturan_platform',
		'settings'   => 'teks_background_platform',
		'type'       => 'text',
	) );
			
	$wp_customize->add_setting( 'jumlah_platform' , array(
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'jumlah_platform_control', array(
		'label'      => 'Jumlah Platform',
		'section'    => 'pengaturan_platform',
		'settings'   => 'jumlah_platform',
		'type'       => 'number',
			'input_attrs'=> array( 
			'min' => 1,
			),
	) );
			
	for ($i=1; $i <= get_theme_mod('jumlah_platform'); $i++) { 
		$wp_customize->add_setting( 'nama_platform_'.$i, array(
			'type'          => 'theme_mod',
			'transport'     => 'refresh',
		) );
		$wp_customize->add_control( 'nama_platform_'.$i.'_control', array(
			'label'      => 'Nama Platform',
			'section'    => 'platform_item_'.$i,
			'settings'   => 'nama_platform_'.$i,
			'type'       => 'text',
		) );
				
		$wp_customize->add_setting( 'deskripsi_platform_'.$i , array(
			'type'          => 'theme_mod',
			'transport'     => 'refresh',
		) );
		$wp_customize->add_control( 'deskripsi_platform_'.$i.'_control', array(
			'label'      => 'Deskripsi Platform',
			'section'    => 'platform_item_'.$i,
			'settings'   => 'deskripsi_platform_'.$i,
			'type'       => 'textarea',
		) );
				
		$wp_customize->add_setting( 'logo_platform_'.$i , array(
			'type'          => 'theme_mod',
			'transport'     => 'refresh',
			'sanitize_callback' => 'wp_bemuns_sanitize_image'
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_platform_'.$i.'_control', array(
		'label' => 'Logo Platform',
		'section' => 'platform_item_'.$i,
		'settings' => 'logo_platform_'.$i,
		'button_labels' => array(// All These labels are optional
			'select' => 'Unggah Logo',
			'remove' => 'Hapus Logo',
			'change' => 'Ganti Logo',
			)
		)));
	}

	/***
	 * Video
	 */

	$wp_customize -> add_section('section_video', array(
		'title' => __('Video', 'wp_bemuns_customizer'),
		'active_callback'=> 'is_front_page',
	));

	// Video Judul Section
	$wp_customize -> add_setting('judul_video', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize -> add_control('judul_video', array(
		'label' => __('Judul Video', 'wp_bemuns_customizer'),
		'type' => 'text',
		'section' => 'section_video',
	));

	// Video Link URL
	$wp_customize -> add_setting('url_link_video', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize -> add_control('url_link_video', array(
		'label' => __('URL Link Video', 'wp_bemuns_customizer'),
		'type' => 'url',
		'section' => 'section_video',
	));
	
	// Informasi
	$wp_customize -> add_section('section_informasi', array(
		'title' => __('Informasi', 'wp_bemuns_customizer'),
		'active_callback'=> 'is_front_page',
	));

	// Informasi Judul Section
	$wp_customize -> add_setting('judul_informasi', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize -> add_control('judul_informasi', array(
		'label' => __('Judul', 'wp_bemuns_customizer'),
		'type' => 'text',
		'section' => 'section_informasi',
	));

	$wp_customize->add_setting( 'jumlah_informasi' , array(
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'jumlah_informasi_control', array(
		'label'      => 'Jumlah Informasi',
		'section'    => 'section_informasi',
		'settings'   => 'jumlah_informasi',
		'type'       => 'number',
			'input_attrs'=> array( 
			'min' => 1,
			),
	) );

	// Informasi Link Label
	$wp_customize -> add_setting('label_link_informasi', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize -> add_control('label_link_informasi', array(
		'label' => __('Label Link Informasi', 'wp_bemuns_customizer'),
		'type' => 'text',
		'section' => 'section_informasi',
	));

	// Informasi Link URL
	$wp_customize -> add_setting('url_link_informasi', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize -> add_control('url_link_informasi', array(
		'label' => __('URL Link Informasi', 'wp_bemuns_customizer'),
		'type' => 'url',
		'section' => 'section_informasi',
	));

	/***
	 * Footer
	 */

	// Footer Panel
	$wp_customize->add_panel( 'footer_panel', array(
		'title'          => 'Footer'
	) );

	// Footer Kiri
	$wp_customize -> add_section('section_sekretariat', array(
		'title' => __('Sekretariat', 'wp_bemuns_customizer'),
		'panel' => 'footer_panel'
	));

	// Judul Footer Kiri
	$wp_customize -> add_setting('judul_sekretariat', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize -> add_control('judul_sekretariat', array(
		'label' => __('Judul', 'wp_bemuns_customizer'),
		'type' => 'text',
		'section' => 'section_sekretariat',
	));

	// Footer Kiri Deskripsi
	$wp_customize -> add_setting('deskripsi_sekretariat', array(
		'type' => 'theme_mod'
	));

	$wp_customize -> add_control('deskripsi_sekretariat', array(
		'label' => __('Deskripsi', 'wp_bemuns_customizer'),
		'type' => 'textarea',
		'section' => 'section_sekretariat',
	));

	// Footer Narahubung
	$wp_customize -> add_section('section_narahubung', array(
		'title' => __('Narahubung', 'wp_bemuns_customizer'),
		'panel' => 'footer_panel'
	));

	// Judul Footer Narahubung
	$wp_customize -> add_setting('judul_narahubung', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize -> add_control('judul_narahubung', array(
		'label' => __('Judul', 'wp_bemuns_customizer'),
		'type' => 'text',
		'section' => 'section_narahubung',
	));

	// Jumlah Narahubung
	$wp_customize->add_setting( 'jumlah_narahubung' , array(
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'jumlah_narahubung_control', array(
		'label'      => 'Jumlah Narahubung',
		'section'    => 'section_narahubung',
		'settings'   => 'jumlah_narahubung',
		'type'       => 'number',
			'input_attrs'=> array( 
			'min' => 1,
			),
	) );
		
	for ($i=1; $i <= get_theme_mod('jumlah_narahubung'); $i++) { 
		// Narahubung Link Label
		$wp_customize -> add_setting('label_link_narahubung_'.$i, array(
			'type' => 'theme_mod',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		));

		$wp_customize -> add_control('label_link_narahubung_'.$i, array(
			'label' => __((get_theme_mod('label_link_narahubung_'.$i)) ? get_theme_mod('label_link_narahubung_'.$i) : 'Narahubung #'.$i, 'wp_bemuns_customizer'),
			'type' => 'text',
			'section' => 'section_narahubung',
		));

		// Narahubung Link URL
		$wp_customize -> add_setting('url_link_narahubung_'.$i, array(
			'type' => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		));

		$wp_customize -> add_control('url_link_narahubung_'.$i, array(
			'label' => __((get_theme_mod('label_link_narahubung_'.$i)) ? 'URL ' . get_theme_mod('label_link_narahubung_'.$i) : 'URL Narahubung #'.$i, 'wp_bemuns_customizer'),
			'type' => 'url',
			'section' => 'section_narahubung',
		));	
	}

	// Footer Medsos
	$wp_customize -> add_section('section_medsos', array(
		'title' => __('Medsos', 'wp_bemuns_customizer'),
		'panel' => 'footer_panel'
	));

	// Judul Footer Medsos
	$wp_customize -> add_setting('judul_medsos', array(
		'type' => 'theme_mod',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	));

	$wp_customize -> add_control('judul_medsos', array(
		'label' => __('Judul', 'wp_bemuns_customizer'),
		'type' => 'text',
		'section' => 'section_medsos',
	));

	// Jumlah medsos
	$wp_customize->add_setting( 'jumlah_medsos' , array(
		'type'          => 'theme_mod',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'jumlah_medsos_control', array(
		'label'      => 'Jumlah Medsos',
		'section'    => 'section_medsos',
		'settings'   => 'jumlah_medsos',
		'type'       => 'number',
			'input_attrs'=> array( 
			'min' => 1,
			),
	) );
		
	for ($i=1; $i <= get_theme_mod('jumlah_medsos'); $i++) { 
		// Medsos Link Label
		$wp_customize -> add_setting('nama_medsos_'.$i, array(
			'type' => 'theme_mod',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		));

		$wp_customize -> add_control('nama_medsos_'.$i, array(
			'label' => __((get_theme_mod('nama_medsos_'.$i)) ? ucfirst(get_theme_mod('nama_medsos_'.$i)) : 'Nama Medsos #'.$i, 'wp_bemuns_customizer'),
			'description' => 'Tulis dengan huruf kecil!',
			'type' => 'text',
			'section' => 'section_medsos',
		));

		// medsos Link URL
		$wp_customize -> add_setting('url_link_medsos_'.$i, array(
			'type' => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		));

		$wp_customize -> add_control('url_link_medsos_'.$i, array(
			'label' => __((get_theme_mod('nama_medsos_'.$i)) ? 'URL ' . ucfirst(get_theme_mod('nama_medsos_'.$i)) : 'URL Medsos #'.$i, 'wp_bemuns_customizer'),
			'type' => 'url',
			'section' => 'section_medsos',
		));	
	}
}
add_action( 'customize_register', 'wp_bemuns_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wp_bemuns_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wp_bemuns_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_bemuns_customize_preview_js() {
	wp_enqueue_script( 'wp_bemuns_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'wp_bemuns_customize_preview_js' );