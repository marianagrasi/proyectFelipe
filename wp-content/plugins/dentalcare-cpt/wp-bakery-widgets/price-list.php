<?php

add_action('vc_before_init', 'dental_care_price_list_VC');

function dental_care_price_list_VC() {
  vc_map(array(
    "name" => esc_html__("Price List", 'dental-care'),
    "base" => "dental_care_price_list",
    "class" => "",
    "show_settings_on_create" => true,
    "category" => esc_html__('Dental Care', 'dental-care'),
    "params" => array(
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Price List Title", 'dental-care'),
        "param_name" => "pricelist_title",
        "description" => esc_html__("Enter a title for this price list.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Price List Description", 'dental-care'),
        "param_name" => "pricelist_desc",
        "description" => esc_html__("Enter a description for this price list.", 'dental-care')
      ),
      array(
        'type' => 'param_group',
        'heading' => esc_html__('Item Price Settings', 'dental-care'),
        'param_name' => 'item_settings',
        'value' => array(
          'value' => urlencode(json_encode(array(
            array(
              'item_title' => esc_html__('Routine Dental Exam', 'dental-care'),
              'item_desc' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.',
              'item_price' => '$100',
            ),
          ))),
        ),
        'params' => array(
          array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Item Title", 'dental-care'),
            "param_name" => "item_title",
            'admin_label' => true,
            "description" => esc_html__("Enter the title text for item", 'dental-care')
          ),
          array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Item Description", 'dental-care'),
            "param_name" => "item_desc",
            "description" => esc_html__("Enter the description for the item", 'dental-care')
          ),
          array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Item Price", 'dental-care'),
            "param_name" => "item_price",
            "description" => esc_html__("Enter the price for item", 'dental-care')
          ),

        )
      ),
      array(
        "type" => "icon",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("List Icon", 'dental-care'),
        "param_name" => "price_list_list_icon",
        "description" => esc_html__("Choose an icon.", "dental-care"),
        "group" => "Design"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Icon Font Size", 'dental-care'),
        "param_name" => "price_list_icon_size",
        "min" => 1,
        "max" => 100,
        "suffix" => "px",
        "description" => esc_html__("Enter an icon font size.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Icon Color", 'dental-care'),
        "param_name" => "price_list_icon_color",
        "description" => esc_html__("Choose an icon color.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Header Background Color", 'dental-care'),
        "param_name" => "price_list_headerbg_color",
        "description" => esc_html__("Choose a background color or combine it with an image as an overlay.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "attach_image",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Header Background Image", 'dental-care'),
        "param_name" => "price_list_headerbg_img",
        "description" => esc_html__("Choose an image for the background.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Background Color", 'dental-care'),
        "param_name" => "price_list_bg_color",
        "description" => esc_html__("Choose a background color or combine it with an image as an overlay.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "attach_image",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Background Image", 'dental-care'),
        "param_name" => "price_list_bg_img",
        "description" => esc_html__("Choose an image for the background.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Price List Header Title Font Size", 'dental-care'),
        "param_name" => "price_list_maintitle_size",
        "min" => 1,
        "max" => 100,
        "suffix" => "px",
        "description" => esc_html__("Enter title font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Price List Header Description Color", 'dental-care'),
        "param_name" => "price_list_maintitle_color",
        "description" => esc_html__("Choose a title color.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Price List Header Description Font Size", 'dental-care'),
        "param_name" => "price_list_maindesc_size",
        "min" => 1,
        "max" => 100,
        "suffix" => "px",
        "description" => esc_html__("Enter title font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Price List Header Description Color", 'dental-care'),
        "param_name" => "price_list_maindesc_color",
        "description" => esc_html__("Choose a title color.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Price Title Font Size", 'dental-care'),
        "param_name" => "price_list_title_size",
        "min" => 1,
        "max" => 100,
        "suffix" => "px",
        "description" => esc_html__("Enter title font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Price Title Color", 'dental-care'),
        "param_name" => "price_list_title_color",
        "description" => esc_html__("Choose a title color.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Price Description Font Size", 'dental-care'),
        "param_name" => "price_list_desc_size",
        "min" => 1,
        "max" => 100,
        "suffix" => "px",
        "description" => esc_html__("Enter description font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Price Description Color", 'dental-care'),
        "param_name" => "price_list_desc_color",
        "description" => esc_html__("Choose a description color.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Price Font Size", 'dental-care'),
        "param_name" => "price_list_price_size",
        "min" => 1,
        "max" => 100,
        "suffix" => "px",
        "description" => esc_html__("Enter price font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Price Color", 'dental-care'),
        "param_name" => "price_list_price_color",
        "description" => esc_html__("Choose a price color.", 'dental-care'),
        "group" => "Typography"
      ),
    )
  )
);
}

function dental_care_price_list_shortcode($atts, $content = NULL) {

  extract(shortcode_atts(array(
    'param' => '',
    'price_list_bg_color' => '',
    'price_list_bg_img' => '',
    'price_list_headerbg_color' => '',
    'price_list_headerbg_img' => '',
    'price_list_title_size' => '',
    'price_list_title_color' => '',
    'price_list_desc_size' => '',
    'price_list_desc_color' => '',
    'price_list_price_size' => '',
    'price_list_price_color' => '',
    'price_list_list_icon' => '',
    'price_list_icon_size' => '',
    'price_list_icon_color' => '',
    'pricelist_title' => '',
    'pricelist_desc' => '',
    'price_list_maintitle_size' => '',
    'price_list_maintitle_color' => '',
    'price_list_maindesc_size' => '',
    'price_list_maindesc_color' => '',
  ), $atts));

  $price_list_bg_img_src = '';
  $price_list_headerbg_img_src = '';

  if ($price_list_bg_img != '') {
    $price_list_bg_img_src = wp_get_attachment_url($price_list_bg_img, 'full', false, false);
  }

  if ($price_list_headerbg_img != '') {
    $price_list_headerbg_img_src = wp_get_attachment_url($price_list_headerbg_img, 'full', false, false);
  }

  $item_settings = (array) vc_param_group_parse_atts($atts['item_settings']);

  $string = '<div class="dental-care-price-list-widget" style="';

  if ($price_list_bg_color != '') {
    $string .= 'background:linear-gradient(
      ' . esc_attr($price_list_bg_color) . ',
      ' . esc_attr($price_list_bg_color) . '
      ) ';
      if ($price_list_bg_img_src != '') {
        $string .= ',url(' . esc_url($price_list_bg_img_src) . ') no-repeat center center; background-size:cover;';
      } else {
        $string .= ';';
      }
    }

    $string .= '">';

    if($pricelist_title != ''){
      $string .= '<div class="price-list-header" style="';

      if ($price_list_headerbg_color != '') {
        $string .= 'background:linear-gradient(
          ' . esc_attr($price_list_headerbg_color) . ',
          ' . esc_attr($price_list_headerbg_color) . '
          ) ';
          if ($price_list_headerbg_img_src != '') {
            $string .= ',url(' . esc_url($price_list_headerbg_img_src) . ') no-repeat center center; background-size:cover;';
          } else {
            $string .= ';';
          }
        }

        $string .= '">';
        $string .= '<h3 class="price-list-main-title" style="';

        if ($price_list_maintitle_color != "") {
          $string .= ' color:' . esc_attr($price_list_maintitle_color) . ';';
        }
        if ($price_list_maintitle_size != "") {
          $string .= ' font-size:' . esc_attr($price_list_maintitle_size) . 'px;';
        }

        $string .='">'.esc_html($pricelist_title).'</h3>';


        if($pricelist_desc != ''){
          $string .= '<span class="price-list-main-desc" style="';

          if ($price_list_maindesc_color != "") {
            $string .= ' color:' . esc_attr($price_list_maindesc_color) . ';';
          }
          if ($price_list_maindesc_size != "") {
            $string .= ' font-size:' . esc_attr($price_list_maindesc_size) . 'px;';
          }

          $string .= '">'.esc_html($pricelist_desc).'</span>';
        }
        $string .= '</div>';
      }

      $string .= '<div class="price-list-content" style="';

      $string .= '">';
      foreach ($item_settings as $item) {

        $string .='<div class="price-list-item">';

        if($price_list_list_icon != ''){
          $string .= '<i class="price-list-icon ' .esc_attr($price_list_list_icon).'" style="';

          if ($price_list_icon_color != "") {
            $string .= ' color:' . esc_attr($price_list_icon_color) . ';';
          }
          if ($price_list_icon_size != "") {
            $string .= ' font-size:' . esc_attr($price_list_icon_size) . 'px;';
          }

          $string .= '"></i>';
        }

        $string .= '<div class="price-list-details">';

        $string .='<div class="price-list-title" style="';

        if ($price_list_title_color != "") {
          $string .= ' color:' . esc_attr($price_list_title_color) . ';';
        }
        if ($price_list_title_size != "") {
          $string .= ' font-size:' . esc_attr($price_list_title_size) . 'px;';
        }

        $string .='">';
        $string .='<h6>' . esc_html($item['item_title']) . '</h6>';
        $string .='</div>';

        $item_desc = isset($item['item_desc']);
        if($item_desc == true){
          $string .='<div class="price-list-desc" style="';

          if ($price_list_desc_color != "") {
            $string .= ' color:' . esc_attr($price_list_desc_color) . ';';
          }
          if ($price_list_desc_size != "") {
            $string .= ' font-size:' . esc_attr($price_list_desc_size) . 'px;';
          }

          $string .='">';

          $string .='<span>' . esc_html($item['item_desc']) . '</span>';
          $string .='</div>';
        }

        $string .='</div>';

        $string .='<div class="price-list-price"  style="';

        if ($price_list_price_color != "") {
          $string .= ' color:' . esc_attr($price_list_price_color) . ';';
        }
        if ($price_list_price_size != "") {
          $string .= ' font-size:' . esc_attr($price_list_price_size) . 'px;';
        }

        $string .='">';
        $string .='<h6>' . esc_html($item['item_price']) . '</h6>';
        $string .='</div>';
        $string .='</div>';

      }

      $string .= '</div>';

      $string .= '</div>';

      return $string;
    }
