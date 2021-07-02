<?php if(get_theme_mod('judul_informasi')): ?>
<?php 
    $latest_blog_posts = new WP_Query(array(
          'posts_per_page' => get_theme_mod('jumlah_informasi')
    ));
?>
<div id="informasi" class="bg-gradient-bem py-4">
    <div class="container d-lg-flex align-items-lg-center">
        <h2 class="fw-bold h5 ls-half mb-lg-0 me-3"><?= get_theme_mod('judul_informasi') ?></h2>
        <div class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ul class="carousel-inner list-unstyled mb-lg-0">
                <?php if($latest_blog_posts->have_posts()) : ?>
                <?php $i = 1; ?>
                <?php while($latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); ?>
                <li class="carousel-item <?= ($i == 1) ? 'active' : '' ; $i++ ?>">
                    <a href="<?= esc_url(the_permalink()) ?>" class="fs-responsive text-decoration-none text-body"
                        title="<?= esc_attr(the_title()) ?>">
                        <?php $judul_pos = wp_trim_words(get_the_title(), 6); ?>
                        <?= $judul_pos ?>
                    </a>
                </li>
                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
        <?php if(get_theme_mod('url_link_informasi')): ?>
        <a href="<?= get_theme_mod('url_link_informasi') ?>"
            class="fs-responsive btn border-2 border-dark text-dark fw-semibold ms-auto"
            title="<?= esc_attr(get_theme_mod('label_link_informasi')) ?>">
            <?= get_theme_mod('label_link_informasi') ?>
        </a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>