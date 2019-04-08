<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder <?php the_seach_query(); ?> />
        <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
</form>