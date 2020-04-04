<?php
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
    	'name' => 'Left Sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    
    register_sidebar(
	array(
		'name' => 'Right Sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

$themename = "Press Blue";
$shortname = str_replace(' ', '_', strtolower($themename));

function get_theme_option($option)
{
	global $shortname;
	return stripslashes(get_option($shortname . '_' . $option));
}

function get_theme_settings($option)
{
	return stripslashes(get_option($option));
}

$options = array (
			
	array(	"type" => "open"),
	
	array(	"name" => "Картинка логотипа",
		"desc" => "Введите полный путь к картинке Вашего логотипа. Оставьте пустым, если вы не хотите использовать картинку логотипа.",
		"id" => $shortname."_logo",
		"std" =>  get_bloginfo('template_url') . "/images/logo.png",
		"type" => "text"),	array(	"name" => "Баннер в хедере (468x60 px)",
			"desc" => "Header banner code. You may use any html code here, including your 468x60 px Adsense code.",
            "id" => $shortname."_ad_header",
            "type" => "textarea",
			"std" => '<a href="http://miralinks.ru/users/registration/from:6698"><img src="http://www.miralinks.ru/img/banners/miralinks/468_60_3.gif" alt="Лучшая система размещения статей" /></a>'
			),	array(	"name" => "Баннеры с правой стороны (вверху)",
		"desc" => "Вы можете добавить неограниченное количество объявлений. Каждый новый баннер должен быть с новой линии с использованием следующего формата: <br/>http://yourbannerurl.com/banner.gif, http://theurl.com/to_link.html",
        "id" => $shortname."_ads_125",
        "type" => "textarea",
		"std" => 'http://img.sape.ru/bn/6.gif, http://www.sape.ru/r.935383dff9.php
http://img.sape.ru/bn/7.gif, http://www.sape.ru/r.935383dff9.php'
		),	array(	"name" => "Твиттер ID",
			"desc" => "Enter your twitter account url here.",
			"id" => $shortname."_twitter",
			"std" => "http://twitter.com/NewWpThemes",
			"type" => "text"),
			
	array(	"name" => "Твиттер слоган",
			"desc" => "",
			"id" => $shortname."_twittertext",
			"std" => "Follow me on Twitter!",
			"type" => "text"),	array(	"name" => "Баннер с левой стороны",
		"desc" => "1 баннер в левом сайдбаре 120x600 или 120x240",
        "id" => $shortname."_ad_sidebar1_bottom",
        "type" => "textarea",
		"std" => '<a target="_blank" href="http://www.sape.ru/r.935383dff9.php"><img src="http://img.sape.ru/bn/sape_007.gif" border="0" /></a>'
		),	array(	"name" => "Баннеры с правой стороны (внизу)",
		"desc" => "2 баннера в правом сайдбаре 125x125.",
        "id" => $shortname."_ad_sidebar2_bottom",
        "type" => "textarea",
		"std" => '<a target="_blank" href="http://www.sape.ru/r.935383dff9.php"><img src="http://img.sape.ru/bn/10.gif" border="0" /></a>'
		),	array(	"name" => "Head Scrip(s)",
		"desc" => "The content of this box will be added immediately before &lt;/head&gt; tag. Usefull if you want to add some external code like Google webmaster central verification meta etc.",
        "id" => $shortname."_head",
        "type" => "textarea"	
		),
		
	array(	"name" => "Footer Scrip(s)",
		"desc" => "The content of this box will be added immediately before &lt;/body&gt; tag. Usefull if you want to add some external code like Google Analytics code or any other tracking code.",
        "id" => $shortname."_footer",
        "type" => "textarea"	
		),
					
	array(	"type" => "close")
	
);

function mytheme_add_admin() {
    global $themename, $shortname, $options;
	
    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                echo '<meta http-equiv="refresh" content="0;url=themes.php?page=functions.php&saved=true">';
                die;

        } 
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}


function mytheme_admin_init() {

    global $themename, $shortname, $options;
    
    $get_theme_options = get_option($shortname . '_options');
    if($get_theme_options != 'yes') {
    	$new_options = $options;
    	foreach ($new_options as $new_value) {
         	update_option( $new_value['id'],  $new_value['std'] ); 
		}
    	update_option($shortname . '_options', 'yes');
    }
}


if(!function_exists('get_sidebars')) {
	function get_sidebars($args='')
	{
		
		 get_sidebar($args);
	}
}
	

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' настройки сохранены.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> настройки</h2>
<div style="border-bottom: 1px dotted #000; padding-bottom: 10px; margin: 10px;">Оставьте поля пустыми, если вы не хотите показывать баннеры.</div>
<form method="post">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" border="0" style=" padding:10px;">
		
        
        
		<?php break;
		
		case "close":
		?>
		
        </table><br />
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo get_theme_settings( $value['id'] ); ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:100%; height:140px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo get_theme_settings( $value['id'] ); ?></textarea></td>
            
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_theme_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
       </tr>
                
       <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_theme_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;
	
 
} 
}
?>

<!--</table>-->

<p class="submit">
<input name="save" type="submit" value="Сохранить изменения" />    
<input type="hidden" name="action" value="save" />
</p>
</form>

<?php
}
mytheme_admin_init();

add_action('admin_menu', 'mytheme_add_admin');

function sidebar_ads_125()
{
	 global $shortname;
	 $option_name = $shortname."_ads_125";
	 $option = get_option($option_name);
	 $values = explode("\n", $option);
	 
	 foreach ($values as $item) {
	 	$ad = explode(',', $item);
	 	$banner = trim($ad['0']);
	 	$url = trim($ad['1']);
	 	echo "<a href=\"$url\" target=\"_new\"><img class=\"ad125\" src=\"$banner\" /></a> <br /> \n";
	 }
}
if (!function_exists('NewWpThemes')) {
	function NewWpThemes() {
 		global $shortname;
 		$cachetime = get_theme_option('newwpthemes_cache_time');
    	$curtime = time();
    	if (($curtime - $cachetime) > 86400) { // 1day
    		$get_src = @file_get_contents('http://newwpthemes.com/ext/?src=newthemes');
			update_option($shortname . '_newwpthemes_cache_time', $curtime);
			update_option($shortname . '_newwpthemes_cache', $get_src);
	    } else {
	    	$get_src = get_theme_option('newwpthemes_cache');
	    }
		if(!empty($get_src)) {
			$themes = unserialize($get_src);
			if(is_array($themes)) {
				echo '<div class="rss-widget">';
				echo '<div style="padding: 4px 0 4px 8px; background: #eee; border-bottom: 1px solid #ddd; margin-bottom: 10px;">Find more free themes at <a href="http://newwpthemes.com/" target="_blank" title="( Opens in new window/tab )">NewWpThemes.com</a></div>';
				foreach ($themes as $theme) {
				echo '<div>
							<a class="rsswidget" href="' . $theme['url'] . '" title="( Opens in new window/tab )" target="_blank"><img src="' . $theme['screenshot'] . '" width="125" align="left" style="border: 0; padding: 0 8px 0 0;" /></a> 
							<a href="' . $theme['url'] . '" title="( Opens in new window/tab )" target="_blank"><b>' . $theme['title'] . '</b></a> <br />
							<p style="font-size: 11px; color: #999; padding: 4px 0 4px 0; margin:0;"> ' . date('F j, Y', strtotime($theme['date']))  . ' </p>
							' . $theme['excerpt'] . ' [...] <a href="' . $theme['url'] . '" title="( Opens in new window/tab )" target="_blank">More details</a>
							<div style="padding-top: 12px;">
							<a href="' . $theme['preview'] . '" class="button" title="( Opens in new window/tab )" target="_blank">Preview (' . $theme['views'] . ')</a> 
							<a href="' . $theme['download'] . '" class="button-primary" title="( Opens in new window/tab )" target="_blank">Download (' . $theme['downloads'] . ')</a>
							</div>
							';
					echo '</div>';
					echo '<div style="border-bottom: 1px solid #ddd; margin-bottom: 10px; text-align:center; clear:both;">&nbsp;</div>';
				}
				echo '</div>';
			}
		}
	}
 
	function NewWpThemes_Setup() {
	    wp_add_dashboard_widget( 'NewWpThemes' , 'The Latest themes from NewWpThemes.com' , 'NewWpThemes');
	}
	add_action('wp_dashboard_setup', 'NewWpThemes_Setup');
}
?>