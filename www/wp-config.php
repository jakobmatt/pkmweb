<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * Denna fil innehåller följande konfigurationer:
 *
 * * Inställningar för MySQL
 * * Säkerhetsnycklar
 * * Tabellprefix för databas
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define('DB_NAME', 'db');

/** MySQL-databasens användarnamn */
define('DB_USER', 'user');

/** MySQL-databasens lösenord */
define('DB_PASSWORD', '');

/** MySQL-server */
define('DB_HOST', 'mysql');

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8mb4');

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'NXlfT@4t2,;h9>;&5FDf=%bWsD6--TN3LKNAcO2m(MrzB3#G^Jn ?Tfp-)[Xv~]Z');
define('SECURE_AUTH_KEY',  'HfABLQtB%&|?#WFug U&SYv1c{Yperk?tt9b2jlt45C;|ZlbC965M!([2:eZ17!b');
define('LOGGED_IN_KEY',    '7G#0#Th)0^EE ?O[Med!S$@k_{7-%_|?WYvf`JY[fs[I^p<|9~w=UgvJE*GI,-25');
define('NONCE_KEY',        'U1!I`sxhsW1s7(7Mvxv+Y?JUi-)|v+!W^Tg65,/Mda|~HU7P]c4fPQ|#v74)k2oT');
define('AUTH_SALT',        'WPHdf{;S2|-o#[ {$)5=&IdH=CQ@`:eM*nAR,<ufp]Nt?L<C2$Fp>8w`O^<g`h@A');
define('SECURE_AUTH_SALT', 'O,~2c(L;._~5kNq>  VVN@el?`l56*0wCj2nIrH*U(L&}HL&9zg2yWU(]O5Ip#bY');
define('LOGGED_IN_SALT',   '+5Ba_(^fI[h[Vkf:Y*L/JG8MGy(-/g0;H}MwmL*K_`|1.Z3l0LV5r!u]2zwX=mlW');
define('NONCE_SALT',       '8+N5qjlTG%Kc_7I(SrTufv~bz)IMI|C8a0$AWYxyQnW_(|W=uW)55v4t:*:k8=+w');

/**#@-*/

/**
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokstäver och understreck!
 */
$table_prefix  = 'wp_';

/** 
 * För utvecklare: WordPress felsökningsläge. 
 * 
 * Ändra detta till true för att aktivera meddelanden under utveckling. 
 * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG 
 * i sin utvecklingsmiljö. 
 *
 * För information om andra konstanter som kan användas för felsökning, 
 * se dokumentationen. 
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */ 
define('WP_DEBUG', false);

/* Det var allt, sluta redigera här! Blogga på. */

/** Absoluta sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');