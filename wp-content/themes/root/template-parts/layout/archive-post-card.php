<?php
/**
 * ****************************************************************************
 *
 *   DON'T EDIT THIS FILE
 *   After update you will lose all changes. Use child theme
 *
 *   НЕ РЕДАКТИРУЙТЕ ЭТОТ ФАЙЛ
 *   После обновления Вы потереяете все изменения. Используйте дочернюю тему
 *
 *   https://docs.wpshop.ru/child-themes/
 *
 * *****************************************************************************
 *
 * @package root
 */
?>

<div class="posts-container posts-container--two-columns">

    <?php while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/posts/content', 'card' );

    endwhile; ?>

</div>