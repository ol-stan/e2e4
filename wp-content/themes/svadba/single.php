<?php get_header(); ?>
	<div class="span-24" id="contentwrap">	
	<?php get_sidebars('left'); ?>
			<div class="span-14">
				<div id="content">	
					<?php if (have_posts()) : ?>	
						<?php while (have_posts()) : the_post(); ?>
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<h2 class="title"><?php the_title(); ?></h2>
	
							<div class="entry">
								<?php the_content('Детальнее &raquo;'); ?>
								<?php wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							</div>
							<div class="postmeta"><img src="<?php bloginfo('template_url'); ?>/images/folder.png" /> Раздел <?php the_category(', ') ?> <?php if(get_the_tags()) { ?> <img src="<?php bloginfo('template_url'); ?>/images/tag.png" /> <?php  the_tags('Теги: ', ', '); } ?></div>

						
							<div class="navigation clearfix">
								<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
								<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
							</div>
							

							<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// Both Comments and Pings are open ?>
								
	
							<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// Only Pings are Open ?>
								Комментирование закрыто, но вы можите поставить <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> со своего сайта.
	
							<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// Comments are open, Pings are not ?>
								
							<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// Neither Comments, nor Pings are open ?>
								Все опции закрыты.
	
							<?php } edit_post_link('Изменить эту запись','','.'); ?>
						</div><!--/post-<?php the_ID(); ?>-->
						
				<?php comments_template(); ?>
				
				<?php endwhile; ?>
			
				<?php endif; ?>
			</div>
			</div>
		<?php get_sidebars('right'); ?>
	</div>
<?php get_footer(); ?>


