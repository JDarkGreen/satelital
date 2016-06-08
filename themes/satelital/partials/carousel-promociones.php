<?php  /* Archivo que Muestra El Carousel de Promociones */ ?>

<section class="pageCommon__promotions">
	<!-- Titulo de Seccion  --> <h2 class="pageCommon__section-title text-xs-center">
		<?php _e('Promociones' , LANG ); ?> </h2>
	
	<!-- Contenedor Relativo -->
	<div class="relative">

		<!-- Wrapper contenedor de items -->
		<div id="carousel-promo" class="js-carousel-gallery" data-items="1" data-margins="0" data-dots="">
			<?php  /* Extraer todo las promociones disponibles */ 
				$args = array(
					'order'          => 'ASC',
					'orderby'        => 'menu_order',
					'post_status'    => 'publish',
					'post_type'      => 'promocion',
					'posts_per_page' => -1,
				);
				$promociones = get_posts( $args );
				if( !empty($promociones) ) : foreach( $promociones as $promocion ) : 

					/* Conseguir página promociones */
					$page_promocion = get_page_by_title('Promociones');

			?> <!-- Item Promoción -->
				<article class="item-promocion">
					<a href="<?= get_permalink( $page_promocion->ID ); ?>">
						<!-- Imagen --> <?php if( has_post_thumbnail( $promocion->ID ) ) : 
						echo get_the_post_thumbnail( $promocion->ID, 'full', array('class'=>'img-fluid') ); 
						endif; ?>
					</a>
				</article> <!-- /.item-promocion -->
			<?php endforeach; endif; ?>
		</div> <!-- /.carousel-promo -->

		<!-- Flechas -->
		<a href="#" class="js-carousel-prev js-arrow-carousel arrowCommon__slider arrowCommon__slider--prev" data-slider="carousel-promo">
			<i class="fa fa-chevron-left" aria-hidden="true"></i>
		</a> <!-- /-arrowCommon__slider arrowCommon__slider--prev -->

		<a href="#" class="js-carousel-next js-arrow-carousel arrowCommon__slider arrowCommon__slider--next" data-slider="carousel-promo">
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
		</a> <!-- /-arrowCommon__slider arrowCommon__slider--next -->

	</div> <!-- /.relative -->

</section> <!-- /.pageCommon__promotions -->