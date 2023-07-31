<?php

/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dental_Care
 */
if (!is_active_sidebar('dental-care-sidebar-main')) {
    return;
}
?>

<?php dynamic_sidebar('dental-care-sidebar-main'); ?>

