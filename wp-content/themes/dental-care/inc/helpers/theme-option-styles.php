<?php
/**
 *
 * Initializes theme option custom styles
 *
 * @package Dental_Care
 */
global $post;

function dental_care_dynamic_styles() {

    if (class_exists('OT_Loader')) {

        if (ot_get_option('top_header_en') == "off") {
            $style = '.header-top{display: none !important;}';
            wp_add_inline_style('style', $style);
        }

        if (ot_get_option('footer_menu_type') == "menunone") {
            $style = '.site-info-inner{text-align: center; }';
            wp_add_inline_style('style', $style);
        }

        if (ot_get_option('catalog_mode_en') == "on") {
          $style =  '.woocommerce div.product form.cart .button,
          .woocommerce ul.products li.product .button,
          .add-cart-wrapper{
            display: none !important;
        }';
        wp_add_inline_style('style', $style);
    }

    if (ot_get_option('cart_icon_en') == "off") {
        $style = '
        .cart-icon,
        .nav-cart-badge{
            display: none;
        }';
        wp_add_inline_style('style', $style);
    }

    if (ot_get_option('search_en') == "off") {
       $style = '
       .search-toggle{
        display: none;
    }
    ';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('search_en') == "off" && ot_get_option('cart_icon_en') == "off") {
   $style = '
   .nav-icons-right{
    display: none;
}
';
wp_add_inline_style('style', $style);
}

if (ot_get_option('footer_widget_en') == "off") {
    $style = '
    .footer-area{
        display: none;
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('sticky_mobile_header_en') == "on") {
    $style = '

    .mobile-header-one{
        position: fixed;
        top: 0px;
        z-index: 9999999;
        background: #fff;
        width: 100%;
    }

    .mobile-header-wrapper{
        position: fixed;
        top: 0px;
        z-index: 9999999;
        background: #fff;
        width: 100%;
        padding: 0;
    }

    .mobile-header{
        height: 100px;
    }

    .mobile-header-one .mobile-logo-area-wrapper {
        width: 100%;
    }

    .mobile-header-one .mobile-menu {
        margin: 0;
    }

    .mobile-menu-area{
        overflow-y: auto;
        height: 400px;
    }
    ';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('header_top_bg_color') || ot_get_option('header_top_bg_color_hex')) {

 if (ot_get_option('header_top_bg_color_hex') != "") {
    $color = ot_get_option('header_top_bg_color_hex');
} else {
    $color = ot_get_option('header_top_bg_color');
}
$style = '
.header-top{
    background: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_top_text_color') || ot_get_option('header_top_text_color_hex')) {

    if (ot_get_option('header_top_text_color_hex') != "") {
        $color = ot_get_option('header_top_text_color_hex');
    } else {
        $color = ot_get_option('header_top_text_color');
    }
    $style = '
    .header-top,
    .header-top a{
        color: '.esc_attr($color).' !important;
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('header_top_icon_color') || ot_get_option('header_top_icon_color_hex')) {

 if (ot_get_option('header_top_icon_color_hex') != "") {
    $color = ot_get_option('header_top_icon_color_hex');
} else {
    $color = ot_get_option('header_top_icon_color');
}
$style = '
.header-top i,
.header-top .social-menu li a{
    color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('mobile_header_top_toggle_bg_color')) {
    $color = ot_get_option('mobile_header_top_toggle_bg_color');
    $style = '
    .mobile-top-header-toggle{
        background: ' . esc_attr($color) . ' ;
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('main_nav_drop_link_color') || ot_get_option('main_nav_drop_link_color_hex')) {

  if (ot_get_option('main_nav_drop_link_color_hex') != "") {
   $color = ot_get_option('main_nav_drop_link_color_hex');
} else {
    $color = ot_get_option('main_nav_drop_link_color');
}
$style = '
.main-navigation ul ul li a{
    color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('main_nav_link_color') || ot_get_option('main_nav_link_color_hex')) {

 if (ot_get_option('main_nav_link_color_hex') != "") {
   $color = ot_get_option('main_nav_link_color_hex');
} else {
    $color = ot_get_option('main_nav_link_color');
}
$style = '
.main-navigation a,
.nav-icon,
.cart-icon{
    color: '.esc_attr($color).' !important;
}

.nav-cart-badge{
    color: '.esc_attr($color).' !important;
}

.side-menu-nav .stronghold-menu > li > a {
    color: '.esc_attr($color).' !important;
}

.header-eleven .social-menu li a{
    color: '.esc_attr($color).';
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('main_nav_link_bgcolor')) {

   $color = ot_get_option('main_nav_link_bgcolor');

$style = '
.header-thirteen .navbar-nav > .current_page_item > a, 
.header-thirteen .navbar-nav > .current-menu-item > a,
.header-thirteen .navbar-nav > li:hover{
    background-color: '.esc_attr($color).' !important;
}

';
wp_add_inline_style('style', $style);
}

if (ot_get_option('main_nav_link_hover_color') || ot_get_option('main_nav_link_hover_color_hex')) {

  if (ot_get_option('main_nav_link_hover_color_hex') != "") {
   $color = ot_get_option('main_nav_link_hover_color_hex');
} else {
    $color = ot_get_option('main_nav_link_hover_color');
}
$style = '
.main-navigation li:hover > a,
.header-three .navbar-nav > li > a:hover,
.side-menu-nav .stronghold-menu li a:hover{
    color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('main_nav_bg_color') || ot_get_option('main_nav_bg_color_hex')) {

    if (ot_get_option('main_nav_bg_color_hex') != "") {
       $color = ot_get_option('main_nav_bg_color_hex');
   } else {
    $color = ot_get_option('main_nav_bg_color');
}
$style = '
.header-one,
.header-three .bottom-header,
.header-two .bottom-header-wrap,
.bottom-header-wrap,
.header-eleven,
.header-fifteen,
.side-menu-fixed{
    background: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_area_bg_color') || ot_get_option('header_area_bg_color_hex')) {

 if (ot_get_option('header_area_bg_color_hex') != "") {
   $color = ot_get_option('header_area_bg_color_hex');
} else {
    $color = ot_get_option('header_area_bg_color');
}
$style = '
.header-two .masthead,
.header-three,
.header-four .masthead,
.header-seven .contact-header-area,
.header-mobile .contact-header-area,
.header-eight,
.header-fourteen,
.header-nine .masthead{
    background: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_contact_icon_color') || ot_get_option('header_contact_icon_color_hex')) {

 if (ot_get_option('header_contact_icon_color_hex') != "") {
   $color = ot_get_option('header_contact_icon_color_hex');
} else {
    $color = ot_get_option('header_contact_icon_color');
}
$style = '
.header-four .icon-wrapper i,
.sticky-header-wrapper .icon-wrapper i,
.header-three .icon-wrapper i,
.header-contact-info .icon-wrapper i,
.header-seven .icon-wrapper i,
.header-nine .cicon-wrapper i,
.header-mobile .icon-wrapper i{
    color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_contact_desc_color') || ot_get_option('header_contact_desc_color_hex')) {

  if (ot_get_option('header_contact_desc_color_hex') != "") {
   $color = ot_get_option('header_contact_desc_color_hex');
} else {
    $color = ot_get_option('header_contact_desc_color');
}
$style = '
.header-three .header-three-contact-info p,
.header-four .header-contact-info p,
.header-eight .hcontact-info p,
.header-seven .header-area-contact-info p,
.header-nine .header-nine-contact-info p,
.header-fourteen .header-contact-info p,
.header-mobile .header-area-contact-info p{
    color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_contact_icon_hcolor')) {

   $color = ot_get_option('header_contact_icon_hcolor');

$style = '
.header-four .icon-wrapper:hover i,
.sticky-header-wrapper .icon-wrapper:hover i,
.header-three .icon-wrapper:hover i,
.header-contact-info .icon-wrapper:hover i,
.header-seven .icon-wrapper:hover i,
.header-nine .cicon-wrapper:hover i,
.header-mobile .icon-wrapper:hover i{
    color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_contact_title_color') || ot_get_option('header_contact_title_color_hex')) {

 if (ot_get_option('header_contact_title_color_hex') != "") {
   $color = ot_get_option('header_contact_title_color_hex');
} else {
    $color = ot_get_option('header_contact_title_color');
}

$style = '
.header-three .header-three-contact-info h6,
.header-four .header-contact-info h6,
.header-three .header-three-contact-info h6 a,
.header-four .header-contact-info h6 a,
.header-eight .hcontact-info h6,
.header-eight .hcontact-info h6 a,
.header-seven .header-area-contact-info h6,
.header-seven .header-area-contact-info h6 a,
.header-mobile .header-area-contact-info h6,
.header-mobile .header-area-contact-info h6 a,
.header-fourteen .hcontact-info h6,
.header-fourteen .hcontact-info h6 a,
.header-nine .header-nine-contact-info h6,
.header-nine .header-nine-contact-info h6 a{
    color: '.esc_attr($color).';
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_social_icon_color') || ot_get_option('header_social_icon_color_hex')) {

 if (ot_get_option('header_social_icon_color_hex') != "") {
   $color = ot_get_option('header_social_icon_color_hex');
} else {
    $color = ot_get_option('header_social_icon_color');
}

$style = '
.header-eighteen .social-menu li a,
.header-eleven .social-menu li a,
.header-nine .social-menu li a,
.header-nineteen .social-menu li a,
.header-ten .social-menu li a{
    color: '.esc_attr($color).';
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_button_color') || ot_get_option('header_button_color_hex')) {

 if (ot_get_option('header_button_color_hex') != "") {
   $color = ot_get_option('header_button_color_hex');
} else {
   $color = ot_get_option('header_button_color');
}

$style = '
.header-booking-btn a{
    background: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_button_text_color') || ot_get_option('header_button_text_color_hex')) {

 if (ot_get_option('header_button_text_color_hex') != "") {
   $color = ot_get_option('header_button_text_color_hex');
} else {
   $color = ot_get_option('header_button_text_color');
}

$style = '
.header-booking-btn a{
    color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_button_border_color') || ot_get_option('header_button_border_color_hex')) {

 if (ot_get_option('header_button_border_color_hex') != "") {
   $color = ot_get_option('header_button_border_color_hex');
} else {
   $color = ot_get_option('header_button_border_color');
}

$style = '
.header-booking-btn a{
    border-color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_button_hover_color') || ot_get_option('header_button_hover_color_hex')) {

 if (ot_get_option('header_button_hover_color_hex') != "") {
   $color = ot_get_option('header_button_hover_color_hex');
} else {
   $color = ot_get_option('header_button_hover_color');
}

$style = '
.header-booking-btn a:hover{
    background: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_button_text_hover_color') || ot_get_option('header_button_text_hover_color_hex')) {

 if (ot_get_option('header_button_text_hover_color_hex') != "") {
   $color = ot_get_option('header_button_text_hover_color_hex');
} else {
   $color = ot_get_option('header_button_text_hover_color');
}

$style = '
.header-booking-btn a:hover{
    color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_button_border_hover_color') || ot_get_option('header_button_border_hover_color_hex')) {

 if (ot_get_option('header_button_border_hover_color_hex') != "") {
   $color = ot_get_option('header_button_border_hover_color_hex');
} else {
   $color = ot_get_option('header_button_border_hover_color');
}

$style = '
.header-booking-btn a:hover{
    border-color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}


if (ot_get_option('page_header_bg_color')) {

    $color = ot_get_option('page_header_bg_color');

    $style = '
    .page-title-wrapper{
        background: '.esc_attr($color).';
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('page_header_title_color')) {

    $color = ot_get_option('page_header_title_color');

    $style = '
    .strhld-page-title .page-title-element{
        color: '.esc_attr($color).';
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('page_header_bread_color')) {

    $color = ot_get_option('page_header_bread_color');

    $style = '
    .strhld-breadcrumb .breadcrumb-trail .trail-end,
    .strhld-breadcrumb .breadcrumb-trail a,
    .strhld-breadcrumb .breadcrumb-trail .trail-begin:before{
        color: '.esc_attr($color).';
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('mega_menu_bg')) {
    $megamenubg = ot_get_option('mega_menu_bg', array());
    $megamenubg_bc = $megamenubg['background-color'];
    $mega_menu_bg_bi = $megamenubg['background-image'];

    if($megamenubg_bc != NULL){
        $style = '
        .main-navigation ul ul{
         background: '. esc_attr($megamenubg_bc).' !important;
     }';
     wp_add_inline_style('style', $style);

 }if ($megamenubg_bc == NULL && $mega_menu_bg_bi != NULL) {
     $style = '
     .main-navigation ul ul{
        background: url('. esc_url($mega_menu_bg_bi).') no-repeat center center;
        background-size:cover;
    }
    .main-navigation ul ul li > ul{
        background: none;
    }';
    wp_add_inline_style('style', $style);
}
}

if (ot_get_option('sticky_header_link_color') || ot_get_option('sticky_header_link_color_hex')) {

   if (ot_get_option('sticky_header_link_color_hex') != "") {
       $color = ot_get_option('sticky_header_link_color_hex');
   } else {
    $color = ot_get_option('sticky_header_link_color');
}

$style = '
.sticky-header-wrapper .navbar-nav>li>a{
    color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('sticky_header_drop_link_color') || ot_get_option('sticky_header_drop_link_color_hex')) {

  if (ot_get_option('sticky_header_drop_link_color_hex') != "") {
   $color = ot_get_option('sticky_header_drop_link_color_hex');
} else {
    $color = ot_get_option('sticky_header_drop_link_color');
}

$style = '
.sticky-header-wrapper .main-navigation ul ul li a{
    color: '.esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('sticky_header_background_color') || ot_get_option('sticky_header_background_color_hex')) {

    if (ot_get_option('sticky_header_background_color_hex') != "") {
       $color = ot_get_option('sticky_header_background_color_hex');
   } else {
    $color = ot_get_option('sticky_header_background_color');
}
$style = '
.sticky-header-wrapper{
 background: '. esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('site_layout_style') == "boxed") {
    if (ot_get_option('site_bg')) {
        $sitebg = ot_get_option('site_bg', array());
        $sitebg_bc = $sitebg['background-color'];
        $sitebg_bi = $sitebg['background-image'];

        if ($sitebg_bc != NULL) {
            $style = '
            body{
                background: '. esc_attr($sitebg_bc).' !important;
            }';
            wp_add_inline_style('style', $style);
        }if ($sitebg_bc == NULL && $sitebg_bi != NULL) {
            $style = '
            body{
                background: url(' .esc_url($sitebg_bi).');
            }';
            wp_add_inline_style('style', $style);
        }
    }
}

if (ot_get_option('header_bg_area')) {
    $headerbg = ot_get_option('header_bg_area', array());
    $headerbg_bc = $headerbg['background-color'];
    $headerbg_bi = $headerbg['background-image'];

    if ($headerbg_bc != NULL) {
        $style = '
        .header-bg-wrapper{
            background: '.esc_attr($headerbg_bc).'  !important;
        }';
        wp_add_inline_style('style', $style);
    }if ($headerbg_bc == NULL && $headerbg_bi != NULL) {
        $style = '
        .header-bg-wrapper{
            background: url(' .esc_url($headerbg_bi).');
        }';
        wp_add_inline_style('style', $style);
    }
}




if (ot_get_option('footerwd_bg')) {

    $footerbg = ot_get_option('footerwd_bg', array());
    $footerbg_bc = $footerbg['background-color'];
    $style = '
    .footer-area,
    .footer-area-inner{
        background: '. esc_attr($footerbg_bc).' !important;
    }';
    wp_add_inline_style('style', $style);
}
if (ot_get_option('footerwd_bg')) {
    $footerbg_bg = ot_get_option('footerwd_bg', array());
    $footerbg_bi = $footerbg_bg['background-image'];
    $style = '
    .footer-area{
        background: url(' .esc_url($footerbg_bi).') no-repeat center center;
        background-size:cover;
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('footerwd_tx_color') || ot_get_option('footerwd_tx_color_hex')) {

    if (ot_get_option('footerwd_tx_color_hex') != "") {
       $color = ot_get_option('footerwd_tx_color_hex');
   } else {
    $color = ot_get_option('footerwd_tx_color');
}
$style = '
.footer-area a,
.footer-area{
    color: '.esc_attr($color).';
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('footerwd_icon_color')) {

 $color = ot_get_option('footerwd_icon_color');

 $style = '
 .opening-hours-wid li i,
 .company-info-wid li i,
 .widget li:before{
    color: '.esc_attr($color).';
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('footerwd_socialicon_color')) {

 $color = ot_get_option('footerwd_socialicon_color');

 $style = '
 .footer-widgets .social-widget-item a{
    background: '.esc_attr($color).';
}';
wp_add_inline_style('style', $style);
}


if (ot_get_option('footercp_tx_color') || ot_get_option('footercp_tx_color_hex')) {

 if (ot_get_option('footercp_tx_color_hex') != "") {
   $color = ot_get_option('footercp_tx_color_hex');
} else {
    $color = ot_get_option('footercp_tx_color');
}

$style = '
.footer-nav-menu li a,
.site-info-inner,
.social-menu li a{
    color: '.esc_attr($color).';
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('footercp_bg_color') || ot_get_option('footercp_bg_color_hex')) {

 if (ot_get_option('footercp_bg_color_hex') != "") {
   $color = ot_get_option('footercp_bg_color_hex');
} else {
    $color = ot_get_option('footercp_bg_color');
}

$style = '
.site-info,
.site-info-inner{
    background: '. esc_attr($color).' !important;
}

.site-info-wrapper{
    background: '. esc_attr($color).' !important;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('footercp_socialicon_color')) {

   $color = ot_get_option('footercp_socialicon_color');

   $style = '
   .site-info-wrapper .social-menu li a{
    color: '.esc_attr($color).';
}';
wp_add_inline_style('style', $style);
}


if (ot_get_option('css_custom')) {
    $styles = ot_get_option('css_custom');

    $style_escp = esc_attr($styles);

    $style = str_replace('&gt;','>',$style_escp);
    $style = str_replace('&quot;',"'",$style);
    $style = str_replace('&#039;',"'",$style);

    wp_add_inline_style('style', $style);
}

if (ot_get_option('logo_custom_en') == "on") {
    $logo_size = ot_get_option('logo_size');
    $logo_margin = ot_get_option('logo_margin');
    $mobile_logo_margin = ot_get_option('mobile_logo_margin');

    $style = '
    .site-logo{
        margin-top: '.esc_attr($logo_margin).'px !important;
    }
    .navbar-brand img{
        max-height: '.esc_attr($logo_size).'px !important;
    }
    .mobile-logo img{
        margin-top: '.esc_attr($mobile_logo_margin).'px !important;
    }';
    wp_add_inline_style('style', $style);
}


/* Body typography */
if (ot_get_option('body_font')) {
    $bodyfont = ot_get_option('body_font', array());
    $bodyfont_ff = $bodyfont['font-family'];
    $bodyfont_fc = $bodyfont['font-color'];
    $bodyfont_fs = $bodyfont['font-size'];
    $bodyfont_lh = $bodyfont['line-height'];
    $bodyfont_fst = $bodyfont['font-style'];
    $bodyfont_fv = $bodyfont['font-variant'];
    $bodyfont_fw = $bodyfont['font-weight'];
    $bodyfont_ls = $bodyfont['letter-spacing'];
    $bodyfont_td = $bodyfont['text-decoration'];
    $bodyfont_tt = $bodyfont['text-transform'];

    if (!empty($bodyfont_ff)){

        if(trim($bodyfont_ff) != 'arial' && trim($bodyfont_ff) != 'times' && trim($bodyfont_ff) != 'georgia' && trim($bodyfont_ff) != 'helvetica' && trim($bodyfont_ff) != 'palatino' && trim($bodyfont_ff) != 'trebuchetms' && trim($bodyfont_ff) != 'verdana' && trim($bodyfont_ff) != 'Tahoma'){
            ?>

            <link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($bodyfont_ff) ?>" rel="stylesheet">

            <?php
        }

    }


    $style = '
    body {
        font-family: '. esc_attr($bodyfont_ff).';
        color: '. esc_attr($bodyfont_fc).' ;
        font-size: '. esc_attr($bodyfont_fs).';
        line-height: '. esc_attr($bodyfont_lh).';
        font-style: '. esc_attr($bodyfont_fst).';
        font-variant: '. esc_attr($bodyfont_fv).';
        font-weight: '. esc_attr($bodyfont_fw).';
        letter-spacing: '. esc_attr($bodyfont_ls).';
        text-decoration: '. esc_attr($bodyfont_td).';
        text-transform: '. esc_attr($bodyfont_tt).';
    }';
    wp_add_inline_style('style', $style);
}

/* Main navigation typography */
if (ot_get_option('main_navigation_font')) {
    $navfont = ot_get_option('main_navigation_font', array());
    $navfont_ff = $navfont['font-family'];
    $navfont_fc = $navfont['font-color'];
    $navfont_fs = $navfont['font-size'];
    $navfont_lh = $navfont['line-height'];
    $navfont_fst = $navfont['font-style'];
    $navfont_fv = $navfont['font-variant'];
    $navfont_fw = $navfont['font-weight'];
    $navfont_ls = $navfont['letter-spacing'];
    $navfont_td = $navfont['text-decoration'];
    $navfont_tt = $navfont['text-transform'];


    if (!empty($navfont_ff)){

        if(trim($navfont_ff) != 'arial' && trim($navfont_ff) != 'times' && trim($navfont_ff) != 'georgia' && trim($navfont_ff) != 'helvetica' && trim($navfont_ff) != 'palatino' && trim($navfont_ff) != 'trebuchetms' && trim($navfont_ff) != 'verdana' && trim($navfont_ff) != 'Tahoma'){
            ?>

            <link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($navfont_ff) ?>" rel="stylesheet">

            <?php
        }

    }


    $style = '
    .main-navigation a{
        font-family:'. esc_attr($navfont_ff).';
        color: '. esc_attr($navfont_fc).';
        font-size: '. esc_attr($navfont_fs).';
        line-height: '. esc_attr($navfont_lh).';
        font-style: '. esc_attr($navfont_fst).';
        font-variant: '. esc_attr($navfont_fv).';
        font-weight: '. esc_attr($navfont_fw).';
        letter-spacing: '. esc_attr($navfont_ls).';
        text-decoration: '. esc_attr($navfont_td).';
        text-transform: '. esc_attr($navfont_tt).';
    }';
    wp_add_inline_style('style', $style);
}

/* H1 typography */
if (ot_get_option('h1_font')) {
    $h1font = ot_get_option('h1_font', array());
    $h1font_ff = $h1font['font-family'];
    $h1font_fc = $h1font['font-color'];
    $h1font_fs = $h1font['font-size'];
    $h1font_lh = $h1font['line-height'];
    $h1font_fst = $h1font['font-style'];
    $h1font_fv = $h1font['font-variant'];
    $h1font_fw = $h1font['font-weight'];
    $h1font_ls = $h1font['letter-spacing'];
    $h1font_td = $h1font['text-decoration'];
    $h1font_tt = $h1font['text-transform'];

    if (!empty($h1font_ff)){

        if(trim($h1font_ff) != 'arial' && trim($h1font_ff) != 'times' && trim($h1font_ff) != 'georgia' && trim($h1font_ff) != 'helvetica' && trim($h1font_ff) != 'palatino' && trim($h1font_ff) != 'trebuchetms' && trim($h1font_ff) != 'verdana' && trim($h1font_ff) != 'Tahoma'){
            ?>

            <link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($h1font_ff) ?>" rel="stylesheet">

            <?php
        }

    }

    $style = '
    h1  {
        font-family: '. esc_attr($h1font_ff).' !important;
        color: '. esc_attr($h1font_fc).' ;
        font-size: '. esc_attr($h1font_fs).';
        line-height: '. esc_attr($h1font_lh).';
        font-style: '. esc_attr($h1font_fst).';
        font-variant: '. esc_attr($h1font_fv).';
        font-weight: '. esc_attr($h1font_fw).';
        letter-spacing: '. esc_attr($h1font_ls).';
        text-decoration: '. esc_attr($h1font_td).';
        text-transform: '. esc_attr($h1font_tt).';
    }';
    wp_add_inline_style('style', $style);

}
/* H2 typography */
if (ot_get_option('h2_font')) {
    $h2font = ot_get_option('h2_font', array());
    $h2font_ff = $h2font['font-family'];
    $h2font_fc = $h2font['font-color'];
    $h2font_fs = $h2font['font-size'];
    $h2font_lh = $h2font['line-height'];
    $h2font_fst = $h2font['font-style'];
    $h2font_fv = $h2font['font-variant'];
    $h2font_fw = $h2font['font-weight'];
    $h2font_ls = $h2font['letter-spacing'];
    $h2font_td = $h2font['text-decoration'];
    $h2font_tt = $h2font['text-transform'];

    if (!empty($h2font_ff)){

        if(trim($h2font_ff) != 'arial' && trim($h2font_ff) != 'times' && trim($h2font_ff) != 'georgia' && trim($h2font_ff) != 'helvetica' && trim($h2font_ff) != 'palatino' && trim($h2font_ff) != 'trebuchetms' && trim($h2font_ff) != 'verdana' && trim($h2font_ff) != 'Tahoma'){
            ?>

            <link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($h2font_ff) ?>" rel="stylesheet">

            <?php
        }

    }

    $style = '
    h2  {
        font-family: '. esc_attr($h2font_ff).' !important;
        color: '. esc_attr($h2font_fc).' ;
        font-size: '. esc_attr($h2font_fs).';
        line-height: '. esc_attr($h2font_lh).';
        font-style: '. esc_attr($h2font_fst).';
        font-variant: '. esc_attr($h2font_fv).';
        font-weight: '. esc_attr($h2font_fw).';
        letter-spacing: '. esc_attr($h2font_ls).';
        text-decoration: '. esc_attr($h2font_td).';
        text-transform: '. esc_attr($h2font_tt).';
    }';
    wp_add_inline_style('style', $style);
}
/* H3 typography */
if (ot_get_option('h3_font')) {
    $h3font = ot_get_option('h3_font', array());
    $h3font_ff = $h3font['font-family'];
    $h3font_fc = $h3font['font-color'];
    $h3font_fs = $h3font['font-size'];
    $h3font_lh = $h3font['line-height'];
    $h3font_fst = $h3font['font-style'];
    $h3font_fv = $h3font['font-variant'];
    $h3font_fw = $h3font['font-weight'];
    $h3font_ls = $h3font['letter-spacing'];
    $h3font_td = $h3font['text-decoration'];
    $h3font_tt = $h3font['text-transform'];

    if (!empty($h3font_ff)){

        if(trim($h3font_ff) != 'arial' && trim($h3font_ff) != 'times' && trim($h3font_ff) != 'georgia' && trim($h3font_ff) != 'helvetica' && trim($h3font_ff) != 'palatino' && trim($h3font_ff) != 'trebuchetms' && trim($h3font_ff) != 'verdana' && trim($h3font_ff) != 'Tahoma'){
            ?>

            <link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($h3font_ff) ?>" rel="stylesheet">

            <?php
        }

    }

    $style = '
    h3  {
        font-family: '. esc_attr($h3font_ff).' !important;
        color: '. esc_attr($h3font_fc).' ;
        font-size: '. esc_attr($h3font_fs).';
        line-height: '. esc_attr($h3font_lh).';
        font-style: '. esc_attr($h3font_fst).';
        font-variant: '. esc_attr($h3font_fv).';
        font-weight: '. esc_attr($h3font_fw).';
        letter-spacing: '. esc_attr($h3font_ls).';
        text-decoration: '. esc_attr($h3font_td).';
        text-transform: '. esc_attr($h3font_tt).';
    }';
    wp_add_inline_style('style', $style);
}
/* H4 typography */
if (ot_get_option('h4_font')) {
    $h4font = ot_get_option('h4_font', array());
    $h4font_ff = $h4font['font-family'];
    $h4font_fc = $h4font['font-color'];
    $h4font_fs = $h4font['font-size'];
    $h4font_lh = $h4font['line-height'];
    $h4font_fst = $h4font['font-style'];
    $h4font_fv = $h4font['font-variant'];
    $h4font_fw = $h4font['font-weight'];
    $h4font_ls = $h4font['letter-spacing'];
    $h4font_td = $h4font['text-decoration'];
    $h4font_tt = $h4font['text-transform'];

    if (!empty($h4font_ff)){

        if(trim($h4font_ff) != 'arial' && trim($h4font_ff) != 'times' && trim($h4font_ff) != 'georgia' && trim($h4font_ff) != 'helvetica' && trim($h4font_ff) != 'palatino' && trim($h4font_ff) != 'trebuchetms' && trim($h4font_ff) != 'verdana' && trim($h4font_ff) != 'Tahoma'){
            ?>

            <link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($h4font_ff) ?>" rel="stylesheet">

            <?php
        }

    }

    $style = '
    h4  {
        font-family: '. esc_attr($h4font_ff).' !important;
        color: '. esc_attr($h4font_fc).' ;
        font-size: '. esc_attr($h4font_fs).';
        line-height: '. esc_attr($h4font_lh).';
        font-style: '. esc_attr($h4font_fst).';
        font-variant: '. esc_attr($h4font_fv).';
        font-weight: '. esc_attr($h4font_fw).';
        letter-spacing: '. esc_attr($h4font_ls).';
        text-decoration: '. esc_attr($h4font_td).';
        text-transform: '. esc_attr($h4font_tt).';
    }';
    wp_add_inline_style('style', $style);
}
/* H5 typography */
if (ot_get_option('h5_font')) {
    $h5font = ot_get_option('h5_font', array());
    $h5font_ff = $h5font['font-family'];
    $h5font_fc = $h5font['font-color'];
    $h5font_fs = $h5font['font-size'];
    $h5font_lh = $h5font['line-height'];
    $h5font_fst = $h5font['font-style'];
    $h5font_fv = $h5font['font-variant'];
    $h5font_fw = $h5font['font-weight'];
    $h5font_ls = $h5font['letter-spacing'];
    $h5font_td = $h5font['text-decoration'];
    $h5font_tt = $h5font['text-transform'];

    if (!empty($h5font_ff)){

        if(trim($h5font_ff) != 'arial' && trim($h5font_ff) != 'times' && trim($h5font_ff) != 'georgia' && trim($h5font_ff) != 'helvetica' && trim($h5font_ff) != 'palatino' && trim($h5font_ff) != 'trebuchetms' && trim($h5font_ff) != 'verdana' && trim($h5font_ff) != 'Tahoma'){
            ?>

            <link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($h5font_ff) ?>" rel="stylesheet">

            <?php
        }

    }

    $style = '
    h5  {
        font-family: '. esc_attr($h5font_ff).' !important;
        color: '. esc_attr($h5font_fc).' ;
        font-size: '. esc_attr($h5font_fs).';
        line-height: '. esc_attr($h5font_lh).';
        font-style: '. esc_attr($h5font_fst).';
        font-variant: '. esc_attr($h5font_fv).';
        font-weight: '. esc_attr($h5font_fw).';
        letter-spacing: '. esc_attr($h5font_ls).';
        text-decoration: '. esc_attr($h5font_td).';
        text-transform: '. esc_attr($h5font_tt).';
    }';
    wp_add_inline_style('style', $style);
}

/* H6 typography */
if (ot_get_option('h6_font')) {
    $h6font = ot_get_option('h6_font', array());
    $h6font_ff = $h6font['font-family'];
    $h6font_fc = $h6font['font-color'];
    $h6font_fs = $h6font['font-size'];
    $h6font_lh = $h6font['line-height'];
    $h6font_fst = $h6font['font-style'];
    $h6font_fv = $h6font['font-variant'];
    $h6font_fw = $h6font['font-weight'];
    $h6font_ls = $h6font['letter-spacing'];
    $h6font_td = $h6font['text-decoration'];
    $h6font_tt = $h6font['text-transform'];

    if (!empty($h6font_ff)){

        if(trim($h6font_ff) != 'arial' && trim($h6font_ff) != 'times' && trim($h6font_ff) != 'georgia' && trim($h6font_ff) != 'helvetica' && trim($h6font_ff) != 'palatino' && trim($h6font_ff) != 'trebuchetms' && trim($h6font_ff) != 'verdana' && trim($h6font_ff) != 'Tahoma'){
            ?>

            <link href="https://fonts.googleapis.com/css?family=<?php echo esc_attr($h6font_ff) ?>" rel="stylesheet">

            <?php
        }

    }

    $style = '
    h6  {
        font-family: '. esc_attr($h6font_ff).' !important;
        color: '. esc_attr($h6font_fc).' ;
        font-size: '. esc_attr($h6font_fs).';
        line-height: '. esc_attr($h6font_lh).';
        font-style: '. esc_attr($h6font_fst).';
        font-variant: '. esc_attr($h6font_fv).';
        font-weight: '. esc_attr($h6font_fw).';
        letter-spacing: '. esc_attr($h6font_ls).';
        text-decoration: '. esc_attr($h6font_td).';
        text-transform: '. esc_attr($h6font_tt).';
    }';
    wp_add_inline_style('style', $style);
}


if (ot_get_option('featured_img_single_en') == "off") {
    $style = '
    .blog-single-featured{
        display: none;
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('single_posts_nav_en') == "off") {
    $style = '
    .post-navigation{
        display: none;
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('posts_meta_en') == "off") {
   $style = '
   .entry-meta{
    display: none;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('share_bar_en') == "off") {
    $style = '
    .share-bar{
        display: none;
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('rel_posts_en') == "off") {
    $style = '
    .related-posts{
        display: none;
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('author_box_en') == "off") {
    $style = '
    .author-box{
        display: none;
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('read_more_en') == "off") {
   $style = '
   .bread-more-btn{
    display: none;
}';
wp_add_inline_style('style', $style);
}

if (ot_get_option('header_type') == "header-five") {
    $style = '
    .dental-care-rev-wrapper{
        margin-top: -200px;
    }

    .header-top,
    .mobile-header{
        background: rgba(255,255,255,.2);
    }

    @media screen and (max-width: 950px){
        .dental-care-rev-wrapper {
            margin-top: 0;
        }

    }';
    wp_add_inline_style('style', $style);
}
if (ot_get_option('header_type') == "header-eight") {
    $style = '
    .home .header-top i,
    .home  .header-top,
    .home  .header-top a,
    .home .header-top .social-menu li a{
        color: #fff;
    }

    .header-top,
    .mobile-header{
        background: rgba(255,255,255,.2);
    }

    .page-header-transparent {
        margin-top: -255px;
    }

    .page-title-wrapper,
    .page-title-wrapper-bg,
    .page-header-transparent{
        padding-top: 450px;
        padding-bottom: 100px;
        margin-top: -350px;
    }

    @media screen and (max-width: 800px){
        .page-header-transparent {
            margin-top: 0;
        }

        .page-title-wrapper-bg {
            padding-top: 50px;
            padding-bottom: 50px;
        }
    }

    @media screen and (max-width: 950px){
        .dental-care-rev-wrapper {
            margin-top: 0;
        }

    }';
    wp_add_inline_style('style', $style);
}


if (ot_get_option('header_type') == "header-fourteen") {
    $style = '
    .home .header-top{
        background: rgba(255,255,255,.2);
    }

    .home .header-top i,
    .home  .header-top,
    .home  .header-top a,
    .home .header-top .social-menu li a{
        color: #fff;
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('header_type') == "header-fifteen") {
    $style = '
    .home .header-fifteen{
        background: rgba(255, 255, 255, 0.8);
        margin-bottom: -116px;
    }

    @media screen and (max-width: 950px){
        .home .header-fifteen {
            margin-bottom: 0;
        }
    }';
    wp_add_inline_style('style', $style);
}

if (ot_get_option('mobile_top_header_view') == "0") {
  $style = '.header-top-mobile{
    display: block !important;
  }
  ';
  wp_add_inline_style('style', $style);
}

if (ot_get_option('mobile_top_header_view') == "1") {
  $style = '.header-top-mobile{
    display: none;
  }
  ';
  wp_add_inline_style('style', $style);
}


/* Color scheme color picker */

if (ot_get_option('color_scheme') || ot_get_option('color_scheme_hex')) {

    if (ot_get_option('color_scheme_hex') != "") {
        $color_scheme_col = ot_get_option('color_scheme_hex');
    } else {
        $color_scheme_col = ot_get_option('color_scheme');
    }
    $style = '
    a,
    .team-member-block-two .team-member-block-social-list li a,
    .header-top .header-top-email a:hover,
    .header-top .header-top-appointment a:hover,
    .header-top .header-top-number a:hover,
    .main-navigation .current-menu-item > a,
    .main-navigation li:hover > a,
    .main-navigation ul ul li a:hover,
    .nav-icon:hover,
    .cart-icon:hover,
    .main-navigation a:hover,
    .nav-icon:hover,
    .nav-icon a:hover,
    .stronghold-menu > li.mega-menu > ul.sub-menu > .menu-item-has-children > a:hover,
    .header-three .icon-wrapper i,
    .header-three .header-three-contact-info h6 a:hover,
    .header-four .header-contact-info h6,
    .header-contact-info:hover .icon-wrapper i,
    .sticky-header-wrapper .header-contact-info:hover  .icon-wrapper i,
    .side-menu-fixed .side-menu-nav ul li ul,
    .side-menu-fixed .side-menu-nav ul .mega-menu ul,
    .side-menu-nav ul ul li:hover > ul li a,
    .side-menu-nav .stronghold-menu li .menu-item-has-children > a:after,
    .header-seven .icon-wrapper i,
    .header-seven .header-area-contact-info h6 a:hover,
    .header-eight .icon-wrapper i,
    .header-eight .hcontact-info h6 a:hover,
    .header-eight .navbar-nav > .current-menu-item > a,
    .header-nine .cicon-wrapper i,
    .header-mobile .icon-wrapper i,
    .footer-nav-menu li a:hover,
    .widget_nav_menu li:before,
    .opening-hours-wid li i,
    .company-info-wid li i,
    .dental-care-testimonials i,
    .dental-care-testimonials-widget i,
    .sticky-post,
    .entry-title a:hover,
    .entry-meta a:hover,
    .blog-featured-img-overlay i:hover,
    .single-post .post-navigation a:hover,
    .share-bar ul li:hover > a,
    .author-name a:hover,
    .author_soclinks li a:hover,
    .required,
    .team-member-main-name a:hover,
    .service-main-name a:hover,
    .team-member-main-pos,
    .team-member-block-img-overlay i:hover,
    .dental-care-testim-position,
    .service-block-img-overlay i:hover,
    .gallery-col-img-overlay i:hover,
    .woocommerce div.product p.price,
    .woocommerce div.product span.price,
    .woocommerce div.product .stock,
    .woocommerce .star-rating span,
    .woocommerce ul.products li.product .price,
    .WC-product-name a:hover,
    .dental-care-blog-items .dental-care-blog-info h5 a:hover,
    .blog-grid-widget-info h6 a:hover,
    .iso-cat-item .iso-overlay i:hover,
    .dental-care-products .product-name-sc a:hover,
    .dental-care-testimonials-item-two .dental-care-testim-position,
    .wpcf7-form .input-group .input-icon,
    .carousel_arrow_nav_top .arrow_prev_top,
    .stronghold-heading .heading-subtitle,
    .carousel_arrow_nav_top .arrow_next_top,
    .feature-box-info-wrapper .feature-box-title a h5:hover,
    .header-thirteen .header-booking-btn a:hover,
    .header-sixteen .header-booking-btn a:hover,
    .header-seventeen .header-booking-btn a:hover,
    .header-eighteen .header-booking-btn a:hover{
        color: '. esc_attr($color_scheme_col).';
    }

    button:hover,
    .btn:hover,
    input[type="button"]:hover,
    input[type="reset"]:hover,
    input[type="submit"]:hover,
    .header-three .bottom-header,
    .page-title-wrapper,
    .side-menu-fixed,
    .header-nine .header-contact-social li a,
    .header-thirteen .header-booking-btn a,
    .header-thirteen .navbar-nav>li:hover,
    .header-thirteen .navbar-nav> .current_page_item > a,
    .header-thirteen .navbar-nav> .current-menu-item > a,
    .widget_tag_cloud a:hover,
    .social-widget-item a,
    .blog-featured-img-overlay,
    .search-content .result-icon,
    .mobile-top-header-toggle,
    .home-btn,
    .woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .woocommerce #respond input#submit.alt.disabled,
    .woocommerce #respond input#submit.alt.disabled:hover,
    .woocommerce #respond input#submit.alt:disabled,
    .woocommerce #respond input#submit.alt:disabled:hover,
    .woocommerce #respond input#submit.alt:disabled[disabled],
    .woocommerce #respond input#submit.alt:disabled[disabled]:hover,
    .woocommerce a.button.alt.disabled,
    .woocommerce a.button.alt.disabled:hover,
    .woocommerce a.button.alt:disabled,
    .woocommerce a.button.alt:disabled:hover,
    .woocommerce a.button.alt:disabled[disabled],
    .woocommerce a.button.alt:disabled[disabled]:hover,
    .woocommerce button.button.alt.disabled,
    .woocommerce button.button.alt.disabled:hover,
    .woocommerce button.button.alt:disabled,
    .woocommerce button.button.alt:disabled:hover,
    .woocommerce button.button.alt:disabled[disabled],
    .woocommerce button.button.alt:disabled[disabled]:hover,
    .woocommerce input.button.alt.disabled,
    .woocommerce input.button.alt.disabled:hover,
    .woocommerce input.button.alt:disabled,
    .woocommerce input.button.alt:disabled:hover,
    .woocommerce input.button.alt:disabled[disabled],
    .woocommerce input.button.alt:disabled[disabled]:hover,
    .woocommerce #respond input#submit.alt:hover,
    .woocommerce a.button.alt:hover,
    .woocommerce button.button.alt:hover,
    .woocommerce input.button.alt:hover,
    .woocommerce #respond input#submit:hover,
    .woocommerce a.button:hover,
    .woocommerce button.button:hover,
    .woocommerce input.button:hover,
    .widget_product_tag_cloud .tagcloud a:hover,
    .blog-date-overlay,
    .isotope-filter a:hover,
    .isotope-filter .current,
    .iso-overlay,
    .stronghold-services-featured .item-overlay,
    .dental-care-custom-menu li a:hover,
    .side-menu-fixed .side-menu-nav ul li ul li a:hover,
    .accordion-item-title-area.active,
    .accordion-item-title-area:hover,
    .feature-box-design-one .icon-wrapper,
    .header-seventeen .cicon-wrapper,
    .header-eighteen .header-booking-btn a,
    .feature-box-design-one .icon-wrapper i{
        background:  '. esc_attr($color_scheme_col).';
    }

    body table.booked-calendar tr.days,
    body table.booked-calendar tr.days th,
    body .booked-calendarSwitcher.calendar,
    body #booked-profile-page .booked-tabs,
            #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead,
            #ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar thead th,
    body table.booked-calendar th,
    body table.booked-calendar thead th{
        background:  '. esc_attr($color_scheme_col).' !important;
    }

    .nav-cart-badge,
    .team-member-block-img-overlay,
    .service-block-img-overlay,
    .gallery-col-img-overlay,
    .woocommerce nav.woocommerce-pagination ul li a:focus,
    .woocommerce nav.woocommerce-pagination ul li a:hover,
    .woocommerce nav.woocommerce-pagination ul li span.current,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
    .woocommerce span.onsale,
            #to-top:hover,
    .heading-separator span{
        background-color:  '. esc_attr($color_scheme_col).';
    }

    .main-navigation ul ul {
        border-bottom: 4px solid '. esc_attr($color_scheme_col).';
    }

    .header-thirteen .header-booking-btn a:hover,
    .header-sixteen .header-booking-btn a:hover,
    .header-seventeen .header-booking-btn a:hover,
    .header-eighteen .header-booking-btn a:hover,
    .header-nineteen .header-booking-btn a:hover {
        border: 1px solid '. esc_attr($color_scheme_col).';
    }

    .header-three .nav-cart-badge,
    .mobile-menu .current-menu-item a,
    .mobile-menu a:hover,
    .main-navigation a:hover,
    .side-menu-nav .stronghold-menu > li.mega-menu ul li i,
    .side-menu-nav .stronghold-menu li ul li i,
    .side-menu-fixed .side-menu-nav ul li ul li a,
    .nav-icon:hover,
    .footer-area a:hover,
    .header-sixteen .navbar-nav > li > a:hover,
    .header-sixteen .navbar-nav > li:hover > a{
        color:  '. esc_attr($color_scheme_col).' !important;
    }

    blockquote {
        border-left: 5px solid  '. esc_attr($color_scheme_col).';
    }';
    wp_add_inline_style('style', $style);
}
}

}

add_action('wp_enqueue_scripts', 'dental_care_dynamic_styles', 20);
