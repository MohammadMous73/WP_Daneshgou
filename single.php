<?php get_header();?> 
<div class="row home_bg">
			<?php if ( is_active_sidebar( 'single_sidebar' ) ) { ?>
			<div class="col-md-9 col-sm-8 col-xs-12 pr0 pull-left">
    <?php } ?>
            <?php if( have_posts()) : while(have_posts()):the_post(  ); ?>
				<article class="col-xs-12 pl0">
                    <?php if(has_post_thumbnail()) { ?>
                        <div class="blog_data-single">
                            <?php the_post_thumbnail( 'single-thumb' ) ?>
                        </div>
                    <?php }?>
					<div class="col-xs-12 single_article">
						<div class="title"><h2><a href="#"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><?php the_title(); ?></a></h2></div>
                        

						<div class="info">
                                <?php the_tags( '<p>برچسب: ',' , ','</p>' ); ?>
								<span aria-hidden="true"><?php comments_popup_link('نظر %' , '1 نظر' , 'بدون نظر'); ?></span> 
								<span aria-hidden="true"><?php the_time('d M Y'); ?></span> 
								<span aria-hidden="true"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' قبل '; ?></span> 
						</div>
						<?php the_content(); ?>
					</div>
				</article>
				<?php endwhile; endif;?>
					
				<?php if ( is_active_sidebar( 'single_sidebar' ) ) : ?>
			</div>
			<aside class="col-md-3 col-sm-4 col-xs-12 pl0 pull-right">
					<div class="sidebar">
						
						<?php get_sidebar(); ?>
						
					</div>
				</div>
			</aside>
			<?PHP endif ?>
		</div>
<?php get_footer();?>