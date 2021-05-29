<?php defined('ABSPATH') or die('Nice Try!'); ?>

<?php get_header() ?>

<article id="post-news-<?php echo get_the_Id() ?>" class="post-news">
    <?php
        if( have_posts() ):
            while( have_posts() ):
                the_post();
                the_title();
                the_content();
            endwhile;
        endif;
    ?>
</article>

<?php get_footer() ?>
