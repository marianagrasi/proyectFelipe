<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
        exit; // Exit if accessed directly

    /**
     * Company Info
     */

    class Dental_Care_Company_Info extends Widget_Base
    {

        /**
         * Retrieve the widget name.
         *    
         * @access public
         *
         * @return string Widget name.
         */
        public function get_name()
        {
            return 'dental-care-company-info';
        }

        /**
         * Retrieve the widget title.
         *     
         * @access public
         *
         * @return string Widget title.
         */
        public function get_title()
        {
            return esc_html__('Company Info', 'dental-care');
        }

        /**
         * Retrieve the widget icon.
         *
         * @access public
         *
         * @return string Widget icon.
         */
        public function get_icon()
        {
            return 'eicon-document-file';
        }

        /**
         * Retrieve the list of categories the widget belongs to.
         *
         * Used to determine where to display the widget in the editor.
         *
         * Note that currently Elementor supports only one category.
         * When multiple categories passed, Elementor uses the first one.
         *
         * @access public
         *
         * @return array Widget categories.
         */
        public function get_categories()
        {
            return ['dental-care'];
        }

        /**
         * Register the widget controls.
         *
         * Adds different input fields to allow the user to change and customize the widget settings.
         *
         * @access protected
         */
        protected function register_controls()
        {

            $this->start_controls_section(
                'section_company_details',
                [
                    'label' => esc_html__('Company Info Header', 'dental-care'),
                ]
            );

            $this->add_control(
                'company_info_title',
                [
                    'label' => esc_html_x('Title', 'dental-care'),
                    'type' => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('Enter a title for the company info widget.', 'dental-care'),
                ]
            );

            $this->add_control(
                'company_info_desc',
                [
                    'label' => esc_html_x('Description', 'dental-care'),
                    'type' => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('Enter a description for the company info widget.', 'dental-care'),
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'section_company_info_address',
                [
                    'label' => esc_html__('Address', 'dental-care'),
                ]
            );

            $this->add_control(
                'address_text',
                [
                    'label' => esc_html_x('Address', 'dental-care'),
                    'type' => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('Enter contact text.', 'dental-care'),
                ]
            );

            $this->add_control(
                'icon_address_en',
                [
                    'label' => esc_html__('Use Custom Icon', 'dental-care'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'true',
                ]
            );

            $this->add_control(
                'icon_address_source',
                [
                    'label' => esc_html__('Icon Source', 'dental-care'),
                    'type' => Controls_Manager::SELECT,
                    "options" => array(
                        "icon_library" => "Icon Library",
                        "icon_theme" => "Theme Icons",
                    ),
                    'condition' => [
                        'icon_address_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_address_select_custom',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => IconSelector_Control::IconSelector,
                    'condition' => [
                        'icon_address_source' => 'icon_theme',
                        'icon_address_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_address_select',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => Controls_Manager::ICONS,
                    'condition' => [
                        'icon_address_source' => 'icon_library',
                        'icon_address_en' => 'true',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'section_company_info_phone',
                [
                    'label' => esc_html__('Phone', 'dental-care'),
                ]
            );

            $this->add_control(
                'phone_text',
                [
                    'label' => esc_html_x('Phone', 'dental-care'),
                    'type' => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('Enter contact text.', 'dental-care'),
                ]
            );

            $this->add_control(
                'icon_phone_en',
                [
                    'label' => esc_html__('Use Custom Icon', 'dental-care'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'true',
                ]
            );

            $this->add_control(
                'icon_phone_source',
                [
                    'label' => esc_html__('Icon Source', 'dental-care'),
                    'type' => Controls_Manager::SELECT,
                    "options" => array(
                        "icon_library" => "Icon Library",
                        "icon_theme" => "Theme Icons",
                    ),
                    'condition' => [
                        'icon_phone_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_phone_select_custom',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => IconSelector_Control::IconSelector,
                    'condition' => [
                        'icon_phone_source' => 'icon_theme',
                        'icon_phone_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_phone_select',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => Controls_Manager::ICONS,
                    'condition' => [
                        'icon_phone_source' => 'icon_library',
                    ],
                ]
            );

            $this->end_controls_section();


            $this->start_controls_section(
                'section_company_info_mobile',
                [
                    'label' => esc_html__('Mobile', 'dental-care'),
                ]
            );

            $this->add_control(
                'mobile_text',
                [
                    'label' => esc_html_x('Mobile', 'dental-care'),
                    'type' => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('Enter contact text.', 'dental-care'),
                ]
            );

            $this->add_control(
                'icon_mobile_en',
                [
                    'label' => esc_html__('Use Custom Icon', 'dental-care'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'true',
                ]
            );

            $this->add_control(
                'icon_mobile_source',
                [
                    'label' => esc_html__('Icon Source', 'dental-care'),
                    'type' => Controls_Manager::SELECT,
                    "options" => array(
                        "icon_library" => "Icon Library",
                        "icon_theme" => "Theme Icons",
                    ),
                    'condition' => [
                        'icon_mobile_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_mobile_select_custom',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => IconSelector_Control::IconSelector,
                    'condition' => [
                        'icon_mobile_source' => 'icon_theme',
                        'icon_mobile_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_mobile_select',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => Controls_Manager::ICONS,
                    'condition' => [
                        'icon_mobile_source' => 'icon_library',
                        'icon_mobile_en' => 'true',
                    ],
                ]
            );

            $this->end_controls_section();


            $this->start_controls_section(
                'section_company_info_fax',
                [
                    'label' => esc_html__('Fax', 'dental-care'),
                ]
            );

            $this->add_control(
                'fax_text',
                [
                    'label' => esc_html_x('Fax', 'dental-care'),
                    'type' => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('Enter contact text.', 'dental-care'),
                ]
            );

            $this->add_control(
                'icon_fax_en',
                [
                    'label' => esc_html__('Use Custom Icon', 'dental-care'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'true',
                ]
            );

            $this->add_control(
                'icon_fax_source',
                [
                    'label' => esc_html__('Icon Source', 'dental-care'),
                    'type' => Controls_Manager::SELECT,
                    "options" => array(
                        "icon_library" => "Icon Library",
                        "icon_theme" => "Theme Icons",
                    ),
                    'condition' => [
                        'icon_fax_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_fax_select_custom',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => IconSelector_Control::IconSelector,
                    'condition' => [
                        'icon_fax_source' => 'icon_theme',
                        'icon_fax_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_fax_select',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => Controls_Manager::ICONS,
                    'condition' => [
                        'icon_fax_source' => 'icon_library',
                        'icon_fax_en' => 'true',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'section_company_info_email',
                [
                    'label' => esc_html__('Email', 'dental-care'),
                ]
            );

            $this->add_control(
                'email_text',
                [
                    'label' => esc_html_x('Email', 'dental-care'),
                    'type' => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('Enter contact text.', 'dental-care'),
                ]
            );

            $this->add_control(
                'icon_email_en',
                [
                    'label' => esc_html__('Use Custom Icon', 'dental-care'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'true',
                ]
            );

            $this->add_control(
                'icon_email_source',
                [
                    'label' => esc_html__('Icon Source', 'dental-care'),
                    'type' => Controls_Manager::SELECT,
                    "options" => array(
                        "icon_library" => "Icon Library",
                        "icon_theme" => "Theme Icons",
                    ),
                    'condition' => [
                        'icon_email_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_email_select_custom',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => IconSelector_Control::IconSelector,
                    'condition' => [
                        'icon_email_source' => 'icon_theme',
                        'icon_email_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_email_select',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => Controls_Manager::ICONS,
                    'condition' => [
                        'icon_email_source' => 'icon_library',
                        'icon_email_en' => 'true',
                    ],
                ]
            );

            $this->end_controls_section();


            $this->start_controls_section(
                'section_company_info_openhrs',
                [
                    'label' => esc_html__('Opening Hours', 'dental-care'),
                ]
            );

            $this->add_control(
                'openhrs_text',
                [
                    'label' => esc_html_x('Opening Hours', 'dental-care'),
                    'type' => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('Enter contact text.', 'dental-care'),
                ]
            );

            $this->add_control(
                'icon_openhrs_en',
                [
                    'label' => esc_html__('Use Custom Icon', 'dental-care'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'true',
                ]
            );

            $this->add_control(
                'icon_openhrs_source',
                [
                    'label' => esc_html__('Icon Source', 'dental-care'),
                    'type' => Controls_Manager::SELECT,
                    "options" => array(
                        "icon_library" => "Icon Library",
                        "icon_theme" => "Theme Icons",
                    ),
                    'condition' => [
                        'icon_openhrs_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_openhrs_select_custom',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => IconSelector_Control::IconSelector,
                    'condition' => [
                        'icon_openhrs_source' => 'icon_theme',
                        'icon_openhrs_en' => 'true',
                    ],
                ]
            );

            $this->add_control(
                'icon_openhrs_select',
                [
                    'label' => esc_html__('Icon', 'dental-care'),
                    'type' => Controls_Manager::ICONS,
                    'condition' => [
                        'icon_openhrs_source' => 'icon_library',
                        'icon_openhrs_en' => 'true',
                    ],
                ]
            );

            $this->end_controls_section();


            $this->start_controls_section(
                'section_company_info_sociallinks',
                [
                    'label' => esc_html__('Social Links', 'dental-care'),
                ]
            );

            $this->add_control(
                'facebook_link',
                [
                    'label' => esc_html_x('Facebook', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter social network link.', 'dental-care'),

                ]
            );

            $this->add_control(
                'twitter_link',
                [
                    'label' => esc_html_x('Twitter', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter social network link.', 'dental-care'),
                ]
            );

            $this->add_control(
                'googleplus_link',
                [
                    'label' => esc_html_x('Google Plus', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter social network link.', 'dental-care'),
                ]
            );

            $this->add_control(
                'instagram_link',
                [
                    'label' => esc_html_x('Instagram', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter social network link.', 'dental-care'),

                ]
            );

            $this->add_control(
                'linkedin_link',
                [
                    'label' => esc_html_x('Linkedin', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter social network link.', 'dental-care'),
                ]
            );

            $this->add_control(
                'vimeo_link',
                [
                    'label' => esc_html_x('Vimeo', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter social network link.', 'dental-care'),
                ]
            );

            $this->add_control(
                'youtube_link',
                [
                    'label' => esc_html_x('Youtube', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter social network link.', 'dental-care'),
                ]
            );

            $this->add_control(
                'tumblr_link',
                [
                    'label' => esc_html_x('Tumblr', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter social network link.', 'dental-care'),
                ]
            );

            $this->add_control(
                'flickr_link',
                [
                    'label' => esc_html_x('Flickr', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter social network link.', 'dental-care'),
                ]
            );

            $this->add_control(
                'pinterest_link',
                [
                    'label' => esc_html_x('Pinterest', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter social network link.', 'dental-care'),
                ]
            );


            $this->end_controls_section();

            $this->start_controls_section(
                'section_company_info_style',
                [
                    'label' => esc_html__('Company Details', 'dental-care'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'company_info_icon_color',
                [
                    'label' => esc_html_x('Icon Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Choose an icon color.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .company-info-item-icon' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'company_info_icon_bg_color',
                [
                    'label' => esc_html_x('Icon Background Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Choose an icon background color.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .company-info-item-icon' => 'background-color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'company_info_icon_size',
                [
                    'label' => esc_html_x('Icon Font Size', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'selectors' => [
                        '{{WRAPPER}} .company-info-item-icon' => 'font-size: {{VALUE}}px',
                    ]
                ]
            );

            $this->add_control(
                'company_info_box_shadow_en',
                [
                    'label' => esc_html__('Enable Shadow', 'dental-care'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => 'true',
                    'description' => esc_html__('Choose to enable/disable box shadow.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .stronghold-company-info-widget' => 'box-shadow: 0 0 10px rgba(0,0,0,0.08); -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.08);',
                    ]

                ]
            );

            $this->add_control(
                'company_info_header_bgcolor',
                [
                    'label' => esc_html_x('Title Header Background Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Choose a title header background color.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .company-info-header' => 'background-color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'company_info_headerbg_img',
                [
                    'label' => __('Title Header Background Image', 'dental-care'),
                    'type' => Controls_Manager::MEDIA,
                    'description' => __('Choose an image for the background.', 'dental-care'),
                    'dynamic' => [
                        'active' => true,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .company-info-header' => 'background-image: url({{URL}})',
                    ]
                ]
            );

            $this->add_control(
                'company_info_bg_color',
                [
                    'label' => esc_html_x('Background Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Choose a background color or combine it with an image as an overlay.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .stronghold-company-info-widget' => 'background-color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'company_info_bg_img',
                [
                    'label' => __('Background Image', 'dental-care'),
                    'type' => Controls_Manager::MEDIA,
                    'description' => __('Choose an image for the background.', 'dental-care'),
                    'dynamic' => [
                        'active' => true,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .stronghold-company-info-widget' => 'background-image: url({{URL}})',
                    ]
                ]
            );

            $this->add_responsive_control(
                'company_info_padding',
                [
                    'label' => esc_html__('Padding', 'dental-care'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .stronghold-company-info-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );


            $this->add_control(
                'company_info_border_color',
                [
                    'label' => esc_html_x('Border Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Choose a border color.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .stronghold-company-info-widget' => 'border-color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'company_info_border_width',
                [
                    'label' => esc_html_x('Border Width (px)', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'selectors' => [
                        '{{WRAPPER}} .stronghold-company-info-widget' => 'border-width: {{VALUE}}px',
                    ]
                ]
            );

            $this->add_control(
                'company_info_border_style',
                [
                    'label' => esc_html__('Border Style', 'dental-care'),
                    'type' => Controls_Manager::SELECT,
                    'description' => esc_html__('Choose a border style.', 'dental-care'),
                    "options" => array(
                        "" => "",
                        "solid" => "Solid",
                        "dotted" => "Dotted",
                        "dashed" => "Dashed",
                        "double" => "Double",
                        "none" => "None",
                    ),
                    'selectors' => [
                        '{{WRAPPER}} .stronghold-company-info-widget' => 'border-style: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'company_info_border_radius',
                [
                    'label' => esc_html_x('Border Radius (px)', 'dental-care'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Choose a border radius.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .stronghold-company-info-widget' => 'border-radius: {{VALUE}}px',
                    ]
                ]
            );

            $this->add_control(
                'company_info_bg_hover_color',
                [
                    'label' => esc_html_x('Company Info Background Hover Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Choose a background hover color.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .stronghold-company-info-widget:hover' => 'background-color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'company_info_border_hover_color',
                [
                    'label' => esc_html_x('Company Info Border Hover Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Choose a border hover color.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .stronghold-company-info-widget:hover' => 'border-color: {{VALUE}}',
                    ]
                ]
            );


            $this->add_control(
                'company_info_items_color',
                [
                    'label' => esc_html_x('Company Info Items Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Choose a company info details color.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .company-info-item' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .company-info-item a' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'company_info_items_typography',
                    'label' => esc_html_x('Company Info Items Typography', 'dental-care'),
                    'selector' => '{{WRAPPER}} .company-info-item',
                ]
            );

            $this->add_control(
                'company_info_title_color',
                [
                    'label' => esc_html_x('Company Info Title Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Choose a title color.', 'dental-care'),
                    'selectors' => [
                        '{{WRAPPER}} .company-info-header-title' => 'color: {{VALUE}}',
                    ]

                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'company_info_title_typography',
                    'label' => esc_html_x('Company Info Title Typography', 'dental-care'),
                    'selector' => '{{WRAPPER}} .company-info-header-title',
                ]
            );

            $this->add_control(
                'company_info_desc_color',
                [
                    'label' => esc_html_x('Company Info Description Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .company-info-desc' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'company_info_desc_typography',
                    'label' => esc_html_x('Company Info Description Typography', 'dental-care'),
                    'selector' => '{{WRAPPER}} .company-info-desc',
                ]
            );



            $this->end_controls_section();

            $this->start_controls_section(
                'section_company_svg_style',
                [
                    'label' => esc_html__('SVG Styling', 'dental-care'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'svg_color',
                [
                    'label' => esc_html_x('SVG Color', 'dental-care'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .company-info-item-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'svg_size',
                [
                    'label' => esc_html_x('SVG Size', 'dental-care'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 5,
                            'max' => 500,
                            'step' => 5,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .company-info-item-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                    ],           
                ]
            );

            $this->end_controls_section();
        }

        /**
         * Render the widget output on the frontend.
         *
         * Written in PHP and used to generate the final HTML.
         *
         * @access protected
         */
        protected function render()
        {

            $settings = $this->get_settings_for_display();

            echo '<div class="stronghold-company-info-widget" style="';

            if ($settings['company_info_box_shadow_en'] == true) {
                echo ' -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.08);';
                echo ' box-shadow: 0 0 10px rgba(0,0,0,0.08);';
            }

            echo '"';


            echo '>';

            if ($settings['company_info_title'] != '') {
                echo '<div class="company-info-header" style="';


                echo '">';

                if ($settings['company_info_title'] != '') {
                    echo '<h3 class="company-info-header-title" style="';



                    echo '">' . esc_html($settings['company_info_title']) . '</h3>';
                }

                if ($settings['company_info_desc'] != '') {
                    echo '<span class="company-info-desc" style="';


                    echo '">' . esc_html($settings['company_info_desc']) . '</span>';
                }

                echo '</div>';
            }

            echo '<div class="company-info-items ';

            if ($settings['company_info_bg_color'] != '' || $settings['company_info_bg_img'] != '' || $settings['company_info_border_color'] != '') {
                echo 'info-item-padding';
            }

            echo '">';

            if ($settings['address_text'] != '') {
                echo '<div class="company-info-item" style="';


                echo '">';

                echo '<div class= "company-info-item-icon-wrap ';

                if ($settings['company_info_icon_bg_color'] != '') {
                    echo 'company-info-item-icon-bg';
                }

                echo '">';




                if ($settings['icon_address_source'] == 'icon_library' || $settings['icon_address_source'] == 'icon_theme') {

                    if ($settings['icon_address_source'] == 'icon_library') {

                        if ($settings['icon_address_select']['library'] == 'svg') {

                            echo '<div class="company-info-item-svg">';
                            echo file_get_contents(esc_attr($settings['icon_address_select']['value']['url']));
                            echo '</div>';
                        } else {

                            echo '<i class="company-info-item-icon ';

                            if ($settings['icon_address_select']['value']) {
                                echo esc_attr($settings['icon_address_select']['value']);
                            }

                            echo '"></i>';

                        }

                    } else if ($settings['icon_address_source'] == 'icon_theme') {

                        echo '<i class="company-info-item-icon ';

                        if ($settings['icon_address_select_custom'] != '') {
                            echo esc_attr($settings['icon_address_select_custom']) . ' ';
                        }

                        echo '"></i>';

                    }
                } else {

                    echo '<i class="company-info-item-icon ';

                    echo 'fa fa-map-marker-alt';

                    echo '"></i>';

                }

                echo '</div>';

                echo '<div class="company-info-detail">';
                echo   esc_html($settings['address_text']);
                echo '</div>';

                echo '</div>';
            }
            if ($settings['phone_text'] != '') {
                echo '<div class="company-info-item">';


                echo '<div class= "company-info-item-icon-wrap ';

                if ($settings['company_info_icon_bg_color'] != '') {
                    echo 'company-info-item-icon-bg';
                }

                echo '" style="';

                echo '">';

                if ($settings['icon_phone_source'] == 'icon_library' || $settings['icon_phone_source'] == 'icon_theme') {

                    if ($settings['icon_phone_source'] == 'icon_library') {

                        if ($settings['icon_phone_select']['library'] == 'svg') {

                            echo '<div class="company-info-item-svg">';
                            echo file_get_contents(esc_attr($settings['icon_phone_select']['value']['url']));
                            echo '</div>';
                        } else {

                            echo '<i class="company-info-item-icon ';

                            if ($settings['icon_phone_select']['value']) {
                                echo esc_attr($settings['icon_phone_select']['value']);
                            }

                            echo '"></i>';

                        }

                    } else if ($settings['icon_phone_source'] == 'icon_theme') {

                        echo '<i class="company-info-item-icon ';

                        if ($settings['icon_phone_select_custom'] != '') {
                            echo esc_attr($settings['icon_phone_select_custom']) . ' ';
                        }

                        echo '"></i>';

                    }
                } else {

                    echo '<i class="company-info-item-icon ';

                    echo 'fa fa-phone';

                    echo '"></i>';

                }

                echo '</div>';

                echo '<div class="company-info-detail">';
                echo '<a style="';

                echo '" href="tel:' . esc_html($settings['phone_text']) . '">' . esc_html($settings['phone_text']) . '</a>';
                echo '</div>';

                echo '</div>';
            }
            if ($settings['mobile_text'] != '') {
                echo '<div class="company-info-item"> ';

                echo '<div class= "company-info-item-icon-wrap ';

                if ($settings['company_info_icon_bg_color'] != '') {
                    echo 'company-info-item-icon-bg';
                }

                echo '" style="';

                echo '">';

                if ($settings['icon_mobile_source'] == 'icon_library' || $settings['icon_mobile_source'] == 'icon_theme') {

                    if ($settings['icon_mobile_source'] == 'icon_library') {

                        if ($settings['icon_mobile_select']['library'] == 'svg') {

                            echo '<div class="company-info-item-svg">';
                            echo file_get_contents(esc_attr($settings['icon_mobile_select']['value']['url']));
                            echo '</div>';
                        } else {

                            echo '<i class="company-info-item-icon ';

                            if ($settings['icon_mobile_select']['value']) {
                                echo esc_attr($settings['icon_mobile_select']['value']);
                            }

                            echo '"></i>';

                        }

                    } else if ($settings['icon_mobile_source'] == 'icon_theme') {

                        echo '<i class="company-info-item-icon ';

                        if ($settings['icon_mobile_select_custom'] != '') {
                            echo esc_attr($settings['icon_mobile_select_custom']) . ' ';
                        }

                        echo '"></i>';

                    }
                } else {

                    echo '<i class="company-info-item-icon ';

                    echo 'fa fa-mobile-alt';

                    echo '"></i>';

                }

                echo '</div>';

                echo '<div class="company-info-detail">';
                echo '<a style="';

                echo '" href="tel:' . esc_html($settings['mobile_text']) . '">' . esc_html($settings['mobile_text']) . '</a>';
                echo '</div>';

                echo '</div>';
            }

            if ($settings['fax_text'] != '') {
                echo '<div class="company-info-item" style="';

                echo '">';

                echo '<div class= "company-info-item-icon-wrap ';

                if ($settings['company_info_icon_bg_color'] != '') {
                    echo 'company-info-item-icon-bg';
                }

                echo '" style="';

                echo '">';

                if ($settings['icon_fax_source'] == 'icon_library' || $settings['icon_fax_source'] == 'icon_theme') {

                    if ($settings['icon_fax_source'] == 'icon_library') {

                        if ($settings['icon_fax_select']['library'] == 'svg') {

                            echo '<div class="company-info-item-svg">';
                            echo file_get_contents(esc_attr($settings['icon_fax_select']['value']['url']));
                            echo '</div>';
                        } else {

                            echo '<i class="company-info-item-icon ';

                            if ($settings['icon_fax_select']['value']) {
                                echo esc_attr($settings['icon_fax_select']['value']);
                            }

                            echo '"></i>';

                        }

                    } else if ($settings['icon_fax_source'] == 'icon_theme') {

                        echo '<i class="company-info-item-icon ';

                        if ($settings['icon_fax_select_custom'] != '') {
                            echo esc_attr($settings['icon_fax_select_custom']) . ' ';
                        }

                        echo '"></i>';

                    }
                } else {

                    echo '<i class="company-info-item-icon ';

                    echo 'fa fa-fax';

                    echo '"></i>';

                }

                echo '</div>';

                echo '<div class="company-info-detail">';
                echo esc_html($settings['fax_text']);
                echo '</div>';

                echo '</div>';
            }

            if ($settings['email_text'] != '') {
                echo '<div class="company-info-item">';

                echo '<div class= "company-info-item-icon-wrap ';

                if ($settings['company_info_icon_bg_color'] != '') {
                    echo 'company-info-item-icon-bg';
                }

                echo '" style="';

                echo '">';

                if ($settings['icon_email_source'] == 'icon_library' || $settings['icon_email_source'] == 'icon_theme') {

                    if ($settings['icon_email_source'] == 'icon_library') {

                        if ($settings['icon_email_select']['library'] == 'svg') {

                            echo '<div class="company-info-item-svg">';
                            echo file_get_contents(esc_attr($settings['icon_email_select']['value']['url']));
                            echo '</div>';
                        } else {

                            echo '<i class="company-info-item-icon ';

                            if ($settings['icon_email_select']['value']) {
                                echo esc_attr($settings['icon_email_select']['value']);
                            }

                            echo '"></i>';

                        }

                    } else if ($settings['icon_email_source'] == 'icon_theme') {

                        echo '<i class="company-info-item-icon ';

                        if ($settings['icon_email_select_custom'] != '') {
                            echo esc_attr($settings['icon_email_select_custom']) . ' ';
                        }

                        echo '"></i>';

                    }
                } else {
                    echo '<i class="company-info-item-icon ';

                    echo 'fa fa-envelope';

                    echo '"></i>';
                }

                echo '</div>';

                echo '<div class="company-info-detail">';
                echo '<a style="';

                echo '" href="mailto:' . esc_html($settings['email_text']) . '" target="_blank">' . esc_html($settings['email_text']) . ' </a>';
                echo '</div>';

                echo '</div>';
            }

            if ($settings['openhrs_text'] != '') {
                echo '<div class="company-info-item" style="';

                echo '">';

                echo '<div class="company-info-item-icon-wrap ';

                if ($settings['company_info_icon_bg_color'] != '') {
                    echo 'company-info-item-icon-bg';
                }

                echo '" style="';

                echo '">';
                

                if ($settings['icon_openhrs_source'] == 'icon_library' || $settings['icon_openhrs_source'] == 'icon_theme') {

                    if ($settings['icon_openhrs_source'] == 'icon_library') {

                        if ($settings['icon_openhrs_select']['library'] == 'svg') {

                            echo '<div class="company-info-item-svg">';
                            echo file_get_contents(esc_attr($settings['icon_openhrs_select']['value']['url']));
                            echo '</div>';
                        } else {

                            echo '<i class="company-info-item-icon ';

                            if ($settings['icon_openhrs_select']['value']) {
                                echo esc_attr($settings['icon_openhrs_select']['value']);
                            }

                            echo '"></i>';

                        }

                    } else if ($settings['icon_openhrs_source'] == 'icon_theme') {

                        echo '<i class="company-info-item-icon ';

                        if ($settings['icon_openhrs_select_custom'] != '') {
                            echo esc_attr($settings['icon_openhrs_select_custom']) . ' ';
                        }

                        echo '"></i>';

                    }
                } else {

                    echo '<i class="company-info-item-icon ';

                    echo 'fa fa-clock';

                    echo '"></i>';
                }

                echo '</div>';

                echo '<div class="company-info-detail">';
                echo esc_html($settings['openhrs_text']);
                echo '</div>';

                echo '</div>';
            }

            echo '</div>';


            if ($settings['facebook_link'] || $settings['twitter_link'] || $settings['googleplus_link'] || $settings['instagram_link'] || $settings['linkedin_link'] || $settings['vimeo_link'] || $settings['youtube_link'] || $settings['tumblr_link'] || $settings['flickr_link'] || $settings['pinterest_link']) {
                echo '<div class="company-info-social ';

                if ($settings['company_info_bg_color'] != '' || $settings['company_info_bg_img'] != '' || $settings['company_info_border_color'] != '') {
                    echo 'info-item-padding';
                }

                echo '">';
                if ($settings['facebook_link'] != '') {
                    echo '<div  class="company-info-social-item ';

                    if ($settings['company_info_icon_bg_color'] != '') {
                        echo 'info-item-bg';
                    }

                    echo '"><a target="_blank" title="Facebook" href="' . esc_url($settings['facebook_link']) . '" style="';

                    echo '"><i class="company-info-item-icon fa fa-facebook-f"></i></a></div>';
                }

                if ($settings['twitter_link'] != '') {
                    echo '<div class="company-info-social-item ';

                    if ($settings['company_info_icon_bg_color'] != '') {
                        echo 'info-item-bg';
                    }

                    echo '"><a target="_blank" title="Twitter" href="' . esc_url($settings['twitter_link']) . '" style="';

                    echo '"><i class="company-info-item-icon fa fa-twitter"></i></a></div>';
                }

                if ($settings['googleplus_link'] != '') {
                    echo '<div class="company-info-social-item ';

                    if ($settings['company_info_icon_bg_color'] != '') {
                        echo 'info-item-bg';
                    }

                    echo '"><a target="_blank" title="Google+" href="' . esc_url($settings['googleplus_link']) . '" style="';

                    echo '"><i class="company-info-item-icon fa fa-google-plus-g"></i></a></div>';
                }

                if ($settings['instagram_link'] != '') {
                    echo '<div class="company-info-social-item ';

                    if ($settings['company_info_icon_bg_color'] != '') {
                        echo 'info-item-bg';
                    }

                    echo '"><a target="_blank" title="Instagram" href="' . esc_url($settings['instagram_link']) . '" style="';

                    echo '"><i class="company-info-item-icon fa fa-instagram"></i></a></div>';
                }

                if ($settings['linkedin_link'] != '') {
                    echo '<div class="company-info-social-item ';

                    if ($settings['company_info_icon_bg_color'] != '') {
                        echo 'info-item-bg';
                    }

                    echo '"><a target="_blank" title="Linkedin" href="' . esc_url($settings['linkedin_link']) . '" style="';

                    echo '"><i class="company-info-item-icon fa fa-linkedin-in"></i></a></div>';
                }

                if ($settings['vimeo_link'] != '') {
                    echo '<div class="company-info-social-item ';

                    if ($settings['company_info_icon_bg_color'] != '') {
                        echo 'info-item-bg';
                    }

                    echo '"><a target="_blank" title="Vimeo" href="' . esc_url($settings['vimeo_link']) . '" style="';

                    echo '"><i class="company-info-item-icon fa fa-vimeo-v"></i></a></div>';
                }

                if ($settings['youtube_link'] != '') {
                    echo '<div class="company-info-social-item ';

                    if ($settings['company_info_icon_bg_color'] != '') {
                        echo 'info-item-bg';
                    }

                    echo '">';

                    echo '<a target="_blank" title="Youtube" href="' . esc_url($settings['youtube_link']) . '" style="';

                    echo '"><i class="company-info-item-icon fa fa-youtube"></i></a></div>';
                }

                if ($settings['tumblr_link'] != '') {
                    echo '<div class="company-info-social-item ';

                    if ($settings['company_info_icon_bg_color'] != '') {
                        echo 'info-item-bg';
                    }

                    echo '">';

                    echo '<a target="_blank" title="Tumblr" href="' . esc_url($settings['tumblr_link']) . '" style="';

                    echo '"><i class="company-info-item-icon fa fa-tumblr"></i></a></div>';
                }

                if ($settings['flickr_link'] != '') {
                    echo '<div class="company-info-social-item ';

                    if ($settings['company_info_icon_bg_color'] != '') {
                        echo 'info-item-bg';
                    }

                    echo '">';

                    echo '<a target="_blank" title="Flickr" href="' . esc_url($settings['flickr_link']) . '" style="';

                    echo '"><i class="company-info-item-icon fa fa-flickr"></i></a></div>';
                }

                if ($settings['pinterest_link'] != '') {
                    echo '<div class="company-info-social-item ';

                    if ($settings['company_info_icon_bg_color'] != '') {
                        echo 'info-item-bg';
                    }

                    echo '">';
                    echo '<a target="_blank" title="Pinterest" href="' . esc_url($settings['pinterest_link']) . '" style="';

                    echo '"><i class="company-info-item-icon fa fa-pinterest-p"></i></a></div>';
                }
                echo '</div>';
            }

            echo '</div>';
        }
    }
