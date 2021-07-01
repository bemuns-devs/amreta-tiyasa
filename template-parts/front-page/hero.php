<?php if(get_theme_mod('judul_hero')): ?>
<div id="hero" class="mb-5">
    <div class="container py-5">
        <div class="row vh-100">
            <header class="order-md-1 order-2 col-lg-6 col-md-7 m-auto text-md-start text-center">
                <h1 class="display-4 fw-bold"><?= get_theme_mod('judul_hero') ?></h1>
                <p class="lead fs-4"><?= get_theme_mod('deskripsi_hero') ?></p>
                <a href="<?= esc_url(get_theme_mod('url_link_hero')) ?>"
                    class="btn btn-dark px-4 py-2 rounded-pill shadow-none"><?= get_theme_mod('label_link_hero') ?></a>
            </header>
            <figure
                class="order-md-2 order-1 col-lg-6 col-md-4 m-md-auto mx-auto mt-auto d-flex justify-content-center">
                <img src="<?= esc_url(get_theme_mod('gambar_hero')) ?>" class="col-lg-6 col-md-12 col-6">
            </figure>
        </div>
    </div>
</div>
<?php endif; ?>