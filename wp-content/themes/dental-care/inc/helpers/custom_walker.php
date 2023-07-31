<?php
/**
 * Custom Walker
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
class stronghold_mega_menu_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
                     
           if ($item->numcolumns == "one"){
               $megaclass = "mega-menu col-1";
           }else if ($item->numcolumns == "two"){
               $megaclass = "mega-menu col-2";
           }else if ($item->numcolumns == "three"){
               $megaclass = "mega-menu col-3";
           }else if ($item->numcolumns == "four"){
               $megaclass = "mega-menu col-4";
           }else if ($item->numcolumns == "five"){
               $megaclass = "mega-menu col-5";
           }else if ($item->numcolumns == "six"){
               $megaclass = "mega-menu col-6";
           }else{
               $megaclass = "";
           }         

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . ' '.esc_attr( $megaclass ).'"';

           $output .= $indent . '<li' . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
	           $description = $append = $prepend = "";
           }
	   
            $item_output = $args->before;
            $item_output .= $item->shortcode;
            $item_output .= '<a'. $attributes .'>';
            if ($item->icon != NULL){
	    $item_output .= '<i class="'.esc_attr($item->icon).'"></i>';
            }
            if ($item->hidetitle == "yes"){
                  $item_output .= " ";
            }else{
                $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            }
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
           
			
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
            }
            
               function start_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu animated fadeIn\">\n";
    }
}