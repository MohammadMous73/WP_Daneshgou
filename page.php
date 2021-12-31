<?php
get_header();?>
    <div class="row home_bg">
        <article class="col-xs-12 single_article">
            <?php if( have_posts()) : while(have_posts()):the_post(  ); ?>
                <div class="title"><h2><a href="#"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><?php single_cat_title(); ?></a></h2></div>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; endif;?>
        </article>
    </div>
<?php get_footer();?>