<?php

add_action('vc_before_init', 'dental_care_opening_hours_VC');

function dental_care_opening_hours_VC() {
  vc_map(array(
    "name" => esc_html__("Opening Hours", 'dental-care'),
    "base" => "dental_care_opening_hours",
    "class" => "",
    "category" => esc_html__('Dental Care', 'dental-care'),
    "params" => array(
      array(
          "type" => "textarea",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__("Title", 'dental-care'),
          "param_name" => "title",
          "description" => esc_html__("Enter text for title.", 'dental-care')
      ),
      array(
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__("Title Tag", 'dental-care'),
          "param_name" => "title_tag",
          "description" => esc_html__("Choose title tag.", 'dental-care'),
          "value" => array(
              "" => "",
              "h1" => "h1",
              "h2 " => "h2",
              "h3" => "h3",
              "h4" => "h4",
              "h5" => "h5",
              "h6" => "h6",
              "p" => "p"
          )
      ),
      array(
          "type" => "textarea",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__("SubTitle", 'dental-care'),
          "param_name" => "subtitle",
          "description" => esc_html__("Enter text for subtitle.", 'dental-care')
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Monday Title", 'dental-care'),
        "param_name" => "monday_title",
        "description" => esc_html__("Enter the title text for Monday", 'dental-care'),
        "group" => "Monday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Monday Text", 'dental-care'),
        "param_name" => "monday_text",
        "description" => esc_html__("Enter the opening hours for Monday", 'dental-care'),
        "group" => "Monday"
      ),
      array(
        "type" => "vc_link",
        "class" => "",
        "heading" => __("Link", "dental-care"),
        "param_name" => "monday_link",
        "value" => "",
        "description" => __("Choose a link for this day.", "dental-care"),
        "group" => "Monday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Tuesday Title", 'dental-care'),
        "param_name" => "tuesday_title",
        "description" => esc_html__("Enter the title text for Tuesday", 'dental-care'),
        "group" => "Tuesday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Tuesday Text", 'dental-care'),
        "param_name" => "tuesday_text",
        "description" => esc_html__("Enter the opening hours for Tuesday", 'dental-care'),
        "group" => "Tuesday"
      ),
      array(
        "type" => "vc_link",
        "class" => "",
        "heading" => __("Link", "dental-care"),
        "param_name" => "tuesday_link",
        "value" => "",
        "description" => __("Choose a link for this day.", "dental-care"),
        "group" => "Tuesday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Wednesday Title", 'dental-care'),
        "param_name" => "wednesday_title",
        "description" => esc_html__("Enter the title text for Wednesday", 'dental-care'),
        "group" => "Wednesday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Wednesday Text", 'dental-care'),
        "param_name" => "wednesday_text",
        "description" => esc_html__("Enter the opening hours for Wednesday", 'dental-care'),
        "group" => "Wednesday"
      ),
      array(
        "type" => "vc_link",
        "class" => "",
        "heading" => __("Link", "dental-care"),
        "param_name" => "wednesday_link",
        "value" => "",
        "description" => __("Choose a link for this day.", "dental-care"),
        "group" => "Wednesday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Thursday Title", 'dental-care'),
        "param_name" => "thursday_title",
        "description" => esc_html__("Enter the title text for Thursday", 'dental-care'),
        "group" => "Thursday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Thursday Text", 'dental-care'),
        "param_name" => "thursday_text",
        "description" => esc_html__("Enter the opening hours for Thursday", 'dental-care'),
        "group" => "Thursday"
      ),
      array(
        "type" => "vc_link",
        "class" => "",
        "heading" => __("Link", "dental-care"),
        "param_name" => "thursday_link",
        "value" => "",
        "description" => __("Choose a link for this day.", "dental-care"),
        "group" => "Thursday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Friday Title", 'dental-care'),
        "param_name" => "friday_title",
        "description" => esc_html__("Enter the title text for Friday", 'dental-care'),
        "group" => "Friday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Friday Text", 'dental-care'),
        "param_name" => "friday_text",
        "description" => esc_html__("Enter the opening hours for Friday", 'dental-care'),
        "group" => "Friday"
      ),
      array(
        "type" => "vc_link",
        "class" => "",
        "heading" => __("Link", "dental-care"),
        "param_name" => "friday_link",
        "value" => "",
        "description" => __("Choose a link for this day.", "dental-care"),
        "group" => "Friday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Saturday Title", 'dental-care'),
        "param_name" => "saturday_title",
        "description" => esc_html__("Enter the title text for Saturday", 'dental-care'),
        "group" => "Saturday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Saturday Text", 'dental-care'),
        "param_name" => "saturday_text",
        "description" => esc_html__("Enter the opening hours for Saturday", 'dental-care'),
        "group" => "Saturday"
      ),
      array(
        "type" => "vc_link",
        "class" => "",
        "heading" => __("Link", "dental-care"),
        "param_name" => "saturday_link",
        "value" => "",
        "description" => __("Choose a link for this day.", "dental-care"),
        "group" => "Saturday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Sunday Title", 'dental-care'),
        "param_name" => "sunday_title",
        "description" => esc_html__("Enter the title text for Sunday", 'dental-care'),
        "group" => "Sunday"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Sunday Text", 'dental-care'),
        "param_name" => "sunday_text",
        "description" => esc_html__("Enter the opening hours for Sunday", 'dental-care'),
        "group" => "Sunday"
      ),
      array(
        "type" => "vc_link",
        "class" => "",
        "heading" => __("Link", "dental-care"),
        "param_name" => "sunday_link",
        "value" => "",
        "description" => __("Choose a link for this day.", "dental-care"),
        "group" => "Sunday"
      ),
      array(
        "type" => "icon",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Icon", 'dental-care'),
        "param_name" => "opening_hours_icon",
        "description" => esc_html__("Choose an icon.", "dental-care"),
        "group" => "Design"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Icon Font Size", 'dental-care'),
        "param_name" => "opening_hours_icon_size",
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
        "param_name" => "opening_hours_icon_color",
        "description" => esc_html__("Choose an icon color.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Background Color", 'dental-care'),
        "param_name" => "opening_hours_bg_color",
        "description" => esc_html__("Choose a background color or combine it with an image as an overlay.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "attach_image",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Background Image", 'dental-care'),
        "param_name" => "opening_hours_bg_img",
        "description" => esc_html__("Choose an image for the background.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Enable Shadow", 'dental-care'),
        "param_name" => "opening_hours_box_shadow_en",
        "description" => esc_html__("Choose to enable/disable box shadow", 'dental-care'),
        "value" => array("" => "", "On" => "on", "Off" => "off"),
        "group" => "Design"
      ),
      array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Enable Translate on Hover", 'dental-care'),
        "param_name" => "opening_hours_box_translate_en",
        "description" => esc_html__("Choose to enable/disable box shadow", 'dental-care'),
        "value" => array("" => "", "On" => "on", "Off" => "off"),
        "group" => "Design"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Text Color", 'dental-care'),
        "param_name" => "opening_hours_text_color",
        "description" => esc_html__("Choose a text color.", 'dental-care'),
        "group" => "Design"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Title Font Size", 'dental-care'),
        "param_name" => "opening_hours_title_size",
        "min" => 1,
        "max" => 100,
        "suffix" => "px",
        "description" => esc_html__("Enter title font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Opening Hours Font Size", 'dental-care'),
        "param_name" => "opening_hours_hours_size",
        "min" => 1,
        "max" => 100,
        "suffix" => "px",
        "description" => esc_html__("Enter opening hours font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("Title Color", 'dental-care'),
        "param_name" => "title_color",
        "description" => esc_html__("Choose a title color.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Title Font Size", 'dental-care'),
        "param_name" => "title_font_size",
        "min" => 1,
        "max" => 100,
        "suffix" => "px",
        "description" => esc_html__("Enter title font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Title Font Weight", 'dental-care'),
        "param_name" => "title_font_weight",
        "description" => esc_html__("Enter title font weight.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__("SubTitle Color", 'dental-care'),
        "param_name" => "subtitle_color",
        "description" => esc_html__("Choose a subtitle color.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("SubTitle Font Size", 'dental-care'),
        "param_name" => "subtitle_font_size",
        "min" => 1,
        "max" => 100,
        "suffix" => "px",
        "description" => esc_html__("Enter subtitle font size.", 'dental-care'),
        "group" => "Typography"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("SubTitle Font Weight", 'dental-care'),
        "param_name" => "subtitle_font_weight",
        "description" => esc_html__("Enter subtitle font weight.", 'dental-care'),
        "group" => "Typography"
      ),
    )
  ));
}

function dental_care_opening_hours_shortcode($atts, $content = NULL) {
  global $post;
  extract(shortcode_atts(array(
    'param' => '',
    'monday_title' => '',
    'monday_text' => '',
    'tuesday_title' => '',
    'tuesday_text' => '',
    'wednesday_title' => '',
    'wednesday_text' => '',
    'thursday_title' => '',
    'thursday_text' => '',
    'friday_title' => '',
    'friday_text' => '',
    'saturday_title' => '',
    'saturday_text' => '',
    'sunday_title' => '',
    'sunday_text' => '',
    'opening_hours_box_shadow_en' => '',
    'opening_hours_box_translate_en' => '',
    'opening_hours_bg_color' => '',
    'opening_hours_bg_img' => '',
    'opening_hours_text_color' => '',
    'opening_hours_title_size' => '',
    'opening_hours_hours_size' => '',
    'opening_hours_icon' => '',
    'opening_hours_icon_size' => '',
    'opening_hours_icon_color' => '',
    'monday_link' => '',
    'tuesday_link' => '',
    'wednesday_link' => '',
    'thursday_link' => '',
    'friday_link' => '',
    'saturday_link' => '',
    'sunday_link' => '',
    'title' => '',
    'title_tag' => '',
    'title_color' => '',
    'title_font_size' => '',
    'title_font_weight' => '',
    'subtitle' => '',
    'subtitle_color' => '',
    'subtitle_font_size' => '',
    'subtitle_font_weight' => '',





  ), $atts));

  $opening_hours_bg_img_src = '';
  if ($opening_hours_bg_img != '') {
    $opening_hours_bg_img_src = wp_get_attachment_url($opening_hours_bg_img, 'full', false, false);
  }

  $href_mon['url'] = $href_mon['title'] = '';
  $href_tues['url'] = $href_tues['title'] = '';
  $href_wed['url'] = $href_wed['title'] = '';
  $href_thur['url'] = $href_thur['title'] = '';
  $href_fri['url'] = $href_fri['title'] = '';
  $href_sat['url'] = $href_sat['title'] = '';
  $href_sun['url'] = $href_sun['title'] = '';


  if ($monday_link != '') {
    $href_mon = vc_build_link($monday_link);
  }
  if ($tuesday_link != '') {
    $href_tues = vc_build_link($tuesday_link);
  }
  if ($wednesday_link != '') {
    $href_wed = vc_build_link($wednesday_link);
  }
  if ($thursday_link != '') {
    $href_thur = vc_build_link($thursday_link);
  }
  if ($friday_link != '') {
    $href_fri = vc_build_link($friday_link);
  }
  if ($saturday_link != '') {
    $href_sat = vc_build_link($saturday_link);
  }
  if ($sunday_link != '') {
    $href_sun = vc_build_link($sunday_link);
  }

  $string = '<div class="dental-care-opening-hours-widget';

  if($opening_hours_box_translate_en == 'on'){
    $string .= ' translate-en';
  }

  if($opening_hours_box_shadow_en == 'on'){
    $string .= ' box-shadow-en';
  }

  $string .= '" style="';

  if ($opening_hours_bg_color != ''){
    $string .= 'background:linear-gradient(
      ' . esc_attr($opening_hours_bg_color) . ',
      ' . esc_attr($opening_hours_bg_color) . '
      ) ';
      if ($opening_hours_bg_img_src != '') {
        $string .= ',url(' . esc_url($opening_hours_bg_img_src) . ') no-repeat center center; background-size:cover;';
      } else {
        $string .= ';';
      }

    }

    $string .='">';

    if($title != ''){

      $string .= '<div class="opening-hrs-title">';

      if($title_tag == 'h1'){
      $string .= '<h1 style="';
      }elseif ($title_tag == 'h2') {
          $string .= '<h2 style="';
      }elseif ($title_tag == 'h5') {
          $string .= '<h5 style="';
      }elseif ($title_tag == 'h6') {
          $string .= '<h6 style="';
      }elseif ($title_tag == 'h4') {
          $string .= '<h4 style="';
      }elseif ($title_tag == 'p') {
          $string .= '<p style="';
      }else{
          $string .= '<h3 style="';
      }

  if ($title_color != ''){
      $string .= 'color:' . esc_attr($title_color) . ';';
  }
  if ($title_font_size != ''){
      $string .= ' font-size:' . esc_attr($title_font_size) . 'px;';
  }
  if ($title_font_weight != ''){
      $string .= ' font-weight:' . esc_attr($title_font_weight) . ';';
  }

  $string .= '">' . esc_html($title);

  if($title_tag == 'h1'){
      $string .= '</h1>';
      }elseif ($title_tag == 'h2') {
          $string .= '</h2>';
      }elseif ($title_tag == 'h5') {
          $string .= '</h5>';
      }elseif ($title_tag == 'h6') {
          $string .= '</h6>';
      }elseif ($title_tag == 'h4') {
          $string .= '</h4>';
      }elseif ($title_tag == 'p') {
          $string .= '</p>';
      }else{
          $string .= '</h3>';
      }
  $string .= '</div>';

    }

    if($subtitle != ''){

      $string .= '<div class="opening-hrs-desc" style="';


  if ($subtitle_color != ''){
      $string .= 'color:' . esc_attr($subtitle_color) . ';';
  }
  if ($subtitle_font_size != ''){
      $string .= ' font-size:' . esc_attr($subtitle_font_size) . 'px;';
  }
  if ($subtitle_font_weight != ''){
      $string .= ' font-weight:' . esc_attr($subtitle_font_weight) . ';';
  }

  $string .= '">' . esc_html($subtitle);

  $string .= '</div>';

    }

    if(($monday_title && $monday_text) != ""){

      $string .='<div class="opening-hours-item">';

      if($opening_hours_icon != ''){
        $string .= '<i class="opening-hours-icon ' .esc_attr($opening_hours_icon).'" style="';

        if ($opening_hours_icon_color != "") {
          $string .= ' color:' . esc_attr($opening_hours_icon_color) . ';';
        }
        if ($opening_hours_icon_size != "") {
          $string .= ' font-size:' . esc_attr($opening_hours_icon_size) . 'px;';
        }

        $string .= '"></i>';
      }

      $string .='<div class="opening-hours-day" style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_title_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_title_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($monday_title).'</span>';
      $string .='</div>';
      $string .='<div class="opening-hours-time"  style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_hours_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_hours_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($monday_text).'</span>';
      $string .='</div>';

      if($href_mon['url'] != ''){
        $string .='<div class="opening-hours-link">';

        $string .= '<a href="'.esc_url($href_mon["url"]).'">';
        $string .= esc_html($href_mon["title"]);
        $string .= '</a>';

        $string .='</div>';
      }

      $string .='</div>';
    }

    if(($tuesday_title && $tuesday_text) != ""){
      $string .='<div class="opening-hours-item">';

      if($opening_hours_icon != ''){
        $string .= '<i class="opening-hours-icon ' .esc_attr($opening_hours_icon).'" style="';

        if ($opening_hours_icon_color != "") {
          $string .= ' color:' . esc_attr($opening_hours_icon_color) . ';';
        }
        if ($opening_hours_icon_size != "") {
          $string .= ' font-size:' . esc_attr($opening_hours_icon_size) . 'px;';
        }

        $string .= '"></i>';
      }

      $string .='<div class="opening-hours-day" style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_title_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_title_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($tuesday_title).'</span>';
      $string .='</div>';
      $string .='<div class="opening-hours-time"  style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_hours_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_hours_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($tuesday_text).'</span>';
      $string .='</div>';

      if($href_tues['url'] != ''){
        $string .='<div class="opening-hours-link">';

        $string .= '<a href="'.esc_url($href_tues["url"]).'">';
        $string .= esc_html($href_tues["title"]);
        $string .= '</a>';

        $string .='</div>';
      }

      $string .='</div>';
    }
    if(($wednesday_title && $wednesday_text) != ""){
      $string .='<div class="opening-hours-item">';

      if($opening_hours_icon != ''){
        $string .= '<i class="opening-hours-icon ' .esc_attr($opening_hours_icon).'" style="';

        if ($opening_hours_icon_color != "") {
          $string .= ' color:' . esc_attr($opening_hours_icon_color) . ';';
        }
        if ($opening_hours_icon_size != "") {
          $string .= ' font-size:' . esc_attr($opening_hours_icon_size) . 'px;';
        }

        $string .= '"></i>';
      }

      $string .='<div class="opening-hours-day" style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_title_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_title_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($wednesday_title).'</span>';
      $string .='</div>';
      $string .='<div class="opening-hours-time"  style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_hours_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_hours_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($wednesday_text).'</span>';
      $string .='</div>';

      if($href_wed['url'] != ''){
        $string .='<div class="opening-hours-link">';

        $string .= '<a href="'.esc_url($href_wed["url"]).'">';
        $string .= esc_html($href_wed["title"]);
        $string .= '</a>';

        $string .='</div>';
      }

      $string .='</div>';
    }
    if(($thursday_title && $thursday_text) != ""){
      $string .='<div class="opening-hours-item">';

      if($opening_hours_icon != ''){
        $string .= '<i class="opening-hours-icon ' .esc_attr($opening_hours_icon).'" style="';

        if ($opening_hours_icon_color != "") {
          $string .= ' color:' . esc_attr($opening_hours_icon_color) . ';';
        }
        if ($opening_hours_icon_size != "") {
          $string .= ' font-size:' . esc_attr($opening_hours_icon_size) . 'px;';
        }

        $string .= '"></i>';
      }

      $string .='<div class="opening-hours-day" style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_title_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_title_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($thursday_title).'</span>';
      $string .='</div>';
      $string .='<div class="opening-hours-time"  style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_hours_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_hours_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($thursday_text).'</span>';
      $string .='</div>';

      if($href_thur['url'] != ''){
        $string .='<div class="opening-hours-link">';

        $string .= '<a href="'.esc_url($href_thur["url"]).'">';
        $string .= esc_html($href_thur["title"]);
        $string .= '</a>';

        $string .='</div>';
      }

      $string .='</div>';
    }
    if(($friday_title && $friday_text) != ""){
      $string .='<div class="opening-hours-item">';

      if($opening_hours_icon != ''){
        $string .= '<i class="opening-hours-icon ' .esc_attr($opening_hours_icon).'" style="';

        if ($opening_hours_icon_color != "") {
          $string .= ' color:' . esc_attr($opening_hours_icon_color) . ';';
        }
        if ($opening_hours_icon_size != "") {
          $string .= ' font-size:' . esc_attr($opening_hours_icon_size) . 'px;';
        }

        $string .= '"></i>';
      }

      $string .='<div class="opening-hours-day" style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_title_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_title_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($friday_title).'</span>';
      $string .='</div>';
      $string .='<div class="opening-hours-time"  style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_hours_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_hours_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($friday_text).'</span>';
      $string .='</div>';

      if($href_fri['url'] != ''){
        $string .='<div class="opening-hours-link">';

        $string .= '<a href="'.esc_url($href_fri["url"]).'">';
        $string .= esc_html($href_fri["title"]);
        $string .= '</a>';

        $string .='</div>';
      }

      $string .='</div>';
    }
    if(($saturday_title && $saturday_text) != ""){
      $string .='<div class="opening-hours-item">';

      if($opening_hours_icon != ''){
        $string .= '<i class="opening-hours-icon ' .esc_attr($opening_hours_icon).'" style="';

        if ($opening_hours_icon_color != "") {
          $string .= ' color:' . esc_attr($opening_hours_icon_color) . ';';
        }
        if ($opening_hours_icon_size != "") {
          $string .= ' font-size:' . esc_attr($opening_hours_icon_size) . 'px;';
        }

        $string .= '"></i>';
      }

      $string .='<div class="opening-hours-day" style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_title_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_title_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($saturday_title).'</span>';
      $string .='</div>';
      $string .='<div class="opening-hours-time"  style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_hours_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_hours_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($saturday_text).'</span>';
      $string .='</div>';

      if($href_sat['url'] != ''){
        $string .='<div class="opening-hours-link">';

        $string .= '<a href="'.esc_url($href_sat["url"]).'">';
        $string .= esc_html($href_sat["title"]);
        $string .= '</a>';

        $string .='</div>';
      }

      $string .='</div>';
    }
    if(($sunday_title && $sunday_text) != ""){
      $string .='<div class="opening-hours-item">';

      if($opening_hours_icon != ''){
        $string .= '<i class="opening-hours-icon ' .esc_attr($opening_hours_icon).'" style="';

        if ($opening_hours_icon_color != "") {
          $string .= ' color:' . esc_attr($opening_hours_icon_color) . ';';
        }
        if ($opening_hours_icon_size != "") {
          $string .= ' font-size:' . esc_attr($opening_hours_icon_size) . 'px;';
        }

        $string .= '"></i>';
      }

      $string .='<div class="opening-hours-day" style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_title_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_title_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($sunday_title).'</span>';
      $string .='</div>';
      $string .='<div class="opening-hours-time"  style="';

      if($opening_hours_text_color != ""){
        $string .= ' color:'.esc_attr($opening_hours_text_color).';';
      }
      if($opening_hours_hours_size != ""){
        $string .= ' font-size:'.esc_attr($opening_hours_hours_size).'px;';
      }

      $string .='">';
      $string .='<span>'.esc_html($sunday_text).'</span>';
      $string .='</div>';

      if($href_sun['url'] != ''){
        $string .='<div class="opening-hours-link">';

        $string .= '<a href="'.esc_url($href_sun["url"]).'">';
        $string .= esc_html($href_sun["title"]);
        $string .= '</a>';

        $string .='</div>';
      }

      $string .='</div>';
    }


    $string .= '</div>';

    return $string;
  }
