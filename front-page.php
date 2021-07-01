<?php
/**
 * The template for front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wordpress_BEMUNS
 */

get_header();

?>

<div id="particles-js" class="position-fixed h-100 w-100"></div>

<?php
get_template_part('template-parts/front-page/hero');
get_template_part('template-parts/front-page/platform');
get_template_part('template-parts/front-page/video');
get_template_part('template-parts/front-page/informasi');

get_footer();