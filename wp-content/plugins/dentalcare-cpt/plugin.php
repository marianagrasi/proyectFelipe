<?php

/**
 * Class Plugin
 *
 * Main Plugin class
 */
class Plugin
{

    /**
     * Instance
     *
     * @access private
     * @static
     *
     * @var Plugin The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @access public
     *
     * @return Plugin An instance of the class.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * widget_scripts
     *
     * Load required post types.
     *
     * @access public
     */
    public function dental_care_cpt_include_post_types()
    {
        require_once(__DIR__ . '/post-types/post-type-services.php');
        require_once(__DIR__ . '/post-types/post-type-gallery.php');
        require_once(__DIR__ . '/post-types/post-type-testimonial.php');
        require_once(__DIR__ . '/post-types/post-type-team-members.php');
        require_once(__DIR__ . '/post-types/post-type-brands.php');
    }

    /**
     *
     * @access public
     */
    public function dental_care_cpt_include_widgets()
    {
        require_once(__DIR__ . '/widgets/widget_opening_hours.php');
        require_once(__DIR__ . '/widgets/widget_recent_posts.php');
        require_once(__DIR__ . '/widgets/widget_social.php');
        require_once(__DIR__ . '/widgets/widget_company_info.php');
        require_once(__DIR__ . '/widgets/widget_testimonials.php');

    }

      /**
     *
     * Load required parts.
     *
     * @access public
     */
      public function dental_care_cpt_include_parts()
      {

         add_action('share_bar_include', 'get_share_bar');

         function get_share_bar($template) {

          $template = __DIR__ . '/parts/share_bar_part.php';

          load_template( $template );
      }


  }

    /**
     *
     * Load required vc params.
     *
     * @access public
     */
    public function dental_care_cpt_vc_params()
    {
        require_once(__DIR__ . '/wp-bakery-widgets/vc-params.php');
        require_once(__DIR__ . '/wp-bakery-widgets/edit-row.php');
    }

    /**
     * Include Widgets files
     *
     * @access private
     */
    private function dental_care_cpt_include_wp_bakery_widgets_files()
    {

        require_once(__DIR__ . '/wp-bakery-widgets/accordion.php');
        require_once(__DIR__ . '/wp-bakery-widgets/before-after.php');
        require_once(__DIR__ . '/wp-bakery-widgets/blog-carousel.php');
        require_once(__DIR__ . '/wp-bakery-widgets/blog-grid.php');
        require_once(__DIR__ . '/wp-bakery-widgets/brands.php');
        require_once(__DIR__ . '/wp-bakery-widgets/contact-info.php');
        require_once(__DIR__ . '/wp-bakery-widgets/counter.php');
        require_once(__DIR__ . '/wp-bakery-widgets/custom-menu.php');
        require_once(__DIR__ . '/wp-bakery-widgets/feature-box.php');
        require_once(__DIR__ . '/wp-bakery-widgets/gallery-grid.php');
        require_once(__DIR__ . '/wp-bakery-widgets/heading.php');
        require_once(__DIR__ . '/wp-bakery-widgets/icon-box.php');
        require_once(__DIR__ . '/wp-bakery-widgets/info-icon.php');
        require_once(__DIR__ . '/wp-bakery-widgets/masonry-gallery.php');
        require_once(__DIR__ . '/wp-bakery-widgets/number-block.php');
        require_once(__DIR__ . '/wp-bakery-widgets/opening-hours.php');
        require_once(__DIR__ . '/wp-bakery-widgets/partners.php');
        require_once(__DIR__ . '/wp-bakery-widgets/price-list.php');
        require_once(__DIR__ . '/wp-bakery-widgets/product-carousel.php');
        require_once(__DIR__ . '/wp-bakery-widgets/service-grid-featured.php');
        require_once(__DIR__ . '/wp-bakery-widgets/services.php');
        require_once(__DIR__ . '/wp-bakery-widgets/single-gallery.php');
        require_once(__DIR__ . '/wp-bakery-widgets/single-gallery-two.php');
        require_once(__DIR__ . '/wp-bakery-widgets/team-members.php');
        require_once(__DIR__ . '/wp-bakery-widgets/testimonials.php');
        require_once(__DIR__ . '/wp-bakery-widgets/video-player.php');
    }

    /**
     * Register Widgets
     *
     * @access public
     */
    public function dental_care_cpt_register_wp_bakery_widgets()
    {
        // Its is now safe to include Widgets files
        $this->dental_care_cpt_include_wp_bakery_widgets_files();

        // Register Widgets
        add_shortcode('dental_care_accordion', 'dental_care_accordion_shortcode');
        add_shortcode('dental_care_before_after', 'dental_care_before_after_shortcode');
        add_shortcode('dental_care_blog_carousel', 'dental_care_blog_carousel_shortcode');
        add_shortcode('dental_care_blog_grid', 'dental_care_blog_grid_shortcode');
        add_shortcode('dental_care_brands', 'dental_care_brands_shortcode');
        add_shortcode('dental_care_contact_info', 'dental_care_contact_info_shortcode');
        add_shortcode('dental_care_custom_menu', 'dental_care_custom_menu_shortcode');
        add_shortcode('dental_care_feature_box', 'dental_care_feature_box_shortcode');
        add_shortcode('dental_care_gallery_grid', 'dental_care_gallery_grid_shortcode');
        add_shortcode('dental_care_heading', 'dental_care_heading_shortcode');
        add_shortcode('dental_care_single_gallery', 'dental_care_single_gallery_shortcode');
        add_shortcode('dental_care_single_gallery_two', 'dental_care_single_gallery_two_shortcode');
        add_shortcode('dental_care_services', 'dental_care_services_shortcode');
        add_shortcode('dental_care_service_grid_featured', 'dental_care_service_grid_featured_shortcode');
        add_shortcode('dental_care_team_members', 'dental_care_team_members_shortcode');
        add_shortcode('dental_care_masonry_gallery', 'dental_care_masonry_gallery_shortcode');
        add_shortcode('dental_care_number_block', 'dental_care_number_block_shortcode');
        add_shortcode('dental_care_opening_hours', 'dental_care_opening_hours_shortcode');
        add_shortcode('dental_care_partners', 'dental_care_partners_shortcode');
        add_shortcode('dental_care_price_list', 'dental_care_price_list_shortcode');
        add_shortcode('dental_care_shop_carousel', 'dental_care_shop_shortcode');
        add_shortcode('dental_care_testimonials', 'dental_care_testimonial_shortcode');
        add_shortcode('dental_care_info_icon', 'dental_care_info_icon_shortcode');
        add_shortcode('dental_care_icon_box', 'dental_care_icon_box_shortcode');
        add_shortcode('dental_care_counter', 'dental_care_counter_shortcode');
        add_shortcode('dental_care_video_player', 'dental_care_video_player_shortcode');

    }


     /**
     * Include Widgets files
     *
     * Load elementor widgets files
     *
     * @access private
     */
     private function dental_care_include_elementor_widgets_files()
     {

       require_once(__DIR__ . '/elementor-widgets/icon-box.php');
       require_once(__DIR__ . '/elementor-widgets/accordion.php');
       require_once(__DIR__ . '/elementor-widgets/before-after.php');
       require_once(__DIR__ . '/elementor-widgets/blog.php');
       require_once(__DIR__ . '/elementor-widgets/button.php');
       require_once(__DIR__ . '/elementor-widgets/call-to-action.php');
       require_once(__DIR__ . '/elementor-widgets/company-info.php');
       require_once(__DIR__ . '/elementor-widgets/contact-form.php');
       require_once(__DIR__ . '/elementor-widgets/counter.php');
       require_once(__DIR__ . '/elementor-widgets/custom-menu.php');
       require_once(__DIR__ . '/elementor-widgets/gallery.php');
       require_once(__DIR__ . '/elementor-widgets/heading.php');
       require_once(__DIR__ . '/elementor-widgets/info-icon.php');
       require_once(__DIR__ . '/elementor-widgets/partners.php');
       require_once(__DIR__ . '/elementor-widgets/testimonials.php');
       require_once(__DIR__ . '/elementor-widgets/video-player.php');
       require_once(__DIR__ . '/elementor-widgets/products.php');
       require_once(__DIR__ . '/elementor-widgets/team.php');
       require_once(__DIR__ . '/elementor-widgets/services.php');
       require_once(__DIR__ . '/elementor-widgets/info-list.php');
       require_once(__DIR__ . '/elementor-widgets/opening-hours.php');
       require_once(__DIR__ . '/elementor-widgets/social-icons.php');
       require_once(__DIR__ . '/elementor-widgets/pricing-table.php');
       require_once(__DIR__ . '/elementor-widgets/price-list.php');
       require_once(__DIR__ . '/elementor-widgets/service-grid-featured.php');
       require_once(__DIR__ . '/elementor-widgets/flip-icon-box.php');
       require_once(__DIR__ . '/elementor-widgets/number-block.php');
       require_once(__DIR__ . '/elementor-widgets/feature-box.php');


   }

    /**
     * Register Widgets
     *
     * Register new Elementor widgets.
     *
     * @access public
     */
    public function register_elementor_widgets()
    {
        // Its is now safe to include Widgets files
        $this->dental_care_include_elementor_widgets_files();

        // Register Widgets



        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Accordion());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Before_After());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Blog());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Button());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Call_Action());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Company_Info());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Contact_Form());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Counter());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Custom_Menu());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Feature_Box());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Flip_Icon_Box());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Gallery());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Heading());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Icon_Box());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Info_Icon());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Info_List());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Opening_Hours());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Number_Block());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Partners());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Price_List());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Price_Table());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Products());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Services_Grid_Filter());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Services());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Team());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Social_Icons());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Testimonials_Two());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Dental_Care_Video_Player());
    }



    /**
     *  Plugin class constructor
     *
     * Register plugin action hooks and filters
     *
     * @access public
     */
    public function __construct()
    {

         // Register widgets
        add_action('elementor/widgets/widgets_registered', [$this, 'register_elementor_widgets']);

        $this->dental_care_cpt_include_post_types();
        $this->dental_care_cpt_include_widgets();
        $this->dental_care_cpt_include_parts();
        $this->dental_care_cpt_vc_params();
        $this->dental_care_cpt_register_wp_bakery_widgets();
    }
}

// Instantiate Plugin Class
Plugin::instance();
