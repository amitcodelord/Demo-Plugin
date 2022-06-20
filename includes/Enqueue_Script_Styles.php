<?php
function custom_plugin_enqueue_script_and_style() {

wp_enqueue_style('bootstrap-4-style','https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css', array(), null, true);
wp_deregister_script('jquery');
wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
wp_enqueue_script('bootstrap-4-script', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js', array(), null, true);

wp_register_script( 'custom-demo-script', plugin_dir_url( __DIR__ ). '/js/custom_demo_script.js', array('jquery'), false, true );
  
$script_data_array = array(
    'ajaxurl' => admin_url( 'admin-ajax.php' )
);
wp_localize_script( 'custom-demo-script', 'ajax', $script_data_array );

wp_enqueue_script( 'custom-demo-script' );


}
add_action('wp_enqueue_scripts', 'custom_plugin_enqueue_script_and_style');