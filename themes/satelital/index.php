
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option('satelital_custom_settings'); 
?>

<!-- Banner Home de Presentación -->
<section class="pageInicio__banner-presentation relative">
	<div class="container">
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__banner-presentation -->

<!-- Sección de servicios carousel en el Home  -->

<section class="pageInicio__slider-servicios relative">
	<div class="container">
		
		<!-- Titulo de Seccion  --> <h2 class="pageCommon__section-title text-xs-center">
			<?php _e('Nuestros Servicios' , LANG ); ?>
		</h2>

		<!-- Wrapper contenedor de items -->
		<div class="js-carousel-gallery" data-items="3" data-margins="16">
			<?php  /* Extraer todo los servicios disponibles */ 
				$args = array(
					'order'          => 'ASC',
					'orderby'        => 'menu_order',
					'post_status'    => 'publish',
					'post_type'      => 'servicio',
					'posts_per_page' => -1,
				);
				$servicios = get_posts( $args );
				if( !empty($servicios) ) : foreach( $servicios as $servicio ) : 
			?> <!-- Item Articulo -->
				<article class="item-servicio">
					<!-- Imagen  --> <figure><?= get_the_post_thumbnail( $servicio->ID , 'full' , array('img-fluid center-block') ); ?></figure>
					<!-- titulo --> <h3 class="text-uppercase"><?php _e( $servicio->post_title , LANG ); ?></h3>
					<!-- Extracto --> <?= apply_filters('the_content' , $servicio->post_excerpt ); ?>
					<!-- Botón ver más --> <a href="#" class="pageCommun__btn-read-more">
						<?php _e( "click aquí" , LANG ); ?>
					</a>
				</article> <!-- /.item servicio -->
			<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>
		</div> <!-- /. js-carousel-gallery -->
		<!-- Flechas -->
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__slider-servicios -->

<!-- Incluir Banner de Portada -->
<?php  
	$term = "Portada";
	//template
	include(locate_template('partials/portada/content-banner.php'));
?>


<!-- Footer -->
<?php get_footer(); ?>