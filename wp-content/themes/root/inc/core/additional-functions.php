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


/**
 * Remove hentry from post classes
 */
add_filter( 'post_class', 'remove_hentry_from_post_classes' );
function remove_hentry_from_post_classes( $classes ) {
    $classes = str_replace( 'hentry', '', $classes );
    return $classes;
}


/**
 *  Remove text/css and text/javascript in styles and scripts
 */
function clean_style_tag( $src ) {
    return str_replace( "type='text/css'", '', $src );
}
add_filter( 'style_loader_tag', 'clean_style_tag' );

function clean_script_tag( $src ) {
    return str_replace( "type='text/javascript'", '', $src );
}
add_filter( 'script_loader_tag', 'clean_script_tag' );


/**
 * Microdata for images
 */
if ( ! function_exists( 'microformat_image' ) ) :
    function microformat_image($content) {
        $pattern  = '/<img (.*?) width="(.*?)" height="(.*?)" (.*?)>/i';
        $replace = '<span itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><img itemprop="url image" \\1 width="\\2" height="\\3" \\4><meta itemprop="width" content="\\2"><meta itemprop="height" content="\\3"></span>';
        $content = preg_replace( $pattern, $replace, $content );
        return $content;
    }
    add_filter( 'the_content', 'microformat_image', 999 );
endif;


/**
 * Microdata publisher
 */
function get_microdata_publisher() {

    $logotype_image = root_get_option( 'logotype_image' );

    $out = '';
    $out .= '<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">';

    if ( ! empty( $logotype_image ) ) {
        $out .= '<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject" style="display: none;">';
        $out .= '<img itemprop="url image" src="' . $logotype_image . '" alt="' . get_bloginfo('name') . '">';
        $out .= '</div>';
    }

    $out .= '<meta itemprop="name" content="' . get_bloginfo( 'name' ) . '">';
    $out .= '<meta itemprop="telephone" content="' . apply_filters( 'wpshop_microdata_publisher_telephone', get_bloginfo( 'name' ) ) . '">';
    $out .= '<meta itemprop="address" content="' . apply_filters( 'wpshop_microdata_publisher_address', get_bloginfo( 'url' ) ) . '">';
    $out .= '</div>';

    return $out;
}


/**
 * Remove h2 from pagination and navigation
 */
function change_navigation_markup_template( $template, $class ) {
    $template = '
	<nav class="navigation %1$s" role="navigation">
		<div class="screen-reader-text">%2$s</div>
		<div class="nav-links">%3$s</div>
	</nav>';
    return $template;
};

add_filter( 'navigation_markup_template', 'change_navigation_markup_template', 10, 2 );


/**
 * Breadcrumbs
 */
/**
 * Remove last item from breadcrumbs SEO by YOAST
 * http://www.wpdiv.com/remove-post-title-yoast-seo-plugin-breadcrumb/
 */
function adjust_single_breadcrumb( $link_output) {
    if( strpos( $link_output, 'breadcrumb_last' ) !== false ) {
        $link_output = '';
    }
    return $link_output;
}
add_filter( 'wpseo_breadcrumb_single_link', 'adjust_single_breadcrumb' );


/**
 * Remove current link in menu
 *
 * @param $nav_menu
 * @param $args
 * @return mixed
 */
function remove_current_links_from_menu( $nav_menu, $args ) {
    preg_match_all( '/<li(.+?)class="(.+?)current-menu-item(.+?)>(<a(.+?)>(.+?)<\/a>)/ui', $nav_menu, $matches );

    if ( isset( $matches[4]) && ! empty( $matches[4] ) && preg_match( '/<a/ui', $matches[4][0] ) ) {
        foreach ( $matches[4] as $k => $v ) {
            if ( ! is_paged() ) {
                $nav_menu = str_replace( $v, '<span class="removed-link">' . $matches[6][$k] . '</span>', $nav_menu );
            }
        }
    }

    return $nav_menu;
}

add_filter( 'wp_nav_menu', 'remove_current_links_from_menu', PHP_INT_MAX, 2 );


/**
 * Remove role="navigation" for best validation w3
 *
 * @param $template
 * @param $class
 *
 * @return mixed
 */
function fix_validation_role_navigation( $template, $class ) {
    $template = str_replace( ' role="navigation"', '', $template );
    return $template;
}
add_filter( 'navigation_markup_template', 'fix_validation_role_navigation', 10, 2 );


/**
 * Allow work shortcode in term description
 */
add_filter( 'term_description','shortcode_unautop' );
add_filter( 'term_description','do_shortcode' );


/**
 * Disable shortcode wrapping in p
 */
if ( apply_filters( THEME_SLUG . '_disable_wrapping_shortcode', false ) ) {
    remove_filter( 'the_content', 'wpautop' );
    add_filter( 'the_content', 'wpautop', 99 );
    add_filter( 'the_content', 'shortcode_unautop', 999 );
}