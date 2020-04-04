<?php

/**
 * Class Wpshop_Widget_Subscribe
 *
 * @version     1.1
 * @updated     2018-03-21
 */
class Wpshop_Widget_Subscribe extends WP_Widget {

    function __construct() {
        parent::__construct(
            'wpshopbiz_subscribe',
            'Подписка',
            array( 'description' => 'Форма подписки на обновления' )
        );
    }

    /*
     * фронтэнд виджета
     */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)

        echo $args['before_widget'];

        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

        ?>


        <!-- код формы подписки -->
        <div class="widget-subscribe">
            <div class="widget-subscribe__i">

                <a href="<?php bloginfo('rss2_url') ?>" class="widget-subscribe__rss">
                    RSS-подписка
                </a>
            </div>
        </div>
        <!-- код формы подписки -->



        <?php

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}