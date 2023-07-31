
<?php
/**
 * 
 * The sidebar containing the footer widget area.
 *
 * @package Dental_Care
 */
if (!is_active_sidebar('dental-care-footer-sidebar-1') && ('dental-care-footer-sidebar-2') && ('dental-care-footer-sidebar-3') && ('dental-care-footer-sidebar-4')) {
    return;
}

$dental_care_footer_count = 'three-col';

if (class_exists('OT_Loader')) {
$dental_care_footer_count = ot_get_option('footer_col_layout');
}

if (($dental_care_footer_count) == ('four-col')) {
    $dental_care_foot_layout = 'col-md-3';
} else if (($dental_care_footer_count) == ('three-col')) {
    $dental_care_foot_layout = 'col-md-4';
} else if (($dental_care_footer_count) == ('two-col')) {
    $dental_care_foot_layout = 'col-md-6';
} else if (($dental_care_footer_count) == ('one-col')) {
    $dental_care_foot_layout = 'col-md-12';
}


?>
<div id="dental-care-footer-sidebar" class="secondary footer-area row">
    <div class="container footer-area-inner">     
        
        <div id="dental-care-footer-sidebar1" class="footer-widgets widget-area clear <?php echo esc_attr($dental_care_foot_layout); ?>" role="complementary">
            <?php
            dynamic_sidebar('dental-care-footer-sidebar-1');
            ?>
        </div>    
        <div id="dental-care-footer-sidebar2" class="footer-widgets widget-area clear <?php echo esc_attr($dental_care_foot_layout); ?>" role="complementary">
            <?php
            dynamic_sidebar('dental-care-footer-sidebar-2');
            ?>
        </div>
        <div id="dental-care-footer-sidebar3" class="footer-widgets widget-area clear <?php echo esc_attr($dental_care_foot_layout); ?>" role="complementary">
            <?php
            dynamic_sidebar('dental-care-footer-sidebar-3');
            ?>
        </div>
        <div id="dental-care-footer-sidebar4" class="footer-widgets widget-area clear <?php echo esc_attr($dental_care_foot_layout); ?>" role="complementary">
            <?php
            dynamic_sidebar('dental-care-footer-sidebar-4');
            ?>
        </div>
    </div>

</div>
