<?php if(get_theme_mod('judul_platform')): ?>
<div id="platform" class="container mb-5">
    <div class="row">
        <div class="col-lg-4 col-md-6 mt-md-auto mb-md-auto mb-3">
            <div class="h-bg position-absolute text-uppercase fw-bold text-center d-md-block d-none">
                <?= get_theme_mod('teks_background_platform') ?></div>
            <p class="text-md-start text-center"><?= get_theme_mod('sub_judul_platform') ?></p>
            <h2 class="display-5 fw-bold lh-base text-md-start text-center">
                <?= get_theme_mod('judul_platform') ?>
            </h2>
        </div>
        <div class="col-lg-8 col-md-6 row vh-100 overflow-scroll p-md-5 py-5 px-4 justify-content-end">
            <?php for($i=1;$i<= get_theme_mod('jumlah_platform') ;$i++): ?>
            <ul class="col-lg-5 list-unstyled">
                <li class="platform-item rounded border-0 bg-white mb-4">
                    <h3 class="fs-5 text-center"><?= get_theme_mod('nama_platform_'.$i) ?></h3>
                    <img src="<?= esc_url(get_theme_mod('logo_platform_'.$i)) ?>" class="img-fluid img-cover mb-3 p-3">
                    <p class="fw-light fs-responsive text-center mb-0">
                        <?= get_theme_mod('deskripsi_platform_'.$i) ?>
                    </p>
                </li>
            </ul>
            <?php endfor; ?>
        </div>
    </div>
</div>
<?php endif; ?>