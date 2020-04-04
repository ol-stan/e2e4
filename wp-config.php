<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', "e2e4-local-wp");

/** Имя пользователя MySQL */
define('DB_USER', "e2e4-local-wp");

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', "sdfcg0erofgkrt0");

/** Имя сервера MySQL */
define('DB_HOST', "localhost");

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')]C9j0}vazpr,=*0>7dI#|B?i~]Rg551:%6~~]-9&Z{_JZnFe&KxN& v^v%|Y_a+');
define('SECURE_AUTH_KEY',  'jmhd{Lw?ENgTfa5E1K*p)T0.:e6.2+a,;=%*sp+/@:C?dv[$AmH)~uMEgJRRU/HM');
define('LOGGED_IN_KEY',    '{<lLo6E@91F.]-LB[T31OlsWY4I{)Fs-:|2X!CLdvyRC)3[H#[}GBO/}bI.Qei*y');
define('NONCE_KEY',        'XrwY~:>SWp7[U@OVSd*zB5dZNm6Dvm[<.>m55&p8.;_3Eex:@M_T{|-`m.HMm)W1');
define('AUTH_SALT',        '<v@sPPMS#e1B18XOmmJ.&D8J?b/(@/Jxe2zMu*9U%55_6!7=+sLx^QR=Y61CO:@9');
define('SECURE_AUTH_SALT', '=o*UNbbmV8(=)Y0qcryj?VzL|mH@skEv|(3an#amyC&,k@RZQc:X;[%A26x,/T:6');
define('LOGGED_IN_SALT',   '3+KbY0R.Q3w}u3L#)bFf#[evPX!X5iPaA1^ eC/H&&{m<::2qQ#d_Z+MF@{N|tV(');
define('NONCE_SALT',       'yy47aW34Y_tP<r.{w)_!w$8Uph{G6}|(f_qK2z`uwiF!{TH}>C~H;|QHXv!]:l?}');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');