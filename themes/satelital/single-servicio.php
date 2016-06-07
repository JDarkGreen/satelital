<?php /* Single Servicios Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('satelital_custom_settings'); 

	$banner       = $post;
	$banner_title = "Servicios";
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php include( locate_template("partials/banner-common-pages.php") ); ?>

<!-- Contenido principal -->
<section class="pageServicio">

	<!-- Sección Imágen del Banner -->
	<section class="pageServicio__banner relative">
		<?php $img_banner = get_post_meta($banner->ID, 'input_img_banner_'.$banner->ID , true);
			if( !empty($img_banner) && $img_banner !== -1 ) :  
		?>
		<img src="<?= $img_banner; ?>" alt="image-servicio-<?= $post->post_name; ?>" class="img-fluid" />
		<?php endif; ?>

		<!-- Contenido texto de Banner -->
		<div class="pageServicio__banner__content">
			<h2 class=""><?php _e( $post->post_title , LANG ); ?></h2>
			<!-- Slogan -->
			<p>
				<?php 
					$slogan = get_post_meta( $post->ID, 'mb_box_info_extra' , true );
					if( !empty($slogan) ) :
						$slogan  = explode( " " , $slogan ); #var_dump($slogan);
						echo implode( " ", array_slice( $slogan , 0 , -1 ) );
				?>
				<span><strong><?= implode( " " , array_slice( $slogan , -1 , 1 ) ); ?></strong></span>
				<?php endif; ?>
			</p>
		</div> <!-- /. pageServicio__banner__content -->

	</section> <!-- /.pageServicio__banner -->

	<!-- Linea Separadora --> <div id="separator-line" class="relative"></div>

	<!-- Sección Información del Servicio -->
	<section class="pageServicio__info">
		<div class="container">
			<div class="row">

				<!-- Seccion de Información -->
				<div class="col-xs-8">
					<!-- Titulo de la sección -->
					<h2 class="pageServicio__title-section text-uppercase"><?php _e( $post->post_title , LANG ); ?></h2>
					<!-- Contenido -->
					<div class="text-justify">
						<?= !empty($post->post_content ) ? apply_filters('the_content', $post->post_content ) : "Actualizando Contenido..."; ?>
					</div> <!-- /.text-justify -->

					<!-- Galería de Imágenes -->
					<section class="pageService__gallery">
						<!-- Seccion con posicion relativa  -->
						<div class="relative">
								
							<!-- Wrapper contenedor de items -->
							<div id="carousel-servicios-gallery" class="js-carousel-gallery" data-items="3" data-margins="8" data-dots="true">

								<?php /* Obtener todos los ids de la Galería */ 
									$input_ids_img  = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
										//convertir en arreglo
										$input_ids_img  = explode(',', $input_ids_img );

										//Hacer loop por cada item de arreglo
										foreach ( $input_ids_img as $item_img ) : 
											//Si es diferente de null o tiene elementos
											if( !empty($item_img) ) : 
											//Conseguir todos los datos de este item
											$item = get_post( $item_img  ); 

											//Conseguir la Imágen destacada
											$url_img = $item->guid;
										?> <!-- Artículo o Ítem -->
										<article class="item-gallery-service">
											<!-- Imagen Fancybox -->
											<a href="<?= $url_img; ?>" class="js-gallery-item" rel="group">
												<img src="<?= $url_img; ?>" alt="<?= $item->post_name; ?>" class="img-fluid" />
											</a>
										</article> <!-- /.item-gallery-service -->
										<?php endif; endforeach; 
								?>

							</div> <!-- /.js-carousel-gallery -->

							<!-- Flechas -->
							<a href="#" class="js-carousel-prev js-arrow-carousel arrowCommon__slider arrowCommon__slider--prev" data-slider="carousel-servicios-gallery">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</a> <!-- /-arrowCommon__slider arrowCommon__slider--prev -->

							<a href="#" class="js-carousel-next js-arrow-carousel arrowCommon__slider arrowCommon__slider--next" data-slider="carousel-servicios-gallery">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a> <!-- /-arrowCommon__slider arrowCommon__slider--next -->

						</div> <!-- /.relative -->

					</section> <!-- /.pageInicio__gallery -->

				</div> <!-- /.col-xs-8 -->

				<!-- Seccion de Categorías -->
				<div class="col-xs-4">
					<!-- Incluir archivo template de Servicios -->
					<aside class="pageServicio__services text-uppercase">
						<!-- Titulo --> <h3 class=""><?php _e('servicios', LANG ); ?></h3>
						<!-- Lista de Servicios -->
						<ul>
							<?php  
								$args = array(
									'order'          => 'ASC',
									'orderby'        => 'menu_order',
									'post_status'    => 'publish',
									'post_type'      => 'servicio',
									'posts_per_page' => -1,
								);
								$servicios = get_posts( $args ); 
								foreach ( $servicios as $servicio ) : 
							?>
							<li><a class="<?= $post->ID == $servicio->ID ? 'active' : '' ?>" href="<?= $servicio->guid; ?>"><?= $servicio->post_title; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</aside> <!-- /.pageServicio__services -->
				</div> <!-- /.col-xs-4 -->

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- /.pageServicio__info -->

</section> <!-- /.pageServicio -->

<!-- Incluir Banner de Soluciones -->
<?php include( locate_template('partials/banner-services.php') ); ?>

<!-- Incluir Sección Miscelaneo -->
<?php include( locate_template('partials/miscelaneo.php') ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>