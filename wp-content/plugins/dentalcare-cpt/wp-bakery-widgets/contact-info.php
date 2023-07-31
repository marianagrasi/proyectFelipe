<?php

add_action('vc_before_init', 'dental_care_contact_info_VC');

function dental_care_contact_info_VC() {
  vc_map(array(
    "name" => esc_html__("Contact Info", 'dental-care'),
    "base" => "dental_care_contact_info",
    "class" => "",
    "category" => esc_html__('Dental Care', 'dental-care'),
    "params" => array(
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Title", 'dental-care'),
        "param_name" => "contact_info_title",
        "description" => esc_html__("Enter a title for the contact info widget.", 'dental-care')
      ),
      array(
        "type" => "textarea",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Description", 'dental-care'),
        "param_name" => "contact_info_desc",
        "description" => esc_html__("Enter a description for the contact info widget.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Address", 'dental-care'),
        "param_name" => "address_text",
        "description" => esc_html__("Enter contact text", 'dental-care')
      ),
      array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Use Custom Icon", 'dental-care'),
        "param_name" => "custom_address_icon_en",
        "description" => esc_html__("Choose if to use an icon.", 'dental-care'),
        "value" => array(
          "" => "",
          "Yes" => "yes",
          "No" => "no",
        )
      ),
      array(
        "type" => "icon",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Address Icon", 'dental-care'),
        "param_name" => "address_icon",
        "dependency" => array("element" => "custom_address_icon_en", "value" => array("yes")),
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Phone", 'dental-care'),
        "param_name" => "phone_text",
        "description" => esc_html__("Enter contact text", 'dental-care')
      ),
      array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Use Custom Icon", 'dental-care'),
        "param_name" => "custom_phone_icon_en",
        "description" => esc_html__("Choose if to use an icon.", 'dental-care'),
        "value" => array(
          "" => "",
          "Yes" => "yes",
          "No" => "no",
        )
      ),
      array(
        "type" => "icon",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Phone Icon", 'dental-care'),
        "param_name" => "phone_icon",
        "dependency" => array("element" => "custom_phone_icon_en", "value" => array("yes")),
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Mobile", 'dental-care'),
        "param_name" => "mobile_text",
        "description" => esc_html__("Enter contact text", 'dental-care')
      ),
      array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Use Custom Icon", 'dental-care'),
        "param_name" => "custom_mobile_icon_en",
        "description" => esc_html__("Choose if to use an icon.", 'dental-care'),
        "value" => array(
          "" => "",
          "Yes" => "yes",
          "No" => "no",
        )
      ),
      array(
        "type" => "icon",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Mobile Icon", 'dental-care'),
        "param_name" => "mobile_icon",
        "dependency" => array("element" => "custom_mobile_icon_en", "value" => array("yes")),
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Fax", 'dental-care'),
        "param_name" => "fax_text",
        "description" => esc_html__("Enter contact text", 'dental-care')
      ),
      array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Use Custom Icon", 'dental-care'),
        "param_name" => "custom_fax_icon_en",
        "description" => esc_html__("Choose if to use an icon.", 'dental-care'),
        "value" => array(
          "" => "",
          "Yes" => "yes",
          "No" => "no",
        )
      ),
      array(
        "type" => "icon",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Fax Icon", 'dental-care'),
        "param_name" => "fax_icon",
        "dependency" => array("element" => "custom_fax_icon_en", "value" => array("yes")),
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Email", 'dental-care'),
        "param_name" => "email_text",
        "description" => esc_html__("Enter contact text", 'dental-care')
      ),
      array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Use Custom Icon", 'dental-care'),
        "param_name" => "custom_email_icon_en",
        "description" => esc_html__("Choose if to use an icon.", 'dental-care'),
        "value" => array(
          "" => "",
          "Yes" => "yes",
          "No" => "no",
        )
      ),
      array(
        "type" => "icon",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Email Icon", 'dental-care'),
        "param_name" => "email_icon",
        "dependency" => array("element" => "custom_email_icon_en", "value" => array("yes")),
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Facebook", 'dental-care'),
        "param_name" => "facebook_link",
        "description" => esc_html__("Enter social network link.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Twitter", 'dental-care'),
        "param_name" => "twitter_link",
        "description" => esc_html__("Enter social network link.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Google Plus", 'dental-care'),
        "param_name" => "googleplus_link",
        "description" => esc_html__("Enter social network link.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Instagram", 'dental-care'),
        "param_name" => "instagram_link",
        "description" => esc_html__("Enter social network link.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Linkedin", 'dental-care'),
        "param_name" => "linkedin_link",
        "description" => esc_html__("Enter social network link.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Vimeo", 'dental-care'),
        "param_name" => "vimeo_link",
        "description" => esc_html__("Enter social network link.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Youtube", 'dental-care'),
        "param_name" => "youtube_link",
        "description" => esc_html__("Enter social network link.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Tumblr", 'dental-care'),
        "param_name" => "tumblr_link",
        "description" => esc_html__("Enter social network link.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Flickr", 'dental-care'),
        "param_name" => "flickr_link",
        "description" => esc_html__("Enter social network link.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Pinterest", 'dental-care'),
        "param_name" => "pinterest_link",
        "description" => esc_html__("Enter social network link.", 'dental-care')
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Icon Color", 'dental-care'),
        "param_name" => "contact_info_icon_color",
        "description" => esc_html__("Choose an icon color.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Icon Background Color", 'dental-care'),
        "param_name" => "contact_info_icon_bg_color",
        "description" => esc_html__("Choose an icon color.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Icon Font Size", 'dental-care'),
        "param_name" => "contact_info_icon_size",
        "description" => esc_html__("Enter an icon font size.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Enable Shadow", 'dental-care'),
        "param_name" => "contact_info_box_shadow_en",
        "description" => esc_html__("Choose to enable/disable box shadow", 'dental-care'),
        "value" => array("" => "", "On" => "on", "Off" => "off"),
        "group" => "Design"
      ),
      array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Enable Translate on Hover", 'dental-care'),
        "param_name" => "contact_info_box_translate_en",
        "description" => esc_html__("Choose to enable/disable box shadow", 'dental-care'),
        "value" => array("" => "", "On" => "on", "Off" => "off"),
        "group" => "Design"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Title Header Background Color", 'dental-care'),
        "param_name" => "contact_info_header_bgcolor",
        "description" => esc_html__("Choose a title header background color.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "attach_image",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Title Header Background Image", 'dental-care'),
        "param_name" => "contact_info_headerbg_img",
        "description" => esc_html__("Choose an image for the background.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Background Color", 'dental-care'),
        "param_name" => "contact_info_bg_color",
        "description" => esc_html__("Choose a background color or combine it with an image as an overlay.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "attach_image",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Background Image", 'dental-care'),
        "param_name" => "contact_info_bg_img",
        "description" => esc_html__("Choose an image for the background.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Border Color", 'dental-care'),
        "param_name" => "contact_info_border_color",
        "description" => esc_html__("Choose a border colour for the price list.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "textfield",
        "class" => "",
        "heading" => esc_html__("Border Width", 'dental-care'),
        "param_name" => "contact_info_border_width",
        "description" => esc_html__("Choose a border width.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Border Style", 'dental-care'),
        "param_name" => "contact_info_border_style",
        "description" => esc_html__("Choose a border style.", 'dental-care'),
        "value" => array("" => "", "Solid" => "solid", "Dotted" => "dotted", "Dashed" => "dashed", "Double" => "double", "None" => "none"),
        "group" => "Design"
      ),
      array(
        "type" => "textfield",
        "class" => "",
        "heading" => esc_html__("Border Radius", 'dental-care'),
        "param_name" => "contact_info_border_radius",
        "description" => esc_html__("Choose a border radius.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Company Info Background Hover Color", 'dental-care'),
        "param_name" => "contact_info_bg_hover_color",
        "description" => esc_html__("Choose a background hover color.", 'dental-care'),
        "group" => "Hover"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Company Info Border Hover Color", 'dental-care'),
        "param_name" => "contact_info_border_hover_color",
        "description" => esc_html__("Choose a border hover color.", 'dental-care'),
        "group" => "Hover"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Company Info Font Size", 'dental-care'),
        "param_name" => "contact_info_items_font_size",
        "description" => esc_html__("Enter contact info details font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Company Info Font Weight", 'dental-care'),
        "param_name" => "contact_info_items_font_weight",
        "description" => esc_html__("Enter contact info details font weight.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Company Info Color", 'dental-care'),
        "param_name" => "contact_info_items_color",
        "description" => esc_html__("Choose a contact info details color.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Title Font Size", 'dental-care'),
        "param_name" => "contact_info_title_size",
        "description" => esc_html__("Enter a title font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Title Font Weight", 'dental-care'),
        "param_name" => "contact_info_title_weight",
        "description" => esc_html__("Enter a title font weight.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Title Color", 'dental-care'),
        "param_name" => "contact_info_title_color",
        "description" => esc_html__("Choose a title color.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Description Font Size", 'dental-care'),
        "param_name" => "contact_info_desc_size",
        "description" => esc_html__("Enter a description font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Description Font Weight", 'dental-care'),
        "param_name" => "contact_info_desc_weight",
        "description" => esc_html__("Enter a description font weight.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Description Color", 'dental-care'),
        "param_name" => "contact_info_desc_color",
        "description" => esc_html__("Choose a description color.", 'dental-care'),
        "group" => "Typography"
      ),
    )
  ));
}

function dental_care_contact_info_shortcode($atts, $content = NULL) {
  global $post;
  extract(shortcode_atts(array(
    'param' => '',
    'contact_info_title' => '',
    'contact_info_desc' => '',
    'address_text' => '',
    'address_icon' => '',
    'phone_text' => '',
    'phone_icon' => '',
    'mobile_text' => '',
    'mobile_icon' => '',
    'fax_text' => '',
    'fax_icon' => '',
    'email_text' => '',
    'email_icon' => '',
    'facebook_link' => '',
    'twitter_link' => '',
    'pinterest_link' => '',
    'googleplus_link' => '',
    'instagram_link' => '',
    'linkedin_link' => '',
    'vimeo_link' => '',
    'youtube_link' => '',
    'tumblr_link' => '',
    'flickr_link' => '',
    'contact_info_items_font_size' => '',
    'contact_info_items_font_weight' => '',
    'contact_info_items_color' => '',
    'contact_info_title_size' => '',
    'contact_info_title_weight' => '',
    'contact_info_title_color' => '',
    'contact_info_desc_size' => '',
    'contact_info_desc_weight' => '',
    'contact_info_desc_color' => '',
    'contact_info_icon_color' => '',
    'contact_info_icon_bg_color' => '',
    'contact_info_icon_size' => '',
    'contact_info_header_bgcolor' => '',
    'contact_info_headerbg_img' => '',
    'contact_info_box_shadow_en' => '',
    'contact_info_box_translate_en' => '',
    'contact_info_bg_color' => '',
    'contact_info_bg_img' => '',
    'contact_info_border_color' => '',
    'contact_info_border_width' => '',
    'contact_info_border_style' => '',
    'contact_info_border_radius' => '',
    'contact_info_bg_hover_color' => '',
    'contact_info_border_hover_color' => '',
  ), $atts));

  $contact_info_bg_img_src = '';
  $contact_info_headerbg_img_src = '';

  if ($contact_info_bg_img != '') {
    $contact_info_bg_img_src = wp_get_attachment_url($contact_info_bg_img, 'full', false, false);
  }

  if ($contact_info_headerbg_img != '') {
    $contact_info_headerbg_img_src = wp_get_attachment_url($contact_info_headerbg_img, 'full', false, false);
  }

  $string = '<div class="dental-care-contact-info-widget';

  if($contact_info_box_translate_en == 'on'){
    $string .= ' translate-en';
  }

  $string .= '" style="';

  if ($contact_info_border_color != "") {
    $string .= ' border-color:' . esc_attr($contact_info_border_color) . ';';
  }

  if ($contact_info_border_radius != "") {
    $string .= ' border-radius:' . esc_attr($contact_info_border_radius) . 'px;';
  }

  if ($contact_info_border_style != "") {
    $string .= ' border-style:' . esc_attr($contact_info_border_style) . ';';
  }

  if ($contact_info_border_width != "") {
    $string .= ' border-width:' . esc_attr($contact_info_border_width) . 'px;';
  }

  if ($contact_info_bg_color != ''):
    $string .= 'background:linear-gradient(
      ' . esc_attr($contact_info_bg_color) . ',
      ' . esc_attr($contact_info_bg_color) . '
      ) ';
      if ($contact_info_bg_img_src != '') {
        $string .= ',url(' . esc_url($contact_info_bg_img_src) . ') no-repeat center center; background-size:cover;';
      } else {
        $string .= ';';
      }

    endif;

    if ($contact_info_box_shadow_en == "on") {
      $string .= ' -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.08);';
      $string .= ' box-shadow: 0 0 10px rgba(0,0,0,0.08);';
    }

    $string .= '"';

    if ($contact_info_border_color != '') {
      $string .= ' data-contact-info-bordercolor="' . esc_attr($contact_info_border_color) . '"';
    }

    if ($contact_info_border_hover_color != '') {
      $string .= ' data-contact-info-hover-bordercolor="' . esc_attr($contact_info_border_hover_color) . '"';
    }

    if ($contact_info_bg_color != '') {
      $string .= ' data-contact-info-bgcolor="' . esc_attr($contact_info_bg_color) . '"';
    }

    if ($contact_info_bg_hover_color != '') {
      $string .= ' data-contact-info-hover-bgcolor="' . esc_attr($contact_info_bg_hover_color) . '"';
    }

    if ($contact_info_bg_img_src != '') {
      $string .= ' data-contact-info-bgimg="' . esc_attr($contact_info_bg_img_src) . '"';
    }


    $string .= '>';

    if ($contact_info_title != '') {
      $string .= '<div class="contact-info-header" style="';

      if ($contact_info_header_bgcolor != '') {
        $string .= 'background:linear-gradient(
          ' . esc_attr($contact_info_header_bgcolor) . ',
          ' . esc_attr($contact_info_header_bgcolor) . '
          ) ';
          if ($contact_info_headerbg_img_src != '') {
            $string .= ',url(' . esc_url($contact_info_headerbg_img_src) . ') no-repeat center center; background-size:cover;';
          } else {
            $string .= ';';
          }
        }

        $string .= '">';

        if ($contact_info_title != '') {
          $string .= '<h3 class="contact-info-header-title" style="';

          if ($contact_info_title_color != "") {
            $string .= ' color:' . esc_attr($contact_info_title_color) . ';';
          }
          if ($contact_info_title_size != "") {
            $string .= ' font-size:' . esc_attr($contact_info_title_size) . 'px;';
          }
          if ($contact_info_title_weight != "") {
            $string .= ' font-weight:' . esc_attr($contact_info_title_weight) . ';';
          }

          $string .= '">' . esc_html($contact_info_title) . '</h3>';
        }

        if ($contact_info_desc != '') {
          $string .= '<span class="contact-info-desc" style="';

          if ($contact_info_desc_color != "") {
            $string .= ' color:' . esc_attr($contact_info_desc_color) . ';';
          }
          if ($contact_info_desc_size != "") {
            $string .= ' font-size:' . esc_attr($contact_info_desc_size) . 'px;';
          }
          if ($contact_info_desc_weight != "") {
            $string .= ' font-weight:' . esc_attr($contact_info_desc_weight) . ';';
          }

          $string .= '">' . esc_html($contact_info_desc) . '</span>';
        }

        $string .= '</div>';
      }

      $string .= '<div class="contact-info-items ';

      if($contact_info_bg_color != '' || $contact_info_bg_img != '' || $contact_info_border_color != ''){
        $string .= 'info-item-padding';
      }

      $string .= '">';

      if ($address_text != '') {
        $string .= '<div class="contact-info-item" style="';

        if ($contact_info_items_font_size != '') {
          $string .= ' font-size:' . esc_attr($contact_info_items_font_size) . 'px;';
        }

        if ($contact_info_items_font_weight != '') {
          $string .= ' font-weight:' . esc_attr($contact_info_items_font_weight) . ';';
        }

        if ($contact_info_items_color != '') {
          $string .= ' color:' . esc_attr($contact_info_items_color) . ';';
        }

        $string .= '">';

        $string .= '<div class= "contact-info-item-icon-wrap ';

        if($contact_info_icon_bg_color != ''){
          $string .= 'contact-info-item-icon-bg';
        }

        $string .= '" style="';

        $string .= '">';
        $string .= '<i style="';

        if ($contact_info_icon_size != '') {
          $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
        }

        if ($contact_info_icon_color != '') {
          $string .= ' color:' . esc_attr($contact_info_icon_color) . ';';
        }

        if($contact_info_icon_bg_color != ''){
          $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          $string .= ' height: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
          $string .= ' line-height: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
          $string .= ' width: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
        }

        $string .= '" class="';

        if ($address_icon != '') {
          $string .= '' . esc_attr($address_icon) . '';
        } else {
          $string .= 'fa fa-map-marker';
        }

        $string .= '"></i>';
        $string .= '</div>';

        $string .= '<div class="contact-info-detail">';
        $string .=   esc_html($address_text) ;
        $string .= '</div>';

        $string .= '</div>';
      }
      if ($phone_text != '') {
        $string .= '<div class="contact-info-item">';


        $string .= '<div class= "contact-info-item-icon-wrap ';

        if($contact_info_icon_bg_color != ''){
          $string .= 'contact-info-item-icon-bg';
        }

        $string .= '" style="';

        $string .= '">';
        $string .= '<i style="';

        if ($contact_info_icon_size != '') {
          $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
        }

        if ($contact_info_icon_color != '') {
          $string .= ' color:' . esc_attr($contact_info_icon_color) . ';';
        }

        if($contact_info_icon_bg_color != ''){
          $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          $string .= ' height: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
          $string .= ' line-height: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
          $string .= ' width: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
        }

        $string .= '" class="';

        if ($phone_icon != '') {
          $string .= '' . esc_attr($phone_icon) . '';
        } else {
          $string .= 'fa fa-phone';
        }

        $string .= '"></i>';
        $string .= '</div>';

        $string .= '<div class="contact-info-detail">';
        $string .= '<a style="';

        if ($contact_info_items_font_size != '') {
          $string .= ' font-size:' . esc_attr($contact_info_items_font_size) . 'px;';
        }

        if ($contact_info_items_font_weight != '') {
          $string .= ' font-weight:' . esc_attr($contact_info_items_font_weight) . ';';
        }

        if ($contact_info_items_color != '') {
          $string .= ' color:' . esc_attr($contact_info_items_color) . ';';
        }

        $string .= '" href="tel:' . esc_html($phone_text) . '">' . esc_html($phone_text) . '</a>';
        $string .= '</div>';

        $string .= '</div>';
      }
      if ($mobile_text != '') {
        $string .= '<div class="contact-info-item"> ';

        $string .= '<div class= "contact-info-item-icon-wrap ';

        if($contact_info_icon_bg_color != ''){
          $string .= 'contact-info-item-icon-bg';
        }

        $string .= '" style="';

        $string .= '">';
        $string .= '<i style="';

        if ($contact_info_icon_size != '') {
          $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
        }

        if ($contact_info_icon_color != '') {
          $string .= ' color:' . esc_attr($contact_info_icon_color) . ';';
        }

        if($contact_info_icon_bg_color != ''){
          $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          $string .= ' height: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
          $string .= ' line-height: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
          $string .= ' width: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
        }

        $string .= '" class="';

        if ($mobile_icon != '') {
          $string .= '' . esc_attr($mobile_icon) . '';
        } else {
          $string .= 'fa fa-mobile';
        }

        $string .= '"></i>';
        $string .= '</div>';

        $string .= '<div class="contact-info-detail">';
        $string .= '<a style="';

        if ($contact_info_items_font_size != '') {
          $string .= ' font-size:' . esc_attr($contact_info_items_font_size) . 'px;';
        }

        if ($contact_info_items_font_weight != '') {
          $string .= ' font-weight:' . esc_attr($contact_info_items_font_weight) . ';';
        }

        if ($contact_info_items_color != '') {
          $string .= ' color:' . esc_attr($contact_info_items_color) . ';';
        }

        $string .= '" href="tel:' . esc_html($mobile_text) . '">' . esc_html($mobile_text) . '</a>';
        $string .= '</div>';

        $string .= '</div>';
      }

      if ($fax_text != '') {
        $string .= '<div class="contact-info-item" style="';

        if ($contact_info_items_font_size != '') {
          $string .= ' font-size:' . esc_attr($contact_info_items_font_size) . 'px;';
        }

        if ($contact_info_items_font_weight != '') {
          $string .= ' font-weight:' . esc_attr($contact_info_items_font_weight) . ';';
        }

        if ($contact_info_items_color != '') {
          $string .= ' color:' . esc_attr($contact_info_items_color) . ';';
        }

        $string .= '">';

        $string .= '<div class= "contact-info-item-icon-wrap ';

        if($contact_info_icon_bg_color != ''){
          $string .= 'contact-info-item-icon-bg';
        }

        $string .= '" style="';

        $string .= '">';

        $string .= '<i style="';

        if ($contact_info_icon_size != '') {
          $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
        }

        if ($contact_info_icon_color != '') {
          $string .= ' color:' . esc_attr($contact_info_icon_color) . ';';
        }

        if($contact_info_icon_bg_color != ''){
          $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          $string .= ' height: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
          $string .= ' line-height: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
          $string .= ' width: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
        }

        $string .= '" class="';

        if ($fax_icon != '') {
          $string .= '' . esc_attr($fax_icon) . '';
        } else {
          $string .= 'fa fa-fax';
        }

        $string .= '"></i>';
        $string .= '</div>';

        $string .= '<div class="contact-info-detail">';
        $string .= esc_html($fax_text);
        $string .= '</div>';

        $string .= '</div>';
      }

      if ($email_text != '') {
        $string .= '<div class="contact-info-item">';

        $string .= '<div class= "contact-info-item-icon-wrap ';

        if($contact_info_icon_bg_color != ''){
          $string .= 'contact-info-item-icon-bg';
        }

        $string .= '" style="';

        $string .= '">';
        $string .= '<i style="';

        if ($contact_info_icon_size != '') {
          $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
        }

        if ($contact_info_icon_color != '') {
          $string .= ' color:' . esc_attr($contact_info_icon_color) . ';';
        }

        if($contact_info_icon_bg_color != ''){
          $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          $string .= ' height: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
          $string .= ' line-height: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
          $string .= ' width: ' . esc_attr($contact_info_icon_size * 1.8) . 'px !important;';
        }

        $string .= '" class="';

        if ($email_icon != '') {
          $string .= '' . esc_attr($email_icon) . '';
        } else {
          $string .= 'fa fa-envelope-o';
        }

        $string .= '"></i>';
        $string .= '</div>';

        $string .= '<div class="contact-info-detail">';
        $string .= '<a style="';

        if ($contact_info_items_font_size != '') {
          $string .= ' font-size:' . esc_attr($contact_info_items_font_size) . 'px;';
        }

        if ($contact_info_items_font_weight != '') {
          $string .= ' font-weight:' . esc_attr($contact_info_items_font_weight) . ';';
        }

        if ($contact_info_items_color != '') {
          $string .= ' color:' . esc_attr($contact_info_items_color) . ';';
        }

        $string .= '" href="mailto:' . esc_html($email_text) . '" target="_blank">' . esc_html($email_text) . ' </a>';
        $string .= '</div>';

        $string .= '</div>';
      }

      $string .= '</div>';


      if($facebook_link || $twitter_link || $googleplus_link || $instagram_link || $linkedin_link || $vimeo_link || $youtube_link || $tumblr_link || $flickr_link || $pinterest_link){
        $string .= '<div class="contact-info-social ';

        if($contact_info_bg_color != '' || $contact_info_bg_img != '' || $contact_info_border_color != ''){
          $string .= 'info-item-padding';
        }

        $string .= '">';
        if($facebook_link != ''){
          $string .= '<div  class="contact-info-social-item ';

          if($contact_info_icon_bg_color != ''){
            $string .= 'info-item-bg';
          }

          $string .= '"><a target="_blank" title="Facebook" href="' . esc_url($facebook_link) . '" style="';

          if($contact_info_icon_bg_color != ''){
            $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          }

          if($contact_info_icon_color != ''){
            $string .= 'color:'.esc_attr($contact_info_icon_color).';';
          }

          if ($contact_info_icon_size != '') {
            $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
          }

          $string .='"><i class="fa fa-facebook"></i></a></div>';
        }

        if($twitter_link != ''){
          $string .= '<div class="contact-info-social-item ';

          if($contact_info_icon_bg_color != ''){
            $string .= 'info-item-bg';
          }

          $string .= '"><a target="_blank" title="Twitter" href="' . esc_url($twitter_link) . '" style="';

          if($contact_info_icon_bg_color != ''){
            $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          }

          if($contact_info_icon_color != ''){
            $string .= 'color:'.esc_attr($contact_info_icon_color).';';
          }

          if ($contact_info_icon_size != '') {
            $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
          }

          $string .= '"><i class="fa fa-twitter"></i></a></div>';
        }

        if($googleplus_link != ''){
          $string .= '<div class="contact-info-social-item ';

          if($contact_info_icon_bg_color != ''){
            $string .= 'info-item-bg';
          }

          $string .= '"><a target="_blank" title="Google+" href="' . esc_url($googleplus_link) . '" style="';

          if($contact_info_icon_bg_color != ''){
            $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          }

          if($contact_info_icon_color != ''){
            $string .= 'color:'.esc_attr($contact_info_icon_color).';';
          }

          if ($contact_info_icon_size != '') {
            $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
          }

          $string .= '"><i class="fa fa-google-plus"></i></a></div>';
        }

        if($instagram_link != ''){
          $string .= '<div class="contact-info-social-item ';

          if($contact_info_icon_bg_color != ''){
            $string .= 'info-item-bg';
          }

          $string .= '"><a target="_blank" title="Instagram" href="' . esc_url($instagram_link) . '" style="';

          if($contact_info_icon_bg_color != ''){
            $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          }

          if($contact_info_icon_color != ''){
            $string .= 'color:'.esc_attr($contact_info_icon_color).';';
          }

          if ($contact_info_icon_size != '') {
            $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
          }

          $string .= '"><i class="fa fa-instagram"></i></a></div>';
        }

        if($linkedin_link != ''){
          $string .= '<div class="contact-info-social-item ';

          if($contact_info_icon_bg_color != ''){
            $string .= 'info-item-bg';
          }

          $string .= '"><a target="_blank" title="Linkedin" href="' . esc_url($linkedin_link) . '" style="';

          if($contact_info_icon_bg_color != ''){
            $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          }

          if($contact_info_icon_color != ''){
            $string .= 'color:'.esc_attr($contact_info_icon_color).';';
          }

          if ($contact_info_icon_size != '') {
            $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
          }

          $string .= '"><i class="fa fa-linkedin"></i></a></div>';
        }

        if($vimeo_link != ''){
          $string .= '<div class="contact-info-social-item ';

          if($contact_info_icon_bg_color != ''){
            $string .= 'info-item-bg';
          }

          $string .= '"><a target="_blank" title="Vimeo" href="' . esc_url($vimeo_link) . '" style="';

          if($contact_info_icon_bg_color != ''){
            $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          }

          if($contact_info_icon_color != ''){
            $string .= 'color:'.esc_attr($contact_info_icon_color).';';
          }

          if ($contact_info_icon_size != '') {
            $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
          }

          $string .= '"><i class="fa fa-vimeo"></i></a></div>';
        }

        if($youtube_link != ''){
          $string .= '<div class="contact-info-social-item ';

          if($contact_info_icon_bg_color != ''){
            $string .= 'info-item-bg';
          }

          $string .= '">';

          $string .= '<a target="_blank" title="Youtube" href="' . esc_url($youtube_link) . '" style="';

          if($contact_info_icon_bg_color != ''){
            $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          }

          if($contact_info_icon_color != ''){
            $string .= 'color:'.esc_attr($contact_info_icon_color).';';
          }

          if ($contact_info_icon_size != '') {
            $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
          }

          $string .= '"><i class="fa fa-youtube"></i></a></div>';
        }

        if($tumblr_link != ''){
          $string .= '<div class="contact-info-social-item ';

          if($contact_info_icon_bg_color != ''){
            $string .= 'info-item-bg';
          }

          $string .= '">';

          $string .='<a target="_blank" title="Tumblr" href="' . esc_url($tumblr_link) . '" style="';

          if($contact_info_icon_bg_color != ''){
            $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          }

          if($contact_info_icon_color != ''){
            $string .= 'color:'.esc_attr($contact_info_icon_color).';';
          }

          if ($contact_info_icon_size != '') {
            $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
          }

          $string .= '"><i class="fa fa-tumblr"></i></a></div>';
        }

        if($flickr_link != ''){
          $string .= '<div class="contact-info-social-item ';

          if($contact_info_icon_bg_color != ''){
            $string .= 'info-item-bg';
          }

          $string .= '">';

          $string .= '<a target="_blank" title="Flickr" href="' . esc_url($flickr_link) . '" style="';

          if($contact_info_icon_bg_color != ''){
            $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          }

          if($contact_info_icon_color != ''){
            $string .= 'color:'.esc_attr($contact_info_icon_color).';';
          }

          if ($contact_info_icon_size != '') {
            $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
          }

          $string .= '"><i class="fa fa-flickr"></i></a></div>';
        }

        if($pinterest_link != ''){
          $string .= '<div class="contact-info-social-item ';

          if($contact_info_icon_bg_color != ''){
            $string .= 'info-item-bg';
          }

          $string .= '">';
          $string .= '<a target="_blank" title="Pinterest" href="' . esc_url($pinterest_link) . '" style="';

          if($contact_info_icon_bg_color  != ''){
            $string .= 'background:'.esc_attr($contact_info_icon_bg_color).';';
          }

          if($contact_info_icon_color != ''){
            $string .= 'color:'.esc_attr($contact_info_icon_color).';';
          }

          if ($contact_info_icon_size != '') {
            $string .= ' font-size:' . esc_attr($contact_info_icon_size) . 'px;';
          }

          $string .= '"><i class="fa fa-pinterest"></i></a></div>';
        }
        $string .= '</div>';
      }

      $string .= '</div>';

      return $string;
    }
