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
define('DB_NAME', 'devit');

/** Имя пользователя MySQL */
define('DB_USER', 'devit');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '123456');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'Ynyp&hh~T/xP$?Ws5*kk>QSc>+A&q,-3(Sr:P9k~{t}CEcuOf,2AeA%=4lMEKiLy');
define('SECURE_AUTH_KEY',  'ZNG4EWfYMF?UVaFG:)x9d*5+wb^0-A=TX(ab4DDi}[uC1&GWF+c+DykN-m7-Tm%~');
define('LOGGED_IN_KEY',    '>Y9[RR.zScgRPW?|o2VN&UdFOW3X@55V{:l[!zSk;EDV=36TInD61MNq0_W%,| O');
define('NONCE_KEY',        'oU0Utov2{h9Vc$irjj#zd&aDPy4tf]|Ya*o4F]&wr)FdNwIX:KGun6}px}tO{V!]');
define('AUTH_SALT',        'j:1TlVNtFs2Dw(Z&[4;en$Q.aY>|SI+L~QcZ!7_$!.I*JR1K,dtQm4<PV$=Htl^V');
define('SECURE_AUTH_SALT', '&Y)~3PzwE+;998- Z_I_4{_sWJ GFZ?RfPc<VNN{$#jE,W`j1DJ`*[aKg$ Hn0yP');
define('LOGGED_IN_SALT',   ' QeNn0pK814O)_ 0#tUECDN`n:bfM4T)|3VgKaZBx3=3HS#EH*[=lYq=m78yQQ?Y');
define('NONCE_SALT',       '5=C|r:o!@A3A|z-[k+{F%^3{Tp+VMf~-qw{aDhB#7sN{p`LQbA-.+6;OV.N?DGho');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'test_';

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
