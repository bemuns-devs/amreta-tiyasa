<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordpress_BEMUNS
 */

if ( ! is_active_sidebar( 'sidebar-kanan' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area px-lg-5">
	<?php dynamic_sidebar( 'sidebar-kanan' ); ?>
</aside><!-- #secondary -->