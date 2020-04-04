<?php get_header(); ?>
		<div class="span-24" id="contentwrap">
			<?php get_sidebars('left'); ?>
			<div class="span-14">
				<div id="content">		
					<?php if (have_posts()) : ?>	
						<?php while (have_posts()) : the_post(); ?>
						
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<div class="postdate">Автор <b><?php the_author() ?></b>,  Опубликовано: <?php the_time('F jS, Y') ?> <?php if (current_user_can('edit_post', $post->ID)) { ?> | <?php edit_post_link('Изменить', '', ''); } ?></div>
			
							<div class="entry">
								<?php the_content('Подробнее &raquo;'); ?>
							</div>
						</div><!--/post-<?php the_ID(); ?>-->
				
				<?php endwhile; ?>
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; Предыдущие записи') ?></div>
					<div class="alignright"><?php previous_posts_link('Следующие записи &raquo;') ?></div>
				</div>
				<?php else : ?>
					<h2 class="center">Не найдено</h2>
					<p class="center">К сожалению, по Вашему запросу ничего не найдено.</p>
					<?php get_search_form(); ?>
			
				<?php endif; ?>
				</div>
			</div>
		
		<?php get_sidebars('right'); ?>
	</div>
<?php get_footer(); ?>
