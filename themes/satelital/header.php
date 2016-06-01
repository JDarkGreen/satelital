<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	
	<?php 
		$options = get_option('satelital_custom_settings'); 
		global $post;
	?>

<!-- Header -->
<header class="mainHeader">
	<div class="container">
		<div class="row">
			<div class="col-xs-3">
				<!-- Logo Principal -->
				<h1 class="logo">
					<a href="<?= site_url() ?>">
						<?php if( !empty($options['logo']) ) : ?>
							<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
						<?php else: ?>
							<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
						<?php endif; ?>
					</a>
				</h1><!-- /logo -->					
			</div> <!-- /.col-xs-3 -->
			<div class="col-xs-9">

				<!-- Información -->
				<p class="mainHeader__paragraph text-xs-right">
					<?php if( isset($options['contact_tel']) && !empty($options['contact_tel']) ) : ?>
						<span><?php _e('Llámenos:' , LANG ); ?></span>
						<i>icon</i> <?= $options['contact_tel']; ?>
					<?php else: echo "Actualizando contenido" ; endif;?>
				</p> <!-- /.mainHeader__paragraph -->

				<!-- Navegación Principal -->
				<nav class="mainNav">
					<?php wp_nav_menu( array( 'menu_class' => 'main-menu', 'theme_location' => 'main-menu',
						));
					?>
				</nav> <!-- /.mainNav -->

			</div> <!-- /.col-xs-9 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</header> <!-- /.mainHeader -->
