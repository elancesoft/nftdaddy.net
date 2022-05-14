<?php
if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

function modeltheme_addons_for_wpbakery_contact_form($params, $content) {
  extract( shortcode_atts( 
    array(
      'contact_forms'               =>	'',
      'extra_class'                 =>	'',
      'form_theme_default'          =>  '',
      'styling'                     => 	''
    ), $params ) );
   
    wp_enqueue_style( 'contact-form', plugins_url( '../../css/contact-form.css' , __FILE__ ));
    ob_start();

	$form_theme_default_class = '';
	if($form_theme_default){
	  $form_theme_default_class = 'mt-addons_contact-form--theme_default';
	}?>

    <div class="mt-addons-contact-form <?php echo esc_attr($extra_class.' '.$styling.' '.$form_theme_default_class); ?>">
      <?php if (!empty($contact_forms)) {
    	echo do_shortcode( '[contact-form-7 id="'.$contact_forms.'" title="Contact Form"]' ); 
      } ?>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('mt-addons-contact-form', 'modeltheme_addons_for_wpbakery_contact_form');

//VC Map
add_action('init','mt_addons_ccontact_form');
function mt_addons_ccontact_form(){

if (function_exists('vc_map')) {
  $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
  $contact_forms = array();
  if ( $cf7 ) {
	foreach ( $cf7 as $cform ) {
		$contact_forms[ $cform->post_title ] = $cform->ID;
	}
  } else {
	$contact_forms[ esc_html__( 'No contact forms found', 'modeltheme-addons-for-wpbakery' ) ] = 0;
}

  vc_map(
	array(
	  "name" => esc_attr__("MT: Contact Form", 'modeltheme-addons-for-wpbakery'),
	  "base" => "mt-addons-contact-form",
	  "category" => esc_attr__('MT Addons', 'modeltheme-addons-for-wpbakery'),
	  "icon" => plugins_url( 'images/form.svg', __FILE__ ),
	  "params" => array(
	  array(
		"type" => "dropdown",
		"holder" => "div",
		"class" => "",
		"heading" => esc_attr__("Contact Forms", 'modeltheme-addons-for-wpbakery'),
		"param_name" => "contact_forms",
		"std" => 'Select',
		"value" => $contact_forms
	  ),
	  array(
        "type" => "dropdown",
		"class" => "",
		"heading" => esc_attr__( 'Styling', 'modeltheme-addons-for-wpbakery' ),
        "param_name" => "styling",
        "value" => array(
          'Select Option' 	=> '',
          'Style 1'         => 'style-1'
        ),
        "default" => 'style_1'
      ),
      array(
        "heading" => esc_attr__( "Theme Default Form?", "modeltheme-addons-for-wpbakery" ),
        "type" => "checkbox",
        "class" => "",
        "param_name" => "form_theme_default",
        "description" => esc_attr__( "If checked, the form will inherit styling from the theme (input/textarea/button). By selecting a style from the option above, the default options will be overridden.", "modeltheme-addons-for-wpbakery" )
      ),
	  array(
		"type" => "textfield",
		"heading" => esc_attr__("Extra class name", "modeltheme-addons-for-wpbakery"),
		"param_name" => "extra_class",
		"description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme-addons-for-wpbakery")
	  )
	)
  ));
}}