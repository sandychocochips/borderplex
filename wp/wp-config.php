<?php
/** 
 * Configuración básica de WordPress.
 */

/* Datos localhost */
define('DB_NAME', 'borderplex');
define('DB_USER', 'elmaguire');
define('DB_PASSWORD', 'InRainbows');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

/* Datos nodo
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
*/
/* Datos final 
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
*/

define('AUTH_KEY',         'x<ZHff{b@>@A<Lt%LS|IuxgXk1$ej~<-Z^@Gy}OME:#~2OA,XjgEz9[?>`XQR;2s');
define('SECURE_AUTH_KEY',  'u-}=tJ|BF+[{7&.Ko+cpA=wiZ|~u4#eZNI@zbDCQPZLCFtdu`-[abI];cE4,EVL`');
define('LOGGED_IN_KEY',    '~1<kWXy>fU36VLWyWHs-<V(2n;`otm0LA8YU|H+{b}5z#b+}bKT>d8Ok~M-r=.AZ');
define('NONCE_KEY',        'GyBP}uxLY8G(MsylKUa-{)xV+J=$Z,}0FD^MFw6_t1vNfv<}-oI>5;{o+9WKpyjI');
define('AUTH_SALT',        ']1%P#.!uBsVIsm$a-6(=i;fed]2m5pVP[bi -rKd@e!dnT+-E< 2lqwiy7affP!1');
define('SECURE_AUTH_SALT', 'Y*`xpeL5^W2HC<wA2hOPA|B[sIfog|A}[u[G$_S%o??TO1-$BX@8#]/Q%D)n3iNd');
define('LOGGED_IN_SALT',   '|:*qFh;m-OdB^Q0A |$LR-b=cBq]X=ab~*|3zS%6-}fJ^3gIA-_3e#3Erl-1Vt3 ');
define('NONCE_SALT',       '*|jz`KIF#ok|jwx8?L?AeIP>7 D_=`Uae=59ypyCE b/6R:EM++I&DH-Pnlzebf ');


$table_prefix  = 'bdplx_';
define('WP_DEBUG', false);

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// Dejar esto sólo en local
// para permitir las actualizaciones de plugins.
// Importante!!
define('FS_METHOD','direct');