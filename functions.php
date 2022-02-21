<?php
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), time() );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


/* TUS FUNCIONES PERSONALIZADAS A PARTIR DE AQUI____ */

/* Las paginas privadas son visibles por subscriptores */

$subRole = get_role( 'subscriber' );
$subRole->add_cap( 'read_private_pages' );

/* TGM Plugin activation */
require_once get_stylesheet_directory() . '/inc/tgm_pa.php';
