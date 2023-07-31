<?php

/**
 *
 * Initialize the custom theme options.
 *
 * @package Dental_Care
 */
add_action('admin_init', 'custom_theme_options');

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {

    /* OptionTree is not loaded yet */
    if (!function_exists('ot_settings_id') || !is_admin())
        return false;

    /**
     * Get a copy of the saved settings array.
     */
    $saved_settings = get_option(ot_settings_id(), array());

    /**
     * Custom settings array that will eventually be
     * passes to the OptionTree Settings API Class.
     */
    $custom_settings = array(
        'contextual_help' => array(
            'sidebar' => ''
        ),
        /* Theme option sections  */
        'sections' => array(
            array(
                'id' => 'general',
                'title' => '<i class="ot-icon-home"></i>' . esc_html__(' General', 'dental-care')
            ),
            array(
                'id' => 'header',
                'title' => '<i class="ot-icon-arrow-up"></i>' . esc_html__(' Header', 'dental-care')
            ),
            array(
                'id' => 'styling',
                'title' => '<i class="ot-icon-tint"></i>' . esc_html__(' Styling', 'dental-care')
            ),
            array(
                'id' => 'typography',
                'title' => '<i class="ot-icon-text-width"></i>' . esc_html__(' Typography', 'dental-care')
            ),
            array(
                'id' => 'social',
                'title' => '<i class="ot-icon-rss"></i>' . esc_html__(' Contacts & Social', 'dental-care')
            ),
            array(
                'id' => 'shop',
                'title' => '<i class="ot-icon-shopping-cart"></i>' . esc_html__(' Shop', 'dental-care')
            ),
            array(
                'id' => 'footer',
                'title' => '<i class="ot-icon-arrow-down"></i>' . esc_html__(' Footer', 'dental-care')
            ),
            array(
                'id' => 'blog',
                'title' => '<i class="ot-icon-pencil"></i>' . esc_html__(' Blog', 'dental-care')
            ),
            array(
                'id' => 'sidebars',
                'title' => '<i class="ot-icon-arrow-left"></i>' . esc_html__(' Sidebars', 'dental-care')
            ),
            array(
                'id' => 'notfound',
                'title' => '<i class="ot-icon-exclamation"></i>' . esc_html__(' 404', 'dental-care')
            ),
        ),
        'settings' => array(
            /* --------------------------------------------------------------
              # General
              -------------------------------------------------------------- */

            array(
                'id' => 'favicon',
                'label' => esc_html__('Favicon', 'dental-care'),
                'desc' => esc_html__('Choose site favicon', 'dental-care'),
                'std' => '',
                'type' => 'upload',
                'section' => 'general',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),

            //copyright text
            array(
                'id' => 'copyright_text',
                'label' => esc_html__('Copyright Text', 'dental-care'),
                'desc' => '',
                'std' => 'Copyright © 2023 Dental Care. All Rights Reserved.',
                'type' => 'text',
                'section' => 'general',
            ),
            array(
                'id' => 'layout-global',
                'label' => esc_html__('Default Site Layout', 'dental-care'),
                'desc' => esc_html__('Choose a global site layout ', 'dental-care'),
                'std' => 'sidebar-right',
                'type' => 'radio-image',
                'section' => 'general',
                'choices' => array(
                    array(
                        'value' => 'no-sidebar',
                        'label' => esc_html__('Full Width', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/full-width.png'
                    ),
                    array(
                        'value' => 'sidebar-right',
                        'label' => esc_html__('Sidebar Right', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/right-sidebar.png'
                    ),
                    array(
                        'value' => 'sidebar-left',
                        'label' => esc_html__('Sidebar Left', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/left-sidebar.png'
                    )
                )
            ),
            array(
                'id' => 'site_layout_style',
                'label' => esc_html__('Site Layout Style', 'dental-care'),
                'desc' => esc_html__('Choose the type of site layout style.', 'dental-care'),
                'type' => 'radio',
                'std' => 'wide',
                'section' => 'general',
                'choices' => array(
                    array(
                        'value' => 'wide',
                        'label' => esc_html__('Wide', 'dental-care')
                    ),
                    array(
                        'value' => 'boxed',
                        'label' => esc_html__('Boxed', 'dental-care')
                    ),

                )
            ),
            array(
                'id' => 'back_top_en',
                'label' => esc_html__('Back to Top', 'dental-care'),
                'desc' => esc_html__('Turn on/off back to top button.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'general'
            ),

            array(
                'id' => 'one_page_en',
                'label' => esc_html__('One Page Support', 'dental-care'),
                'desc' => esc_html__('Turn on/off one page menu support.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'general'
            ),
            array(
                'id' => 'services_slug',
                'label' => esc_html__('Services Slug', 'dental-care'),
                'desc' => esc_html__('Enter a unique name for the services slug.', 'dental-care'),
                'std' => esc_html__('service', 'dental-care'),
                'type' => 'text',
                'section' => 'general',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'team_members_slug',
                'label' => esc_html__('Team Members Slug', 'dental-care'),
                'desc' => esc_html__('Enter a unique name for the team members slug.', 'dental-care'),
                'std' => esc_html__('team', 'dental-care'),
                'type' => 'text',
                'section' => 'general',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'team_member_custom_img_en',
                'label' => esc_html__('Custom Team Member Page Image Size', 'dental-care'),
                'desc' => esc_html__('Turn on/off custom resolution for team member page.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'general'
            ),
            array(
                'id' => 'team_member_width',
                'label' => esc_html__('Team Member Page Image Width', 'dental-care'),
                'desc' => esc_html__('Adjusts team member image width.', 'dental-care'),
                'std' => '50',
                'min_max_step' => '100,1000,1',
                'type' => 'numeric-slider',
                'section' => 'general'
            ),
           array(
                'id' => 'team_member_height',
                'label' => esc_html__('Team Member Page Image Height', 'dental-care'),
                'desc' => esc_html__('Adjusts team member image height.', 'dental-care'),
                'std' => '50',
                'min_max_step' => '100,1000,1',
                'type' => 'numeric-slider',
                'section' => 'general'
            ),

            /* --------------------------------------------------------------
              # Header
              -------------------------------------------------------------- */
            //Logo
            array(
                'id' => 'logo',
                'label' => esc_html__('Logo', 'dental-care'),
                'desc' => esc_html__('Choose an image for the site logo.', 'dental-care'),
                'std' => '',
                'type' => 'upload',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),

            //Sticky logo
            array(
                'id' => 'logo_sticky',
                'label' => esc_html__('Sticky Logo', 'dental-care'),
                'desc' => esc_html__('Choose an image for the site logo on the sticky header.', 'dental-care'),
                'std' => '',
                'type' => 'upload',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),

            array(
                'id' => 'archive_header_img',
                'label' => esc_html__('Archive & Search Header Image', 'dental-care'),
                'desc' => esc_html__('Choose a header image for archive and search pages', 'dental-care'),
                'std' => '',
                'type' => 'upload',
                'section' => 'header',
            ),
            array(
                'id' => 'sticky_nav_en',
                'label' => esc_html__('Sticky Navigation', 'dental-care'),
                'desc' => esc_html__('Turn on/off the sticky navigation for the main menu.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'id' => 'search_en',
                'label' => esc_html__('Seach Button', 'dental-care'),
                'desc' => esc_html__('Turn on/off the search button in the main menu.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'id' => 'logo_custom_en',
                'label' => esc_html__('Logo Custom Sizing', 'dental-care'),
                'desc' => esc_html__('Turn on/off logo custom sizing.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'id' => 'logo_size',
                'label' => esc_html__('Logo Height', 'dental-care'),
                'desc' => esc_html__('Adjusts logo height', 'dental-care'),
                'std' => '70',
                'min_max_step' => '40,400,1',
                'type' => 'numeric-slider',
                'section' => 'header'
            ),
            array(
                'id' => 'logo_margin',
                'label' => esc_html__('Logo Margin', 'dental-care'),
                'desc' => esc_html__('Adjusts logo margin', 'dental-care'),
                'std' => '0',
                'min_max_step' => '-50,100,1',
                'type' => 'numeric-slider',
                'section' => 'header'
            ),
            array(
                'id' => 'mobile_logo_margin',
                'label' => esc_html__('Mobile Logo Margin', 'dental-care'),
                'desc' => esc_html__('Adjusts mobile logo margin', 'dental-care'),
                'std' => '0',
                'min_max_step' => '-10,20,1',
                'type' => 'numeric-slider',
                'section' => 'header'
            ),
            array(
                'label' => esc_html__('Mobile Menu Type', 'dental-care'),
                'id' => 'mobile_menu_type',
                'desc' => esc_html__('Choose which mobile menu type to display.', 'dental-care'),
                'std' => 'dropdown',
                'type' => 'select',
                'section' => 'header',
                'choices' => array(
                    array(
                        'value' => 'dropdown',
                        'label' => esc_html__('Dropdown', 'dental-care')
                    ),
                    array(
                        'value' => 'side',
                        'label' => esc_html__('Side', 'dental-care')
                    )
                )
            ),
            array(
                'id' => 'mobile_header_en',
                'label' => esc_html__('Mobile Header Contact Area', 'dental-care'),
                'desc' => esc_html__('Turn on/off the mobile header contact area.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'id' => 'opening_hrs_mobile_header_en',
                'label' => esc_html__('Mobile Header Contact Area Opening Hours', 'dental-care'),
                'desc' => esc_html__('Turn on/off opening hours in mobile header contact area.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'id' => 'call_us_mobile_header_en',
                'label' => esc_html__('Mobile Header Contact Area Call Us', 'dental-care'),
                'desc' => esc_html__('Turn on/off call us in mobile header contact area.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'id' => 'book_mobile_header_en',
                'label' => esc_html__('Mobile Header Contact Area Book Appointment', 'dental-care'),
                'desc' => esc_html__('Turn on/off book appointment in mobile header contact area.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'id' => 'social_mobile_header_en',
                'label' => esc_html__('Mobile Header Contact Area Social Links', 'dental-care'),
                'desc' => esc_html__('Turn on/off social links in mobile header contact area.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'id' => 'mobile_displsce_en',
                'label' => esc_html__('Displace Body in Mobile', 'dental-care'),
                'desc' => esc_html__('Turn on/off the effect that pushes the body when toggling the mobile menu.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'label' => esc_html__('Mobile Menu Side', 'dental-care'),
                'id' => 'mobile_menu_side',
                'desc' => esc_html__('Choose which side to display mobile menu.', 'dental-care'),
                'std' => 'right',
                'type' => 'select',
                'section' => 'header',
                'choices' => array(
                    array(
                        'value' => 'right',
                        'label' => esc_html__('Right', 'dental-care')
                    ),
                    array(
                        'value' => 'left',
                        'label' => esc_html__('Left', 'dental-care')
                    )
                )
            ),
              array(
                'id' => 'sticky_mobile_header_en',
                'label' => esc_html__('Sticky Mobile Header', 'dental-care'),
                'desc' => esc_html__('Turn on/off the sticky mobile header.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'id' => 'header_type',
                'label' => esc_html__('Header Type', 'dental-care'),
                'desc' => esc_html__('Choose a header type for the site.', 'dental-care'),
                'std' => 'header-one',
                'type' => 'radio-image',
                'section' => 'header',
                'choices' => array(
                    array(
                        'value' => 'header-one',
                        'label' => esc_html__('Header One', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headerone.png'
                    ),
                    array(
                        'value' => 'header-two',
                        'label' => esc_html__('Header Two', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headertwo.png'
                    ),
                    array(
                        'value' => 'header-three',
                        'label' => esc_html__('Header Three', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headerthree.png'
                    ),
                    array(
                        'value' => 'header-four',
                        'label' => esc_html__('Header Four', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headerfour.png'
                    ),
                    array(
                        'value' => 'header-five',
                        'label' => esc_html__('Header Five', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headerfive.png'
                    ),
                    array(
                        'value' => 'header-six',
                        'label' => esc_html__('Header Six', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headersix.png'
                    ),
                    array(
                        'value' => 'header-seven',
                        'label' => esc_html__('Header Seven', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headerseven.png'
                    ),
                    array(
                        'value' => 'header-eight',
                        'label' => esc_html__('Header Eight', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headereight.png'
                    ),
                    array(
                        'value' => 'header-nine',
                        'label' => esc_html__('Header Nine', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headernine.png'
                    ),
                    array(
                        'value' => 'header-ten',
                        'label' => esc_html__('Header Ten', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headerten.png'
                    ),
                    array(
                        'value' => 'header-eleven',
                        'label' => esc_html__('Header Eleven', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headereleven.png'
                    ),
                    array(
                        'value' => 'header-twelve',
                        'label' => esc_html__('Header Twelve', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headerthree.png'
                    ),
                    array(
                        'value' => 'header-thirteen',
                        'label' => esc_html__('Header Thirteen', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headerthirteen.png'
                    ),
                    array(
                        'value' => 'header-fourteen',
                        'label' => esc_html__('Header Fourteen', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headereight.png'
                    ),
                    array(
                        'value' => 'header-fifteen',
                        'label' => esc_html__('Header Fifteen', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headerthirteen.png'
                    ),
                    array(
                        'value' => 'header-sixteen',
                        'label' => esc_html__('Header Sixteen', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headersixteen.png'
                    ),
                    array(
                        'value' => 'header-seventeen',
                        'label' => esc_html__('Header Seventeen', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headerseventeen.png'
                    ),
                    array(
                        'value' => 'header-eighteen',
                        'label' => esc_html__('Header Eighteen', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headereighteen.png'
                    ),
                    array(
                        'value' => 'header-nineteen',
                        'label' => esc_html__('Header Nineteen', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/headernineteen.png'
                    ),

                ),
            ),
            array(
                'id' => 'sticky_header_type',
                'label' => esc_html__('Sticky Header Type', 'dental-care'),
                'desc' => esc_html__('Choose a sticky header type for the site.', 'dental-care'),
                'std' => 'header-one',
                'type' => 'radio-image',
                'section' => 'header',
                'choices' => array(
                    array(
                        'value' => 'header-one',
                        'label' => esc_html__('Header One', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/sticky-headerone.png'
                    ),
                    array(
                        'value' => 'header-two',
                        'label' => esc_html__('Header Two', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/sticky-headertwo.png'
                    ),
                    array(
                        'value' => 'header-three',
                        'label' => esc_html__('Header Three', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/header/sticky-headerthree.png'
                    ),


                ),
            ),
            array(
                'id' => 'top_header_en',
                'label' => esc_html__('Top Header', 'dental-care'),
                'desc' => esc_html__('Turn on/off the top header.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'id' => 'top_mobile_header_en',
                'label' => esc_html__('Top Mobile Header', 'dental-care'),
                'desc' => esc_html__('Turn on/off the top mobile header.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'header'
            ),
            array(
                'label' => esc_html__('Mobile top header view', 'dental-care'),
                'id' => 'mobile_top_header_view',
                'desc' => esc_html__('Choose if to display or toggle top header', 'dental-care'),
                'std' => '0',
                'type' => 'select',
                'section' => 'header',
                'choices' => array(
                    array(
                        'value' => '0',
                        'label' => esc_html__('Display', 'dental-care')
                    ),
                    array(
                        'value' => '1',
                        'label' => esc_html__('Toggle', 'dental-care')
                    )
                )
            ),
            array(
                'id' => 'top_header_info',
                'label' => esc_html__('Top Header Information', 'dental-care'),
                'desc' => esc_html__('Click Add New to add information to the top header area.', 'dental-care'),
                'type' => 'list-item',
                'section' => 'header',
                'choices' => array(),
                'settings' => array(
                    array(
                        'id' => 'header_top_left_one',
                        'label' => esc_html__('Top Header Left Column 1', 'dental-care'),
                        'desc' => esc_html__('Choose a contact detail to display in the left side of the top header.', 'dental-care'),
                        'std' => 'header-left-number',
                        'type' => 'select',
                        'section' => 'header',
                        'choices' => array(
                            array(
                                'value' => 'header-left-number',
                                'label' => esc_html__('Phone Number', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-email',
                                'label' => esc_html__('Email', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-address',
                                'label' => esc_html__('Address', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-opening',
                                'label' => esc_html__('Opening Hours', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-appointment',
                                'label' => esc_html__('Book Appointment Link', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-none',
                                'label' => esc_html__('None', 'dental-care'),
                            ),
                        )
                    ),
                    array(
                        'id' => 'header_top_left_two_val',
                        'label' => esc_html__('Top Header Left Column 2 Detail', 'dental-care'),
                        'desc' => esc_html__('Enter contact detail. ', 'dental-care'),
                        'type' => 'text',
                        'section' => 'header',
                    ),
                    array(
                        'id' => 'header_top_left_two',
                        'label' => esc_html__('Top Header Left Column 2', 'dental-care'),
                        'desc' => esc_html__('Choose a contact detail to display in the left side of the top header.', 'dental-care'),
                        'std' => 'header-left-number',
                        'type' => 'select',
                        'section' => 'header',
                        'choices' => array(
                            array(
                                'value' => 'header-left-number',
                                'label' => esc_html__('Phone Number', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-email',
                                'label' => esc_html__('Email', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-address',
                                'label' => esc_html__('Address', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-opening',
                                'label' => esc_html__('Opening Hours', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-appointment',
                                'label' => esc_html__('Book Appointment Link', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-none',
                                'label' => esc_html__('None', 'dental-care'),
                            ),
                        )
                    ),
                    array(
                        'id' => 'header_top_left_three_val',
                        'label' => esc_html__('Top Header Left Column 3 Detail', 'dental-care'),
                        'desc' => esc_html__('Enter contact detail.', 'dental-care'),
                        'type' => 'text',
                        'section' => 'header',
                    ),
                    array(
                        'id' => 'header_top_left_three',
                        'label' => esc_html__('Top Header Left Column 3', 'dental-care'),
                        'desc' => esc_html__('Choose a contact detail to display in the left side of the top header.', 'dental-care'),
                        'std' => 'header-left-number',
                        'type' => 'select',
                        'section' => 'header',
                        'choices' => array(
                            array(
                                'value' => 'header-left-number',
                                'label' => esc_html__('Phone Number', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-email',
                                'label' => esc_html__('Email', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-address',
                                'label' => esc_html__('Address', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-opening',
                                'label' => esc_html__('Opening Hours', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-appointment',
                                'label' => esc_html__('Book Appointment Link', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-none',
                                'label' => esc_html__('None', 'dental-care'),
                            ),
                        )
                    ),
                    array(
                        'id' => 'header_top_left_four_val',
                        'label' => esc_html__('Top Header Left Column 4 Detail', 'dental-care'),
                        'desc' => esc_html__('Enter contact detail.', 'dental-care'),
                        'type' => 'text',
                        'section' => 'header',
                    ),
                    array(
                        'id' => 'header_top_left_four',
                        'label' => esc_html__('Top Header Left Column 4', 'dental-care'),
                        'desc' => esc_html__('Choose a contact detail to display in the left side of the top header.', 'dental-care'),
                        'std' => 'header-left-none',
                        'type' => 'select',
                        'section' => 'header',
                        'choices' => array(
                            array(
                                'value' => 'header-left-number',
                                'label' => esc_html__('Phone Number', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-email',
                                'label' => esc_html__('Email', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-address',
                                'label' => esc_html__('Address', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-opening',
                                'label' => esc_html__('Opening Hours', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-appointment',
                                'label' => esc_html__('Book Appointment Link', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-left-none',
                                'label' => esc_html__('None', 'dental-care'),
                            ),
                        )
                    ),
                    array(
                        'id' => 'header_top_left_custom',
                        'label' => esc_html__('Top Header Left Custom Text', 'dental-care'),
                        'desc' => esc_html__('Enter custom text to display instead of columns.', 'dental-care'),
                        'type' => 'text',
                        'section' => 'header',
                    ),
                    array(
                        'id' => 'header_top_right_text',
                        'label' => esc_html__('Top Header Right Custom Text', 'dental-care'),
                        'desc' => esc_html__('Enter custom text to display in header top right area.', 'dental-care'),
                        'type' => 'text',
                        'section' => 'header',
                    ),
                    array(
                        'id' => 'header_top_right',
                        'label' => esc_html__('Top Header Right', 'dental-care'),
                        'desc' => esc_html__('Choose what to display in the right side of the top header.', 'dental-care'),
                        'std' => 'header-right-social',
                        'type' => 'select',
                        'section' => 'header',
                        'choices' => array(
                            array(
                                'value' => 'header-right-social',
                                'label' => esc_html__('Social Icons', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-right-menu',
                                'label' => esc_html__('Menu', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-right-custom',
                                'label' => esc_html__('Custom Text', 'dental-care'),
                            ),
                            array(
                                'value' => 'header-right-none',
                                'label' => esc_html__('None', 'dental-care'),
                            ),
                        )
                    ),
                )
            ),
            /* --------------------------------------------------------------
              # Styling
              -------------------------------------------------------------- */
            array(
                'id' => 'general_styling_text',
                'label' => esc_html__('General Styling', 'dental-care'),
                'type' => 'textblock-titled',
                'section' => 'styling',
            ),
            //Color scheme
            array(
                'id' => 'color_scheme',
                'label' => esc_html__('Color Scheme', 'dental-care'),
                'desc' => esc_html__('Choose your own color scheme using the color picker.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
             array(
                'id' => 'color_scheme_hex',
                'label' => esc_html__('Color Scheme (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the color scheme. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'site_bg',
                'label' => esc_html__('Site Background/Color (Boxed Mode)', 'dental-care'),
                'desc' => esc_html__('Choose a background or color for the site when in boxed mode.', 'dental-care'),
                'type' => 'background',
                'section' => 'styling',
                'class' => '',
            ),
             //Custom css
            array(
                'id' => 'css_custom',
                'label' => esc_html__('Add Custom CSS', 'dental-care'),
                'desc' => esc_html__('Add your custom CSS here', 'dental-care'),
                'type' => 'css',
                'section' => 'styling'
            ),
            array(
                'id' => 'header_styling_text',
                'label' => esc_html__('Header Styling', 'dental-care'),
                'type' => 'textblock-titled',
                'section' => 'styling',
            ),
            array(
                'id' => 'header_bg_area',
                'label' => esc_html__('Header Background (Top Header & Main Navigation)', 'dental-care'),
                'desc' => esc_html__('Choose a background or color for the top header and main navigation.', 'dental-care'),
                'type' => 'background',
                'section' => 'styling',
                'class' => '',
            ),
            array(
                'id' => 'header_top_bg_color',
                'label' => esc_html__('Top Header Background Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the background of the top header.', 'dental-care'),
                'type' => 'colorpicker-opacity',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_top_bg_color_hex',
                'label' => esc_html__('Top Header Background Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the background of the top header. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'header_top_text_color',
                'label' => esc_html__('Top Header Text Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the text in the top header.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_top_text_color_hex',
                'label' => esc_html__('Top Header Text Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the text in the top header. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'header_top_icon_color',
                'label' => esc_html__('Top Header Icon Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the icons in the top header.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_top_icon_color_hex',
                'label' => esc_html__('Top Header Icon Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the icons in the top header. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'mobile_header_top_toggle_bg_color',
                'label' => esc_html__('Mobile Top Header Toggle Background Color', 'dental-care'),
                'desc' => esc_html__('Choose a background color for the mobile top header toggle.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'main_nav_link_color',
                'label' => esc_html__('Main Navigation Links Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for links in the main navigation.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
             array(
                'id' => 'main_nav_link_bgcolor',
                'label' => esc_html__('Main Navigation Links Background Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for links background in the main navigation.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'main_nav_link_color_hex',
                'label' => esc_html__('Main Navigation Links Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for links in the main navigation. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'main_nav_link_hover_color',
                'label' => esc_html__('Main Navigation Links Hover Color', 'dental-care'),
                'desc' => esc_html__('Choose a hover color for links hover in the main navigation.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'main_nav_link_hover_color_hex',
                'label' => esc_html__('Main Navigation Links Hover Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for links hover in the main navigation. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'main_nav_drop_link_color',
                'label' => esc_html__('Main Navigation Dropdown Links Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for dropdown links in the main navigation.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'main_nav_drop_link_color_hex',
                'label' => esc_html__('Main Navigation Dropdown Links Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for dropdown links in the main navigation. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'main_nav_bg_color',
                'label' => esc_html__('Main Navigation Background Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the background of the main navigation.', 'dental-care'),
                'type' => 'colorpicker-opacity',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'main_nav_bg_color_hex',
                'label' => esc_html__('Main Navigation Background Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the background of the main navigation. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'header_area_bg_color',
                'label' => esc_html__('Header Area Background Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the background of the header area.', 'dental-care'),
                'type' => 'colorpicker-opacity',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_area_bg_color_hex',
                'label' => esc_html__('Header Area Background Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the background of the header area. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'header_contact_icon_color',
                'label' => esc_html__('Header Contact Icons Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the header contact icons.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_contact_icon_color_hex',
                'label' => esc_html__('Header Contact Icons Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the header contact icons. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'header_contact_icon_hcolor',
                'label' => esc_html__('Header Contact Icons Hover Color', 'dental-care'),
                'desc' => esc_html__('Choose a hover color for the header contact icons.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_contact_desc_color',
                'label' => esc_html__('Header Contact Description Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the header contact description.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_contact_desc_color_hex',
                'label' => esc_html__('Header Contact Description Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the header contact description. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'header_contact_title_color',
                'label' => esc_html__('Header Contact Title Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the header contact titles.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_contact_title_color_hex',
                'label' => esc_html__('Header Contact Title Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the header contact titles. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'header_social_icon_color',
                'label' => esc_html__('Header Social Icon Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the header social icons.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_social_icon_color_hex',
                'label' => esc_html__('Header Social Icon Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the header social icons. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'header_button_color',
                'label' => esc_html__('Header Button Background Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the header button background.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_button_color_hex',
                'label' => esc_html__('Header Button Background Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the header button background (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
             array(
                'id' => 'header_button_text_color',
                'label' => esc_html__('Header Button Text Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the header button text color.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_button_text_color_hex',
                'label' => esc_html__('Header Button Text Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the header button text (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
             array(
                'id' => 'header_button_border_color',
                'label' => esc_html__('Header Button Border Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the header button border color.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_button_border_color_hex',
                'label' => esc_html__('Header Button Border Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the header button border (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'header_button_hover_color',
                'label' => esc_html__('Header Button Hover Background Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the header button background.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_button_hover_color_hex',
                'label' => esc_html__('Header Button Hover Background Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the header button background (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
             array(
                'id' => 'header_button_text_hover_color',
                'label' => esc_html__('Header Button Text Hover Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the header button text color.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_button_text_hover_color_hex',
                'label' => esc_html__('Header Button Text Hover Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the header button text (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
             array(
                'id' => 'header_button_border_hover_color',
                'label' => esc_html__('Header Button Border Hover Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the header button border color.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'header_button_border_hover_color_hex',
                'label' => esc_html__('Header Button Border Hover Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the header button border (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
               array(
                'id' => 'page_header_bg_color',
                'label' => esc_html__('Page Header Background Color', 'dental-care'),
                'desc' => esc_html__('Choose a background color for the page header.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
             array(
                'id' => 'page_header_title_color',
                'label' => esc_html__('Page Header Title Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the page header title.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
              array(
                'id' => 'page_header_bread_color',
                'label' => esc_html__('Page Header Breadcrumb Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the page header breadcrumb.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'mega_menu_bg',
                'label' => esc_html__('Mega Menu Background/Color', 'dental-care'),
                'desc' => esc_html__('Choose a background or color for the mega menu.', 'dental-care'),
                'type' => 'background',
                'section' => 'styling',
                'class' => '',
            ),
            array(
                'id' => 'sticky_header_link_color',
                'label' => esc_html__('
                    ', 'dental-care'),
                'desc' => esc_html__('Choose a color for links in the sticky header.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'sticky_header_link_color_hex',
                'label' => esc_html__('Sticky Header Links Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for links in the sticky header. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'sticky_header_drop_link_color',
                'label' => esc_html__('Sticky Header Dropdown Links Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for dropdown links in the sticky header.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'sticky_header_drop_link_color_hex',
                'label' => esc_html__('Sticky Header Dropdown Links Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for dropdown links in the sticky header. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'sticky_header_background_color',
                'label' => esc_html__('Sticky Header Background Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the background of the sticky header.', 'dental-care'),
                'type' => 'colorpicker-opacity',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'sticky_header_background_color_hex',
                'label' => esc_html__('Sticky Header Background Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the background of the top header. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'footer_styling_text',
                'label' => esc_html__('Footer Styling', 'dental-care'),
                'type' => 'textblock-titled',
                'section' => 'styling',
            ),


            array(
                'id' => 'footerwd_bg',
                'label' => esc_html__('Footer Widget Area Background/Color', 'dental-care'),
                'desc' => esc_html__('Choose a background or color for the footer widget area.', 'dental-care'),
                'type' => 'background',
                'section' => 'styling',
                'class' => '',
            ),
            array(
                'id' => 'footerwd_tx_color',
                'label' => esc_html__('Footer Widget Area Text Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the text in the footer widget area.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'footerwd_tx_color_hex',
                'label' => esc_html__('Footer Widget Area Text Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the text in the footer widget area. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'footerwd_icon_color',
                'label' => esc_html__('Footer Widget Area Icon Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for icons in the footer widget area.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
             array(
                'id' => 'footerwd_socialicon_color',
                'label' => esc_html__('Footer Widget Area Social Icon Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for social icons in the footer widget area.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'footercp_tx_color',
                'label' => esc_html__('Bottom Footer Text Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for the text in the bottom footer.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'footercp_tx_color_hex',
                'label' => esc_html__('Bottom Footer Text Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the text in the bottom footer. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'footercp_bg_color',
                'label' => esc_html__('Bottom Footer Background Color', 'dental-care'),
                'desc' => esc_html__('Choose a background color for the bottom footer.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),
            array(
                'id' => 'footercp_bg_color_hex',
                'label' => esc_html__('Bottom Footer Background Color (Hex value)', 'dental-care'),
                'desc' => esc_html__('Enter the hex value for a color you wish to use for the background color for the bottom footer. (Replaces the colorpicker option above.)', 'dental-care'),
                'type' => 'text',
                'section' => 'styling',
            ),
            array(
                'id' => 'footercp_socialicon_color',
                'label' => esc_html__('Bottom Footer Social Icon Color', 'dental-care'),
                'desc' => esc_html__('Choose a color for social icons the bottom footer.', 'dental-care'),
                'type' => 'colorpicker',
                'section' => 'styling',
                'class' => ''
            ),

            /* --------------------------------------------------------------
              # Typography
              -------------------------------------------------------------- */

            //Body font
            array(
                'id' => 'body_font',
                'label' => esc_html__('Body Font', 'dental-care'),
                'type' => 'typography',
                'section' => 'typography',
                'std' => array(
                    'font-family' => '',
                    'font-color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-style' => '',
                    'font-variant' => '',
                    'font-weight' => '',
                    'letter-spacing' => '',
                    'text-decoration' => '',
                    'text-transform' => ''
                )
            ),
            //Main Navigation font
            array(
                'id' => 'main_navigation_font',
                'label' => esc_html__('Main Navigation Font', 'dental-care'),
                'type' => 'typography',
                'section' => 'typography',
                'std' => array(
                    'font-family' => '',
                    'font-color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-style' => '',
                    'font-variant' => '',
                    'font-weight' => '',
                    'letter-spacing' => '',
                    'text-decoration' => '',
                    'text-transform' => ''
                )
            ),
            //H1 font
            array(
                'id' => 'h1_font',
                'label' => esc_html__('H1 Font', 'dental-care'),
                'type' => 'typography',
                'section' => 'typography',
                'std' => array(
                    'font-family' => '',
                    'font-color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-style' => '',
                    'font-variant' => '',
                    'font-weight' => '',
                    'letter-spacing' => '',
                    'text-decoration' => '',
                    'text-transform' => ''
                )
            ),
            //H2 font
            array(
                'id' => 'h2_font',
                'label' => esc_html__('H2 Font', 'dental-care'),
                'type' => 'typography',
                'section' => 'typography',
                'std' => array(
                    'font-family' => '',
                    'font-color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-style' => '',
                    'font-variant' => '',
                    'font-weight' => '',
                    'letter-spacing' => '',
                    'text-decoration' => '',
                    'text-transform' => ''
                )
            ),
            //H3 font
            array(
                'id' => 'h3_font',
                'label' => esc_html__('H3 Font', 'dental-care'),
                'type' => 'typography',
                'section' => 'typography',
                'std' => array(
                    'font-family' => '',
                    'font-color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-style' => '',
                    'font-variant' => '',
                    'font-weight' => '',
                    'letter-spacing' => '',
                    'text-decoration' => '',
                    'text-transform' => ''
                )
            ),
            //H4 font
            array(
                'id' => 'h4_font',
                'label' => esc_html__('H4 Font', 'dental-care'),
                'type' => 'typography',
                'section' => 'typography',
                'std' => array(
                    'font-family' => '',
                    'font-color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-style' => '',
                    'font-variant' => '',
                    'font-weight' => '',
                    'letter-spacing' => '',
                    'text-decoration' => '',
                    'text-transform' => ''
                )
            ),
            //H5 font
            array(
                'id' => 'h5_font',
                'label' => esc_html__('H5 Font', 'dental-care'),
                'type' => 'typography',
                'section' => 'typography',
                'std' => array(
                    'font-family' => '',
                    'font-color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-style' => '',
                    'font-variant' => '',
                    'font-weight' => '',
                    'letter-spacing' => '',
                    'text-decoration' => '',
                    'text-transform' => ''
                )
            ),
            //H6 font
            array(
                'id' => 'h6_font',
                'label' => esc_html__('H6 Font', 'dental-care'),
                'type' => 'typography',
                'section' => 'typography',
                'std' => array(
                    'font-family' => '',
                    'font-color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-style' => '',
                    'font-variant' => '',
                    'font-weight' => '',
                    'letter-spacing' => '',
                    'text-decoration' => '',
                    'text-transform' => ''
                )
            ),
            /* --------------------------------------------------------------
              # Contacts & Social
              -------------------------------------------------------------- */

            //Social Menu
            array(
                'id' => 'social-menu',
                'label' => esc_html__('Social Networks', 'dental-care'),
                'desc' => esc_html__('Add your social networks by clicking Add New then enter the social network title (eg- Facebook, Twitter, Instagram) and then enter the link to your profile.', 'dental-care'),
                'type' => 'list-item',
                'section' => 'social',
                'choices' => array(),
                'settings' => array(
                    array(
                        'id' => 'social-link',
                        'label' => esc_html__('Link url', 'dental-care'),
                        'std' => 'http://',
                        'type' => 'text',
                        'choices' => array()
                    ),
                )
            ),
            array(
                'id' => 'call_icon',
                'label' => esc_html__('Call Us Icon', 'dental-care'),
                'desc' => esc_html__('Enter icon class for icon. e.g. fa fa-phone-square. <a href="http://fontawesome.io/icons/" target="_blank">Click here</a> to see more icons', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'call_us_text',
                'label' => esc_html__('Call Us Text', 'dental-care'),
                'desc' => esc_html__('Enter text for call us.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'contact_number',
                'label' => esc_html__('Telephone Number', 'dental-care'),
                'desc' => esc_html__('Enter telephone number.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'openhrs_icon',
                'label' => esc_html__('Opening Hours Icon', 'dental-care'),
                'desc' => esc_html__('Enter icon class for icon. e.g. fa fa-phone-square. <a href="http://fontawesome.io/icons/" target="_blank">Click here</a> to see more icons', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'opening_hours_text',
                'label' => esc_html__('Opening Hours Text', 'dental-care'),
                'desc' => esc_html__('Enter text for opening hours.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'contact_hours',
                'label' => esc_html__('Opening Hours', 'dental-care'),
                'desc' => esc_html__('Enter opening hours.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'address_icon',
                'label' => esc_html__('Address Icon', 'dental-care'),
                'desc' => esc_html__('Enter icon class for icon. e.g. fa fa-phone-square. <a href="http://fontawesome.io/icons/" target="_blank">Click here</a> to see more icons', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'address_text',
                'label' => esc_html__('Address Text', 'dental-care'),
                'desc' => esc_html__('Enter text for address.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'address_details',
                'label' => esc_html__('Address Details', 'dental-care'),
                'desc' => esc_html__('Enter address details.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'email_icon',
                'label' => esc_html__('Email Icon', 'dental-care'),
                'desc' => esc_html__('Enter icon class for icon. e.g. fa fa-phone-square. <a href="http://fontawesome.io/icons/" target="_blank">Click here</a> to see more icons', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'email_text',
                'label' => esc_html__('Email Text', 'dental-care'),
                'desc' => esc_html__('Enter text for email.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'email_details',
                'label' => esc_html__('Email Details', 'dental-care'),
                'desc' => esc_html__('Enter email details.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'book_icon',
                'label' => esc_html__('Book Appointment Icon', 'dental-care'),
                'desc' => esc_html__('Enter icon class for icon. e.g. fa fa-phone-square. <a href="http://fontawesome.io/icons/" target="_blank">Click here</a> to see more icons', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'contact_book_text',
                'label' => esc_html__('Book Appointment Title', 'dental-care'),
                'desc' => esc_html__('Enter book appointment text.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'contact_book_subtext',
                'label' => esc_html__('Book Appointment Sub-title', 'dental-care'),
                'desc' => esc_html__('Enter book appointment text.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                        'id' => 'contact_book_type',
                        'label' => esc_html__('Book Appointment Type', 'dental-care'),
                        'desc' => esc_html__('Choose action when book appointment link is clicked', 'dental-care'),
                        'std' => 'book-page',
                        'type' => 'select',
                        'section' => 'social',
                        'choices' => array(
                            array(
                                'value' => 'book-page',
                                'label' => esc_html__('Page', 'dental-care'),
                            ),
                            array(
                                'value' => 'book-link',
                                'label' => esc_html__('Custom Link', 'dental-care'),
                            ),
                            array(
                                'value' => 'book-email',
                                'label' => esc_html__('Email', 'dental-care'),
                            ),

                        )
                    ),
            array(
                'id' => 'contact_book_link',
                'label' => esc_html__('Book Appointment Page', 'dental-care'),
                'desc' => esc_html__('Choose appointment page.', 'dental-care'),
                'type' => 'page-select',
                'section' => 'social',
            ),
            array(
                'id' => 'book_link',
                'label' => esc_html__('Book Custom Link', 'dental-care'),
                'desc' => esc_html__('Enter book appointment custom link.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
            array(
                'id' => 'book_email',
                'label' => esc_html__('Book Email', 'dental-care'),
                'desc' => esc_html__('Enter book appointment email.', 'dental-care'),
                'type' => 'text',
                'section' => 'social',
            ),
           array(
                'id' => 'contact_book_link_target',
                'label' => esc_html__('Book Link Action', 'dental-care'),
                'desc' => esc_html__('Choose action when book appointment link is clicked', 'dental-care'),
                'std' => 'same-window',
                'type' => 'select',
                'section' => 'social',
                'choices' => array(
                    array(
                        'value' => 'same-window',
                        'label' => esc_html__('Same Window', 'dental-care'),
                    ),
                    array(
                        'value' => 'new-window',
                        'label' => esc_html__('New Window', 'dental-care'),
                    ),

                )
            ),


            /* --------------------------------------------------------------
              # Shop
              -------------------------------------------------------------- */
            array(
                'id' => 'shop_page_header_en',
                'label' => esc_html__('Shop Page Header', 'dental-care'),
                'desc' => esc_html__('Turn on/off shop page header.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'shop'
            ),
            array(
                'id' => 'shop_page_padding_en',
                'label' => esc_html__('Shop Page Padding', 'dental-care'),
                'desc' => esc_html__('Turn on/off shop page padding.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'shop'
            ),
            array(
                'label' => esc_html__('Shop Header Type', 'dental-care'),
                'id' => 'shop_header_select',
                'desc' => esc_html__('Choose a page header type.', 'dental-care'),
                'std' => 'page_header_std',
                'type' => 'select',
                'section' => 'shop',
                'choices' => array(
                    array(
                        'value' => 'page_header_std',
                        'label' => esc_html__('Standard Page Header', 'dental-care')
                    ),
                    array(
                        'value' => 'page_header_bg',
                        'label' => esc_html__('Background Page Header', 'dental-care')
                    )
                )
            ),
            array(
                'label' => esc_html__('Shop Page Header Style', 'dental-care'),
                'id' => 'shop_header_style',
                'desc' => esc_html__('Choose a page header style.', 'dental-care'),
                'std' => 'page_header_stnd',
                'type' => 'select',
                'section' => 'shop',
                'choices' => array(
                    array(
                        'value' => 'page_header_stnd',
                        'label' => esc_html__('Standard Page Header', 'dental-care')
                    ),
                    array(
                        'value' => 'page_header_trsp',
                        'label' => esc_html__('Transparent Page Header', 'dental-care')
                    )
                )
            ),
            array(
                'id' => 'shop_header_bg_overlay',
                'label' => esc_html__('Page Header Overlay Color', 'dental-care'),
                'desc' => esc_html__('Choose an overlay color for the page header background.', 'dental-care'),
                'std' => '',
                'section' => 'shop',
                'type' => 'colorpicker-opacity',
            ),
            array(
                'id' => 'shop_header_bg_img',
                'label' => esc_html__('Page Header Background Image', 'dental-care'),
                'desc' => esc_html__('Choose an image for the page header.', 'dental-care'),
                'std' => '',
                'section' => 'shop',
                'type' => 'upload',
            ),
            array(
                'label' => esc_html__('Shop Page Title Alignment', 'dental-care'),
                'id' => 'shop_title_align',
                'desc' => esc_html__('Choose the alignment for the page title.', 'dental-care'),
                'std' => 'page_title_left',
                'section' => 'shop',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => 'page_title_left',
                        'label' => esc_html__('Left', 'dental-care')
                    ),
                    array(
                        'value' => 'page_title_center',
                        'label' => esc_html__('Center', 'dental-care')
                    )
                )
            ),
            array(
                'label' => esc_html__('Shop Page Title Tag', 'dental-care'),
                'id' => 'shop_title_tag',
                'desc' => esc_html__('Choose the tag for the shop page title.', 'dental-care'),
                'std' => 'h1',
                'section' => 'shop',
                'type' => 'select',
                'choices' => array(
                     array(
                        'value' => 'h1',
                        'label' => esc_html__('h1', 'dental-care')
                    ),
                    array(
                        'value' => 'h2',
                        'label' => esc_html__('h2', 'dental-care')
                    ),
                    array(
                        'value' => 'h3',
                        'label' => esc_html__('h3', 'dental-care')
                    ),
                    array(
                        'value' => 'h4',
                        'label' => esc_html__('h4', 'dental-care')
                    ),
                    array(
                        'value' => 'h5',
                        'label' => esc_html__('h5', 'dental-care')
                    ),
                    array(
                        'value' => 'h6',
                        'label' => esc_html__('h6', 'dental-care')
                    ),
                    array(
                        'value' => 'div',
                        'label' => esc_html__('div', 'dental-care')
                    ),
                    array(
                        'value' => 'span',
                        'label' => esc_html__('span', 'dental-care')
                    ),
                    array(
                        'value' => 'p',
                        'label' => esc_html__('p', 'dental-care')
                    )
                )
            ),
            array(
                'id' => 'shop_breadcrumb_en',
                'label' => esc_html__('Shop Page Breadcrumb', 'dental-care'),
                'desc' => esc_html__('Turn on/off Breadcrumb on Shop pages.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'shop'
            ),
            array(
                'id' => 'layout-shop',
                'label' => esc_html__('Shop Page Layout', 'dental-care'),
                'desc' => esc_html__('Choose a layout for the shop page.', 'dental-care'),
                'std' => 'no-sidebar',
                'type' => 'radio-image',
                'section' => 'shop',
                'choices' => array(
                    array(
                        'value' => 'no-sidebar',
                        'label' => esc_html__('Full Width', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/full-width.png'
                    ),
                    array(
                        'value' => 'sidebar-right',
                        'label' => esc_html__('Sidebar Right', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/right-sidebar.png'
                    ),
                    array(
                        'value' => 'sidebar-left',
                        'label' => esc_html__('Sidebar Left', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/left-sidebar.png'
                    )
                )
            ),
            array(
                'id' => 'layout-single-prod',
                'label' => esc_html__('Single Product Layout', 'dental-care'),
                'desc' => esc_html__('Choose a layout for single product pages.', 'dental-care'),
                'std' => 'no-sidebar',
                'type' => 'radio-image',
                'section' => 'shop',
                'choices' => array(
                    array(
                        'value' => 'no-sidebar',
                        'label' => esc_html__('Full Width', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/full-width.png'
                    ),
                    array(
                        'value' => 'sidebar-right',
                        'label' => esc_html__('Sidebar Right', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/right-sidebar.png'
                    ),
                    array(
                        'value' => 'sidebar-left',
                        'label' => esc_html__('Sidebar Left', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/left-sidebar.png'
                    )
                )
            ),
            //NUM PRODUCTS
            array(
                'id' => 'num_products',
                'label' => esc_html__('Number of products on shop page.', 'dental-care'),
                'std' => '12',
                'desc' => esc_html__('Choose the number of products for shop page.', 'dental-care'),
                'type' => 'numeric-slider',
                'section' => 'shop',
                'min_max_step' => '6,24,1'
            ),
            array(
                'id' => 'catalog_mode_en',
                'label' => esc_html__('Catalog Mode', 'dental-care'),
                'desc' => esc_html__('Turn on/off catalog mode on shop pages.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'shop'
            ),
            array(
                'id' => 'cart_icon_en',
                'label' => esc_html__('Cart Icon in Main Menu', 'dental-care'),
                'desc' => esc_html__('Turn on/off the cart icon in the main menu.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'shop'
            ),
            /* --------------------------------------------------------------
              # Footer
              -------------------------------------------------------------- */
            array(
                'id' => 'footer_widget_en',
                'label' => esc_html__('Footer Widget Area', 'dental-care'),
                'desc' => esc_html__('Turn on/off the footer widget area.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'footer'
            ),
            array(
                'id' => 'footer_col_layout',
                'label' => esc_html__('Footer Column Layout', 'dental-care'),
                'desc' => esc_html__('Choose a layout for the footer widget area.', 'dental-care'),
                'std' => 'four-col',
                'type' => 'radio-image',
                'section' => 'footer',
                'choices' => array(
                    array(
                        'value' => 'one-col',
                        'label' => esc_html__('One Column', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/one-col.png'
                    ),
                    array(
                        'value' => 'two-col',
                        'label' => esc_html__('Two Column', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/two-col.png'
                    ),
                    array(
                        'value' => 'three-col',
                        'label' => esc_html__('Three Column', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/three-col.png'
                    ),
                    array(
                        'value' => 'four-col',
                        'label' => esc_html__('Four Column', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/four-col.png'
                    ),
                )
            ),
            array(
                'id' => 'footer_menu_type',
                'label' => esc_html__('Footer Menu Type', 'dental-care'),
                'desc' => esc_html__('Choose the type of menu to display in copyright area.', 'dental-care'),
                'type' => 'radio',
                'std' => 'socialmenu',
                'section' => 'footer',
                'choices' => array(
                    array(
                        'value' => 'socialmenu',
                        'label' => esc_html__('Social Menu', 'dental-care')
                    ),
                    array(
                        'value' => 'navmenu',
                        'label' => esc_html__('Navigation Menu', 'dental-care')
                    ),
                    array(
                        'value' => 'menunone',
                        'label' => esc_html__('None', 'dental-care')
                    )
                )
            ),
            /* --------------------------------------------------------------
              # Blog
              -------------------------------------------------------------- */
            //Featured image on single post enable/disable
            array(
                'id' => 'featured_img_single_en',
                'label' => esc_html__('Featured Image on Single Posts', 'dental-care'),
                'desc' => esc_html__('Turn on/off Featured images in Single Posts.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'blog'
            ),
            //Read More button post enable/disable
            array(
                'id' => 'read_more_en',
                'label' => esc_html__('Read More Button on Blog', 'dental-care'),
                'desc' => esc_html__('Turn on/off the Read More button on the blog page.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'blog'
            ),

            //Index posts length
            array(
                'id' => 'post_content_length',
                'label' => esc_html__('Post length', 'dental-care'),
                'desc' => esc_html__('Choose the length for posts on blog page', 'dental-care'),
                'type' => 'radio',
                'std' => '1',
                'section' => 'blog',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => esc_html__('Excerpts', 'dental-care')
                    ),
                    array(
                        'value' => '2',
                        'label' => esc_html__('Full Content', 'dental-care')
                    )
                )
            ),
            //Single post navigation
            array(
                'id' => 'single_posts_nav_en',
                'label' => esc_html__('Navigation below single posts', 'dental-care'),
                'desc' => esc_html__('Turn on/off the navigation below single posts.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'blog'
            ),
            array(
                'id' => 'posts_meta_en',
                'label' => esc_html__('Posts Meta Info', 'dental-care'),
                'desc' => esc_html__('Turn on/off the post meta information above posts.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'blog'
            ),
            array(
                'id' => 'share_bar_en',
                'label' => esc_html__('Share Bar', 'dental-care'),
                'desc' => esc_html__('Turn on/off the share bar below posts.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'blog'
            ),
            //Related posts box
            array(
                'id' => 'rel_posts_en',
                'label' => esc_html__('Related Posts below articles', 'dental-care'),
                'desc' => esc_html__('Turn on/off the related posts box below articles.', 'dental-care'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'blog'
            ),
            //Author box
            array(
                'id' => 'author_box_en',
                'label' => esc_html__('Author box below posts', 'dental-care'),
                'desc' => esc_html__('Turn on/off the author box found a post.', 'dental-care'),
                'std' => '',
                'type' => 'on-off',
                'section' => 'blog'
            ),
            array(
                'id' => 'related_articles_title',
                'label' => esc_html__('Related Articles Title', 'dental-care'),
                'desc' => esc_html__('Enter related articles title.', 'dental-care'),
                'type' => 'text',
                'section' => 'blog'
            ),
            array(
                'id' => 'share_post_title',
                'label' => esc_html__('Share Post Title', 'dental-care'),
                'desc' => esc_html__('Enter share post title.', 'dental-care'),
                'type' => 'text',
                'section' => 'blog'
            ),
            /* --------------------------------------------------------------
              # Sidebars
              -------------------------------------------------------------- */
            array(
                'id' => 'sidebar-list',
                'label' => esc_html__('Create Sidebars', 'dental-care'),
                'desc' => esc_html__('Enter a name and short description for your new sidebar.', 'dental-care'),
                'type' => 'list-item',
                'section' => 'sidebars',
                'choices' => array(),
                'settings' => array(
                    array(
                        'id' => 'sidebar-desc',
                        'label' => esc_html__('Sidebar Description', 'dental-care'),
                        'std' => '',
                        'type' => 'text',
                        'choices' => array()
                    ),
                    array(
                        'id' => 'sidebar-id',
                        'label' => esc_html__('Sidebar ID', 'dental-care'),
                        'desc' => esc_html__('Each sidebar must have a unique id.', 'dental-care'),
                        'std' => '',
                        'type' => 'text',
                        'choices' => array()
                    ),
                )
            ),
            /* --------------------------------------------------------------
              # 404
              -------------------------------------------------------------- */
            array(
                'id' => 'notfound_title',
                'label' => esc_html__('404 Page Title', 'dental-care'),
                'desc' => esc_html__('Ttitle to show on 404 page.', 'dental-care'),
                'std' => 'Sorry, the requested page can\'t be found.',
                'type' => 'text',
                'section' => 'notfound',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'notfound_text',
                'label' => esc_html__('404 Page Text', 'dental-care'),
                'desc' => esc_html__('Text to show on 404 page.', 'dental-care'),
                'std' => 'The page you are looking for does not exist. Try using the search form below.',
                'type' => 'text',
                'section' => 'notfound',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
        )
    );

    /* allow settings to be filtered before saving */
    $custom_settings = apply_filters(ot_settings_id() . '_args', $custom_settings);

    /* settings are not the same update the DB */
    if ($saved_settings !== $custom_settings) {
        update_option(ot_settings_id(), $custom_settings);
    }

    /* Lets OptionTree know the UI Builder is being overridden */
    global $ot_has_custom_theme_options;
    $ot_has_custom_theme_options = true;
}
