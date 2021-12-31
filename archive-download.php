<?php get_header();?>
	
		<div class="row home_bg">
		<?php if ( is_active_sidebar( 'blog_sidebar' ) ) { ?>
			<div class="col-md-9 col-sm-8 col-xs-12 pull-left">
	<?php } ?>
				<header class="title"><h2><?php single_cat_title(); ?></h2></header>
				<?php if( have_posts()) : while(have_posts()):the_post(  ); ?>
				
				<div class="col-xs-5  article">
						
						<div class="info">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'category-thumb' ) ?></a>
						</div>
				</div>
				<?php endwhile;?>
					<div class="col-lg-12 pagination"><?php pagination_m();?></div>
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