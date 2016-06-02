
<!-- Extraer opciones  -->
<?php $options = get_option('satelital_custom_settings'); ?>

	<footer class="mainFooter">
		<div class="container">
			<div class="row container-flex align-content text-xs-center">

				<div class="col-xs-4">
					<!-- Redes Sociales -->
					<section class="mainFooter__item">
						<!-- Titulo --> <h2><?php _e('Síguenos:' , LANG ); ?></h2>
						<ul class="mainFooter__social-links">
							<!-- Facebook -->
							<?php if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) : ?>
								<li>
									<a target="_blank" href="<?= $options['red_social_fb'] ?>" class="container-flex align-content">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
							<?php endif; ?>							
							<!-- Twitter -->
							<?php if( isset($options['red_social_twitter']) && !empty($options['red_social_twitter']) ) : ?>
								<li>
									<a target="_blank" href="<?= $options['red_social_twitter'] ?>" class="container-flex align-content">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
							<?php endif; ?>							
							<!-- Youtube -->
							<?php if( isset($options['red_social_ytube']) && !empty($options['red_social_ytube']) ) : ?>
								<li>
									<a target="_blank" href="<?= $options['red_social_ytube'] ?>" class="container-flex align-content">
										<i class="fa fa-youtube" aria-hidden="true"></i>
									</a>
								</li>
							<?php endif; ?>
						</ul> <!-- /.mainFooter__social-links -->
					</section> <!-- /.mainFooter__item -->
				</div> <!-- /.col-xs-4 -->

				<div class="col-xs-4">
					<section class="mainFooter__item">
						<!-- Dirección -->
						<?php if( isset($options['contact_address']) && !empty($options['contact_address']) ) : ?>
							<p> <i class="fa fa-map-marker" aria-hidden="true"></i>
								<?= $options['contact_address']; ?></p>
						<?php endif; ?>	
						<!-- Teléfono -->
						<p> <i class="fa fa-mobile" aria-hidden="true"></i>
							<?php if( isset( $options['contact_tel'] ) && !empty($options['contact_tel'] ) ) : echo "Tel.: " . $options['contact_tel'] . " | "; endif; ?> 
							<?php if( isset($options['contact_cel'] ) && !empty($options['contact_cel'] ) ) : echo $options['contact_cel']; endif; ?>
						</p>	
						<!-- Mensaje -->
						<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) : ?>
							<p> <i class="fa fa-envelope" aria-hidden="true"></i>
								<?= $options['contact_email']; ?></p>
						<?php endif; ?>						
					</section> <!-- /.mainFooter__item -->
				</div>  <!-- /.col-xs-4 -->

				<div class="col-xs-4">
					<section class="mainFooter__item">
						<a href="<?= site_url(); ?>" class="text-web">
							www.<span>issatelital</span>.com</a>
					</section> <!-- /.mainFooter__item -->
				</div>  <!-- /.col-xs-4 -->
			</div> <!-- /.row -->

			<!-- Sección desarrollo -->
			<section class="mainFooter__developer text-xs-center">
				<?php _e('&copy; ' . date('Y') . ' Ingenioart .Derechos reservados. Design by:' ); ?>
				<a href="http://www.ingenioart.com/" target="_blank">INGENIOART</a>
			</section> <!-- /.mainFooter__developer -->
		</div> <!-- /.container -->
	</footer> <!-- /.mainFooter -->

	<?php wp_footer(); ?>
</body>
</html>

