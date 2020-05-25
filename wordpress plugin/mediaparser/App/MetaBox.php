<?php

namespace mediaparser;


class MetaBox
{
    public static function metaBoxNew($post)
    {
        global $wpdb;
        $meta = self::getMeta($post);
        $versions = $wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'parsed_posts` WHERE `post_id`=' . $post->ID, 'ARRAY_A');

        Render::render('ver', ['versions' => $versions, 'post' => $post, 'meta' => $meta]);
    }

    public static function metaBoxMetas($post)
    {
        $meta = self::getMeta($post);

        Render::render('meta', ['meta' => $meta]);
    }


    public static function metaBoxScripts()
    {
        wp_enqueue_style('modal-css', plugins_url() . '/mediaparser/assets/css/modal.css');

        wp_enqueue_script('jquery');
        wp_enqueue_script('modal-js', plugins_url() . '/mediaparser/assets/js/modal.js');
        wp_enqueue_script('mediaparser-main', plugins_url() . '/mediaparser/assets/js/main.js');
    }

    private static $_meta;

    private static function getMeta($post)
    {
        if (!self::$_meta)
            self::$_meta = get_post_meta($post->ID);
        return self::$_meta;
    }
}