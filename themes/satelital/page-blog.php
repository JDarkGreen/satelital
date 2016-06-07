<?php /* Template Name: Página Blog Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('satelital_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner       = $post;
	$banner_title = "blog";
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Contenido Principal -->
<section class="pageBlog">
	<div class="container">
		<div class="row">

			<!-- Seccion de Blogs -->
			<div class="col-xs-12 col-sm-8">
				<section class="pageBlog__content">
					<div class="row">

						<!-- Extraer los posts -->
						<?php //el query
							$args = array(
								'order'          => 'DESC',
								'orderby'        => 'date',
								'post_status'    => 'publish',
								'post_type'      => 'post',
								'posts_per_page' => -1,
							);
							$query = new WP_Query( $args );

							if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
						?>
						<!-- Artículo flexible -->
						<article class="pageBlog__content__article col-xs-12 col-md-4">
							<!-- Imagen -->
							<figure>
								<a href="<?= get_permalink(); ?>">
									<?php if( has_post_thumbnail() ) : the_post_thumbnail('full',array('class'=>'img-fluid')); ?>
									<?php else: ?>
										<img src="<?= IMAGES ?>/no-disponible.jpg" alt="no-disponible" class="img-fluid" />
									<?php endif; ?>	
								</a>
							</figure>
							<!-- Extracto o contenido -->
							<div class="pageBlog__content__article__text">
								<h2 class="article-title text-uppercase">
									<strong><?php _e( get_the_title() , LANG ); ?></strong>
								</h2><!-- /.sectionCommon__subtitle -->
								<!-- Contenido -->
								<?= wp_trim_words( get_the_content() , 15 , '' ) . " "; ?>
								<!-- Botón ver más -->
								<a href="<?php the_permalink() ?>" class="btn__show-more-post">
									<?php _e('Leer más' , LANG ); ?>
								</a>
							</div> <!-- /.pageBlog__content__article__text -->
						</article> <!-- /.pageBlog__content__article -->
						<?php endwhile; endif; wp_reset_postdata(); ?>

					</div> <!-- /.row -->
				</section> <!-- /.pageBlog__content -->
			</div> <!-- /.col-xs-8 -->

			<!-- Aside Categorías de Posts -->
			<div class="col-xs-12 col-sm-4">
				<?php include( locate_template('partials/categories-post.php') ); ?>
			</div> <!-- /.col-xs-4 -->

		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /.pageBlog -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir Carousel de Promociones -->
<?php include( locate_template('partials/carousel-promociones.php') ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>