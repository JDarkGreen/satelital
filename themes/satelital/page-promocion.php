<?php /* Template Name: Página Promoción Plantilla */ ?>

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
<section class="pagePromocion">
	<div class="container">
		<!-- El Contenido de Promociones -->
		<section class="pagePromocion__content text-xs-center relative">
			<?php if( !empty($post->post_content) ) : ?>
				<?= $post->post_content; ?>
			<?php endif; ?>

			<!-- Titulo -->
			<h2 class="text-uppercase"> <strong> <?php _e('disfruta de nuestras promociones !!!' , LANG ); ?> </strong></h2> <!-- /. -->

			<!-- Imagen animacion -->
			<figure class="pagePromocion__animation">
				<img src="<?= IMAGES ?>/pages/promocion/promociones_choferes_remplazo_peru_lima_vector.png" alt="promociones_choferes_remplazo_peru_lima_vector" class="img-fluid" />
			</figure> <!-- /.pagePromocion__animation -->

		</section> <!-- /.pagePromocion text-xs-center -->
	</div> <!-- /.container -->
</section> <!-- /.pagePromocion  -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir Carousel Común de Portada -->
<?php $term = "Portada"; include(locate_template('partials/portada/content-banner.php')); ?>
<!-- Linea separadora --> <div id="separator-line" class="relative"></div>

<!-- Get Footer -->
<?php get_footer(); ?>