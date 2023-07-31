<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Heading
 */

class Dental_Care_Heading extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'dental-care-heading';
    }

    /**
     * Retrieve the widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Heading', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-site-title';
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
    public function dental_care_allowed_html(){

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

        return apply_filters('dental_care_allowed_html', $allowed);
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
            'section_title', [
                'label' => esc_html__('Title', 'dental-care'),
            ]
        );

        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'title_tag', [
                'label' => esc_html__('Title Tag', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "h1" => "h1",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                    "p" => "p"
                ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_subtitle', [
                'label' => esc_html__('Sub Title', 'dental-care'),
            ]
        );

        $this->add_control(
            'sub_title', [
                'label' => esc_html__('Sub Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'sub_title_tag', [
                'label' => esc_html__('Sub Title Tag', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "h1" => "h1",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                    "p" => "p"
                ),
            ]
        );
        $this->add_control(
            'separator_en',
            [
                'label' => esc_html__('Enable Separator', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'description' => __('Choose to enable heading separator.', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'section_title_style', [
                'label' => esc_html__('Title Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color', [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading-title-element' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .heading-title-element',
            ]
        );
        $this->add_responsive_control(
            'title_align_select', [
                'label' => esc_html_x('Alignment', 'dental-care'),
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
                    '{{WRAPPER}} .heading-title-element' => 'text-align: {{VALUE}}',

                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_sub_style', [
                'label' => esc_html__('Sub Title Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_color', [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .heading-subtitle',
            ]
        );
        $this->add_responsive_control(
            'subtitle_align_select', [
                'label' => esc_html_x('Alignment', 'dental-care'),
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
                    'flex-end' => [
                        'title' => esc_html_x('Right', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .heading-subtitle' => 'justify-content: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_separator_style', [
                'label' => esc_html__('Separator Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'separator_color', [
                'label' => esc_html_x('Separator Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading-separator span' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'separator_align_select', [
                'label' => esc_html_x('Alignment', 'dental-care'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    '0 auto 0 0' => [
                        'title' => esc_html_x('Left', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-left',
                    ],
                    '0 auto' => [
                        'title' => esc_html_x('Center', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-center',
                    ],
                    '0 0 0 auto' => [
                        'title' => esc_html_x('Right', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .heading-separator' => 'margin: {{VALUE}}',
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
    protected function render() {
        $settings = $this->get_settings_for_display();

        $allowed_html = $this->dental_care_allowed_html();

        echo '<div class="stronghold-heading">';

        if ($settings['sub_title'] != '') {

            if ($settings['sub_title_tag'] == 'h1') {
                echo '<h1 class="heading-subtitle" style="';
            } elseif ($settings['sub_title_tag'] == 'h2') {
                echo '<h2 class="heading-subtitle" style="';
            } elseif ($settings['sub_title_tag'] == 'h3') {
                echo '<h3 class="heading-subtitle" style="';
            } elseif ($settings['sub_title_tag'] == 'h5') {
                echo '<h5 class="heading-subtitle" style="';
            } elseif ($settings['sub_title_tag'] == 'h6') {
                echo '<h6 class="heading-subtitle" style="';
            } elseif ($settings['sub_title_tag'] == 'h4') {
                echo '<h4 class="heading-subtitle" style="';
            } elseif ($settings['sub_title_tag'] == 'p') {
                echo '<p class="heading-subtitle" style="';
            } else {
                echo '<div class="heading-subtitle" style="';
            }

            echo '">';

            echo wp_kses($settings['sub_title'], $allowed_html);

            if ($settings['sub_title_tag'] == 'h1') {
                echo '</h1>';
            } elseif ($settings['sub_title_tag'] == 'h2') {
                echo '</h2>';
            } elseif ($settings['sub_title_tag'] == 'h3') {
                echo '</h3>';
            } elseif ($settings['sub_title_tag'] == 'h5') {
                echo '</h5>';
            } elseif ($settings['sub_title_tag'] == 'h6') {
                echo '</h6>';
            } elseif ($settings['sub_title_tag'] == 'h4') {
                echo '</h4>';
            } elseif ($settings['sub_title_tag'] == 'p') {
                echo '</p>';
            } else {
                echo '</div>';
            }
        }

        echo '<div class="heading-title" style="';

        echo '">';

        if ($settings['title_tag'] == 'h1') {
            echo '<h1 class="heading-title-element" style="';
        } elseif ($settings['title_tag'] == 'h2') {
            echo '<h2 class="heading-title-element" style="';
        } elseif ($settings['title_tag'] == 'h5') {
            echo '<h5 class="heading-title-element" style="';
        } elseif ($settings['title_tag'] == 'h6') {
            echo '<h6 class="heading-title-element" style="';
        } elseif ($settings['title_tag'] == 'h4') {
            echo '<h4 class="heading-title-element" style="';
        } elseif ($settings['title_tag'] == 'p') {
            echo '<p class="heading-title-element" style="';
        } else {
            echo '<h3 class="heading-title-element" style="';
        }


        echo '">' . wp_kses($settings['title'], $allowed_html);

        if ($settings['title_tag'] == 'h1') {
            echo '</h1>';
        } elseif ($settings['title_tag'] == 'h2') {
            echo '</h2>';
        } elseif ($settings['title_tag'] == 'h5') {
            echo '</h5>';
        } elseif ($settings['title_tag'] == 'h6') {
            echo '</h6>';
        } elseif ($settings['title_tag'] == 'h4') {
            echo '</h4>';
        } elseif ($settings['title_tag'] == 'p') {
            echo '</p>';
        } else {
            echo '</h3>';
        }
        echo '</div>';

        if ($settings['separator_en'] == true) {
            echo '<div class="heading-separator"><span> </span></div>';
        }

        echo '</div>';
    }

}
