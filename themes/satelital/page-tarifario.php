<?php /* Template Name: Página Tarifario Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('satelital_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php $banner = $post; include( locate_template("partials/banner-common-pages.php") ); ?>

<!-- Incluir Carousel Común de Portada -->
<?php $term = "Portada"; include(locate_template('partials/portada/content-banner.php')); ?>
<!-- Linea separadora --> <div id="separator-line" class="relative"></div>

<!-- Incluir Wrapper de Página -->
<section class="pageTarifario">
	<div class="container">

		<!-- Incluir el Contenido de la Página -->
		<section class="pageTarifario__content">
			<?php 
				if( !empty( $post->post_content ) ) : echo apply_filters( 'the_content' , $post->post_content );
				else: echo "Actualizando Contenido ...";
				endif;
			?>
		</section> <!-- /.pageTarifario__content -->

	</div> <!-- /.container -->
</section> <!-- /.container -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>