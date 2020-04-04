<?php

/**
 * Class Wpshop_Widget_Top_Commentators
 *
 * @version     1.1
 * @updated     2018-03-21
 */
class Wpshop_Widget_Top_Commentators extends WP_Widget {

    function __construct() {
        parent::__construct(
            'top_commentators',
            'ТОП комментаторов',
            array( 'description' => 'ТОП комментаторов' )
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


        $period = ( ! empty($instance['period']) ) ? trim($instance['period']) : '';
        $count  = ( ! empty($instance['count']) ) ? trim($instance['count']) : '';


        $arguments = array(
            'localization' => 'root',
        );
        if ( ! empty( $period ) ) $arguments['period'] = $period;
        if ( ! empty( $count ) )  $arguments['count'] = $count;

        sp_top_commentator( $arguments );

        echo $args['after_widget'];
    }

    public function form( $instance ) {

        $title                  = ( isset( $instance[ 'title' ] ) )         ? $instance[ 'title' ] : '';
        $period                 = ( isset( $instance[ 'period' ] ) )        ? $instance[ 'period' ] : '';
        $count                  = ( isset( $instance[ 'count' ] ) )         ? $instance[ 'count' ] : 6 ;

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'count' ); ?>">Количество комментаторов</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="number" min="1" step="1" value="<?php echo esc_attr( $count ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'period' ); ?>">Период</label><br>
            <select name="<?php echo $this->get_field_name( 'period' ); ?>" id="<?php echo $this->get_field_id( 'period' ); ?>" class="widefat">
                <option value="all" <?php selected($period, 'all') ?>>За все время</option>
                <option value="month" <?php selected($period, 'month') ?>>За месяц</option>
            </select>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['period']     = ( ! empty( $new_instance['period'] ) ) ? strip_tags( $new_instance['period'] ) : '';
        $instance['count']      = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
        return $instance;
    }
}