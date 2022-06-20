<?php
add_action('wp_ajax_submitData', 'submitData_callback');
add_action('wp_ajax_nopriv_submitData', 'submitData_callback');

function submitData_callback() {
    global $wpdb;
    if($_POST['name'] == ''){
        echo "Name is a required Field"; wp_die();
    }

    $arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');
    if (in_array($_FILES['fileToUpload']['type'], $arr_img_ext)) {
        $upload = wp_upload_bits($_FILES["fileToUpload"]["name"], null, file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
        
        if(isset($upload['url'])){
          $insert =  $wpdb->insert($wpdb->prefix.'custom_fields', array(
                'name' => $_POST['name'],
                'emailid' => isset($_POST['email']) ? $_POST['email'] : NULL,
                'file_url' => $upload['url'], // ... and so on
            ));
            if($insert == true){ 
                echo 'Insert Successfull'; 
            } else{
                echo 'Insert failed please try again later';
            }
        }

    }else{
        echo 'Invalid File Type';
    }
    wp_die();
}