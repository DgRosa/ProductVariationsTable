<?php
/**
 * A configuração de base do WordPress
 *
 * Este ficheiro define os seguintes parâmetros: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, e ABSPATH. Pode obter mais informação
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} no Codex. As definições de MySQL são-lhe fornecidas pelo seu serviço de alojamento.
 *
 * Este ficheiro contém as seguintes configurações:
 *
 * * Configurações de  MySQL
 * * Chaves secretas
 * * Prefixo das tabelas da base de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Definições de MySQL - obtenha estes dados do seu serviço de alojamento** //
/** O nome da base de dados do WordPress */
define('DB_NAME', 'vt_db');

/** O nome do utilizador de MySQL */
define('DB_USER', 'root');

/** A password do utilizador de MySQL  */
define('DB_PASSWORD', 'root');

/** O nome do serviddor de  MySQL  */
define('DB_HOST', 'localhost');

/** O "Database Charset" a usar na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O "Database Collate type". Se tem dúvidas não mude. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação.
 *
 * Mude para frases únicas e diferentes!
 * Pode gerar frases automáticamente em {@link https://api.wordpress.org/secret-key/1.1/salt/ Serviço de chaves secretas de WordPress.org}
 * Pode mudar estes valores em qualquer altura para invalidar todos os cookies existentes o que terá como resultado obrigar todos os utilizadores a voltarem a fazer login
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'pIjx#f,0<YyZq1rsST(gr6rKO4cT[=AbbM%D#riX8,dS?!;6IbLF%!4DF`|%7:Ub');
define('SECURE_AUTH_KEY',  'r]PO[|8nM1J{Uw]c,$dSalw%3,Ms|L@KP9[>Q|X1@~e{j7v}O3o+|~|KDD7k>ss0');
define('LOGGED_IN_KEY',    'JWAN?^Pu]ru_O?j^.*$Pf4^qNx3Ft2C16Yg{#8]RNa-NYh(T]C<Q,~0UNj8u1Mc.');
define('NONCE_KEY',        '2q~wTWgOX&7t}sW^A 9*DUp_tRmP_6D]|l7M/U8fX2Eg|Y<uEYl?g_//spE(c6zH');
define('AUTH_SALT',        ',j-L,N`7~{8m-!QqejTDE*MS~/@>2BPU%{6H<cy.)6DJt?@IYJl(jx10g8{:Xv|$');
define('SECURE_AUTH_SALT', '{rCx;;sl_My2[Y#k{wZ?9+Fd#c}7zjg3d`Z:dYa)xQ9^|B9T+8}0h@#EqxpCR$u$');
define('LOGGED_IN_SALT',   'ii$W!%YN6Z9Y]JRc7|)&4dMk>)sk#a6+SAATJ!V_AL|C@Di_gZaVf(+M:-$z=pp ');
define('NONCE_SALT',       '&P(m0,Avu$]QFxtK^Xb3so s=K!F</yn_m{-xe`!Wnz^%(=U`aHV(wwJq6mS#o+w');

/**#@-*/

/**
 * Prefixo das tabelas de WordPress.
 *
 * Pode suportar múltiplas instalações numa só base de dados, ao dar a cada
 * instalação um prefixo único. Só algarismos, letras e underscores, por favor!
 */
$table_prefix  = 'wp_vt';

/**
 * Para developers: WordPress em modo debugging.
 *
 * Mude isto para true para mostrar avisos enquanto estiver a testar.
 * É vivamente recomendado aos autores de temas e plugins usarem WP_DEBUG
 * no seu ambiente de desenvolvimento.
 *
 * Para mais informações sobre outras constantes que pode usar para debugging,
 * visite o Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* E é tudo. Pare de editar! */

/** Caminho absoluto para a pasta do WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Define as variáveis do WordPress e ficheiros a incluir. */
require_once(ABSPATH . 'wp-settings.php');
