
<!-- Header -->
<?php 
	global $post; //Obtener Datos de Pagina

	get_header(); 
	$options = get_option('satelital_custom_settings'); 
?>

<!-- Banner Home de Presentación -->
<section class="pageInicio__banner-presentation relative hidden-xs-down">
	<!-- Obtener Imagen destacada de pagina inicio  -->
	<?php 
		if( has_post_thumbnail( $post->ID ) ) : 
			echo get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid') );
		else : 
	?>
		<!-- Si no hay imagen destacada entonces tomar esta imagen -->
		<img src="<?= IMAGES ?>/pages/inicio/incio_baner_superior_service_satelital_lima.png" alt="vehiculos-servicios-satelital" class="img-fluid" /> 	
	<?php endif; ?>
	<div class="container">
		<!-- Animacion de Imagen  -->
		<figure class="pageInicio__animation"></figure>
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__banner-presentation -->

<!-- Sección de servicios carousel en el Home  -->
<section class="pageInicio__slider-servicios">
	<div class="container">
		
		<!-- Titulo de Seccion  --> <h2 class="pageCommon__section-title text-xs-center">
			<?php _e('Nuestros Servicios' , LANG ); ?>
		</h2>
		
		<!-- Seccion con posicion relativa  -->
		<div class="relative">
			
			<!-- Wrapper contenedor de items -->
			<div id="carousel-servicios-home" class="js-carousel-gallery" data-items="3" data-items-responsive="1" data-margins="16" data-dots="">
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
					<article class="item-servicio text-xs-center relative">
						<!-- Imagen  --> <figure><?= get_the_post_thumbnail( $servicio->ID , 'full' , array('img-fluid center-block') ); ?></figure>

						<!-- titulo --> <h3 class="text-uppercase"><?php _e( $servicio->post_title , LANG ); ?></h3>

						<!-- Extracto --> 
						<div class="hidden-xs-down">
							<?= apply_filters('the_content' , $servicio->post_excerpt ); ?>
						</div> <!-- /.hidden-xs-down -->

						<!-- Botón ver más --> <a href="#" class="pageCommun__btn-read-more center-block">
							<?php _e( "click aquí" , LANG ); ?>
						</a>
					</article> <!-- /.item servicio -->
				<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>
			</div> <!-- /. js-carousel-gallery -->

			<!-- Flechas Ocultar en Mobile -->
			<a href="#" class="hidden-xs-down js-carousel-prev js-arrow-carousel arrowCommon__slider arrowCommon__slider--prev" data-slider="carousel-servicios-home">
				<i class="fa fa-chevron-left" aria-hidden="true"></i>
			</a> <!-- /-arrowCommon__slider arrowCommon__slider--prev -->

			<a href="#" class="hidden-xs-down js-carousel-next js-arrow-carousel arrowCommon__slider arrowCommon__slider--next" data-slider="carousel-servicios-home">
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a> <!-- /-arrowCommon__slider arrowCommon__slider--next -->

		</div> <!-- /.relative -->
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__slider-servicios -->

<!-- Incluir Banner de Portada -->
<?php  
	$term = "Portada";
	//template
	include(locate_template('partials/portada/content-banner.php'));
?>

<!-- Linea separadora --> <div id="separator-line" class="relative"></div>

<!-- Sección Mapa - Conductor -->
<section class="pageInicio__map hidden-xs-down">
	<!-- Titulo --> <h2 class="pageCommon__section-title text-xs-center"><?php _e('Las 24 Horas' , LANG ); ?></h2>
	<!-- Contenedor Posicion relativa -->
	<section class="relative">
		<!-- Mapa --> <div id="canvas-map-home"></div>
		<!-- Conductor Fomulario -->
		<form action="" class="pageInicio__map__form">
			<!-- Titulo -->
			<h2 class="text-uppercase"><?php _e('buscas un', LANG ); ?> <span><?php _e('conductor ?' , LANG ); ?></span></h2> <!-- /.text-uppercase -->
			<!-- Sección Llamadas -->
			<div class="pageInicio__map__call text-xs-center">
				<!-- Titulo --> <h2 class=""><?php _e('Llámenos al:',LANG); ?></h2>
				<!-- Telefonos --> 
				<?php if( isset($options['contact_tel'] ) && !empty($options['contact_tel'] ) ) : ?>
					<p><?= $options['contact_tel']; ?></p>
				<?php endif; ?>
				<?php if( isset($options['contact_cel'] ) && !empty($options['contact_cel'] ) ) : ?>
					<p><?= $options['contact_cel']; ?></p>
				<?php endif; ?>				
			</div> <!-- /.pageInicio__map__call -->

			<!-- Input y labels -->
			<input type="text" name="input_name" placeholder="<?php _e('Nombre',LANG) ?>" />
			<input type="text" name="input_tel" placeholder="<?php _e('Teléfono',LANG) ?>" />
			<textarea name="textarea_message" id="" placeholder="<?php _e('Mensaje',LANG) ?>"></textarea>

			<!-- Botón Subir -->
			<div class="text-xs-center">
				<button class="pageCommun__btn-read-more pageCommun__btn-read-more--white"><?php _e('enviar', LANG ); ?></button>
			</div> <!-- /.text-xs-center -->

		</form> <!-- /.pageInicio__map__form -->
	</section> <!-- /.relative -->
</section> <!-- /.pageInicio__map -->

<!-- Incluir Banner de Soluciones -->
<?php include( locate_template('partials/banner-services.php') ); ?>

<!-- Incluir Sección Miscelaneo -->
<?php include( locate_template('partials/miscelaneo.php') ); ?>

<!-- Script Google Mapa -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<!-- Script para mapa -->
	<script type="text/javascript">	
	    var map;
	    var lat = <?= '-12.055342' ?>;
	    var lng = <?= '-77.0802049' ?>;

	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map-home'), {
	        center: {lat: lat, lng: lng},
	        zoom  : 16
	      });

	      //infowindow
	      /*var infowindow    = new google.maps.InfoWindow({
	        content: '<?= "IngenioArt" ?>'
	      });*/

	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";

	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }

	    google.maps.event.addDomListener(window, "load", initialize);

	</script>

<!-- Footer -->
<?php get_footer(); ?>