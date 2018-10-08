<?php
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


/* TUS FUNCIONES PERSONALIZADAS A PARTIR DE AQUI____ */

/* Las paginas privadas son visibles por subscriptores */

$subRole = get_role( 'subscriber' );
$subRole->add_cap( 'read_private_pages' );

/* TGM Plugin activation */
require_once get_stylesheet_directory() . '/inc/tgm_pa.php';

/* Cargar Contact Form 7 allí dónde encuentre su SHORTCODE */
if (!is_admin() && WPCF7_LOAD_JS) {
if (!function_exists('jclconsultor_wpcf7_scripts')){
function jclconsultor__wpcf7_scripts($content) {
$pos=strpos($content,'class="wpcf7"');
if ($pos===false){
if (WPCF7_LOAD_JS){
wp_deregister_script('contact-form-7');
wp_deregister_style('contact-form-7');
}
}
return $content;
}
add_filter('the_content','jclconsultor_wpcf7_scripts',99999);
}
}