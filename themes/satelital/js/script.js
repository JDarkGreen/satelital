
var j = jQuery.noConflict();

(function($){
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
	j(document).on('ready',function(){

		/*|----------------------------------------------------------------------|*/
		/*|-----  SLIDEBAR VERSION MOBILE  -----|*/
		/*|----------------------------------------------------------------------|*/

		var mySlidebars = new j.slidebars({
			disableOver       : 568, // integer or false
			hideControlClasses: true, // true or false
			scrollLock        : false, // true or false
			siteClose         : true, // true or false
		});

		//Eventos

		//Abrir contenedor izquierda
		j("#toggle-left-nav").on('click',function(){
			mySlidebars.slidebars.toggle('left');
		});

		//Abrir contenedor derecha
		j("#toggle-right-nav").on('click',function(){
			mySlidebars.slidebars.toggle('right');
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL HOME -----|*/
		/*|----------------------------------------------------------------------|*/
		var carousel_home = j("#carousel-home").carousel({
			interval : 5000,
		});

		var i = 1;

		//eventos
		carousel_home.on('slid.bs.carousel', function ( e ) {
			if( i > 2 ){ i = 1 };
			
			var current_item = j(this).find('.active');
  			//imagen actual
  			var image_carousel = current_item.find('img');
  			//animacion de la imagen
  			if( i == 1 ){
  				image_carousel.addClass('box-expand');
  			}else{
  				image_carousel.addClass('box-contract');
  			}

  			i++;

  			//animacion de las contenidos
  			var title = current_item.find('h3');
  			title
  				.css('opacity',0)
  				.animate({ 'opacity' : '1' }, 2000 );

  			var k    = 1;
  			var text = current_item.find('p');

  			text.each( function(){

  				if( k > 2 ){ k = 1 };

  				if( k == 1 ){
	  				j(this)
	  					.addClass('box-contract--fast')
	  					.animate({ 'opacity' : '1' }, 1000 );
  				}else{
  					j(this).animate({'left':'0','opacity':'1'}, 1100 );
  				}
	  			
	  			//aumentar k 
	  			k++;
  			});
		});

		carousel_home.on('slide.bs.carousel', function ( e ) {
			var current_item = j(this).find('.active');
  			var k    = 1;
  			var text = current_item.find('p');

  			text.each( function(){
  				
  				if( k > 2 ){ k = 1 };

  				if( k == 1 ){
	  				j(this)
	  					.css('opacity',0)
	  					.removeClass('box-contract--fast');
  				}else{
  					j(this).css({'left':'50%','opacity':0});
  				}
	  			//aumentar k 
	  			k++;
  			});
		});

		/*|°°------------- Flechas del carousel COMUNES ---------------°°|*/
		j(".js-arrow-carousel").on('click',function(e){ e.preventDefault(); });


		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL Galerías setear attributos   ------|*/
		/*|----------------------------------------------------------------------|*/

		if( j(".js-carousel-gallery").length )
		{
			j(".js-carousel-gallery").each(function(index){

				/* Carousel */
				var current = j(this);

				/* Valor de Items */
				var items  = current.attr('data-items') != "" ? current.attr('data-items') : 3;
				/* Valor de Items Responsive */
				var items_responsive  = current.attr('data-items-responsive') != "" ? current.attr('data-items-responsive') : items;
				/* Valor de Márgenes */
				var margins = current.attr('data-margins') != "" ? current.attr('data-margins') : 10;				
				/* Habilitar dots */
				var dot = current.attr('data-dots') != "" ? current.attr('data-dots') : null;

				/* Generar el carousel */
				var carousel_gallery = current.owlCarousel({
					items          : items,
					lazyLoad       : false,
					loop           : true,
					margin         : parseInt(margins),
					nav            : false,
					autoplay       : true,
					responsiveClass: true,
					mouseDrag      : false,
					autoplayTimeout: 2500,
					fluidSpeed     : 2000,
					smartSpeed     : 2000,
					dots           : Boolean( dot ),
					responsive:{
				        320:{
				            items: items_responsive
				        },
				      	640:{
				            items: items
				        },
			    	}
				});
			
			/* end each */
			});
		/* end conditional */
		}


		/*|°°------------- Flechas del carousel ---------------°°|*/
		//prev carousel
		j(".js-carousel-prev").on('click',function(e){ 
			var slider = j(this).attr('data-slider');	
			j("#"+slider).trigger('prev.owl.carousel' , [900] );
		});
		//next carousel
		j(".js-carousel-next").on('click',function(e){ 
			var slider = j(this).attr('data-slider');	
			j("#"+slider).trigger('next.owl.carousel' , [900] );
		});



		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL PAGINA SERVICIOS ------|*/
		/*|----------------------------------------------------------------------|*/

		var carousel_page_service = j(".js-carousel-gallery-service");

		if( carousel_page_service.length && carousel_page_service.find('.item').length ){
			carousel_page_service.owlCarousel({
				items          : 1,
				lazyLoad       : false,
				loop           : true,
				nav            : false,
				autoplay       : true,
				responsiveClass: true,
				mouseDrag      : false,
				autoplayTimeout: 2500,
				smartSpeed     : 1500,
				dots           : true,
			});

			//prev carousel
			j("#arrow-carousel-page-service--left").on('click',function(e){ 
				carousel_page_service.trigger('prev.owl.carousel' , [900] );
			});
			//next carousel
			j("#arrow-carousel-page-service--right").on('click',function(e){ 
				carousel_page_service.trigger('next.owl.carousel' , [900] );
			});
			
		}

		/*|-------------------------------------------------------------|*/
		/*|-----  FANCYBOX GALERIA DE IMAGENES  ------|*/
		/*|--------------------------------------------------------------|*/
		j(".js-gallery-item").fancybox({
			openEffect : 'elastic',
			closeEffect: 'elastic',
		});

		/*|-------------------------------------------------------------|*/
		/*|-----  VALIDADOR FORMULARIO.  ------|*/
		/*|--------------------------------------------------------------|*/
		j('#form-contacto').parsley();

		j(document).on('submit', j('#form-contacto') , function(e){
			e.preventDefault();
			//Subir el formulario mediante ajax
			j.post( url + '/email/enviar.php', 
			{ 
				email   : j("#input_email").val(),
				message : j("#text_mensaje").val(),
				nombre  : j("#input_nombre").val(),
				servicio: j("#input_servicio").val(),
				tel     : j("#input_tel").val(),
			},function(data){
				alert( data );
				j("#input_email").val(""),
				j("#text_mensaje").val("");
				j("#input_nombre").val("");
				j("#input_servicio").val("");
				j("#input_tel").val("");

				//recargar navegador
				location.reload(); 

			});			
		});

	});
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
})(jQuery);