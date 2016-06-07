<?php /* Archivo que contiene el partial de carousel clientes */ ?>

<!-- Sección de Clientes -->
<section class="pageCommon__clientes">
	<div class="container">

		<!-- Titulo --> <h2 class="pageCommon__section-title text-xs-center"><?php _e('Clientes' , LANG ); ?></h2>

		<!-- Galería de Clientes -->
		<div class="relative">
			<!-- Wrapper -->
			<section id="pageInicio__clients-gallery" class="pageInicio__clients-gallery js-carousel-gallery" data-items="6" data-margins="50" data-dots="false">
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

	</div> <!-- /.container -->
</section> <!-- /.pageCommon__clientes -->