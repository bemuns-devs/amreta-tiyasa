<?php if(!is_front_page()): ?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark d-block w-100" id="primaryNavbar">
    <?php else: ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent position-absolute w-100 py-4" id="primaryNavbar">
        <?php endif; ?>
        <div class="container px-sm-1 px-4">
            <!-- Your site title as branding in the menu -->
            <?php if ( has_custom_logo() ) : ?>
            <?php
                $logo = get_theme_mod('custom_logo');
                $logo_image = wp_get_attachment_image_src($logo, 'full');
                $logo_image_url = $logo_image[0];
            ?>
            <!-- Navbar Brand -->
            <a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
                <img id="navbarBrandImage" class="img-fluid navbar-brand-logo"
                    src="<?php echo esc_url($logo_image_url); ?>" alt="<?= esc_attr(get_bloginfo( 'name' )); ?>">
            </a>
            <?php else: ?>
            <?php if ( is_front_page() && is_home() ) : ?>

            <h1 class="navbar-brand"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                    itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

            <?php else : ?>

            <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                title="<?= esc_attr(get_bloginfo( 'name' )); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

            <?php endif; ?>
            <?php endif; ?>
            <button title="<?= esc_attr(get_bloginfo( 'name' )); ?>" id="navbarToggler"
                class="navbar-toggler border-0 text-secondary" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbarCollapse" aria-controls="mainNavbarCollapse" aria-expanded="false">
                <i id="navbarTogglerIcon" class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbarCollapse">
                <?php
            wp_nav_menu(array(
                'theme_location' => 'main-navbar',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="mainNavbarNav" class="navbar-nav ms-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
            </div>
        </div>
    </nav>