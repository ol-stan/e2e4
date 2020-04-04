<div class="span-5">
		<div class="sidebar sidebar-left">

			<ul>
				<?php
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?>

<li><h2>ЗАГСы Одессы</h2>
				               <ul>
						<li><a href="/oficialnye-sajty"><strong>Официальные сайты</strong></a></li>
						<li><a href="/zapis-na-priem-onlajn-v-zags"><strong>Запись онлайн</strong></a></li>
						<li>Список документов</li>	
						<li>Образец заявления</li></br>
<li><a href="/gorodskoj-zags-odessy">Центральный</a></li>
<li><a href="/kievskij-zags">Киевский</a></li>
<li><a href="/malinovskij-zags">Малиновский</a></li>
<li><a href="/primorskij-zags">Приморский</a></li>
<li><a href="/suvorovskij-zags">Суворовский</a></li>


                                               
				               </ul>
					</li>


<li><h2>Подготовка к свадьбе</h2>
				               <ul>
						<li>Календарь венчаний</li>
						<li>Красивые даты свадьбы</li>
				               </ul>
					</li>

<li><h2><?php _e('Recent Posts'); ?></h2>
				               <ul>
						<?php wp_get_archives('type=postbypost&limit=10'); ?>  
				               </ul>
					</li>


            								
				

				<?php if (function_exists('get_recent_comments')) { get_recent_comments(); } ?>




				<?php endif; ?>
			</ul>

		<?php if(get_theme_option('ad_sidebar1_bottom') != '') {
		?>
		<div class="sidebaradbox">
			<?php echo get_theme_option('ad_sidebar1_bottom'); ?>
		</div>
		<?php
		}
		?>
		</div>
</div>