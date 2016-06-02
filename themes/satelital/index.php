
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
<section class="pageInicio__slider-servicios">
	<div class="container">
		
		<!-- Titulo de Seccion  --> <h2 class="pageCommon__section-title text-xs-center">
			<?php _e('Nuestros Servicios' , LANG ); ?>
		</h2>
		
		<!-- Seccion con posicion relativa  -->
		<div class="relative">
			
			<!-- Wrapper contenedor de items -->
			<div id="carousel-servicios-home" class="js-carousel-gallery" data-items="3" data-margins="16" data-dots="">
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
						<!-- Extracto --> <?= apply_filters('the_content' , $servicio->post_excerpt ); ?>
						<!-- Botón ver más --> <a href="#" class="pageCommun__btn-read-more center-block">
							<?php _e( "click aquí" , LANG ); ?>
						</a>
					</article> <!-- /.item servicio -->
				<?php endforeach; else: echo "Actualizando Contenido"; endif; ?>
			</div> <!-- /. js-carousel-gallery -->

			<!-- Flechas -->
			<a href="#" class="js-carousel-prev js-arrow-carousel arrowCommon__slider arrowCommon__slider--prev" data-slider="carousel-servicios-home">
				<i class="fa fa-chevron-left" aria-hidden="true"></i>
			</a> <!-- /-arrowCommon__slider arrowCommon__slider--prev -->

			<a href="#" class="js-carousel-next js-arrow-carousel arrowCommon__slider arrowCommon__slider--next" data-slider="carousel-servicios-home">
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
<section class="pageInicio__map">
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

<!-- Banner Soluciones -->
<section class="pageCommon__banner-services relative">
	<div class="container">
		<div class="container-flex align-content">
			<!-- Imagen --> <figure><img src="<?= IMAGES ?>/auto_rojo_service_satelital_lima.png" alt="auto_rojo_service_satelital_lima" class="img-fluid"></figure>
			<!-- Texto --> <h2><?php _e('Soluciones las 24 Horas' , LANG ); ?></h2>
			<!-- Botón --> <a href="" class="pageCommun__btn-read-more"><?php _e('click aquí' , LANG ); ?></a>
		</div> <!-- /.container-flex align-content -->
	</div> <!-- /.container -->
</section> <!-- /.pageCommon__banner-services -->

<!-- Sección Miscelanea -->
<section class="pageInicio__miscelaneo">
	<div class="container">
		<div class="row text-xs-center">
			<div class="col-xs-6">
				<!-- Titulo --> <h2 class="pageCommon__section-title"><?php _e('Blog' , LANG ); ?></h2>
				<!-- Galería de blog -->
				<section id="pageInicio__blog-gallery" class="pageInicio__blog-gallery js-carousel-gallery" data-items="2" data-margins="61" data-dots="true">
					<?php  
						/* Extraer los 8 ultimos posts */
						$args = array(
							'order'          => 'DESC',
							'orderby'        => 'date',
							'post_status'    => 'publish',
							'posts_per_page' => -1,
						);
						$articulos = get_posts( $args );
						foreach( $articulos as $articulo ) : 
					?> <!-- Articulos  -->
						<article class="item-blog text-xs-left">
							<!-- Imagen --> <figure>
							<?php if( has_post_thumbnail($articulo->ID) ) : 
								echo get_the_post_thumbnail($articulo->ID ,'full', array('class'=>'img-fluid') );
								endif;
							?>
							</figure>
							<!-- Titulo -->
							<h2 class="item-blog__title text-capitalize"><?php _e( $articulo->post_title , LANG ); ?></h2>
							<!-- Extracto -->
							<?= wp_trim_words($articulo->post_content,'15',''); ?>
							<!-- Botón al artículo -->
							<a href="<?= get_permalink($articulo->ID); ?>" class="text-to-link"><?php _e('Leer más', LANG ); ?></a>

						</article> <!-- /.item-blog -->
					<?php endforeach; ?>
				</section> <!-- /.pageInicio__blog-gallery -->
				
				<!-- GALERÍA DE CLIENTES -->
				<!-- Titulo --> <h2 class="pageCommon__section-title"><?php _e('Clientes' , LANG ); ?></h2>

				<!-- Galería de Clientes -->
				<div class="relative">
					<!-- Wrapper -->
					<section id="pageInicio__clients-gallery" class="pageInicio__clients-gallery js-carousel-gallery" data-items="3" data-margins="45" data-dots="false">
						<?php  
							/* Extraer los clientes: */
							$args = array(
								'order'          => 'ASC',
								'orderby'        => 'menu_order',
								'post_status'    => 'publish',
								'post_type'      => 'cliente',
								'posts_per_page' => -1,
							);
							$clientes = get_posts( $args );
							foreach( $clientes as $cliente ) : if( has_post_thumbnail($cliente->ID) ) :
							echo get_the_post_thumbnail($cliente->ID,'full',array('class'=>'img-fluid'));
							endif; endforeach;
						?>
					</section> <!-- /.pageInicio__clients-gallery -->

					<!-- Flechas de Carousel -->
					<a href="#" class="js-carousel-prev js-arrow-carousel arrowCommon__slider arrowCommon__slider--prev" data-slider="pageInicio__clients-gallery">
						<i class="fa fa-chevron-left" aria-hidden="true"></i>
					</a>					

					<a href="#" class="js-carousel-next js-arrow-carousel arrowCommon__slider arrowCommon__slider--next" data-slider="pageInicio__clients-gallery">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</a>
					
				</div> <!-- /.relative -->
				<!--  -->
			</div> <!-- /.col-xs-6 -->
			<div class="col-xs-6">
				<!-- Titulo --> <h2 class="pageCommon__section-title"><?php _e('Facebook' , LANG ); ?></h2>

				<!-- Facebook -->
				<?php $link_facebook = $options['red_social_fb']; 
					if( !empty($link_facebook) ) :
				?>
					<section class="container__facebook">
						<!-- Contebn -->
						<div id="fb-root" class=""></div>

						<!-- Script -->
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<div class="fb-page" data-href="<?= $link_facebook ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="445" data-height="480" data-hide-cover="false" data-show-facepile="true">
						</div> <!-- /. fb-page-->
					</section> <!-- /.container__facebook -->
				<?php else: ?>
					<p class="text-xs-center">Opcion no habilitada temporalmente</p>
				<?php endif; ?>

			</div> <!-- /.col-xs-6 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__miscelaneo -->

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