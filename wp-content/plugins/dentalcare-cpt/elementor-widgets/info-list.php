<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Info List
 */

class Dental_Care_Info_List extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'dental-care-info-list';
    }

    /**
     * Retrieve the widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Info List', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-post-list';
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
    public function get_categories() {
        return ['dental-care'];
    }


    /**
     * Allowed HTML
     * @access public
     */
    public function dental_care_extensions_allowed_html()
    {

        $allowed = array(
            'abbr' => array(
                'title' => true,
            ),
            'acronym' => array(
                'title' => true,
            ),
            'b' => array(),
            'blockquote' => array(
                'cite' => true,
            ),
            'cite' => array(),
            'code' => array(),
            'em' => array(),
            'i' => array(),
            'q' => array(
                'cite' => true,
            ),
            'strike' => array(),
            'br' => array(),
            'strong' => array(),
            'i' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'a' => array(
                'href' => array(),
                'rel' => array(),
                'class' => array(),
                'style' => array(),
            ),
            'img' => array(
                'src' => array(),
                'class' => array(),
                'style' => array(),
            ),
            'h1' => array(
                'class' => array(),
                'style' => array(),
            ),
            'h2' => array(
                'class' => array(),
                'style' => array(),
            ),
            'h3' => array(
                'class' => array(),
                'style' => array(),
            ),
            'h4' => array(
                'class' => array(),
                'style' => array(),
            ),
            'h5' => array(
                'class' => array(),
                'style' => array(),
            ),
            'h6' => array(
                'class' => array(),
                'style' => array(),
            ),
            'p' => array(
                'class' => array(),
                'style' => array(),
            ),
            'ul' => array(
                'class' => array(),
                'style' => array(),
            ),
            'ol' => array(
                'class' => array(),
                'style' => array(),
            ),
            'li' => array(
                'class' => array(),
                'style' => array(),
            )
        );

        return apply_filters('dental_care_extensions_allowed_html', $allowed);
    }


    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function register_controls() {


        $this->start_controls_section(
            'section_info_list_settings', [
                'label' => esc_html__('Info List Items', 'dental-care'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'icon_en',
            [
                'label' => esc_html__('Enable Custom Icon', 'dental-care'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
            ]
        );

        $repeater->add_control(
            'icon_source',
            [
                'label' => esc_html__('Icon Source', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "icon_library" => "Icon Library",
                    "icon_theme" => "Theme Icons",
                    "icon_img" => "Icon Image",
                ),
                'condition' => [
                    'icon_en' => 'true',
                ],
            ]
        );

        $repeater->add_control(
            'icon_select_custom',
            [
                'label' => esc_html__('Icon', 'dental-care'),
                'type' => IconSelector_Control::IconSelector,
                'condition' => [
                    'icon_source' => 'icon_theme',
                ],
            ]
        );

        $repeater->add_control(
            'icon_select',
            [
                'label' => esc_html__('Icon', 'dental-care'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'icon_source' => 'icon_library',
                ],
            ]
        );

        $repeater->add_control(
            'icon_img_select', [
                'label' => __('Use Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Use Image instead of icon', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'icon_source' => 'icon_img',
                ],
            ]
        );

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html_x('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $repeater->add_control(
            'item_desc',
            [
                'label' => esc_html__('Description', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $repeater->add_control(
            'item_link', [
                'label' => esc_html__('Link', 'dental-care'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'info_list_items',
            [
                'type' => Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => $repeater->get_controls(),
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_icon_style',
            [
                'label' => esc_html__('Info List Icon', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-list-icon-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html_x('Icon Font Size', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-list-icon-element' => 'font-size: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'icon_bg_select',
            [
                'label' => esc_html__('Background Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "circle" => "Circle",
                    "square" => "Square",
                ),
            ]
        );
        $this->add_control(
            'icon_bg_color',
            [
                'label' => esc_html_x('Icon Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'icon_bg_select' => [
                        'circle',
                        'square',
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-list-icon-element' => 'background-color: {{VALUE}}',
                ]
            ]
        );
        $this->add_control(
            'svg_color',
            [
                'label' => esc_html_x('SVG Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
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
                    '{{WRAPPER}} .accordion-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
       

        $this->end_controls_section();


        $this->start_controls_section(
            'section_info_list_style', [
                'label' => esc_html__('Info List Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'list_color_bg', [
                'label' => esc_html_x('Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                "description" => esc_html__("Choose a background color for the info list.", "dental-care"),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-list-wrapper' => 'background-color: {{VALUE}}',
                ]
            ]
        );



        $this->add_control(
            'item_title_color', [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                "description" => esc_html__("Choose a color for the title.", "dental-care"),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-list-title-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'item_title_typography',
                'label' => esc_html_x('Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .stronghold-info-list-title-element',
            ]
        );

            $this->add_responsive_control(
            'item_title_alignment',
            [
                'label' => esc_html_x('Title Alignment', 'dental-care'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html_x('Left', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html_x('Center', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html_x('Right', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-list-title-element' => 'text-align: {{VALUE}}',
                ],
                'description' => esc_html__('Choose title alignment.', 'dental-care'),
            ]
        );

        $this->add_control(
            'item_desc_color', [
                'label' => esc_html_x('Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                "description" => esc_html__("Choose a color for the description.", "dental-care"),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-list-desc' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'item_desc_typography',
                'label' => esc_html_x('Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .stronghold-info-list-desc',
            ]
        );

                $this->add_responsive_control(
            'item_desc_alignment',
            [
                'label' => esc_html_x('Description Alignment', 'dental-care'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html_x('Left', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html_x('Center', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html_x('Right', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-list-desc' => 'text-align: {{VALUE}}',
                ],
                'description' => esc_html__('Choose description alignment.', 'dental-care'),
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
    protected function render() {


        $settings = $this->get_settings_for_display();

        $allowed_html = $this->dental_care_extensions_allowed_html();

        echo '<div class="stronghold-info-list-wrapper" style="';

        if ($settings['list_color_bg'] != '') {
            echo ' background:' . esc_attr($settings['list_color_bg']) . '; padding: 20px;';
        }

        echo '">';

        foreach ($settings['info_list_items'] as $item) {

            $link_url = $item['item_link']['url'];
            $link_target = $item['item_link']['is_external'];
            $link_rel = $item['item_link']['nofollow'];

            $item_img_src = wp_get_attachment_url($item['icon_img_select'], 'full');

            echo '<div class="stronghold-info-list-item">';

            if($item['icon_source'] == 'icon_img'){

                echo '<div class="info-icon-img"><img src="' . esc_url($item_img_src) . '" width="80" height="80" alt="List Image"/></div>';

            }else if ($item['icon_source'] == 'icon_library' || $item['icon_source'] == 'icon_theme'){

                echo '<span class="stronghold-info-list-icon">';

                if($item['icon_source'] == 'icon_library'){

                    if ($item['icon_select']['library'] == 'svg') {

                        echo '<div class="accordion-svg">';
                        echo file_get_contents(esc_attr($item['icon_select']['value']['url']));
                        echo '</div>';
                    } else {

                        echo '<i class="stronghold-info-list-icon-element ';

                        if ($item['icon_select']['value']) {
                            echo esc_attr($item['icon_select']['value']);
                        }

                        echo '"';

                        echo '" style="';


                        if ($settings['icon_bg_color'] != '') :
                            echo ' height: ' . esc_attr($settings['icon_font_size'] * 2.0) . 'px !important;';
                            echo ' line-height: ' . esc_attr(($settings['icon_font_size'] * 2.0)) . 'px !important;';
                            echo ' width: ' . esc_attr($settings['icon_font_size'] * 2.0) . 'px !important;';
                            echo ' border-radius: 6px;';
                            echo ' padding: 0px !important;';

                            if ($settings['icon_bg_select'] == 'circle') :
                                echo ' border-radius: 50%;';
                            endif;
                        endif;

                        echo '"></i>';
                    }

              }else if ($item['icon_source'] == 'icon_theme'){

                echo '<i class="stronghold-info-list-icon-element ';

                if ($item['icon_select_custom'] != '') {
                    echo esc_attr($item['icon_select_custom']);
                }

                echo '"></i>';

              }

         echo '</span>';

     }

     echo '<div class="stronghold-info-list-content">';

     echo '<div class="stronghold-info-list-title">';
     if ($link_url == '') {
        if($item['item_title'] != ''){
            echo '<h4 class="stronghold-info-list-title-element" style="';

            echo '">';

            echo esc_html($item['item_title']);
            echo '</h4>';
        }

    } else {
        if($item['item_title'] != ''){
            echo '<a href="' . esc_url($link_url) . '"';

            if ($link_target == 'on') {
                echo ' target="_blank"';
            }

            if ($link_rel == 'on') {
                echo ' rel="nofollow"';
            }

            echo '><h4 class="stronghold-info-list-title-element" style="';

            echo '">';

            echo esc_html($item['item_title']);
            echo '</h4></a>';
        }
    }
    echo '</div>';
    echo '<div class="stronghold-info-list-desc">';
    echo '<div style="';

    echo '">';

    echo wp_kses($item['item_desc'], $allowed_html);

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

echo '</div>';


}

}
