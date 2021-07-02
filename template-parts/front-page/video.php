<?php if(get_theme_mod('judul_video')): ?>
<div id="video" class="my-5 py-5 d-flex flex-column justify-content-center align-items-center">
    <marquee class="d-md-block d-none h-bg position-absolute text-uppercase fw-bold text-center">
        <?= get_theme_mod('judul_video') ?>
    </marquee>
    <h2 class="display-5 fw-bold mb-5"><?= get_theme_mod('judul_video') ?></h2>
    <div class="col-lg-7 col-10">
        <div class="ratio ratio-16x9">
            <iframe class="rounded bg-dark" src="<?= esc_url(get_theme_mod('url_link_video')) ; ?>"
                title="<?= esc_attr(get_theme_mod('judul_video')) ?>" srcdoc="<style>
                    * {
                        padding: 0;
                        margin: 0;
                        overflow: hidden
                    }

                    html,
                    body {
                        height: 100%
                    }

                    img,
                    span {
                        position: absolute;
                        width: 100%;
                        top: 0;
                        bottom: 0;
                        margin: auto
                    }

                    span {
                        height: 1.5em;
                        text-align: center;
                        font: 48px/1.5 sans-serif;
                        color: white;
                        text-shadow: 0 0 0.5em black
                    }
                </style>
                <a href=<?= esc_url(get_theme_mod('url_link_video')) ?>?autoplay=1><img
                        src=<?= esc_url(get_theme_mod('gambar_video')); ?>><span></span></a>" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                alt="<?= esc_attr(get_theme_mod('judul_video')) ?>" allowfullscreen></iframe>
        </div>
    </div>
</div>
<?php endif; ?>