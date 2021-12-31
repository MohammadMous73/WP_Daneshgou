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
						<div class="title"><h2><span class="glyphicon glyphicon-star" aria-hidden="true"></span><?php the_title(); ?></h2></div>
        					<div class="info">
							<p>
								<span aria-hidden="true"><?php comments_popup_link('نظر %' , '1 نظر' , 'بدون نظر'); ?></span> 
								<span aria-hidden="true"><?php the_time('d M Y'); ?></span> 
								<span aria-hidden="true"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' قبل '; ?></span> 
								<span aria-hidden="true"><?php the_category(' , '); ?></span> 
							</p>
								</div>
							</div>
								<div class="col-xs-12 download">
									<?php if(get_post_meta($post->ID, "type",true) ) { ?><p><span class="glyphicon glyphicon-file" aria-hidden="true"></span><b> نوع فـایـل  :</b><?php echo get_post_meta($post->ID, "type", true); ?> </p><?php }?>
									<?php if(get_post_meta($post->ID, "Size",true) ) { ?><p><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><b> حجم فایل : </b><?php echo get_post_meta($post->ID, "Size", true); ?> </p><?php }?>
									<?php if(get_post_meta($post->ID, "Source",true) ) { ?><p><span class="glyphicon glyphicon-home" aria-hidden="true"></span><b> منبـــــع : </b><?php echo get_post_meta($post->ID, "Source", true); ?> </p><?php }?>
									<?php if(get_post_meta($post->ID, "download_help",true) ) { ?><p><span class="glyphicon glyphicon-download" aria-hidden="true"></span><b><a href="https://dl.motamem.org/Learning-ed.mp3">دانلود با لینک کمکی</a></b><?php echo get_post_meta($post->ID, "download_help", true); ?> </p><?php }?>
									<?php if(get_post_meta($post->ID, "download",true) ) { ?><p><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span><b><a href="https://dl.motamem.org/Learning-ed.mp3">دانلود با لینک مستقیم</a></b><?php echo get_post_meta($post->ID, "download", true); ?> </p><?php }?>
								</div> 
						</article>

						
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