<form action="<?= esc_url(home_url('/')) ?>" method="get" class="input-group">
    <input type="search" class="search-field form-control border-2 border-dark shadow-none"
        placeholder="<?php echo esc_attr_x( 'Cari …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>"
        name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
    <input type="hidden" value="post" name="post_type" id="post_type" required>
    <button type="submit" id="searchsubmit" value="<?= esc_attr__( 'Cari' ) ?>" class="btn text-white"
        title="<?= esc_attr__( 'Cari' ) ?>">
        <i class="fa fa-search"></i>
    </button>
</form>