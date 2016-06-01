
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option('satelital_custom_settings'); 
?>

<!-- Banner Home de Presentación -->
<section class="pageInicio__banner-presentation relative">
	<div class="container">

		<!-- Seccion Telefonos -->
		<section class="pageInicio__phones text-xs-center">
			<!-- Titulo --> <h2 class="text-capitalize"><?php _e('llámenos:',LANG); ?></h2>
			<!-- Telefonos --> 
			<?php if( isset($options['contact_tel'] ) && !empty($options['contact_tel'] ) ) : ?>
				<p><?= $options['contact_tel']; ?></p>
			<?php endif; ?>
			<?php if( isset($options['contact_cel'] ) && !empty($options['contact_cel'] ) ) : ?>
				<p><?= $options['contact_cel']; ?></p>
			<?php endif; ?>

		</section> <!-- /.pageInicio__phones -->

		<!-- Seccion - Soluciones Vehiculares  -->
		<section class="pageInicio__vehiculares">
			<!-- Titulo --> <h2 class="text-uppercase"><?php _e('soluciones',LANG); ?>
				<span><?php _e('vehiculares',LANG) ?></span>
			</h2>
			<!-- Contenido -->
			<div class="pageInicio__vehiculares__content">
				<!-- Titulo --> <h3 class="text-uppercase"><?php _e('conductores profesionales a su servicio' , LANG ); ?> </h3>
				<!-- Slogan --> <p><?php _e('Calidad, experiencia y seguridad'); ?></p>

				<!-- Salto de linea --> <br/>

				<p><?php _e('Brindamos los servicios:' ); ?></p>
				<!-- Obtener los servicios -->
				<div class="pageInicio__vehiculares__services">
					Chofer de Reemplazo , Conductores para empresas , Valet Parking ,
					Traslados a Aeropuerto, Courier y Grúa.
				</div> <!-- /. -->
			</div> <!-- /.pageInicio__vehiculares__content -->

		</section> <!-- /.pageInicio__vehiculares -->

	</div> <!-- /.container -->
</section> <!-- /.pageInicio__banner-presentation -->

<!-- Incluir Banner de Portada -->
<?php  
	$term = "Portada";
	//template
	include(locate_template('partials/portada/content-banner.php'));
?>


<!-- Footer -->
<?php get_footer(); ?>