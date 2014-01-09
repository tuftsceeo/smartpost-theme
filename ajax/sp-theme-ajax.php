<?php
/**
 * Created by PhpStorm.
 * User: ryagudin
 * Date: 1/8/14
 * Time: 11:32 AM
 */

function sp_twentytwelve_update_site_title(){
    $nonce = $_POST['nonce'];
    if( !wp_verify_nonce($nonce, 'sp_theme_nonce') ){
        header("HTTP/1.0 409 Security Check.");
        die('Security Check');
    }

    $new_site_title = (string) $_POST['site-title'];
    $success = update_option( 'blogname', $new_site_title );

    if($success){
        $success = array( 'success' => true );
    }else{
        $success = array( 'success' => false );
    }

    echo json_decode( $success );
    exit;
}
