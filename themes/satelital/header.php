<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

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

		//Comprobar si esta desplegada la barra de Navegación
		$admin_bar = is_admin_bar_showing() ? 'mainHeader__active' : '';
	?>

<!-- Header -->
<header class="mainHeader sb-slide <?= $admin_bar ?>">
	<div class="container">
		<div class="row">
			
			<!-- Solo en version de escritorio -->
			<div class="hidden-xs-down">
	
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
							<img src="<?= IMAGES ?>/icon/iconos_contacto_rpm.png" alt="satelital-telefonos-" class="img-fluid" /> <?= $options['contact_tel']; ?>
						<?php else: echo "Actualizando contenido" ; endif;?>
					</p> <!-- /.mainHeader__paragraph -->

					<!-- Navegación Principal -->
					<nav class="mainNav">
						<?php wp_nav_menu( array( 'menu_class' => 'main-menu', 'theme_location' => 'main-menu',
							));
						?>
					</nav> <!-- /.mainNav -->
				</div> <!-- /.col-xs-9 -->

			</div> <!-- /.hidden-xs-down -->

			<!-- Solo en version mobile -->
			<div class="hidden-sm-up">
				<!-- Contenedor con posicion flex  -->
				<div class="col-xs-12 container-flex align-content">

					<!-- Icono Abrir menu izquierdo -->
					<div class="icon-header">
						<i id="toggle-left-nav" class="fa fa-bars" aria-hidden="true"></i>
					</div><!-- /.icon-header -->

					<!-- Logo en General  -->
					<h1 class="logo">
						<a href="<?= site_url() ?>">
							<?php if( !empty($options['logo']) ) : ?>
								<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
							<?php else: ?>
								<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
							<?php endif; ?>
						</a>
					</h1><!-- /logo -->								

					<!-- Icono Abrir menu derecho -->
					<div class="icon-header">
						<i id="toggle-right-nav" class="fa fa-bars" aria-hidden="true"></i>
					</div><!-- /.icon-header -->	


				</div> <!-- /.col-xs-12 -->
			</div> <!-- /.hidden-sm-up -->
	
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</header> <!-- /.mainHeader -->

<!-- Contenedor Izquierda Version Mobile -->
<aside class="sb-slidebar sb-left sb-style-push">
	<!-- Navegación Principal -->
	<nav class="mainNav">
		<?php wp_nav_menu(
			array(
				'menu_class'     => 'main-menu text-center',
				'theme_location' => 'main-menu'
			));
		?>						
	</nav> <!-- /.mainNav -->  
</aside> <!-- /.sb-slidebar sb-left sb-style-push -->

<!-- Contenedor version mobile libreria sliderbar js -->
<div id="sb-site" class="">
