<!--noindex-->
<div class="author-box">
    <div class="author-box__ava">
        <?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?>
    </div>

    <div class="author-box__body">
        <div class="author-box__author">
            <?php echo get_the_author() . '<em>/ ' . __( 'author of the article', THEME_TEXTDOMAIN ) . '</em>'; ?>
        </div>
        <div class="author-box__description">
            <!--noindex--><?php the_author_meta( 'description' ) ?><!--/noindex-->
        </div>
    </div>
</div>
<!--/noindex-->