<?php

/* Chargement des styles du parent. */
add_action( 'wp_enqueue_scripts', 'wpchild_enqueue_styles' );
function wpchild_enqueue_styles(){
  wp_enqueue_style( 'wpm-Divi-style', get_template_directory_uri() . '/style.css' );
}

/*  hook admin */


function divi_admin_menu_button( $items, $args ) {
  if ( current_user_can( 'manage_options' ) && $args->theme_location == 'primary-menu' ) {
    // Trouver la position de l'élément "Commander"
      $commander_position = strpos( $items, '<li id="menu-item-130' ); 

      if ( $commander_position !== false ) {
          $new_button = '<li class="special-settings-button"><a href="' . get_admin_url() . '">Admin</a></li>';
          // Insérer le nouveau bouton avant l'élément "Commander"
          $items = substr_replace( $items, $new_button, $commander_position, 0 ); 
      }
  }
  return $items;
}
add_filter( 'wp_nav_menu_items', 'divi_admin_menu_button', 10, 2 );

?>