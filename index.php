<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wordpress_BEMUNS
 */

get_header();
?>

<main id="primary" class="site-main container min-vh-100 py-5">

	<div class="row">

		<section class="col-lg-7 mb-lg-0 mb-4">
			<h1 class="posts-title fw-bold <?= (!is_home() && !is_search()) ? 'h5' : 'h1' ; ?>">
				<?php 
					if (is_home()) single_post_title();
					if (is_search()) echo 'Cari';
					if (is_category()) single_cat_title();
					if (is_tag()) single_tag_title();
					if (is_author()) the_author();
				?>
			</h1>
			<?php if(is_search()): ?>
			<p class="fs-responsive">
				<?php 
					if (is_search()) echo 'Hasil pencarian dari frasa <strong>' . get_search_query().'</strong>.';
				?>
			</p>
			<?php endif; ?>
			<?php if(have_posts()): ?>
			<?php get_template_part('template-parts/content-archive') ?>
			<?php else: ?>
			<figure class="ps-3 border-start border-3 border-dark">
				<blockquote class="blockquote mb-4">
					<p class="lead">
						Kadang-kadang langit bisa kelihatan seperti lembar kosong. Padahal sebenarnya tidak.
						Bintang kamu tetap di sana.
						Bumi hanya sedang berputar.
					</p>
				</blockquote>
				<figcaption class="blockquote-footer">
					<cite title="Dee Lestari (Perahu Kertas)">Dee Lestari (Perahu Kertas)</cite>
				</figcaption>
			</figure>
			<?php endif; ?>
		</section>
		<section class="col-lg-5">
			<?php get_sidebar() ?>
		</section>

	</div>

</main><!-- #main -->

<?php get_footer();