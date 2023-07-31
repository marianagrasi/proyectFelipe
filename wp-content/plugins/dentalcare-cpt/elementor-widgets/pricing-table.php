<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Price Table
 */

class Dental_Care_Price_Table extends Widget_Base {

    /**
     * Retrieve the widget name.
     *    
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
      return 'dental-care-price-table';
    }

    /**
     * Retrieve the widget title.
     *     
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
      return esc_html__('Price Table', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
      return 'eicon-price-table';
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
  public function dental_care_extensions_allowed_html(){    

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
        'section_price_table', [
          'label' => esc_html__('Price Table', 'dental-care'),
        ]
      );

      $this->add_control(
        'pricing_table_name', [
          'label' => esc_html_x('Pricing Table Name', 'dental-care'),
          'type' => Controls_Manager::TEXTAREA,
        ]
      );

      $this->add_control(
        'pricing_table_header_text', [
          'label' => esc_html_x('Pricing Table Header Text', 'dental-care'),
          'type' => Controls_Manager::TEXTAREA,
        ]
      );

      $this->add_control(
        'pricing_table_price', [
          'label' => esc_html_x('Pricing Table Price', 'dental-care'),
          'type' => Controls_Manager::TEXTAREA,
        ]
      );

      $this->add_control(
        'pricing_table_currency', [
          'label' => esc_html_x('Pricing Table Currency', 'dental-care'),
          'type' => Controls_Manager::TEXT,
        ]
      );

      $this->add_control(
        'pricing_table_period', [
          'label' => esc_html_x('Pricing Table Period', 'dental-care'),
          'type' => Controls_Manager::TEXT,
        ]
      );

      $this->add_control(
        'pricing_table_features', [
          'label' => esc_html_x('Pricing Table Features', 'dental-care'),
          'type' => \Elementor\Controls_Manager::WYSIWYG,
        ]
      );

      $this->add_control(
        'pricing_table_link', [
          'label' => esc_html__('Pricing Table Button Link', 'dental-care'),
          'type' => Controls_Manager::URL,
          'placeholder' => 'http://your-link.com',
          'default' => [
            'url' => '',
          ],
        ]
      );

      $this->add_control(
        'pricing_table_link_title', [
          'label' => esc_html_x('Pricing Table Button Link Title', 'dental-care'),
          'type' => Controls_Manager::TEXT,
        ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
        'section_price_table_style', [
          'label' => esc_html__('Button', 'dental-care'),
          'tab' => Controls_Manager::TAB_STYLE,
        ]
      );

      $this->add_control(
        'price_table_translate_en', [
          'label' => esc_html__('Enable Pricing Table Translate on Hover', 'dental-care'),
          'type' => \Elementor\Controls_Manager::SWITCHER,
          'return_value' => 'yes',
        ]
      );

      $this->add_control(
        'price_table_title_color', [
          'label' => esc_html_x('Price Table Title Color', 'dental-care'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .pricing-title' => 'color: {{VALUE}}',
        ]
        ]
      );

      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'price_title_typography',
                'label' => esc_html_x('Price Table Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .pricing-title',
            ]
        );

      $this->add_control(
        'price_table_header_text_color', [
          'label' => esc_html_x('Price Table Header Text Color', 'dental-care'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .pricing-table-header-text' => 'color: {{VALUE}}',
        ]
        ]
      );

      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'price_header_text_typography',
                'label' => esc_html_x('Price Table Header Text Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .pricing-table-header-text',
            ]
        );

      $this->add_control(
        'price_table_background_color', [
          'label' => esc_html_x('Price Table Background Color', 'dental-care'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .stronghold-pricing-table' => 'background-color: {{VALUE}}',
        ]
        ]
      );

      $this->add_control(
            'price_table_bg_img', [
                'label' => __('Price Table Background Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an image.', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
                'selectors' => [
                  '{{WRAPPER}} .stronghold-pricing-table' => 'background-image: url({{URL}})',
              ]
            ]
      );

      $this->add_control(
        'price_table_details_color', [
          'label' => esc_html_x('Price Table Details Color', 'dental-care'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .pricing-features' => 'color: {{VALUE}}',
        ]
        ]
      );

       $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'price_details_typography',
                'label' => esc_html_x('Price Table Details Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .pricing-features',
            ]
        );

      $this->add_control(
        'price_color', [
          'label' => esc_html_x('Price Color', 'dental-care'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .stronghold-pricing-table .pricing-rate' => 'color: {{VALUE}}',
        ]
        ]
      );

      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'price_typography',
                'label' => esc_html_x('Price Typography', 'dental-care'),
                'selector' => 
                  '{{WRAPPER}} .pricing-rate',
                  '{{WRAPPER}} .price-value',
              
            ]
        );

      $this->add_control(
        'btn_background_color', [
          'label' => esc_html_x('Button Background Color', 'dental-care'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .pricing-table-btn' => 'background-color: {{VALUE}}',
        ]
        ]
      );

      $this->add_control(
        'btn_color', [
          'label' => esc_html_x('Button Color', 'dental-care'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .pricing-table-btn' => 'color: {{VALUE}}',
        ]
        ]
      );

        $this->add_control(
        'btn_hover_color', [
          'label' => esc_html_x('Button Hover Color', 'dental-care'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .pricing-table-btn:hover' => 'color: {{VALUE}}',
        ]
        ]
      );

  $this->add_control(
        'btn_hover_bgcolor', [
          'label' => esc_html_x('Button Hover Bg Color', 'dental-care'),
          'type' => Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .pricing-table-btn:hover' => 'background-color: {{VALUE}}',
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
    protected function render() {


      $settings = $this->get_settings_for_display();

      $allowed_html = $this->dental_care_extensions_allowed_html();

      $link_url = $settings['pricing_table_link']['url'];
      $link_target = $settings['pricing_table_link']['is_external'];
      $link_rel = $settings['pricing_table_link']['nofollow'];

      $pricetable_img_src = '';
      $pricetable_img_src = $settings['price_table_bg_img']['url'];

      if ($settings['pricing_table_name'] != NULL && isset($settings['pricing_table_name'])) {

        echo '<div class="stronghold-pricing-table ';

        if($settings['price_table_translate_en'] == true){
         echo ' price-table-translate ';
       }

       echo '" style="';

      echo '"> ';

      echo '  <div class="pricing-table-header"> ';
      echo '  <h5 class="pricing-title" style="';

      echo '">' . esc_html($settings['pricing_table_name']) . '</h5>';
      echo ' </div>';

      if($settings['pricing_table_header_text'] != ''){
        echo ' <div class="pricing-table-header-text" style="';

        echo '">';
        echo esc_html($settings['pricing_table_header_text']);
        echo ' </div>';
      }

      echo '  <div class="pricing-rate" style="';
      
      echo '"><span class="price-currency">' . esc_html($settings['pricing_table_currency']) . '</span><span class="price-value" style="';

      echo '">' . esc_html($settings['pricing_table_price']) . '</span> <span class="price-period">' . esc_html($settings['pricing_table_period']) . '</span></div>';


      echo ' <div class="pricing-features" style="';

      echo '">';

      echo wp_kses($settings['pricing_table_features'], $allowed_html);

      echo '</div>';
          

      if ($link_url != ''):
        echo '  <a href="' . esc_url($link_url) . '"';

        if ($link_target == 'on') {
          echo ' target="_blank"';
        }

        if ($link_rel == 'on') {
          echo ' rel="nofollow"';
        }

        echo ' class="btn pricing-table-btn"';

        echo ' style="';
        
        echo'">' . esc_attr($settings['pricing_table_link_title']) . '</a> </div>';
      endif;
    }

  }

}
