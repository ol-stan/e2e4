	<div class="span-24"> 
		<div id="footer">
			<div>&copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> </div>
		</div>
	</div>
</div>
<div id="footer2"> - ЗАГСы Одессы и области со свадебными услугами </div>
</div>
<?php
	 wp_footer();
	echo get_theme_option("footer")  . "\n";
?>
</body>
</html>