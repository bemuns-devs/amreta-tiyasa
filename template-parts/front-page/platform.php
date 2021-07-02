<?php if(get_theme_mod('judul_platform')): ?>
<div id="platform" class="container mb-5">
    <div class="row">
        <div class="col-xl-5 col-lg-4 col-10 mx-auto mt-md-auto mb-md-auto mb-3 text-md-start text-center">
            <div class="h-bg position-absolute text-uppercase fw-bold text-center d-md-block d-none">
                <?= get_theme_mod('teks_background_platform') ?></div>
            <p><?= get_theme_mod('sub_judul_platform') ?></p>
            <h2 class="display-5 fw-bold lh-base">
                <?= get_theme_mod('judul_platform') ?>
            </h2>
        </div>
        <div class="col-xl-7 col-lg-8 col-md-11 mx-auto vh-100 overflow-scroll py-5 px-5 d-flex justify-content-center">
            <div class="w-100 row platform-wrap">
                <?php for($i=1;$i<= get_theme_mod('jumlah_platform') ;$i++): ?>
                <div class="platform-item text-center mb-4">
                    <h3 class="fs-6"><?= get_theme_mod('nama_platform_'.$i) ?></h3>
                    <img src="<?= esc_url(get_theme_mod('logo_platform_'.$i)) ?>" class="platform-img my-3"
                        alt="<?= esc_attr(get_theme_mod('nama_platform_'.$i)) ?>">
                    <p class="fw-light small mb-0">
                        <?= get_theme_mod('deskripsi_platform_'.$i) ?>
                    </p>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>