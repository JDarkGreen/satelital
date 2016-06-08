<?php /* Template Name: Página Contacto Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('satelital_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner = $post;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Sección Central -->
<section class="pageContacto">
	
	<!-- Sección de Información de Contacto -->
	<section class="pageContacto__info">
		<div class="container">
			<div class="row container-flex align-content">

				<!-- Datos -->
				<div class="col-xs-4">
					<!-- Titulo  --> <h2 class="pageCommon__section-title"> <?php _e('Datos', LANG ); ?></h2>
					<!-- Lista de Datos -->
					<ul class="pageContacto__info__list">

						<?php if( ( isset($options['contact_tel']) && !empty($options['contact_tel']) ) || ( isset($options['contact_cel']) && !empty($options['contact_cel']) ) ) : ?>
							<li> <!-- Icono --> <img src="<?= IMAGES ?>/icon/iconos_contacto_rpm.png" alt="satelital-telefonos-" class="img-fluid" /> <?= $options['contact_tel'] . "<br/>" . $options['contact_cel']; ?>
							</li>
						<?php endif; ?>						

						<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) : ?>
							<li> <!-- Icono --> <img src="<?= IMAGES ?>/icon/iconos_contacto_mail.png" alt="satelital-email-" class="img-fluid" /> <?= $options['contact_email'] ?>
							</li>
						<?php endif; ?>						

						<?php if( isset($options['contact_address']) && !empty($options['contact_address']) ) : ?>
							<li> <!-- Icono --> <img src="<?= IMAGES ?>/icon/iconos_contacto_direccion.png" alt="satelital-direccion-" class="img-fluid" />  <?= $options['contact_address']; ?>
							</li>
						<?php endif; ?>
					</ul> <!-- /.pageContacto__info__list -->

					<!-- Websatelital -->
					<a href="http://localhost/satelital" class="text-web text-web--red">
					www.<span>issatelital</span>.com</a>

				</div> <!-- /.col-xs-4 -->

				<!-- Llamada -->
				<div class="col-xs-4">
					<section class="sectionCommon__call text-xs-center">
						<h2 class=""><?php _e('Llámenos', LANG ); ?></h2>
						<?php if( isset($options['contact_tel']) && !empty($options['contact_tel']) ): ?>
						<p><?= $options['contact_tel']; ?></p>
						<?php endif; ?>
						<?php if( isset($options['contact_cel']) && !empty($options['contact_cel']) ): ?>
						<p><?= "RPM: " . $options['contact_cel']; ?></p>
						<?php endif; ?>
					</section> <!-- /.sectionCommon__call -->
				</div><!-- /.col-xs-4 -->
				
				<!-- Imagen -->
				<div class="col-xs-4">
					<img src="<?= IMAGES ?>/pages/contacto/contacto_choferes_remplazo_peru_lima_vector.png" alt="contacto_choferes_remplazo_peru_lima_vector" class="img-fluid" />
				</div> <!-- /.col-xs-4 -->

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- /.pageContacto__info -->

	<!-- Sección Formulario -->
	<section class="pageContacto__form-section">
		<div class="container">
			<!-- Titulo  --> <h2 class="pageCommon__section-title"> <?php _e('Formulario', LANG ); ?></h2>
			<!-- Formulario -->
			<form id="form-contacto" action="" class="pageContacto__form" method="post">
				<div class="row">
					<!-- Nombre -->
					<div class="col-xs-6">
						<input type="text" id="input_nombre" name="input_nombre" placeholder="Nombre" required />
					</div> <!-- /.col-xs-6 -->
					<!-- Correo -->
					<div class="col-xs-6">
						<input type="email" id="input_email" name="input_email" placeholder="Email" required="" data-parsley-type-message="Escribe un email válido" />
					</div> <!-- /.col-xs-6 -->
					<!-- Telefonos -->
					<div class="col-xs-6">
						<input type="text" id="input_tel" name="input_tel" placeholder="Teléfono" data-parsley-type='digits' data-parsley-type-message="Solo debe contener números" />
					</div> <!-- /.col-xs-6 -->
					<!-- Servicios -->
					<div class="col-xs-6">
						<input type="text" id="input_servicio" name="input_servicio" placeholder="Servicio" required />
					</div> <!-- /.col-xs-6 -->
					<!-- Mensaje -->
					<div class="col-xs-12">
						<textarea name="text_mensaje" id="text_mensaje" placeholder="Mensaje" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Necesitas más de 20 caracteres" data-parsley-validation-threshold="10"></textarea>
					</div> <!-- /.col-xs-12 -->
				</div> <!-- /.row -->

				<!-- Boton Enviar -->
				<div class="pull-xs-right">
					<button href="#" type="submit" class="btn__send-form"><?php _e('Enviar' , LANG ); ?></button> 
				</div> <!-- /.pull-xs-right -->

				<!-- Limpiar floats --> <div class="clearfix"></div>
			</form>
		</div> <!-- /.container -->
	</section> <!-- /.pageContacto__form-section -->

	<!-- Sección de Mapa -->
	<section class="pageContacto__map-section">
		<div class="container">
			<!-- Titulo  --> <h2 class="pageCommon__section-title"> <?php _e('Mapa', LANG ); ?></h2>
		</div> <!-- /.container -->

		<!-- Contenedor de Mapa -->
		<section class="pageContato__map">
			<?php if( !empty($options['contact_mapa']) ) : ?>
				<div id="canvas-map" class="canvas-map"></div>
			<?php else: ?>
				<div class="container"> <?php _e('Actualizando Mapa' , LANG ); ?></div>
			<?php endif; ?>
		</section> <!-- /.pageContato__map -->

	</section> <!-- /.pageContacto__map-section -->

</section> <!-- /.pageContacto  -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>


<!-- Script Google Mapa -->
<?php if( !empty($options['contact_mapa']) ) : $mapa = explode(',', $options['contact_mapa'] ); ?>

	<!-- Script Google Mapa -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

	<script type="text/javascript">	

		<?php  
			$lat = $mapa[0];
			$lng = $mapa[1];
		?>

	    var map;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;

	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat, lng: lng},
	        zoom  : 16
	      });

	      //infowindow
	      var infowindow    = new google.maps.InfoWindow({
	        content: <?= "'" . $options['contact_address'] . "'" ?>
	      });

	      //icono
	      var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.png";

	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name'), LANG ) ?>",
	        icon     : icono
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }

	    google.maps.event.addDomListener(window, "load", initialize);

	</script>
<?php endif; ?>

<!-- Get Footer -->
<?php get_footer(); ?>