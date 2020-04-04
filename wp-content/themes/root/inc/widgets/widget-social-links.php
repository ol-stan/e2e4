<?php

/**
 * Class Wpshop_Widget_Social_Links
 *
 * @version     1.1
 * @updated     2018-03-21
 */
class Wpshop_Widget_Social_Links extends WP_Widget {

    function __construct() {
        parent::__construct(
            'wpshop_widget_social_links',
            'Социальные сети',
            array( 'description' => 'Ссылки на аккаунты в соц. сетях, указанные в Внешний вид - Настроить - Модули - Соц. профили' )
        );
    }

    /*
     * фронтэнд виджета
     */
    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $is_show_social_js = root_get_option( 'structure_social_js' );

        $social_profiles = array(
            'facebook', 'vk', 'twitter', 'ok', 'telegram', 'youtube',
            'instagram','linkedin', 'whatsapp', 'viber', 'pinterest', 'yandexzen',
        );

        foreach ( $social_profiles as $social_profile ) {
            if ( root_get_option( 'social_' . $social_profile ) ) {
                $social_profile_links[$social_profile] = root_get_option( 'social_' . $social_profile );
            }
        }

        if ( ! empty( $social_profile_links ) ) {
            ?>

            <div class="social-links">
                <div class="social-buttons social-buttons--square social-buttons--circle social-buttons--small">

                    <?php
                    foreach ( $social_profiles as $social_profile ) {
                        $social_profile_link = root_get_option( 'social_' . $social_profile );
                        if ( ! empty( $social_profile_link ) ) {
                            if ( $social_profile == 'whatsapp' ) $social_profile_link = 'https://api.whatsapp.com/send?phone=' . $social_profile_link;
                            if ( $social_profile == 'viber' ) $social_profile_link = 'viber://chat?number=' . $social_profile_link;

                            if ( $is_show_social_js ) {
                                echo '<span class="social-button social-button__'. $social_profile .' js-social-link" data-uri="' . esc_attr( $social_profile_link ) . '"></span>';
                            } else {
                                echo '<a class="social-button social-button__'. $social_profile .'" href="' . esc_attr( $social_profile_link ) . '" target="_blank"></a>';
                            }
                        }
                    }
                    ?>

                </div>
            </div>

        <?php }

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = sanitize_text_field( $instance['title'] );
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        return $instance;
    }
}