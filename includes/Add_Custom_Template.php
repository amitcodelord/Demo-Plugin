<?php
add_filter( 'template_include', 'contact_page_template', 99 );

function contact_page_template( $template ) {
    $file_name = 'page-custom_form.php';

    if ( is_page( 'demo-form-page' ) ) {
          $template = plugin_dir_path( __DIR__ ) . 'templates/' . $file_name;
    }

    return $template;
}