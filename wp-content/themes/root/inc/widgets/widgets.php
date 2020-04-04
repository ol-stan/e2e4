<?php
/**
 * ****************************************************************************
 *
 *   НЕ РЕДАКТИРУЙТЕ ЭТОТ ФАЙЛ
 *   DON'T EDIT THIS FILE
 *
 * *****************************************************************************
 *
 * @package root
 */

require get_template_directory() . '/inc/widgets/widget-top-commentators.php';
require get_template_directory() . '/inc/widgets/widget-subscribe.php';
require get_template_directory() . '/inc/widgets/widget-social-links.php';
require get_template_directory() . '/inc/widgets/widget-articles.php';


function wpshop_widgets_register() {
    register_widget( 'Wpshop_Widget_Top_Commentators' );
    //register_widget( 'Wpshop_Widget_Subscribe' );
    register_widget( 'Wpshop_Widget_Social_Links' );
    register_widget( 'Wpshop_Widget_Articles' );
}
add_action( 'widgets_init', 'wpshop_widgets_register' );


/**
 * Exclude category in widget
 */
function exclude_category_widget( $args ) {
    if ( is_category() ) {
        $cat_id = get_query_var( 'cat' );
        $args['exclude'] = $cat_id;
    }
    return $args;
}
add_filter( 'widget_categories_args','exclude_category_widget' );