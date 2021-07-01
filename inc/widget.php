<?php 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bemuns_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Kanan', 'wp_bemuns' ),
			'id'            => 'sidebar-kanan',
			'description'   => esc_html__( 'Add widgets here.', 'wp_bemuns' ),
			'before_widget' => '<section id="%1$s" class="widget mb-4 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title h5 fw-bold">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'wp_bemuns_widgets_init' );

add_filter( 'widget_tag_cloud_args', 'change_tag_cloud_font_sizes');
/**
 * Change the Tag Cloud's Font Sizes.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function change_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '10';
    $args['largest'] = '10';

    return $args;
}