<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordpress_BEMUNS
 */

?>

<div id="footer" class="bg-dark py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-7 col-10 mx-auto mb-lg-0 mb-3">
                <h4 class="fs-18 ls-half fw-bold text-white"><?= get_theme_mod('judul_sekretariat') ?></h4>
                <p class="fs-7 ls-half fw-light text-white mb-0">
                    <?= get_theme_mod('deskripsi_sekretariat') ?>
                </p>
            </div>
            <div class="col-md-4 col-10 mx-auto mb-md-0 mb-3">
                <h4 class="fs-18 ls-half fw-bold text-white"><?= get_theme_mod('judul_narahubung') ?></h4>
                <ul class="text-white fs-7 ls-half fw-light ps-3">
                    <?php for($i = 1;$i <= get_theme_mod('jumlah_narahubung');$i++): ?>
                    <li>
                        <a href="<?= esc_url(get_theme_mod('url_link_narahubung_'.$i)) ?>"
                            title="<?= esc_attr(get_theme_mod('label_link_narahubung_'.$i)) ?>"
                            class="text-white text-decoration-none">
                            <?= get_theme_mod('label_link_narahubung_'.$i) ?>
                        </a>
                    </li>
                    <?php endfor; ?>
                </ul>
            </div>
            <div class="col-lg-4 col-10 ms-lg-auto ms-md-3 mx-auto">
                <h4 class="fs-18 ls-half fw-bold text-white"><?= get_theme_mod('judul_medsos') ?></h4>
                <ul class="list-unstyled d-flex">
                    <?php for($i = 1;$i <= get_theme_mod('jumlah_medsos'); $i++): ?>
                    <li>
                        <a href="<?= get_theme_mod('url_link_medsos_'.$i) ?>" class="text-white fs-4 fw-light me-3"
                            title="<?= ucfirst(esc_attr(get_theme_mod('nama_medsos_'.$i))) ?>">
                            <i class="fab fa-<?= esc_attr(get_theme_mod('nama_medsos_'.$i)) ?>"></i>
                        </a>
                    </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>

</html>