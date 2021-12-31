<?php get_header();?>
	
		<div class="row home_bg">
		<?php if ( is_active_sidebar( 'blog_sidebar' ) ) { ?>
			<div class="col-md-9 col-sm-8 col-xs-12 pull-left">
	<?php } ?>
				<?php  if( have_posts() ) : ?>
				<header class="title"><h2><?php single_cat_title(); ?></h2></header>
				<?php while( have_posts() ) : the_post(  ); ?>
				<article class="blog_article">
					<?php if(has_post_thumbnail()) { ?>
					<div class="blog_data">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'category-thumb' ) ?></a>
					</div>
					<div class="blog_content">
					<?php }else {?>
						<div class="blog_content_all">
						<?php }?>
						<div class="info">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p>
								<span  aria-hidden="true"><?php comments_popup_link('نظر %' , '1 نظر' , 'بدون نظر'); ?></span> 
								<span  aria-hidden="true"><?php the_time('d M Y'); ?></span> 
								<span  aria-hidden="true"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' قبل '; ?></span> 
								<span  aria-hidden="true"><?php the_category(' , '); ?></span> 
							</p>
						</div>
						<?php the_excerpt(); ?>
					</div>
				</article>
				<?php endwhile;?>
					<div class="col-lg-12 pagination"><?php pagination_m();?></div>
				<?php else : ?>
					<header class="title"><h2>هیچ محتوایی هنوز در این قسمت بارگذاری نشده است.</h2></header>
				<?php endif;?>
				
				<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
			</div>
				<aside class="col-md-3 col-sm-4 col-xs-12 pl0 pull-right">
					<div class="sidebar">
						<?php get_sidebar(); ?>
				</div>
			</aside>
			<?PHP endif ?>
		</div>
		<?php get_footer();?>