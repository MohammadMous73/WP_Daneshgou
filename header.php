<!DOCTYPE html>
<html <?php language_attributes()?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>"

    
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(  ); ?>
</head>
<body <?php body_class(  );?>>
<?php wp_body_open(  );?> 
    <main class="container">
		<header class="row header">
			<?php $logo_image = of_get_option('logo'); if(!empty($logo_image)){?>
				<img src="<?php echo esc_url($logo_image); ?>" alt="<?php bloginfo('name');?>">	
			<?php } else {?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name');?>">
			<?php } ?>
			
			<hgroup id="hgroup">
				<h1><?php bloginfo( 'name' ) ?></h1>
				<h2><?php bloginfo( 'description' ) ?></h2>
			</hgroup>
		</header>
		
		<div class="row">
			<nav class="navbar navbar-inverse" role="navigation">
			<?php wp_nav_menu( array(
				'menu'                 => 'primary_menu',
				'container'            => 'div',
				'container_class'      => 'menu',
				'container_id'         => 'bs-example-navbar-collapse-1',
				'menu_class'           => 'nav navbar-nav',
				'menu_id'              => 'navbar-menu',
				'depth'                => 2,
				'theme_location'       => 'primary_menu',
				'fallback_cb'          => 'wp_bootstrap_navwalker::fallback',
				'walker'               => new wp_bootstrap_navwalker())
			); ?>
			</nav>
		</div>
