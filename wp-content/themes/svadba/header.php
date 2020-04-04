<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/screen.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/print.css" type="text/css" media="print" />
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

</head>
<body>

	<div id="wrapper">
		<div id="container" class="container">  
			<div class="span-24">
				<div class="span-17">
					<div id="pagemenucontainer">
						<ul id="pagemenu">
							<li <?php if(is_home()) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/">Главная</a></li>
                                                        <li <?php if(is_home()) { ?> class="current_page_item" <?php } ?>><a href="/kontakty/">Контакты</a></li>

							<li><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/rss.png"  style="margin:0 2px 0 0; vertical-align:middle;"  /> RSS Канал</a></li>		
							
						</ul>
					</div>
				</div>
				<div id="topsearch" class="span-7 last">
					<?php get_search_form(); ?>
				</div>
			</div>
				<div id="header" class="span-24">
					<div class="span-11">
						<?php
						$get_logo_image = get_theme_option('logo');
						if($get_logo_image != '') {
							?>
							<a href="<?php bloginfo('url'); ?>"><img src="<?php echo $get_logo_image; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="logo" /></a>
							<?php
						} else {
							?>
							<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
							<h2><?php bloginfo('description'); ?></h2>
							<?php
						}
						?>
						
					</div>
					
					<div class="span-13 last">
						<div class="headright">
							<?php echo get_theme_option('ad_header'); ?>
						</div>
						
					</div>
				</div>
				<div class="span-24" style="background: #fff;">
					<div class="headline"></div>
				</div>
			