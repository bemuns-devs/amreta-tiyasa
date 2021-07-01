<?php while(have_posts()) : the_post(); ?>
<article class="row align-items-center py-3 mb-3">
    <header class="col-md-8 order-md-1 order-2">
        <h2 class="h5 fw-bold">
            <a href="<?= esc_url(get_the_permalink()) ?>" class="text-dark text-decoration-none"
                title="<?= esc_attr(get_the_title()) ?>">
                <?php the_title() ?>
            </a>
        </h2>
        <p class="fs-responsive text-secondary">
            <?= wp_trim_words(get_the_excerpt(), 12, '&nbsp;[...]') ?>
        </p>
        <small class="small-responsive fw-light text-secondary">
            <time datetime="<?= esc_attr(get_the_date('c')); ?>">
                <?= human_time_diff(get_the_date('U'), current_time('U')) . '&nbsp;yang lalu' ?>
            </time>
        </small>
    </header>
    <a href="<?= esc_url(get_the_permalink()) ?>"
        class="col-md-4 posts-thumbnail-wrapper p-md-0 ms-md-auto mb-md-0 mb-3 text-decoration-none order-md-2 order-1">
        <img src="<?= esc_url(the_post_thumbnail_url()) ?>" class="posts-thumbnail img-cover"
            alt="<?= esc_attr(the_title()) ?>" loading="lazy" title="<?= esc_attr(get_the_title()) ?>">
    </a>
</article>
<?php endwhile; ?>
<nav class="d-flex justify-content-md-start justify-content-center">
    <?= bemuns_pagination(); ?>
</nav>