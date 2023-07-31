<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Price List
 */

class Dental_Care_Price_List extends Widget_Base
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
        return 'dental-care-price-list';
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
        return esc_html__('Price List', 'dental-care');
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
        return 'eicon-price-list';
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
            'section_price_list_settings',
            [
                'label' => esc_html__('Price List', 'dental-care'),
            ]
        );

        $this->add_control(
            'pricelist_title',
            [
                'label' => esc_html_x('Price List Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => __('Enter a title for this price list.', 'dental-care'),
            ]
        );

        $this->add_control(
            'pricelist_desc',
            [
                'label' => esc_html_x('Price List Description', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => __('Enter a description for this price list.', 'dental-care'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html_x('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => __('Enter a title', 'dental-care'),
            ]
        );
        $repeater->add_control(
            'item_desc',
            [
                'label' => esc_html__('Description', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => __('Enter a description.', 'dental-care'),
            ]
        );
        $repeater->add_control(
            'item_price',
            [
                'label' => esc_html__('Price', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => __('Enter a price.', 'dental-care'),
            ]
        );

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
                    'icon_en' => 'true',
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
                    'icon_en' => 'true',
                ],
            ]
        );

        $repeater->add_control(
          'item_link', [
            'label' => esc_html__('Price Link', 'dental-care'),
            'type' => Controls_Manager::URL,
            'placeholder' => 'http://your-link.com',
            'default' => [
              'url' => '',
          ],
      ]
  );

        $this->add_control(
            'pricelist_items',
            [
                'type' => Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => $repeater->get_controls(),
            ]
        );




        $this->end_controls_section();

        $this->start_controls_section(
            'section_price_list_style',
            [
                'label' => esc_html__('Price List Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-icon-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html_x('Icon Font Size', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .price-list-icon-element' => 'font-size: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'svg_color',
            [
                'label' => esc_html_x('SVG Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
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
                    '{{WRAPPER}} .price-list-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'price_list_padding',
            [
                'label' => esc_html__('Price List Padding', 'dental-care'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .price-list-header' => '
                    padding-top: {{TOP}}{{UNIT}};
                    padding-right: {{RIGHT}}{{UNIT}};
                    padding-bottom: {{BOTTOM}}{{UNIT}};
                    padding-left:{{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .price-list-content' => '
                    padding-top: {{TOP}}{{UNIT}};
                    padding-right: {{RIGHT}}{{UNIT}};
                    padding-bottom: {{BOTTOM}}{{UNIT}};
                    padding-left:{{LEFT}}{{UNIT}};',
                ]

            ]
        );


        $this->add_control(
            'price_list_headerbg_color',
            [
                'label' => esc_html_x('Header Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a header background color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .price-list-header' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'price_list_headerbg_img',
            [
                'label' => __('Header Background Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an image for the background.', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .price-list-header' => 'background-image: url({{URL}})',
                ]
            ]
        );

        $this->add_control(
            'price_list_bg_color',
            [
                'label' => esc_html_x('List Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a header background color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .price-list-content' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'price_list_bg_img',
            [
                'label' => __('List Background Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an image for the background.', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .price-list-content' => 'background-image: url({{URL}})',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_list_maintitle_typography',
                'label' => esc_html_x('Price List Header Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .price-list-main-title',
            ]
        );

        $this->add_control(
            'price_list_maintitle_color',
            [
                'label' => esc_html_x('Price List Header Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-main-title' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_list_maindesc_typography',
                'label' => esc_html_x('Price List Header Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .price-list-main-desc',
            ]
        );

        $this->add_control(
            'price_list_maindesc_color',
            [
                'label' => esc_html_x('Price List Header Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-main-desc' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_list_title_typography',
                'label' => esc_html_x('Price Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .price-list-title-element',
            ]
        );

        $this->add_control(
            'price_list_title_color',
            [
                'label' => esc_html_x('Price Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-title-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_list_desc_typography',
                'label' => esc_html_x('Price Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .price-list-desc',
            ]
        );

        $this->add_control(
            'price_list_desc_color',
            [
                'label' => esc_html_x('Price Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-desc' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'price_list_price_typography',
                'label' => esc_html_x('Price Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .price-list-price-element',
            ]
        );

        $this->add_control(
            'price_list_price_color',
            [
                'label' => esc_html_x('Price Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-price' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'price_list_price_btn_color',
            [
                'label' => esc_html_x('Price Button Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-price-btn' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_control(
            'price_list_price_btn_bgcolor',
            [
                'label' => esc_html_x('Price Button Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-price-btn' => 'background: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'price_list_price_btn_hcolor',
            [
                'label' => esc_html_x('Price Button Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-price-btn:hover' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_control(
            'price_list_price_btn_hbgcolor',
            [
                'label' => esc_html_x('Price Button Hover Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price-list-price-btn:hover' => 'background: {{VALUE}}',
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

        if ($settings['price_list_headerbg_img'] != '') {
            $price_list_headerbg_img_src = $settings['price_list_headerbg_img']['url'];
        }

        if ($settings['price_list_bg_img'] != '') {
            $price_list_bg_img_src = $settings['price_list_bg_img']['url'];
        }

        echo '<div class="dental-care-price-list-widget">';

        if ($settings['pricelist_title'] != '') {
            echo '<div class="price-list-header" style="';

            echo '">';
            echo '<h3 class="price-list-main-title" style="';

            echo '">' . esc_html($settings['pricelist_title']) . '</h3>';

            if ($settings['pricelist_desc'] != '') {
                echo '<span class="price-list-main-desc" style="';

                echo '">' . esc_html($settings['pricelist_desc']) . '</span>';
            }
            echo '</div>';
        }

        echo '<div class="price-list-content" style="';

        echo '">';
        foreach ($settings['pricelist_items'] as $item) {

          $link_url = $item['item_link']['url'];
          $link_target = $item['item_link']['is_external'];
          $link_rel = $item['item_link']['nofollow'];

          echo '<div class="price-list-item">';

          if ($item['icon_source'] == 'icon_library' || $item['icon_source'] == 'icon_theme') {

            if ($item['icon_source'] == 'icon_library') {

                if ($item['icon_select']['library'] == 'svg') {

                    echo '<div class="price-list-svg">';
                    echo file_get_contents(esc_attr($item['icon_select']['value']['url']));
                    echo '</div>';
                } else {
                    echo '<div class="price-list-icon">';

                    echo '<i class="price-list-icon-element ';

                    if ($item['icon_select']['value']) {
                        echo esc_attr($item['icon_select']['value']);
                    }

                    echo '"></i>';
                    echo ' </div>';
                }
            } else if ($item['icon_source'] == 'icon_theme') {

                echo '<div class="price-list-icon">';

                echo '<i class="price-list-icon-element ';

                if ($item['icon_select_custom']) {
                    echo esc_attr($item['icon_select_custom']);
                }

                echo '"></i>';
                echo ' </div>';
            }
        }

        echo '<div class="price-list-details">';

        echo '<div class="price-list-title">';

        if($link_url != ''){
          echo '<h5 class="price-list-title-element" style="';
          echo '"><a href="'.esc_url($link_url).'"';

          if ($link_target == 'on') {
              echo ' target="_blank"';
          }

          if ($link_rel == 'on') {
              echo ' rel="nofollow"';
          }

          echo '>' . esc_html($item['item_title']) . '</a></h5>';
      }else{
          echo '<h5 class="price-list-title-element" style="';
          echo '">' . esc_html($item['item_title']) . '</h5>';
      }

      echo '</div>';

      $item_desc = isset($item['item_desc']);
      if ($item_desc == true) {
        echo '<div class="price-list-desc" style="';

        echo '">';

        echo '<span>' . esc_html($item['item_desc']) . '</span>';
        echo '</div>';
    }

    echo '</div>';

    if($link_url != ''){

      echo '<div class="price-list-price">';
      echo '<span class="price-list-price-element btn price-list-price-btn" style="';

      echo '">' . esc_html($item['item_price']) . '</span>';
      echo '</div>';

  }else{
      echo '<div class="price-list-price">';
      echo '<span class="price-list-price-element" style="';

      echo '">' . esc_html($item['item_price']) . '</span>';
      echo '</div>';
  }

  echo '</div>';
}

echo '</div>';

echo '</div>';
}
}
