<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Le script de création wp-config.php utilise ce fichier lors de l'installation.
 * Vous n'avez pas à utiliser l'interface web, vous pouvez directement
 * renommer ce fichier en "wp-config.php" et remplir les variables à la main.
 * 
 * Ce fichier contient les configurations suivantes :
 * 
 * * réglages MySQL ;
 * * clefs secrètes ;
 * * préfixe de tables de la base de données ;
 * * ABSPATH.
 * 
 * @link https://codex.wordpress.org/Editing_wp-config.php 
 * 
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'onoff');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '@d5tg&qyz-|c2oU1zQp|V_g/D tYCUq2Uj*]q4+?zi=+*Tt-wBU6h+:S)+*mnoKd');
define('SECURE_AUTH_KEY',  ';a|+OR[aigTIH+v|Zst/6W4zX|Crzd+2%0x-SiCL5O`G8:ykZSU|OV$){^6m{CDH');
define('LOGGED_IN_KEY',    'X~f+H2oO<|dxC-Qt(-lw[nYpPt%Vf6646:~*WN[tiB~t>9J=P5q:GyGjCZar#=sM');
define('NONCE_KEY',        'opE ]A[+&4cmel-^z3sGv=+utCLH<.7|/EBf9L(+[hD+Jq+|@IyyElFRA/K^SiM-');
define('AUTH_SALT',        'K:[cJdNO4+(R i{t),f.-!O/KMe>.hiqS>l [AUD;sqL1ad#<d4OPmu-4>|}D>h^');
define('SECURE_AUTH_SALT', '$?xMF+dc~1,)*PAl/7tB|?T0d1ozF`L&F`GJ13/DE~DhvdAH$]VNT1(2$|7680O]');
define('LOGGED_IN_SALT',   'UHjn8lz@9qk,=K[||$72NDqp<[s~,q)1M$s;%;2[*b9l*{SRUPHqf=^~EEm[!@UE');
define('NONCE_SALT',       '@ps^hVf9wSOG?88=R=]NelBr5~K3.$Mu5bpJ?a|sD(~+D$QIly9`Cd2u.6%9v@~{');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'oo_';

/** 
 * Pour les développeurs : le mode déboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 * 
 * Pour obtenir plus d'information sur les constantes 
 * qui peuvent être utilisée pour le déboguage, consultez le Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress 
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');

/* sage master without Bedrock as the WordPress stack,*/
define('WP_ENV', 'development');