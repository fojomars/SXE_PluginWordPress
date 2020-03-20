<?php
/*
Plugin Name: PluginWordPress
Plugin URI:  http://link to your plugin homepage
Description: This plugin replaces words with your own choice of words.
Version:     1.0
Author:      Freddy Muriuki
Author URI:  http://link to your website
License:     GPL2 etc
License URI: https://link to your plugin license
Copyright YEAR PLUGIN_AUTHOR_NAME (email : your email address)
(Plugin Name) is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
(Plugin Name) is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with (Plugin Name). If not, see (http://link to your plugin license).
*/

// Llamada a la función para que cambie una palabra por otra.
add_filter( 'the_content', 'renym_wordpress_typo_fix' );

// Avisa que la contraseña es erronea.
add_filter( 'login_errors', 'contrasinal_olvidada' );

// Esta función cambia la primera palabra por otra.
function renym_wordpress_typo_fix( $text ) {
return str_replace( 'WordPress', 'WordPressDAM', $text );
}

// Esta función avisa que escribimos la contraseña mal.
function contrasinal_olvidada(){
return '¡¡La contraseña es incorreta!!';
}


/*DATABASE*/
// Cuando activamos el plugin se crea una tabla en la BD para insertar las palabras malsonantes.
add_action( 'plugins_loaded', 'create_table_function' );

// Función que crea la tabla en la BD
function create_table_function() {
   
global $wpdb;

$charset_collate = $wpdb->get_charset_collate();

// Añado el prefijo a la tabla
$table_name = $wpdb->prefix . 'palabras_malsonantes';

// Sentencia sql

$sql = "CREATE TABLE $table_name (
palabras varchar(20) PRIMARY KEY
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
}

// Cuando el plugin se activa se llama a esta acción para hacer el insert.
register_activation_hook( __FILE__, 'myplugin_activate' );
//Función para insertar ls palabras malsonantes.
function myplugin_activate() {
global $wpdb;
// le añado el prefijo a la tabla
$table_name = $wpdb->prefix . 'palabras_malsonantes';
$wpdb->insert($table_name, array('palabras' => 'cabrón'),array('%s'));
$wpdb->insert($table_name, array('palabras' => 'puta'),array('%s'));
$wpdb->insert($table_name, array('palabras' => 'gilipollas'),array('%s'));
$wpdb->insert($table_name, array('palabras' => 'tonto'),array('%s'));
$wpdb->insert($table_name, array('palabras' => 'subnormal'),array('%s'));
$wpdb->insert($table_name, array('palabras' => 'caca'),array('%s'));
$wpdb->insert($table_name, array('palabras' => 'pis'),array('%s'));
$wpdb->insert($table_name, array('palabras' => 'mierda'),array('%s'));
$wpdb->insert($table_name, array('palabras' => 'pedo'),array('%s'));
}

// Este filtro sustituye las palabras malsonantes para guardarlas en la BD.
add_filter( 'the_content', 'palabras_malsonantes_filter' );
//Función que hace una búsqueda de las palabras en la página.
function palabras_malsonantes_filter( $text ) {
global $wpdb;
$result = $wpdb->get_results( 'SELECT palabras FROM wp_palabras_malsonantes', ARRAY_A );
//Substituye cabrón 
return str_replace( $result[0],'c*****', $text );
}


//Filtro que sustituye palabras malsonantes, recogiéndolas de la base de datos
add_filter( 'the_content', 'palabras_malsonantes_filter2' );
//Función que hace una búsqueda de las palabras en la página.
function palabras_malsonantes_filter2( $text ) {
global $wpdb;
$result = $wpdb->get_results( 'SELECT palabras FROM wp_palabras_malsonantes', ARRAY_A );
//Substituye puta 
return str_replace( $result[1],'p***', $text );
}

//Filtro que sustituye palabras malsonantes, recogiéndolas de la base de datos
add_filter( 'the_content', 'palabras_malsonantes_filter3' );
//Función que hace una búsqueda de las palabras en la página.
function palabras_malsonantes_filter3( $text ) {
global $wpdb;
$result = $wpdb->get_results( 'SELECT palabras FROM wp_palabras_malsonantes', ARRAY_A );
//Substituye gilipollas 
return str_replace( $result[2],'g*********', $text );
}

//Filtro que sustituye palabras malsonantes, recogiéndolas de la base de datos
add_filter( 'the_content', 'palabras_malsonantes_filter4' );
//Función que hace una búsqueda de las palabras en la página.
function palabras_malsonantes_filter4( $text ) {
global $wpdb;
$result = $wpdb->get_results( 'SELECT palabras FROM wp_palabras_malsonantes', ARRAY_A );
//Substituye tonto 
return str_replace( $result[3],'t****', $text );
}

//Filtro que sustituye palabras malsonantes, recogiéndolas de la base de datos
add_filter( 'the_content', 'palabras_malsonantes_filter5' );
//Función que hace una búsqueda de las palabras en la página.
function palabras_malsonantes_filter5( $text ) {
global $wpdb;
$result = $wpdb->get_results( 'SELECT palabras FROM wp_palabras_malsonantes', ARRAY_A );
//Substituye subnormal 
return str_replace( $result[4],'s********', $text );
}

//Filtro que sustituye palabras malsonantes, recogiéndolas de la base de datos
add_filter( 'the_content', 'palabras_malsonantes_filter7' );
//Función que hace una búsqueda de las palabras en la página.
function palabras_malsonantes_filter7( $text ) {
global $wpdb;
$result = $wpdb->get_results( 'SELECT palabras FROM wp_palabras_malsonantes', ARRAY_A );
//Substituye caca 
return str_replace( $result[6],'c***', $text );
}

//Filtro que sustituye palabras malsonantes, recogiéndolas de la base de datos
add_filter( 'the_content', 'palabras_malsonantes_filter8' );
//Función que hace una búsqueda de las palabras en la página.
function palabras_malsonantes_filter8( $text ) {
global $wpdb;
$result = $wpdb->get_results( 'SELECT palabras FROM wp_palabras_malsonantes', ARRAY_A );
//Substituye pis 
return str_replace( $result[7],'p**', $text );
}

//Filtro que sustituye palabras malsonantes, recogiéndolas de la base de datos
add_filter( 'the_content', 'palabras_malsonantes_filter9' );
//Función que hace una búsqueda de las palabras en la página.
function palabras_malsonantes_filter9( $text ) {
global $wpdb;
$result = $wpdb->get_results( 'SELECT palabras FROM wp_palabras_malsonantes', ARRAY_A );
//Substituye mierda 
return str_replace( $result[8],'m*****', $text );
}

//Filtro que sustituye palabras malsonantes, recogiéndolas de la base de datos
add_filter( 'the_content', 'palabras_malsonantes_filter10' );
//Función que hace una búsqueda de las palabras en la página.
function palabras_malsonantes_filter10( $text ) {
global $wpdb;
$result = $wpdb->get_results( 'SELECT palabras FROM wp_palabras_malsonantes', ARRAY_A );
//Substituye pedo 
return str_replace( $result[9],'p***', $text );
}