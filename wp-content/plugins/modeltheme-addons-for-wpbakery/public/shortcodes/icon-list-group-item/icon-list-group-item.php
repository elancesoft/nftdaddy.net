<?php
if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

function modeltheme_addons_for_wpbakery_icon_list($params, $content) {
    extract( shortcode_atts( 
      array(
          'icon_type'               => '',
          'icon_dropdown'           => 'fontawesome',
          'icon_fontawesome'        => 'fas fa-adjust',
          'icon_typicons'           => '',
          'icon_openiconic'         => '',
          'icon_entypo'             => '',
          'icon_material'           => '',
          'icon_linecons'           => '',
          'icon_url'                => '#',
          'icon_position'           => '',
          'image'                   => '',
          'image_max_width'         => '50',
          'image_margin'            => '20',
          'icon_size'               => '30',
          'icon_color'              => '#222',
          'style_block'             => '',
          'section_aligment'        => 'text-center',

          'title'                   => '',
          'title_size'              => '16',
          'title_height'            => '16',
          'title_weight'            => '700',
          'title_color'             => '#343e47',

          'subtitle'                => '',
          'subtitle_size'           => '16',
          'subtitle_color'          => '#3d404f',

          'el_class'                => '',
      ), $params ) );

  wp_enqueue_style( 'icon-css', plugins_url( '../../css/icon-list-group-item.css' , __FILE__ ));

  if($image) {
    $thumb      = wp_get_attachment_image_src($image, "full");
    $thumb_src  = $thumb[0];
  }

  vc_icon_element_fonts_enqueue( $icon_dropdown );

  ob_start(); 
  $url_link = vc_build_link($icon_url); 

  $icon_position_style = 'layout_before';
  if($icon_position == "layout_before") {
    $icon_position_style = 'mt-addons-before_content';
  } else if ($icon_position == "layout_top") {
    $icon_position_style = 'mt-addons-top_content';
  }
  $style_block_style = '';
  if($style_block == "box_shadow") {
    $style_block_style = 'mt-addons-box-shadow';
  }
 
  ?>
  <div class="mt-icon-listgroup-item wow <?php echo esc_attr($el_class); echo esc_attr($style_block_style); ?> <?php echo esc_attr($section_aligment);?>">
      <div class="mt-icon-listgroup-holder <?php echo esc_attr($icon_position_style); ?>">

        <div class="mt-icon-listgroup-icon-holder-inner">
          <?php if(empty($image)) { ?>
            <a href="<?php echo esc_url($url_link['url']); ?>" target="<?php echo esc_attr($url_link['target']); ?>" rel="<?php echo esc_attr($url_link['rel']); ?>">
              <span style="font-size:<?php echo esc_attr($icon_size); ?>px;color:<?php echo esc_attr($icon_color); ?>" 
                class="vc_icon_element-icon <?php echo esc_attr('icon_').$icon_dropdown; ?> <?php echo esc_attr( ${'icon_' . $icon_dropdown} ) ?>">
              </span>
            </a>
          <?php } else { ?>
          <a href="<?php echo esc_url($url_link['url']); ?>" target="<?php echo esc_attr($url_link['target']); ?>" rel="<?php echo esc_attr($url_link['rel']); ?>">
            <img alt="list-image" style="max-width:<?php echo esc_attr($image_max_width);?>px;margin-right: <?php echo esc_attr($image_margin);?>px;" class="mt-image-list" src="<?php echo esc_attr($thumb_src); ?>">
          <?php } ?>
          </a>
        </div>
        <div class="mt-icon-listgroup-content-holder-inner">
          <h3 class="mt-icon-listgroup-title"><a href="<?php echo esc_url($url_link['url']); ?>" target="<?php echo esc_attr($url_link['target']); ?>" rel="<?php echo esc_attr($url_link['rel']); ?>"style="font-size:<?php echo esc_attr($title_size);?>px;line-height:<?php echo esc_attr($title_height);?>px;font-weight:<?php echo esc_attr($title_weight);?>;color:<?php echo esc_attr($title_color);?>"><?php echo esc_attr($title);?></a>
          </h3>
          <p class="mt-icon-listgroup-text" style="font-size:<?php echo esc_attr($subtitle_size);?>px; color:<?php echo esc_attr($subtitle_color);?>"><?php echo esc_attr($subtitle);?></p>          
        </div>
      </div>
   </div>
  <?php
  return ob_get_clean();
}
add_shortcode('mt-addons-icon-list', 'modeltheme_addons_for_wpbakery_icon_list');

//VC Map
if (function_exists('vc_map')) {

  $params = array();

  $params_shortcode = array(
    array(
      "group" => "Icon",
      "type" => "dropdown",
      "heading" => esc_attr__("Section Aligment", 'modeltheme-addons-for-wpbakery'),
      "param_name" => "section_aligment",
      "holder" => "div",
      "value" => array(
        'Select'          => '',
        'Left'            => 'text-left',
        'Center'          => 'text-center',
        'Right'           => 'text-right'
      ),
      "class" => ""
    ),
    array(
      "group" => "Icon",
      "type" => "dropdown",
      "heading" => esc_attr__("Icon Position", 'modeltheme-addons-for-wpbakery'),
      "param_name" => "icon_position",
      "holder" => "div",
      "std" => 'round',
      "value" => array(
        'Select'          => '',
        'Before Content'  => 'layout_before',
        'Top'             => 'layout_top'
      ),
      "class" => ""
    ),
    array(
      "group" => "Icon",
      "type" => "dropdown",
      "heading" => esc_attr__("Style", 'modeltheme-addons-for-wpbakery'),
      "param_name" => "style_block",
      "holder" => "div",
      "value" => array(
        'Select'          => '',
        'Box Shadow'      => 'box_shadow'
      ),
      "class" => ""
    ),
    array(
      "group" => "Title",
      "type" => "textfield",
      "heading" => esc_attr__("Title", 'modeltheme-addons-for-wpbakery'),
      "param_name" => "title",
      "std" => '',
      "holder" => "div",
      "class" => ""
    ),
    array(
      "group" => "Title",
      "type" => "vc_number",
      "suffix" => "px",
      "heading" => esc_attr__("Font Size", 'modeltheme-addons-for-wpbakery'),
      "param_name" => "title_size",
      "std" => '',
      "holder" => "div",
      "class" => ""
    ),
    array(
      "group" => "Title",
      "type" => "vc_number",
      "suffix" => "px",
      "heading" => esc_attr__("Font Weight", 'modeltheme-addons-for-wpbakery'),
      "param_name" => "title_weight",
      "std" => '',
      "holder" => "div",
      "class" => ""
    ),
    array(
      "group" => "Title",
      "type" => "vc_number",
      "suffix" => "px",
      "heading" => esc_attr__("Line Height", 'modeltheme-addons-for-wpbakery'),
      "param_name" => "title_height",
      "std" => '',
      "holder" => "div",
      "class" => ""
    ),
    array(
      "group" => "Title",
      "type" => "colorpicker",
      "heading" => esc_attr__("Color", 'modeltheme-addons-for-wpbakery'),
      "param_name" => "title_color",
      "std" => '',
      "holder" => "div",
      "class" => ""
    ),
    array(
      "group" => "Subtitle",
      "type" => "textfield",
      "heading" => esc_attr__("Label/SubTitle", 'modeltheme'),
      "param_name" => "subtitle",
      "std" => '',
      "holder" => "div",
      "class" => ""
    ),
    array(
      "group" => "Subtitle",
      "type" => "vc_number",
      "suffix" => "px",
      "heading" => esc_attr__("SubTitle Font Size", 'modeltheme'),
      "param_name" => "subtitle_size",
      "std" => '',
      "holder" => "div",
      "class" => ""
    ),
    array(
      "group" => "Subtitle",
      "type" => "colorpicker",
      "heading" => esc_attr__("SubTitle Color", 'modeltheme'),
      "param_name" => "subtitle_color",
      "std" => '',
      "holder" => "div",
      "class" => ""
    ) 
  );

  $icons_vc_fields = modeltheme_addons_icons_vc_fields('Icon');

  if ($icons_vc_fields) {
    foreach ($icons_vc_fields as $icon_field) {
      $params[] = $icon_field;
    }
  }

  if ($params_shortcode) {
    foreach ($params_shortcode as $param) {
      $params[] = $param;
    }
  }


  $extras_vc_fields = modeltheme_addons_extras_vc_fields();
  if ($extras_vc_fields) {
    foreach ($extras_vc_fields as $extra_param) {
      $params[] = $extra_param;
    }
  }

  vc_map(
    array(
      "name" => esc_attr__("MT: Icon with Text", 'modeltheme-addons-for-wpbakery'),
      "base" => "mt-addons-icon-list",
      "category" => esc_attr__('MT Addons', 'modeltheme-addons-for-wpbakery'),
      "icon" => plugins_url( 'images/icon-with-text.svg', __FILE__ ),
      "params" => $params,
  ));
}