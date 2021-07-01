<?php if(get_theme_mod('judul_video')): ?>
<div id="video" class="my-5 min-vh-100 d-flex flex-column justify-content-center align-items-center">
    <marquee class="d-md-block d-none h-bg position-absolute text-uppercase fw-bold text-center">
        <?= get_theme_mod('judul_video') ?>
    </marquee>
    <h2 class="display-5 fw-bold mb-5"><?= get_theme_mod('judul_video') ?></h2>
    <div class="col-lg-7 col-md-10">
        <div class="ratio ratio-16x9">
            <iframe class="rounded" src="<?= esc_url(get_theme_mod('url_link_video')) ?>" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </div>
</div>
<?php endif; ?>