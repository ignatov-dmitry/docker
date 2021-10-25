<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'test_db' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'dimon1392' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'rammstein' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'mysql' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SWlwCu&E5tD<RToS7~( MZPYrCESIbRvccMq)l_MbixEFT(O;kf,xzn3lJLP Z@<' );
define( 'SECURE_AUTH_KEY',  '/<}d.t;*c?H5nX_}3Y}WN_A)iCg5oD^cwo4WxPVIw=gXMqe&bQP|H<DfD2n{l^1=' );
define( 'LOGGED_IN_KEY',    'YFO3,sP5a5,{$rE2?N_,KHteG`jO}rg@NJ2CVpEvrj/V%_x6 .?u;k.rlreM7*M~' );
define( 'NONCE_KEY',        'AM6mUXr77X[[agBzjEziLAX-/Z4=m?(.,AmawEk-6!L!HGG&c.jeClBi#?}O?((|' );
define( 'AUTH_SALT',        'f8nbX<iOa.7;99FbJOl j`u.[$<rkj>)nKR]2w)UbNcoHJ;1yydXssVi9+LK2O8j' );
define( 'SECURE_AUTH_SALT', ')9Ex_6Dv+/@FQ^trk,xs-^X`5Iq3`(fHiO84f 4 pNW]<ey:!:Gw%u7u{`1Ax)4&' );
define( 'LOGGED_IN_SALT',   '+FE<kK9<xcey:_Q5PFl*iJh]K+A,zqz`0OQ`.-HfsT$^Nbv4lSnz]_la3h5u-!CV' );
define( 'NONCE_SALT',       'e]3^yC:Pb>qQiEH}5]}N2aIiH#y;wmh65qyU.fylLYf.H)6F=[r=d)C@+5]b6BN|' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
define('FS_METHOD', 'direct');
/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
