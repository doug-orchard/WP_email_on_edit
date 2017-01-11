<?php

/*
Plugin Name: Email on Edit
Plugin URI:
Description: This plugin will email the administrator upon an edit of a (any) post
Author: Doug Orchard
Version: 1.0
Author URI: http://www.doug-orchard.com
*/

function eoe_email_regarding_change($id, $post){

    $opts = wp_load_alloptions();

    $to = $opts["admin_email"];
    $subject = "{$opts['blogname']} - {$post->post_title}: has been edited recently";
    $body = 'please see: <a href="' . $post->guid . '">' . $post->guid . '</a>';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail( $to, $subject, $body, $headers );

}

add_action('edit_post', 'eoe_email_regarding_change', 10, 2);
