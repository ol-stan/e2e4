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

$root_skin = root_get_option( 'skin' );
if ( $root_skin == 'no' ) $root_skin = '';

?>

<div class="posts-container">

    <?php while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/posts/content', $root_skin );

    endwhile; ?>

</div>