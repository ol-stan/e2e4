<?php get_header(); ?>
<div class="span-24" id="contentwrap">
<?php get_sidebars('left'); ?>
	<div class="span-14">
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="title"><?php the_title(); ?></h2>
				<div class="entry">
					<?php the_content('<p class="serif">Подробнее &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
				</div>
			</div>
			<?php endwhile; endif; ?>
		<?php edit_post_link('Изменить эту запись.', '<p>', '</p>'); ?>
		</div>
	</div>
	

<?php get_sidebars('right'); ?>

</div>
<?php get_footer(); ?>