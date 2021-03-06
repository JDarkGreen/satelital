<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('Satelital Opciones', 'Satelital Opciones', 'edit_theme_options', 'customize.php');
}

/***********************************************************************************************/
/* Add options in the theme customizer page */
/***********************************************************************************************/
add_action('customize_register', 'satelital_customize_register');
function satelital_customize_register($wp_customize) {
	// Logo 
	$wp_customize->add_section('satelital_logo', array(
		'title' => __('Logo', LANG ),
		'description' => __('Permite subir tu logo personalizado.', LANG ),
		'priority' => 35
	));
	
	$wp_customize->add_setting('satelital_custom_settings[logo]', array(
		'default' => IMAGES . '/logo.png',
		'type' => 'option'
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Carga tu Logo', LANG ),
		'section' => 'satelital_logo',
		'settings' => 'satelital_custom_settings[logo]'
	)));

	/*|-----------------------------------------------------------------------|*/
	/*|-----------------------------------------------------------------------|*/

	####>>>>>>>>>>>> MISION Y VISIÓN >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('satelital_mision_vision', array(
		'title' => __('Misión y Visión Empresa', LANG ),
		'description' => __('Sección Misión y Visión Empresa', LANG ),
		'priority' => 41
	));	
	/* MISION */
	$wp_customize->add_setting('satelital_custom_settings[text_mision_vision]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('satelital_custom_settings[text_mision_vision]', array(
		'label'    => __('Escribe el texto MISIÓN y VISIÓN', LANG ),
		'section'  => 'satelital_mision_vision',
		'settings' => 'satelital_custom_settings[text_mision_vision]',
		'type'     => 'textarea'
	));	
	####>>>>>>>>>>>> VALORES >>>>>>>>>>>>>>>>>>
	$wp_customize->add_setting('satelital_custom_settings[text_valores]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('satelital_custom_settings[text_valores]', array(
		'label'    => __('Escribe el texto VALORES', LANG ),
		'section'  => 'satelital_mision_vision',
		'settings' => 'satelital_custom_settings[text_valores]',
		'type'     => 'textarea'
	));

	/*|-----------------------------------------------------------------------|*/
	/*|-----------------------------------------------------------------------|*/

	####>>>>>>>>>>>> REDES SOCIALES >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('satelital_redes_sociales', array(
		'title' => __('Redes Sociales', LANG ),
		'description' => __('Sección Redes Sociales', LANG ),
		'priority' => 41
	));	
	//facebook
	$wp_customize->add_setting('satelital_custom_settings[red_social_fb]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('satelital_custom_settings[red_social_fb]', array(
		'label'    => __('Coloca el link de facebook de la empresa', LANG ),
		'section'  => 'satelital_redes_sociales',
		'settings' => 'satelital_custom_settings[red_social_fb]',
		'type'     => 'text'
	));
	//youtube
	$wp_customize->add_setting('satelital_custom_settings[red_social_ytube]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('satelital_custom_settings[red_social_ytube]', array(
		'label'    => __('Coloca el link de youtube de la empresa', LANG ),
		'section'  => 'satelital_redes_sociales',
		'settings' => 'satelital_custom_settings[red_social_ytube]',
		'type'     => 'text'
	));
	//twitter
	$wp_customize->add_setting('satelital_custom_settings[red_social_twitter]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('satelital_custom_settings[red_social_twitter]', array(
		'label'    => __('Coloca el link de twitter de la empresa', LANG ),
		'section'  => 'satelital_redes_sociales',
		'settings' => 'satelital_custom_settings[red_social_twitter]',
		'type'     => 'text'
	));
	//gmail
	$wp_customize->add_setting('satelital_custom_settings[red_social_gmail]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('satelital_custom_settings[red_social_gmail]', array(
		'label'    => __('Coloca el link de gmail de la empresa', LANG ),
		'section'  => 'satelital_redes_sociales',
		'settings' => 'satelital_custom_settings[red_social_gmail]',
		'type'     => 'text'
	));

	
	// Contact Email
	$wp_customize->add_section('satelital_contact_email', array(
		'title' => __('Correo Contacto', LANG ),
		'description' => __('Escribe el Correo Contacto', LANG ),
		'priority' => 37
	));
	
	$wp_customize->add_setting('satelital_custom_settings[contact_email]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('satelital_custom_settings[contact_email]', array(
		'label'    => __('Email Contacto', LANG ),
		'section'  => 'satelital_contact_email',
		'settings' => 'satelital_custom_settings[contact_email]',
		'type'     => 'text'
	));

	//Customizar celular
	$wp_customize->add_section('satelital_contact_cel', array(
		'title' => __('Celular de Contacto', LANG ),
		'description' => __('Celular de Contacto', LANG ),
		'priority' => 39
	));
	
	$wp_customize->add_setting('satelital_custom_settings[contact_cel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('satelital_custom_settings[contact_cel]', array(
		'label'    => __('Escribe el o los números de celular del contacto separados por comas', LANG ),
		'section'  => 'satelital_contact_cel',
		'settings' => 'satelital_custom_settings[contact_cel]',
		'type'     => 'text'
	));

	//Customizar telefono
	$wp_customize->add_section('satelital_contact_tel', array(
		'title' => __('Telefono de Contacto', LANG ),
		'description' => __('Telefono de Contacto', LANG ),
		'priority' => 39
	));
	
	$wp_customize->add_setting('satelital_custom_settings[contact_tel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('satelital_custom_settings[contact_tel]', array(
		'label'    => __('Escribe el numero de teléfono', LANG ),
		'section'  => 'satelital_contact_tel',
		'settings' => 'satelital_custom_settings[contact_tel]',
		'type'     => 'text'
	));

	//Customizar Direccion
	$wp_customize->add_section('satelital_contact_address', array(
		'title' => __('Direccion de Contacto', LANG ),
		'description' => __('Direccion de Contacto', LANG ),
		'priority' => 40
	));
	
	$wp_customize->add_setting('satelital_custom_settings[contact_address]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('satelital_custom_settings[contact_address]', array(
		'label'    => __('Escribe la Direccion del contacto ', LANG ),
		'section'  => 'satelital_contact_address',
		'settings' => 'satelital_custom_settings[contact_address]',
		'type'     => 'text'
	));

	//Customizar MAPA
	$wp_customize->add_section('satelital_contact_mapa', array(
		'title' => __('Mapa de Contacto', LANG ),
		'description' => __('Mapa de Contacto', LANG ),
		'priority' => 41
	));
	
	$wp_customize->add_setting('satelital_custom_settings[contact_mapa]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('satelital_custom_settings[contact_mapa]', array(
		'label'    => __('Escribe latitud y longitud de mapa sepador por coma', LANG ),
		'section'  => 'satelital_contact_mapa',
		'settings' => 'satelital_custom_settings[contact_mapa]',
		'type'     => 'text'
	));

	//Customizar WIDGET NOSOTROS
	$wp_customize->add_section('satelital_widget_nosotros', array(
		'title' => __('Sección NOSOTROS', LANG ),
		'description' => __('Sección NOSOTROS', LANG ),
		'priority' => 40
	));
	
	//textarea
	$wp_customize->add_setting('satelital_custom_settings[widget_nosotros]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('satelital_custom_settings[widget_nosotros]', array(
		'label'    => __('Escribe contenido que ira en sección nosotros - PORTADA', LANG ),
		'section'  => 'satelital_widget_nosotros',
		'settings' => 'satelital_custom_settings[widget_nosotros]',
		'type'     => 'textarea'
	));
	//imagen
	$wp_customize->add_setting('satelital_custom_settings[image_nosotros]',array(
		'default' => '',
		'type'    => 'option'
	));

	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'widget_nosotros',array(
		'label'    => __('Imagen Nosotros', LANG ),
		'section'  => 'satelital_widget_nosotros',
		'settings' => 'satelital_custom_settings[image_nosotros]',
	)));	

	//Customizar Informacion Footer
	$wp_customize->add_section('satelital_widget_footer', array(
		'title' => __('Sección Footer', LANG ),
		'description' => __('Sección Footer', LANG ),
		'priority' => 41
	));
	
	//textarea
	$wp_customize->add_setting('satelital_custom_settings[widget_footer]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('satelital_custom_settings[widget_footer]', array(
		'label'    => __('Escribe contenido en sección FOOTER', LANG ),
		'section'  => 'satelital_widget_footer',
		'settings' => 'satelital_custom_settings[widget_footer]',
		'type'     => 'textarea'
	));
	
}	
?>