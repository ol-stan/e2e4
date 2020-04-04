<?php get_header(); ?>
<div class="span-24" id="contentwrap">
<?php get_sidebars('left'); ?>
	<div class="span-14">
		<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Результаты поиска</h2>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h3 class="title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<div class="postdate">Автор <b><?php the_author() ?></b>,  в <?php the_time('F jS, Y') ?> <?php if (current_user_can('edit_post', $post->ID)) { ?> | <?php edit_post_link('Изменить', '', ''); } ?></div>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Предыдущие записи') ?></div>
			<div class="alignright"><?php previous_posts_link('Следующие записи &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="pagetitle">К сожалению, по Вашему запросу ничего не найдено.</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

		</div>
	</div>

<?php get_sidebars('right'); ?>
</div>
<?php get_footer(); ?>