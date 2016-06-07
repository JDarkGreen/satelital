<?php /* Template Name: Página Empresa Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('satelital_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php $banner = $post; include( locate_template("partials/banner-common-pages.php") ); ?>

<!-- Wrapper de Página  -->
<section class="pageNosotros">
	<div class="container">
		<div class="row">
			<div class="col-xs-8">
			
				<!-- Título de Sección  --> <h2 class="pageCommon__section-title"><?php _e('Nosotros', LANG ); ?></h2>

				<!-- Contenido --> <div class="pageNosotros__content text-justify"> 
				<?= !empty($post->post_content) ? apply_filters('the_content', $post->post_content) : "Actualizando Contenido ..."; ?>
				</div>

				<!-- Sección de Aptitudes . [ Mision Vision Valores ] -->
				<section id="accordion_aptitudes" role="tablist" aria-multiselectable="true" class="pageNostros__tabs">
					
					<!-- Sección Misión Y Vision -->
  				<div class="panel panel-default">
    				<div class="panel-heading" role="tab" id="headingOne">
      				<h4 class="panel-title relative">
        				<a data-toggle="collapse" data-parent="#accordion_aptitudes" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> <?php _e( 'Misión y Visión' , LANG ); ?>
        				</a>
        				<!-- Icon --> <i class="fa fa-caret-down" aria-hidden="true"></i>
      				</h4> <!-- /.panel-title -->
    				</div> <!-- /.panel-heading -->
						
						<!-- Contenido Mision y Visión -->
    				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
    					<?= !empty($options['text_mision_vision']) ? apply_filters('the_content' , $options['text_mision_vision'] ) : "Actualizando Contenido..."; ?>
    				</div> <!-- /.panel-collapse collapse in -->
  				</div> <!-- /.panel panel-default -->
  				
  				<!-- Sección Valores -->
  				<div class="panel panel-default">
    				<div class="panel-heading" role="tab" id="headingTwo">
      				<h4 class="panel-title relative">
        				<a class="collapsed" data-toggle="collapse" data-parent="#accordion_aptitudes" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> <?php _e( 'Valores' , LANG ); ?>
        				</a>
        				<!-- Icon --> <i class="fa fa-caret-down" aria-hidden="true"></i>
      				</h4> <!-- /.panel-title -->
    				</div> <!-- /.panel-heading -->
						
						<!-- Contenido Valores -->
    				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
    					<?= !empty($options['text_valores']) ? apply_filters( 'the_content' , $options['text_valores'] ) : "Actualizando Contenido..."; ?>
    				</div> <!-- /.panel-collapse collapse -->
  				</div> <!-- /.panel panel-default -->

  			</section> <!-- /.accordion_aptitudes -->
			
			</div> <!-- /.col-Xs-8 -->
		</div> <!-- /.row -->
	</div> 	<!-- /.container -->
</section> <!-- /.pageNosotros -->

<!-- Incluir Banner de Soluciones -->
<?php include( locate_template('partials/banner-services.php') ); ?>

<!-- Incluir Banner de Portada -->
<?php  
  $term = "Portada";
  //template
  include(locate_template('partials/portada/content-banner.php'));
?>
<!-- Linea separadora --> <div id="separator-line" class="relative"></div>

<!-- Get Footer -->
<?php get_footer(); ?>