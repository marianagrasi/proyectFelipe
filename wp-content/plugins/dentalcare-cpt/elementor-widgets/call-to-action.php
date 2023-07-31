<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Call to Action
 */

class Dental_Care_Call_Action extends Widget_Base
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
        return 'dental-care-call-action';
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
        return esc_html__('Call to Action', 'dental-care');
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
        return 'eicon-call-to-action';
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
            'section_cta_settings',
            [
                'label' => esc_html__('Call to Action Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'call_design',
            [
                'label' => esc_html__('Call to Action Design', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "design_one" => "Design One",
                    "design_two" => "Design Two",
                ),
                'description' => esc_html__('Choose a call to action design.', 'dental-care'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_cta_title_settings',
            [
                'label' => esc_html__('Title', 'dental-care'),
            ]
        );

        $this->add_control(
            'call_title',
            [
                'label' => esc_html_x('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter a title.', 'dental-care'),
            ]
        );

        $this->add_control(
            'call_title_tag',
            [
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
                    "p" => "p",
                ),
                'description' => esc_html__('Choose title tag.', 'dental-care'),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_cta_subtitle_settings',
            [
                'label' => esc_html__('Sub Title', 'dental-care'),
            ]
        );

        $this->add_control(
            'call_subtitle',
            [
                'label' => esc_html_x('SubTitle', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter a sub-title.', 'dental-care'),
            ]
        );

        $this->add_control(
            'call_subtitle_tag',
            [
                'label' => esc_html__('SubTitle Tag', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "h1" => "h1",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                    "p" => "p",
                ),
                'description' => esc_html__('Choose sub-title tag.', 'dental-care'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_cta_subtitle_two_settings',
            [
                'label' => esc_html__('Sub Title 2', 'dental-care'),
                'condition' => [
                    'call_design' => 'design_two',
                ],
            ]
        );


        $this->add_control(
            'call_subtitle_two',
            [
                'label' => esc_html_x('SubTitle 2', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter a sub-title.', 'dental-care'),
            ]
        );

        $this->add_control(
            'call_subtitle_two_tag',
            [
                'label' => esc_html__('SubTitle 2 Tag', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "h1" => "h1",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                    "p" => "p",
                ),
                'description' => esc_html__('Choose sub-title tag.', 'dental-care'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_cta_subtitle_link_settings',
            [
                'label' => esc_html__('Link', 'dental-care'),
            ]
        );


        $this->add_control(
            'call_link_title',
            [
                'label' => esc_html_x('Link Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'call_link',
            [
                'label' => esc_html__('Link', 'dental-care'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'default' => [
                    'url' => '',
                ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Title', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'call_title_color',
            [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a text color for the title.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .call-title-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'call_title_typography',
                'label' => esc_html_x('Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .call-title-element',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_subtitle_style',
            [
                'label' => esc_html__('Sub Title', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'call_subtitle_color',
            [
                'label' => esc_html_x('Sub Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a text color for the sub-title.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .call-subtitle-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'call_subtitle_typography',
                'label' => esc_html_x('Sub Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .call-subtitle-element',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_subtitle_two_style',
            [
                'label' => esc_html__('Sub Title Two', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'call_design' => 'design_two',
                ],
            ]
        );

        $this->add_control(
            'call_subtitle_two_color',
            [
                'label' => esc_html_x('Sub Title 2 Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a text color for the sub-title.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .call-subtitle-two-element' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'call_design' => 'design_two',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'call_subtitle_two_typography',
                'label' => esc_html_x('Sub Title 2 Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .call-subtitle-two-element',
                'condition' => [
                    'call_design' => 'design_two',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_link_style',
            [
                'label' => esc_html__('Link', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'call_link_color',
            [
                'label' => esc_html_x('Link Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a text color for the link.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .call-link-btn' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'call_link_typography',
                'label' => esc_html_x('Link Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .call-link-btn',
            ]
        );

        $this->add_control(
            'call_link_padding',
            [
                'label' => __('Link Padding', 'dental-care'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .call-link-btn' => 'padding-top: {{TOP}}{{UNIT}}; padding-right: {{RIGHT}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}}; padding-left:{{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'call_bglink_color',
            [
                'label' => esc_html_x('Link Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a background color for the link.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .call-link-btn' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'call_link_border_color',
            [
                'label' => esc_html_x('Link Border Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a color for the link border.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .call-link-btn' => 'border: 2px solid {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'call_link_hover_color',
            [
                'label' => esc_html_x('Link Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a hover color for the link.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .call-link-btn:hover' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'call_link_hover_bgcolor',
            [
                'label' => esc_html_x('Link Hover Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a hover background color for the link.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .call-link-btn:hover' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'call_link_hover_border_color',
            [
                'label' => esc_html_x('Link Hover Border Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a hover border color for the link.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .call-link-btn:hover' => 'border: 2px solid {{VALUE}}',
                ]
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

        $link_url = $settings['call_link']['url'];
        $link_target = $settings['call_link']['is_external'];
        $link_rel = $settings['call_link']['nofollow'];



        if ($settings['call_design'] == 'design_two') {
            echo '<div class="stronghold-call-to-action-wrapper cta-design-two">';
            echo '<div class="call-text-wrapper">';

            echo '<div class="call-title">';

            if ($settings['call_title_tag'] == 'h1') {
                echo '<h1 class="call-title-element" style="';
            } elseif ($settings['call_title_tag'] == 'h2') {
                echo '<h2 class="call-title-element" style="';
            } elseif ($settings['call_title_tag'] == 'h3') {
                echo '<h3 class="call-title-element" style="';
            } elseif ($settings['call_title_tag'] == 'h5') {
                echo '<h5 class="call-title-element" style="';
            } elseif ($settings['call_title_tag'] == 'h6') {
                echo '<h6 class="call-title-element" style="';
            } elseif ($settings['call_title_tag'] == 'p') {
                echo '<p class="call-title-element" style="';
            } else {
                echo '<h4 class="call-title-element" style="';
            }

            echo '">' . esc_html($settings['call_title']);

            if ($settings['call_title_tag'] == 'h1') {
                echo '</h1>';
            } elseif ($settings['call_title_tag'] == 'h2') {
                echo '</h2>';
            } elseif ($settings['call_title_tag'] == 'h3') {
                echo '</h3>';
            } elseif ($settings['call_title_tag'] == 'h5') {
                echo '</h5>';
            } elseif ($settings['call_title_tag'] == 'h6') {
                echo '</h6>';
            } elseif ($settings['call_title_tag'] == 'p') {
                echo '</p>';
            } else {
                echo '</h4>';
            }

            echo '</div>';

            if ($settings['call_subtitle'] != '') {
                echo '<div class="call-subtitle">';

                if ($settings['call_subtitle_tag'] == 'h1') {
                    echo '<h1 class="call-subtitle-element" style="';
                } elseif ($settings['call_subtitle_tag'] == 'h2') {
                    echo '<h2 class="call-subtitle-element" style="';
                } elseif ($settings['call_subtitle_tag'] == 'h3') {
                    echo '<h3 class="call-subtitle-element" style="';
                } elseif ($settings['call_subtitle_tag'] == 'h4') {
                    echo '<h4 class="call-subtitle-element" style="';
                } elseif ($settings['call_subtitle_tag'] == 'h6') {
                    echo '<h6 class="call-subtitle-element" style="';
                } elseif ($settings['call_subtitle_tag'] == 'p') {
                    echo '<p class="call-subtitle-element" style="';
                } else {
                    echo '<h5 class="call-subtitle-element" style="';
                }

                echo '">' . esc_html($settings['call_subtitle']);

                if ($settings['call_subtitle_tag'] == 'h1') {
                    echo '</h1>';
                } elseif ($settings['call_subtitle_tag'] == 'h2') {
                    echo '</h2>';
                } elseif ($settings['call_subtitle_tag'] == 'h3') {
                    echo '</h3>';
                } elseif ($settings['call_subtitle_tag'] == 'h4') {
                    echo '</h4>';
                } elseif ($settings['call_subtitle_tag'] == 'h6') {
                    echo '</h6>';
                } elseif ($settings['call_subtitle_tag'] == 'p') {
                    echo '</p>';
                } else {
                    echo '</h5>';
                }

                echo '</div>';
            }
            if ($settings['call_subtitle_two'] != '') {
                echo '<div class="call-subtitle-two">';

                if ($settings['call_subtitle_two_tag'] == 'h1') {
                    echo '<h1 class="call-subtitle-two-element" style="';
                } elseif ($settings['call_subtitle_two_tag'] == 'h2') {
                    echo '<h2 class="call-subtitle-two-element" style="';
                } elseif ($settings['call_subtitle_two_tag'] == 'h3') {
                    echo '<h3 class="call-subtitle-two-element" style="';
                } elseif ($settings['call_subtitle_two_tag'] == 'h4') {
                    echo '<h4 class="call-subtitle-two-element" style="';
                } elseif ($settings['call_subtitle_two_tag'] == 'h6') {
                    echo '<h6 class="call-subtitle-two-element" style="';
                } elseif ($settings['call_subtitle_two_tag'] == 'p') {
                    echo '<p class="call-subtitle-two-element" style="';
                } else {
                    echo '<h5 class="call-subtitle-two-element" style="';
                }

                echo '">' . esc_html($settings['call_subtitle_two']);

                if ($settings['call_subtitle_two_tag'] == 'h1') {
                    echo '</h1>';
                } elseif ($settings['call_subtitle_two_tag'] == 'h2') {
                    echo '</h2>';
                } elseif ($settings['call_subtitle_two_tag'] == 'h3') {
                    echo '</h3>';
                } elseif ($settings['call_subtitle_two_tag'] == 'h4') {
                    echo '</h4>';
                } elseif ($settings['call_subtitle_two_tag'] == 'h6') {
                    echo '</h6>';
                } elseif ($settings['call_subtitle_two_tag'] == 'p') {
                    echo '</p>';
                } else {
                    echo '</h5>';
                }

                echo '</div>';
            }
            echo '</div>';


            echo '<div class="call-link-wrapper">';
            if ($link_url != '') {
                echo '<div class="call-link">';

                echo '<a class="call-link-btn btn" href="' . esc_url($link_url) . '"';

                if ($link_target == 'on') {
                    echo ' target="_blank"';
                }

                if ($link_rel == 'on') {
                    echo ' rel="nofollow"';
                }

                echo ' style="';

                echo '" ';

                echo '>' . esc_html($settings['call_link_title']) . '</a>';

                echo '</div>';
            }

            echo '</div>';

            echo '</div>';
        } else {

            echo '<div class="stronghold-call-to-action-wrapper">';
            echo '<div class="call-text-wrapper">';

            echo '<div class="call-title">';

            if ($settings['call_title_tag'] == 'h1') {
                echo '<h1 class="call-title-element" style="';
            } elseif ($settings['call_title_tag'] == 'h2') {
                echo '<h2 class="call-title-element" style="';
            } elseif ($settings['call_title_tag'] == 'h3') {
                echo '<h3 class="call-title-element" style="';
            } elseif ($settings['call_title_tag'] == 'h5') {
                echo '<h5 class="call-title-element" style="';
            } elseif ($settings['call_title_tag'] == 'h6') {
                echo '<h6 class="call-title-element" style="';
            } elseif ($settings['call_title_tag'] == 'p') {
                echo '<p class="call-title-element" style="';
            } else {
                echo '<h4 class="call-title-element" style="';
            }

            echo '">' . esc_html($settings['call_title']);

            if ($settings['call_title_tag'] == 'h1') {
                echo '</h1>';
            } elseif ($settings['call_title_tag'] == 'h2') {
                echo '</h2>';
            } elseif ($settings['call_title_tag'] == 'h3') {
                echo '</h3>';
            } elseif ($settings['call_title_tag'] == 'h5') {
                echo '</h5>';
            } elseif ($settings['call_title_tag'] == 'h6') {
                echo '</h6>';
            } elseif ($settings['call_title_tag'] == 'p') {
                echo '</p>';
            } else {
                echo '</h4>';
            }

            echo '</div>';

            if ($settings['call_subtitle'] != '') {
                echo '<div class="call-subtitle">';

                if ($settings['call_subtitle_tag'] == 'h1') {
                    echo '<h1 class="call-subtitle-element" style="';
                } elseif ($settings['call_subtitle_tag'] == 'h2') {
                    echo '<h2 class="call-subtitle-element" style="';
                } elseif ($settings['call_subtitle_tag'] == 'h3') {
                    echo '<h3 class="call-subtitle-element" style="';
                } elseif ($settings['call_subtitle_tag'] == 'h4') {
                    echo '<h4 class="call-subtitle-element" style="';
                } elseif ($settings['call_subtitle_tag'] == 'h6') {
                    echo '<h6 class="call-subtitle-element" style="';
                } elseif ($settings['call_subtitle_tag'] == 'p') {
                    echo '<p class="call-subtitle-element" style="';
                } else {
                    echo '<h5 class="call-subtitle-element" style="';
                }

                echo '">' . esc_html($settings['call_subtitle']);

                if ($settings['call_subtitle_tag'] == 'h1') {
                    echo '</h1>';
                } elseif ($settings['call_subtitle_tag'] == 'h2') {
                    echo '</h2>';
                } elseif ($settings['call_subtitle_tag'] == 'h3') {
                    echo '</h3>';
                } elseif ($settings['call_subtitle_tag'] == 'h4') {
                    echo '</h4>';
                } elseif ($settings['call_subtitle_tag'] == 'h6') {
                    echo '</h6>';
                } elseif ($settings['call_subtitle_tag'] == 'p') {
                    echo '</p>';
                } else {
                    echo '</h5>';
                }

                echo '</div>';
            }
            echo '</div>';


            if ($link_url != '') {
                echo '<div class="call-link">';

                echo '<a class="call-link-btn btn" href="' . esc_url($link_url) . '"';

                if ($link_target == 'on') {
                    echo ' target="_blank"';
                }

                if ($link_rel == 'on') {
                    echo ' rel="nofollow"';
                }

                echo ' style="';

                echo '" ';

                echo '>' . esc_html($settings['call_link_title']) . '</a>';

                echo '</div>';
            }

            echo '</div>';
        }
    }
}
