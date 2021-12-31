<?php get_header();?>
		<div class="row home_bg">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
				  <div class="item active">
					<img src="<?php echo get_template_directory_uri(); ?>/img/carousel.jpg" alt="...">
				  </div>
				  <div class="item">
					<img src="<?php echo get_template_directory_uri(); ?>/img/carousel.jpg" alt="...">
				  </div>
				</div>
			  
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
			
			<header class="header_title"><h2><?php single_cat_title(); ?></h2></header>
			<div class="line">
				<article class="col-sm-4 col-xs-12 my_article">
				<?php if(has_post_thumbnail()) { ?>
					<div class="col-xs-12 article">
						<div class="img">
							<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'category-thumb' ) ?></a>
						</div>
						<?php }else {?>
							<div class="blog_content_all">
						<?php }?>
						<div class="info">
							<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
							<p>
								<span  aria-hidden="true"><?php comments_popup_link('نظر %' , '1 نظر' , 'بدون نظر'); ?></span> 
								<span  aria-hidden="true"><?php the_time('d M Y'); ?></span> 
								<span  aria-hidden="true"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' قبل '; ?></span> 
								<span  aria-hidden="true"><?php the_category(' , '); ?></span> 
							</p>
						</div>
						<div class="content">
							<p><?php the_excerpt(); ?></p>
						</div>
					</div>
				</article>
			</div>
		</div>

<?php get_footer();?>