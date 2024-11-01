<?php
/*
Plugin Name: wc_remove_reply_to
Description: Removes the reply-to field from Woocommerce emails, which cause frequent deliverability issues when customer addresses are used
Version:     1.0
Author:      Shortcut Solutions
Author URI:  https://shortcut.solutions
License:     GPL2
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
*/


add_filter( 'woocommerce_email_headers', 'filter_wc_remove_reply_to', 20, 3 );
function filter_wc_remove_reply_to( $header, $email_id, $order ) {

	$headers=explode("\n", $header);
	$newheaders=array();
	foreach ($headers as $line) {
		if (strncmp($line, "Reply-to", 8)!=0) {
			$newheaders[]=$line;
		}
	}
	return(implode("\n", $newheaders));
}
