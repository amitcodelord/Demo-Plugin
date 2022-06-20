<?php
register_activation_hook( DEMO_PLUGIN_FILE, 'demo_plugin_activation' );

function demo_plugin_activation() {
  
  if ( ! current_user_can( 'activate_plugins' ) ) return;
  
  global $wpdb;
  
  if ( null === $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = 'demo-form-page'", 'ARRAY_A' ) ) {
     
    $current_user = wp_get_current_user();
    
    // create post object
    $page = array(
      'post_title'  => __( 'Demo Form Page' ),
      'post_status' => 'publish',
      'post_author' => $current_user->ID,
      'post_type'   => 'page',
      'page_template'  => 'template-custom_form.php'
    );
    
    // insert the post into the database
    wp_insert_post( $page );
  }


  //Add Custom Database in Wordpress
  $db_table_name = $wpdb->prefix . 'custom_fields';
  $charset_collate = $wpdb->get_charset_collate();

 //Check to see if the table exists already, if not, then create it
 if($wpdb->get_var( "show tables like '$db_table_name'" ) != $db_table_name ) 
 {
       $sql = "CREATE TABLE `$db_table_name` (
                `id` int(11) NOT NULL auto_increment,
                `name` varchar(60) NOT NULL,
                `emailid` varchar(200) NULL,
                `file_url` text NOT NULL,
                UNIQUE KEY id (id)
        ) $charset_collate;";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
 }

}