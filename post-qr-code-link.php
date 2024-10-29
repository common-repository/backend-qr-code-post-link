<?php

/*
  Plugin Name: Backend QR Code Post Link (Post Quickview)
  Version: 1.0.1
  Description: Shows a QR Code in the backend editor for quick accessing the link from a tablet or phone via QR Code Reader.
  Author: 1aWebmarketing
  Author URI: https://1awebmarketing.de
  Copyright 2022 1aWebmarketing
*/

include "phpqrcode/phpqrcode.php";


add_action( 'add_meta_boxes', function(){

    $post_types = apply_filters('qrcode_link_post_types', ['post', 'page']);

    add_meta_box(
        'qr-code-metabox',
        __("QR Code zu diesem Beitrag", 'qr-code-link'),
        'show_qr_code_link_metabox',
        $post_types,
        'side'
    );

} );


function show_qr_code_link_metabox( $post ) {
    if( !is_writable(__DIR__) ){
        qrcode_link_post_show_error();
        return;
    }

    QRcode::png(get_permalink(), __DIR__ . "/permalink.png", QR_ECLEVEL_L, 5, 1);
    ?>
    <img src="<?php echo plugins_url( 'permalink.png', __FILE__ ); ?>" style="width: 100%;">
    <p><?php echo get_permalink(); ?></p>
    <?php
}

function qrcode_link_post_show_error(){
    echo "<p>" . __('Bitte stellen Sie sicher, dass PHP schreibrechte im Plugin-Ordner hat', 'qr-code-link') . "</p>";
}
