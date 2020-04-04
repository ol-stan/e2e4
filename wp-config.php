<?php
/**
 * �������� ��������� WordPress.
 *
 * ������ ��� �������� wp-config.php ���������� ���� ���� � ��������
 * ���������. ������������� ������������ ���-���������, �����
 * ����������� ���� � "wp-config.php" � ��������� �������� �������.
 *
 * ���� ���� �������� ��������� ���������:
 *
 * * ��������� MySQL
 * * ��������� �����
 * * ������� ������ ���� ������
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** ��������� MySQL: ��� ���������� ����� �������� � ������ �������-���������� ** //
/** ��� ���� ������ ��� WordPress */
define('DB_NAME', "e2e4-local-wp");

/** ��� ������������ MySQL */
define('DB_USER', "e2e4-local-wp");

/** ������ � ���� ������ MySQL */
define('DB_PASSWORD', "sdfcg0erofgkrt0");

/** ��� ������� MySQL */
define('DB_HOST', "localhost");

/** ��������� ���� ������ ��� �������� ������. */
define('DB_CHARSET', 'utf8mb4');

/** ����� �������������. �� �������, ���� �� �������. */
define('DB_COLLATE', '');

/**#@+
 * ���������� ����� � ���� ��� ��������������.
 *
 * ������� �������� ������ ��������� �� ���������� �����.
 * ����� ������������� �� � ������� {@link https://api.wordpress.org/secret-key/1.1/salt/ ������� ������ �� WordPress.org}
 * ����� �������� ��, ����� ������� ������������ ����� cookies �����������������. ������������� ����������� �������������� �����.
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
 * ������� ������ � ���� ������ WordPress.
 *
 * ����� ���������� ��������� ������ � ���� ���� ������, ���� ������������
 * ������ ��������. ����������, ���������� ������ �����, ����� � ���� �������������.
 */
$table_prefix  = 'wp_';

/**
 * ��� �������������: ����� ������� WordPress.
 *
 * �������� ��� �������� �� true, ����� �������� ����������� ����������� ��� ����������.
 * ������������� �������� � ��� ������������ ������������� ������������ WP_DEBUG
 * � ���� ������� ���������.
 * 
 * ���������� � ������ ���������� ���������� ����� ����� � �������.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* ��� ��, ������ �� �����������. �������! */

/** ���������� ���� � ���������� WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** �������������� ���������� WordPress � ���������� �����. */
require_once(ABSPATH . 'wp-settings.php');