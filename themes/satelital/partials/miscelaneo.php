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