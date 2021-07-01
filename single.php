<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wordpress_BEMUNS
 */

get_header();
?>

<main id="primary" class="single-main container min-vh-100 py-5">

	<div class="row">

		<section class="col-lg-7 mb-lg-0 mb-4">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if(has_post_thumbnail()): ?>
			<figure class="figure w-100">
				<img src="<?= esc_url(the_post_thumbnail_url()) ?>" alt="<?= esc_attr(get_the_title()) ?>"
					class="figure-img single-thumbnail">
				<?php if(the_post_thumbnail_caption()): ?>
				<figcaption class="figure-caption small-responsive text-secondary link-fwb-primary">
					<?php the_post_thumbnail_caption() ?>
				</figcaption>
				<?php endif; ?>
			</figure>
			<?php endif; ?>
			<?php 
				// Menangkap array yang menyimpan kategori
				$categories = get_the_category();
				// Get the ID of a given category
				$category_id = get_cat_ID($categories[0]->name);
				// Get the URL of this category
				$category_link = get_category_link($category_id);
			?>
			<header class="mb-3">
				<?php if (!empty($categories)): ?>
				<a href="<?= esc_url($category_link); ?>"
					class="badge bg-dark text-white text-decoration-none rounded-0"><?= esc_html($categories[0]->name); ?></a>
				<?php endif; ?>
				<h1 class="fw-bold lh-base">
					<?php the_title() ?>
				</h1>
				<p class="fs-responsive text-secondary">
					<a href="<?= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
						title="<?= esc_attr( get_the_author() ); ?>" class="text-secondary text-decoration-none">
						<?= ucfirst(get_the_author()); ?>
					</a>
					•
					<time datetime="get_the_date('U')"><?= get_the_date('l, j F Y') ?></time>
				</p>
			</header>
			<article class="single-content">
				<?php the_content() ?>
			</article>
			<footer>
				<?php
				$post_tags = get_the_tags();
				if ($post_tags) :
				foreach ($post_tags as $tag):
				?>
				<a href="<?= get_tag_link($tag->term_id); ?>"
					class="badge text-white bg-dark text-decoration-none rounded-0" title="<?= $tag->name; ?>">
					<i class="fa fa-hashtag"></i>
					<?= preg_replace('/\s+/', '', $tag->name); ?>
				</a>
				<?php endforeach; ?>
				<?php endif; ?>
			</footer>
			<hr>
			<?php 
				if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;
			?>
			<?php endwhile; ?>
			<?php endif; ?>
		</section>
		<section class="col-lg-5">
			<?php get_sidebar() ?>
		</section>

	</div>

</main><!-- #main -->


<?php get_footer();